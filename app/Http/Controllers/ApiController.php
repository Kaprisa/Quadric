<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ApiController extends Controller
{

    public function upload(Request $request, $dir)
    {
        $is_arr = is_array($request->photos);
        $files = $is_arr ? $request->photos : [$request->photos];
        $paths = [];
        foreach ($files as $f) {
            $paths[] = [
                'originalName' => $f->getClientOriginalName(),
                'size' => $f->getClientSize(),
                'name' => str_replace($dir.'/', '', Storage::disk('uploads')->put($dir, $f)),
            ];
        }
        return response()->json($is_arr ? $paths : $paths[0], 200);//
    }

    public function removeFile(Request $request, $dir)
    {
        Storage::disk('uploads')->delete($dir.'/'.$request->name);
        return null;
    }

    public function upload_video(Request $request, $dir)
    {
        if($request->hasFile('video')){

            $file = $request->video;
            $filename = $file->getClientOriginalName();
            $path = public_path().'/video/'.$dir;
            $file->move($path, $filename);
            return response()->json($filename, 200);
        }
        return response()->json(null, 500);
    }

    public function answer(Request $request, $id)
    {
        Auth::guard('api')
            ->user()
            ->questions()
            ->sync(
                [
                    $id => [
                        'attempts' => $request->has('attempts') && $request->attempts ? $request->attempts : 0,
                        'correct' => $request->correct
                    ]
                ]
            );
        return null;
    }

    public function tags()
    {
        $tags = Tag::all();
        return response()->json($tags, 200);
    }

    public function getDirectories()
    {
//        $root = public_path();
//
//        $iter = new RecursiveIteratorIterator(
//            new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
//            RecursiveIteratorIterator::SELF_FIRST,
//            RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
//        );
//
//        //$paths = array($root);
//        foreach ($iter as $path => $dir) {
//            //if ($dir->isDir()) {
//                $paths[] = $path;
//            //}
//        }
        $ritit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(public_path()), RecursiveIteratorIterator::CHILD_FIRST);
        $r = array();
        foreach ($ritit as $splFileInfo) {
            $path = $splFileInfo->isDir()
                ? array($splFileInfo->getFilename() => array())
                : array($splFileInfo->getFilename());

            for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {
                $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);
            }
            $r = array_merge_recursive($r, $path);
        }

        return response()->json($r, 200);
    }
}
