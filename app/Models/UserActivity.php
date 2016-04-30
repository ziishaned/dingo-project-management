<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = "user_activity";

 	protected $fillable = [
        'user_id', 'changed_in', 'activity_in_id', 'activity_description', 'created_at', 'updated_at',
    ];   
}
