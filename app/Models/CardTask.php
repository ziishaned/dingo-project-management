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
    	$this->where("id", "=", $input->get("taskId"))->update(["is_completed" => $input->get("isCompleted"),]);
    	return true;
    }

    public function totalTasksCompleted($input)
    {
    	return $this->where(['card_id' => $input->get("cardId"), "is_completed" => 1])->count();
    }

    public function totalTasks($input)
    {
    	return $this->where(['card_id' => $input->get("cardId")])->count();
    }

    public function deleteTask($input)
    {
        $this->where("id", "=", $input->get("taskId"))->delete();
        return true;
    }

    public function createTask($input)
    {
        return $this->create([
            "task_title" => $input->get("taskTitle"),
            "card_id" => $input->get("cardId"),
            "is_completed" => 0,
        ]);
    }

    public function getCardTasks($card_id)
    {
        return $this->where('card_id', '=', $card_id)->latest()->get();
    }
}
