<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'index'])->name('student_index');
Route::resource('student', StudentController::class);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
