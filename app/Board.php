<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = "board";

    protected $fillable = [
        'user_id', 'boardTitle', 'boardPrivacyType',
    ];
}
