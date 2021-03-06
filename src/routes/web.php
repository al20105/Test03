<?php

/*******************************************************************
*** File Name           : web.php
*** Version             : V1.0
*** Designer            : 平佐 竜也
*** Date                : 2022.06.28
*** Purpose             : webのルート設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 平佐 竜也, 2022.06.28
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\RegisterController;
use App\Http\Controllers\Task\DeleteController;
use App\Http\Controllers\Task\ShowListController;
use App\Http\Controllers\Task\EditController;
use Illuminate\Foundation\Auth\RedirectsUsers;

Route::get('/', function ()
{
    return redirect('/login');
});

Auth::routes();

Route::get('home', [ShowListController::class, 'ShowListWD'])->name('home');

Route::post('task/store', [RegisterController::class, 'TaskRegister'])->name('task.store');
Route::post('task/update', [EditController::class, 'TaskEdit'])->name('task.update');
Route::delete('task/delete/{parameter}', [DeleteController::class, 'TaskDelete'])->name('task.delete');

Route::get('edit',[App\Http\Controllers\Auth\EditController::class, 'showEditForm'])->name('auth.edit');
Route::post('edited',[App\Http\Controllers\Auth\EditController::class, 'userEdit'])->name('auth.update');

Route::post('tag/edit', [ShowListController::class, 'TagEditIndex'])->name('tag.edit');
Route::post('tag/delete', [ShowListController::class, 'TagDeleteIndex'])->name('tag.delete');

Route::get('scss', function ()
{
    return view('for-scss');
});
