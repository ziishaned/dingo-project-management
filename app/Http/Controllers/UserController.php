<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getDashboard()
    {
        $boards = Board::all();
        return view('user.home', compact('boards'));
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
