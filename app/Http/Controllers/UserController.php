<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('user.home');
    }

    public function getBoard()
    {
        return view('user.board');
    }

    public function getProfile()
    {
        return view('user.profile');
    }
}
