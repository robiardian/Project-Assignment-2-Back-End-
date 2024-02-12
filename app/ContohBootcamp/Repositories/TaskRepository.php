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
        return $this->model->destroy($taskId);
    }

    public function assignTask($taskId, $userId)
    {
        // Implement logic to assign task
    }

    public function unassignTask($taskId, $userId)
    {
        // Implement logic to unassign task
    }

    public function addSubtask($taskId, $subtaskData)
    {
        // Implement logic to add subtask
    }

    public function deleteSubtask($taskId, $subtaskId)
    {
        // Implement logic to delete subtask
    }
}

