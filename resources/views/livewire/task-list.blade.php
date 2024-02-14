<!-- livewire/task-list.blade.php -->

<div>
    <h2 class="text-lg font-semibold mb-4">Task List</h2>

    <!-- Add Task Form -->
    <form wire:submit.prevent="createTask" class="mb-4">
        <input type="text" wire:model="title" placeholder="Title" class="rounded-md p-2 border border-gray-300 bg-white mb-2">
        <input type="text" wire:model="description" placeholder="Description" class="rounded-md p-2 border border-gray-300 bg-white mb-2">
        <select wire:model="status" class="px-3 py-2 border border-gray-300 bg-white mb-2">
            <option value="To Do">To Do</option>
            <option value="In Progress">In Progress</option>
            <option value="Done">Done</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Task</button>
    </form>


    <!-- Task Listing -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tasks as $task)
            <div class="border border-gray-300 rounded-md shadow-md p-4">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-bold">{{ $task->title }}</h2>
                </div>
                <p class="text-sm text-gray-600 mb-2">{{ $task->description }}</p>
                <p class="text-sm text-gray-700">Status: <span class="font-semibold">{{ $task->status }}</span></p>
            </div>
        @endforeach
    </div>
</div>
