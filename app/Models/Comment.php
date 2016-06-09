<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $fillable = [
        'card_id', 'user_id', 'comment_description', 'created_at', 'updated_at',
    ];

    public function saveComment($input, $user_id)
    {
    	return Comment::create([
            'card_id' => $input->get("cardId"),
            'user_id' => $user_id,
            'comment_description' => $input->get("comment"),  
        ]);
    }

    public function getComment($commentId)
    {
    	return Comment::select('comment.*', 'users.name')
          ->join('users','users.id','=','comment.user_id')
          ->where('comment.id','=', $commentId)
          ->get();
    }
}
