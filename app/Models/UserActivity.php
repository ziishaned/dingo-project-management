<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = "user_activity";

 	protected $fillable = [
        'user_id', 'changed_in', 'activity_in_id', 'activity_description', 'created_at', 'updated_at',
    ];

    public function getUserActivity($user_id)
	{
		return UserActivity::where("user_id", $user_id)->get();;	
	}   

	public function createUserActivity($input, $user_id)
	{
		return UserActivity::create([
    		'user_id' 				=> $user_id,
    		'changed_in' 			=> $input->get("changed_in"),
    		'activity_in_id' 		=> $input->get("activity_in_id"),
    		"activity_description"	=> $input->get("activity_description"),
    	]);
	}
}
