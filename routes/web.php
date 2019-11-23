<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
Auth::routes();

Route::get('/', 'HomeController@welcome')->name('home');

Route::get('/tasks', 'TaskController@tasks')->name('tasks');
Route::post('/tasks/add', 'TaskController@addTask')->name('add-task');
Route::delete('/tasks/{task}', 'TaskController@removeTask')->name('remove-task');
