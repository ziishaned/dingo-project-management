<?php

namespace App\Http\Controllers;

use Auth;
use App\Board;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getDashboard()
    {
        $boards = Board::where(['user_id' => Auth::id(), ])->get();
        $recentBoards = Board::where(['user_id' => Auth::id(), ])->orderBy('created_at', 'desc')->take(3)->get();
        return view('user.home', compact('boards', 'recentBoards'));
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
