<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function deleteTask(Request $request)
    {
        $taskId = $request->input('task_id');
        $result = $this->taskService->deleteTask($taskId);
        return response()->json($result);
    }

    public function assignTask(Request $request)
    {
        $taskId = $request->input('task_id');
        $userId = $request->input('user_id');
        $result = $this->taskService->assignTask($taskId, $userId);
        return response()->json($result);
    }

    public function unassignTask(Request $request)
    {
        $taskId = $request->input('task_id');
        $result = $this->taskService->unassignTask($taskId);
        return response()->json($result);
    }

    public function createSubtask(Request $request)
    {
        $taskId = $request->input('task_id');
        $subtaskData = $request->only('title', 'description');
        $result = $this->taskService->createSubtask($taskId, $subtaskData);
        return response()->json($result);
    }

    public function deleteSubtask(Request $request)
    {
        $taskId = $request->input('task_id');
        $subtaskId = $request->input('subtask_id');
        $result = $this->taskService->deleteSubtask($taskId, $subtaskId);
        return response()->json($result);
    }
}
