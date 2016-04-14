<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardLabel extends Model
{
    protected $table = "card_label";

    protected $fillable = [
        'card_id', 'label_title',
    ];
}
