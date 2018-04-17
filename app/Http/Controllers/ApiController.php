<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                        'attempts' => $request->has('attempts') ? $request->attempts : 0,
                        'correct' => $request->correct
                    ]
                ]
            );
        return null;
    }

    public function userAddCourse(Request $request)
    {
        Auth::guard('api')
            ->user()
            ->courses()
            ->attach($request->id);

        Return null;
    }

    public function userRemoveCourse($id)
    {
        Auth::guard('api')
            ->user()
            ->courses()
            ->detach($id);

        Return null;
    }
}
