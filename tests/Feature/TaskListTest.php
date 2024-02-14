<?php

// tests/Feature/TaskListTest.php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Livewire\TaskList;
use App\Models\Task;

class TaskListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_a_task()
    {
        $task = Task::factory()->create();

        Livewire::test(TaskList::class)
            ->call('deleteTask', $task->id)
            ->assertDontSee($task->title);
    }
}
