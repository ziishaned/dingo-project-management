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
    protected $comment;

    public function __construct(Comment $comment)
    {
      $this->comment = $comment;
    }
    /**
     * Crates or insert a new comment in the database.
     * @param  Request $request have the comment as input for this function
     * @return object newly inserted comment in database
     */
    public function saveComment(Request $request)
    {
        $commentDetail = $this->comment->saveComment($request, Auth::id());
        return $this->comment->getComment($commentDetail["id"]);
    }
    
}
