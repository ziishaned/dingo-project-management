<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardTag extends Model
{
    protected $table = "card_tag";

    protected $fillable = [
        'card_id', 'tag_title',
    ];
}
