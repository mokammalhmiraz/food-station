<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function userlist(){
        $users = User::simplePaginate(5);
        $total_users = User::count();
        return view('user', compact('users', 'total_users'));
    }
}
