<?php

namespace App\Http\Controllers;

use \Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' =>  'required',
            'password' => 'required',
        ]);


        if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->get('remember'))) {
            return redirect()->back()->with('alert', 'Can\'t log you in with given information.');
        }
        return redirect()->route('user.dashboard')->with('info', 'You are logged in.');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|unique:users,name',
            'email' =>  'required|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => \Hash::make($request->get('password')),
        ]);
        return redirect()->route('auth.login')->with('alert', 'Your account has been created.');
    }

}