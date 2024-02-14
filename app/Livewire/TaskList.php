<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Validation\Rule;

class TaskList extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $status;
    public $editTaskId;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string'
    ];

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function createTask()
    {
        $this->validate();

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
        $this->validate();

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

    public function updateTaskStatus($taskId)
    {
        $task = Task::findOrFail($taskId);

        // Update status to "Done" if it's "To Do" or "In Progress"
        if ($task->status == 'To Do' || $task->status == 'In Progress') {
            $task->status = 'Done';
            $task->save();
        }

        $this->tasks = Task::all(); // Refresh the task list
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
