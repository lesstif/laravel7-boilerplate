<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// auth route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'showRegistrationForm']);

// project route
Route::get('/projects', [ProjectController::class, 'list'])->name('projects');
Route::get('/projects/list', [ProjectController::class, 'list'])->name('projects.list');
Route::get('/projects/view/{id}', [ProjectController::class, 'view'])->name('projects.view');
Route::post('/projects/add', [ProjectController::class, 'add'])->name('projects.add');
Route::get('/projects/edit/{id}', [ProjectController::class, 'viewEditForm'])->name('projects.edit');
Route::post('/projects/edit/{id}', [ProjectController::class, 'edit']);

// tasks route
Route::get('/tasks', [TaskController::class, 'list'])->name('tasks');
Route::get('/tasks/list', [TaskController::class, 'list'])->name('tasks.list');
Route::get('/tasks/view/{id}', [TaskController::class, 'view'])->name('tasks.view');
Route::post('/tasks/add', [TaskController::class, 'add'])->name('tasks.add');
Route::get('/tasks/edit/{id}', [TaskController::class, 'viewEditForm'])->name('tasks.edit');
Route::post('/tasks/edit/{id}', [TaskController::class, 'edit']);
