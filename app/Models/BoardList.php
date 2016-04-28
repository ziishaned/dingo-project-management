<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardList extends Model
{
    protected $table = "board_list";

    protected $fillable = [
        'board_id', 'user_id', 'list_name',
    ];
}
