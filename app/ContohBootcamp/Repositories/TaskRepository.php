<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function delete($taskId)
    {
        $task = $this->model->findOrFail($taskId);
        return $task->delete();
    }

    public function assignTask($taskId, $userId)
    {
        $task = Task::findOrFail($taskId);
        $task->assigned_to = $userId;
        $task->save();

        return $task;
    }


    public function unassignTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->assigned_to = null;
        $task->save();
    
        return $task;
    }

    public function createSubtask($taskId, $subtaskData)
    {
        $task = $this->model->findOrFail($taskId);
        $subtask = $task->subtasks()->create($subtaskData);
        return $subtask;
    }

    public function deleteSubtask($taskId, $subtaskId)
    {
        $task = $this->model->findOrFail($taskId);
        $subtask = $task->subtasks()->findOrFail($subtaskId);
        return $subtask->delete();
    }
}
