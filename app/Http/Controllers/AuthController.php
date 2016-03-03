<?php

namespace App\Http\Controllers;

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
        if (User::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $request->get('remember'))) {
            dd('Login User');
        }
        dd('Fuck');
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
            'password'  => $request->get('password'),
        ]);
        return redirect()->route('auth.login')->with('alert', 'Your account has been created.');
    }

}