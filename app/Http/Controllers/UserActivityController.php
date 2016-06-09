<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use \App\Models\UserActivity;
use \App\Models\Board;

class UserActivityController extends Controller
{ 
    
    protected $board;
    protected $user;

    public function __construct(Board $board, UserActivity $userActivity)
    {
        $this->board = $board;
        $this->userActivity = $userActivity;
    }

    /**
     * Gets user activity from the database for a specifc user that is currently logged in.
     * @return view User activity page or view
     */
    public function getUserActivity()
    {
        $boards = $this->board->getUserBoards(Auth::id());
        $userActivity = $this->userActivity->getUserActivity(Auth::id());

        $page = 'activity';
        return view('user.activity', compact('page', 'boards', 'userActivity'));
    }

    /**
     * Creates a new user activity
     * @param  Request $request have a input data for this function
     * @return bool true
     */
    public function createUserActivity(Request $request)
    {
        $this->userActivity->createUserActivity($request, Auth::id()); 
    }
}
