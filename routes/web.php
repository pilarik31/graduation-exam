<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasklistController;
use App\Http\Controllers\TimerController;
use Illuminate\Auth\Access\Response;
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

// Authentication logic.
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// OAuth2
Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

// Language
Route::get('lang/{locale}', [LocalizationController::class, 'lang'])->name('lang.locale');

// Application logic.
Route::resource('/', DashboardController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('tasks', TaskController::class)->middleware('auth');
Route::resource('comments', CommentController::class)->middleware('auth');
Route::resource('tasklists', TasklistController::class)->middleware('auth');

/**
 * @todo AJAXify.
 */
Route::patch('tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete')
    ->middleware('auth');
Route::get('tasks/{task}/complete', fn() => abort(405));

Route::post('/tasks/{id}/timers', [TimerController::class, 'store']);
Route::post('/tasks/{id}/timers/stop', [TimerController::class, 'stopRunning']);
Route::get('/tasks/timers/active', [TimerController::class, 'running']);
