<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardTask extends Model
{
    protected $table = "card_task";

    protected $fillable = [
        'card_id', 'task_title', 'is_completed', 'created_at', 'updated_at',
    ];
}
