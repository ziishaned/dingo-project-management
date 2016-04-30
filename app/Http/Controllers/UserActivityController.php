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
    public function getUserActivity()
    {
        $boards = Board::where(['user_id' => Auth::id(),])->get();
        $userActivity = UserActivity::where("user_id", Auth::id())->get();;

        $page = 'activity';
        return view('user.activity', compact('page', 'boards', 'userActivity'));
    }

    public function createUserActivity(Request $request)
    {
    	$activity_in_id 		= $request->get("activity_in_id");
    	$changed_in				= $request->get("changed_in");
    	$activity_description 	= $request->get("activity_description");
    	$userId 				= Auth::id();
    	UserActivity::create([
    		'user_id' 				=> $userId,
    		'changed_in' 			=> $changed_in,
    		'activity_in_id' 		=> $activity_in_id,
    		"activity_description"	=> $activity_description,
    	]);
    }
}
