<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\RegisterController;
use App\Http\Controllers\Task\DestroyController;
use App\Http\Controllers\Task\ShowListController;
use App\Http\Controllers\Task\ShowDetailController;
use App\Http\Controllers\Task\EditController;
use Illuminate\Foundation\Auth\RedirectsUsers;


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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('home', [ShowListController::class, 'ShowListWD'])->name('home');

Route::get('task/create', [RegisterController::class, 'ShowTaskRegisterWD'])->name('task.create');
Route::post('task/store', [RegisterController::class, 'TaskRegister'])->name('task.store');
Route::get('task/show/{parameter}', [ShowDetailController::class, 'ShowTaskWD'])->name('task.show'); 
Route::get('task/edit/{parameter}', [EditController::class, 'ShowTaskEditWD'])->name('task.edit');
Route::post('task/update', [EditController::class, 'TaskEdit'])->name('task.update');
Route::delete('task/destroy/{parameter}', [DestroyController::class, 'destroy'])->name('task.destroy');

Route::get('edit',[App\Http\Controllers\Auth\EditController::class, 'showEditForm'])->name('auth.edit');
Route::post('edited',[App\Http\Controllers\Auth\EditController::class, 'userEdit'])->name('auth.update');

Route::get('scss', function () {
    return view('for-scss');
});
