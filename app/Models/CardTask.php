<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardTask extends Model
{
    protected $table = "card_task";

    protected $fillable = [
        'card_id', 'task_title', 'is_completed', 'created_at', 'updated_at',
    ];

    public function updateTaskIsCompleted($input)
    {
    	CardTask::where("id", "=", $input->get("taskId"))->update(["is_completed" => $input->get("isCompleted"),]);
    	return true;
    }

    public function totalTasksCompleted($input)
    {
    	return CardTask::where(['card_id' => $input->get("cardId"), "is_completed" => 1])->count();
    }

    public function totalTasks($input)
    {
    	return CardTask::where(['card_id' => $input->get("cardId")])->count();
    }

    public function deleteTask($input)
    {
        CardTask::where("id", "=", $input->get("taskId"))->delete();
        return true;
    }

    public function createTask($input)
    {
        return CardTask::create([
            "task_title" => $input->get("taskTitle"),
            "card_id" => $input->get("cardId"),
            "is_completed" => 0,
        ]);
    }
}
