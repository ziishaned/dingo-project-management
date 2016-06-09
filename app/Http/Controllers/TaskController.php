<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use \App\Models\CardTask;

class TaskController extends Controller
{
    protected $cardTask;

    public function __construct(CardTask $cardTask)
    {
        $this->cardTask = $cardTask;   
    }

    /**
     * Updates the task is completed or not
     * @param  Request $request has the input that is used in this fnuction
     * @return object have the total task and total task that is completed 
     */
    public function updateTaskCompleted(Request $request)
    {
        $this->cardTask->updateTaskIsCompleted($request);
        
        return [
            "totalTasksCompleted" => $this->cardTask->totalTasksCompleted($request),
            "totalTasks" => $this->cardTask->totalTasks($request),
        ];
    }

    /**
     * Delete a task from the database.
     * @param  Request $request have the task id and card id
     * @return object have the total task and total task that is completed 
     */
    public function deleteTask(Request $request)
    {
        $this->cardTask->deleteTask($request);

        return [
            "totalTasksCompleted" => $this->cardTask->totalTasksCompleted($request),
            "totalTasks" => $this->cardTask->totalTasks($request),
        ];

    }

    /**
     * Create or insert a new task into the database 
     * @param  Request $request have the task title and card id
     * @return object have the total task and total task that is completed and total card 
     */
    public function saveTask(Request $request)
    {
        return [
            "totalTasksCompleted" => $this->cardTask->totalTasksCompleted($request),
            "totalTasks" => $this->cardTask->totalTasks($request),
            "card" => $this->cardTask->createTask($request),
        ];
    }
}
