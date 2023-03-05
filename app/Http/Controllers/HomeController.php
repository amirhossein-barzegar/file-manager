<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $user = auth()->user() ?? null;
        if ($user) {
            $users = User::with('files')->whereNot('username',$user->username)->get();
        } else {
            $users = User::with('files')->get();
        }
        return view('welcome',compact('users'));
    }
}
