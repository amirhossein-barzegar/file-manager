<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterReqeust;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    # Login page show
    public function getLogin() {
        return view('user.login');
    }

    # Login page post
    public function postLogin(LoginRequest $request) {
        if ($this->attemptToLogin($request)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withInput();
        }
    }

    # Register User show
    public function getRegister() {
        return view('user.register');
    }

    # Register User post
    public function postRegister(RegisterReqeust $request) {
        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password'))
        ]);

        $user->save();

        if ($this->attemptToLogin($request)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error',"Something wents wrong!");
        }
    }

    # User Logout
    public function logout() {
        auth()->logout();
        return redirect()->route('home');
    }

    /**
     * @param Request
     * @return bool
     */
    public function attemptToLogin($request) {
        $isAuth = Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);

        return $isAuth;
    }
}
