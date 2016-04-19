<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardCard extends Model
{
    protected $table = "board_card";

    protected $fillable = [
        'board_id', 'user_id', 'list_id', 'card_title',
    ];
}
