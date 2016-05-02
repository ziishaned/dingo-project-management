<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\CardTask;

class TaskController extends Controller
{
    /**
     * Updates the task is completed or not
     * @param  Request $request has the input that is used in this fnuction
     * @return object have the total task and total task that is completed 
     */
    public function updateTaskCompleted(Request $request)
    {
        $taskId = $request->get("taskId");
        $cardId = $request->get("cardId");
        $isCompleted = $request->get("isCompleted");

        CardTask::where("id", "=", $taskId)->update(["is_completed" => $isCompleted,]);

        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
        ];

    }

    /**
     * Delete a task from the database.
     * @param  Request $request have the task id and card id
     * @return object have the total task and total task that is completed 
     */
    public function deleteTask(Request $request)
    {
        $taskId = $request->get("taskId");   
        $cardId = $request->get("cardId");
        
        CardTask::where("id", "=", $taskId)->delete();

        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
        ];

    }

    /**
     * Create or insert a new task into the database 
     * @param  Request $request have the task title and card id
     * @return object have the total task and total task that is completed and total card 
     */
    public function saveTask(Request $request)
    {
        $taskTitle = $request->get("taskTitle");
        $cardId = $request->get("cardId");
        

        $card = CardTask::create([
            "task_title" => $taskTitle,
            "card_id" => $cardId,
            "is_completed" => 0,
        ]);
        
        $totalTasksCompleted = CardTask::where(['card_id' => $cardId, "is_completed" => 1])->count();
        $totalTasks = CardTask::where(['card_id' => $cardId])->count();

        return [
            "totalTasksCompleted" => $totalTasksCompleted,
            "totalTasks" => $totalTasks,
            "card" => $card,
        ];
    }
}
