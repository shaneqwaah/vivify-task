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

    <!-- Edit Task Form -->
    @if($editTaskId)
        <form wire:submit.prevent="updateTask" class="mb-4">
            <input type="text" wire:model="title" placeholder="Title" class="rounded-md p-2 border border-gray-300 bg-white mb-2">
            <input type="text" wire:model="description" placeholder="Description" class="rounded-md p-2 border border-gray-300 bg-white mb-2">
            <select wire:model="status" class="px-3 py-2 border border-gray-300 bg-white mb-2">
                <option value="To Do">To Do</option>
                <option value="In Progress">In Progress</option>
                <option value="Done">Done</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update Task</button>
            <button wire:click.prevent="resetForm" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md ml-2">Cancel</button>
        </form>
    @endif

    <!-- Task Listing -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($tasks as $task)
            <div class="border border-gray-300 rounded-md shadow-md p-4">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-bold">{{ $task->title }}</h2>
                    <div class="flex items-center space-x-2">

                        <!-- Edit Task Button -->
                        <button wire:click="editTask({{ $task->id }})" class="text-blue-500 hover:text-blue-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </button>
                        <!-- Delete Task Button -->
                        <button wire:click="deleteTask({{ $task->id }})" class="text-red-500 hover:text-red-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-2">{{ $task->description }}</p>
                <p class="text-sm text-gray-700">Status: <span class="font-semibold">{{ $task->status }}</span></p>
            </div>
        @endforeach
    </div>
</div>
