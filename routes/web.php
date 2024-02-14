<?php

use App\Livewire\CreateTask;
use App\Livewire\TaskList;
use App\Livewire\DeleteTask;
use App\Livewire\EditTask;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', TaskList::class)->name('tasks.index');
Route::get('/tasks/create', CreateTask::class)->name('tasks.create');
Route::get('/tasks/{task}/edit', EditTask::class)->name('tasks.edit');
Route::delete('/tasks/{task}', DeleteTask::class)->name('tasks.destroy');
