<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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

//
Route::get('debugbar', [\App\Http\Controllers\DebugBarOnOffController::class, 'set']);

// project route
Route::get('/projects', [ProjectController::class, 'list'])->name('projects');
Route::get('/projects/list', [ProjectController::class, 'list'])->name('projects.list');
Route::get('/projects/view/{id}', [ProjectController::class, 'view'])->name('projects.view');
Route::post('/projects/add', [ProjectController::class, 'projects.add'])->name('projects.add');
Route::post('/projects/modify', [ProjectController::class, 'projects.modify'])->name('projects.modify');
