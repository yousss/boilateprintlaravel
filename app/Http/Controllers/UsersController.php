<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('users.index', compact('users'));
    }
}
