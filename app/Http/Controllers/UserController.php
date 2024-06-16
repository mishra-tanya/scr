<?php

namespace App\Http\Controllers;

use App\Models\Reg_User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = Reg_User::where('is_admin', 0)->get();
        $admins = Reg_User::where('is_admin', 1)->get();
        // dd($users);
        return view('admin.user_admin', compact('users','admins'));
    }
}
