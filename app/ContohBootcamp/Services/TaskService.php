namespace App\Services;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function deleteTask($taskId)
    {
        return $this->taskRepository->delete($taskId);
    }

    public function assignTask($taskId, $userId)
    {
        return $this->taskRepository->assignTask($taskId, $userId);
    }

    public function unassignTask($taskId, $userId)
    {
        return $this->taskRepository->unassignTask($taskId, $userId);
    }

    public function addSubtask($taskId, $subtaskData)
    {
        return $this->taskRepository->addSubtask($taskId, $subtaskData);
    }

    public function deleteSubtask($taskId, $subtaskId)
    {
        return $this->taskRepository->deleteSubtask($taskId, $subtaskId);
    }
}



