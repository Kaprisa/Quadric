<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function roles()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }

    public function addRole(Request $request)
    {
       Role::create([
           'name' => $request->name,
           'display_name' => $request->display_name
       ]);
       return null;
    }
}
