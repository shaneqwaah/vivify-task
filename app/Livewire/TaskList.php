<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Validation\Rule;

class TaskList extends Component
{
    public $task;
    public $tasks;
    public $title;
    public $description;
    public $status;
    public $editTitle;
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
        session()->flash('success', 'Task created successfully!');
    }

    public function editTask($taskId)
    {
        $this->editTaskId = $taskId;
        $task = Task::findOrFail($taskId);
        $this->editTitle = $task->title;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
    }
    public function cancelEdit()
    {
        $this->resetForm();
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
        session()->flash('success', 'Task updated successfully!');
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
        $this->editTitle = null;
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
