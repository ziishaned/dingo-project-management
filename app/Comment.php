<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $fillable = [
        'card_id', 'user_id', 'comment_description', 'created_at', 'updated_at',
    ];
}
