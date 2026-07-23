<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $admin = Admin::where([

            ['name', "=", $request->admin_name],
            ['password', "=", $request->admin_password]
        ])->first();
        return $admin;
    }
}
