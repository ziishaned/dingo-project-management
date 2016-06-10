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
    	return $this->where(['user_id' => $user_id,])->get();
    }

    public function getUserStarredBoards($user_id)
    {
    	return $this->where(['user_id' => $user_id, 'is_starred' => 1])->orderBy('created_at', 'desc')->get();
    }

    public function createBoard($input, $user_id)
    {
        return $this->create([
            'user_id' => $user_id,
            'boardTitle' => $input->get('boardTitle'),
            'boardPrivacyType' => $input->get('boardPrivacyType'),  
        ]);
    }

    public function getBoard($board_id)
    {
        return $this->findOrFail(['id' => $board_id])->first();
    }

    public function getUserRecentBoards($user_id)
    {
        return $this->where(['user_id' => $user_id, ])->orderBy('created_at', 'desc')->take(3)->get();
    }

    public function updateBoardFavourite($input)
    {
        return $this->where("id", $input->get("boardId"))->update(["is_starred" => $input->get("isFavourite"),]);
    }
}
