<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = "board";

    protected $fillable = [
        'user_id', 'boardTitle', 'boardPrivacyType',
    ];

    public function getUserBoards($user_id)
    {
    	return Board::where(['user_id' => $user_id,])->get();
    }

    public function getUserStarredBoards($user_id)
    {
    	return Board::where(['user_id' => $user_id, 'is_starred' => 1])->orderBy('created_at', 'desc')->get();
    }
}
