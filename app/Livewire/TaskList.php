<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskList extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $status;
    public $editTaskId;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function createTask()
    {
        Task::create([
            'title' => $this->title,
            'description' => $this->description ?? null,
            'status' => $this->status
        ]);

        $this->resetForm();
        $this->tasks = Task::all(); // Refresh the task list
    }

    public function editTask($taskId)
    {
        $this->editTaskId = $taskId;
    }

    public function cancelEdit()
    {
        $this->editTaskId = null;
    }


    public function updateTask()
    {
        $task = Task::findOrFail($this->editTaskId);
        $task->update([
            'title' => $this->title,
            'description' => $this->description ?? null,
            'status' => $this->status
        ]);

        $this->resetForm();
        $this->tasks = Task::all(); // Refresh the task list
    }

    public function deleteTask($taskId)
    {
        Task::destroy($taskId);
        $this->tasks = Task::all();
    }


    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        $this->status = '';
        $this->editTaskId = null;
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
