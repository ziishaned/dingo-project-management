<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use Auth;
use \App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Crates or insert a new comment in the database.
     * @param  Request $request have the comment as input for this function
     * @return object newly inserted comment in database
     */
    public function saveComment(Request $request)
    {
        $comment = $request->get("comment");
        $cardId = $request->get("cardId");
        $userId  = Auth::id();

        $commentDetail = Comment::create([
            'card_id' => $cardId,
            'user_id' => $userId,
            'comment_description' => $comment,  
        ]);

        return DB::table('comment')
          ->select('comment.*', 'users.name')
          ->join('users','users.id','=','comment.user_id')
          ->where('comment.id','=',$commentDetail["id"])
          ->get();
    }
    
}
