<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function getAll()
    {
        $themes = Theme::all();
        return response()->json($themes, 200);
    }

    public function save(Request $request)
    {
        $theme = Theme::updateOrCreate(
            [ 'name' => $request->name ],
            [
                'colors' => json_encode($request->colors)
            ]
        );
        return null;
    }

    public function delete($id)
    {
        Theme::destroy($id);
        return null;
    }
}
