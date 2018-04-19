<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            [ 'id' => $request->id ],
            [
                'name' => $request->name,
                'colors' => json_encode($request->colors)
            ]
        );
        $user = Auth::guard('api')->user();
        $user->theme_id = $theme->id;
        $user->save();
        return response()->json($theme, 200);
    }

    public function delete($id)
    {
        Theme::destroy($id);
        return null;
    }
}
