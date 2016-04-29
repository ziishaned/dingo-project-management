<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use \App\Models\User;
use \App\Models\Board;

class UserController extends Controller
{
    public function getDashboard()
    {
        $boards = Board::where(['user_id' => Auth::id(), ])->get();
        $starredBoards = Board::where(['user_id' => Auth::id(), 'is_starred' => 1])->orderBy('created_at', 'desc')->get();
        // $recentBoards = Board::where(['user_id' => Auth::id(), ])->orderBy('created_at', 'desc')->take(3)->get();

        return view('user.home', compact('boards', 'recentBoards', 'starredBoards'));
    }

    public function getBoard()
    {
        return view('user.board');
    }

    public function getProfile()
    {
        $boards = Board::where(['user_id' => Auth::id(), ])->get();
        return view('user.profile', compact('boards'));
    }

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
