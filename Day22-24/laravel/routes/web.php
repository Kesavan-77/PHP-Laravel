<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuardianForm;
use App\Http\Controllers\StudentForm;
use App\Http\Controllers\CourseForm;

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

Route::resource('/', GuardianForm::class);

Route::resource('/student', StudentForm::class);

Route::resource('/course', CourseForm::class);

// Route::resource('guardianStudent',GuardianForm::class);

// Route::get('/guardianStudent',[Operations::class,'displayGuardianStudent']);

// Route::post('addGuardianForm',[Operations::class,'addGuardian']);
// Route::post('editGuardianForm/{id}',[Operations::class,'editGuardian']);
// Route::post('delGuardianForm/{id}',[Operations::class,'deleteGuardian']);

// Route::post('addStudentForm',[Operations::class,'addStudent']);
// Route::post('addStudentForm',[Operations::class,'addStudent']);
// Route::post('addStudentForm',[Operations::class,'addStudent']);
