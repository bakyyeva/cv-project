<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EducationController;

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
    return view('layouts.admin');
})->name('admin.home');

Route::get('/education/list', [EducationController::class, 'index'])->name('education-list');
Route::get('/education/create', [EducationController::class, 'create'])->name('education-create');
Route::post('/education/create', [EducationController::class, 'store']);
Route::get('/education/edit/{id}', [EducationController::class, 'edit'])->name('education-edit')->whereNumber('id');
Route::post('/education/edit/{id}', [EducationController::class, 'update'])->whereNumber('id');
Route::delete('/education/delete', [EducationController::class, 'delete'])->name('education-delete');
Route::patch('/education/change-status', [EducationController::class, 'changeStatus'])->name('education.change-status');
