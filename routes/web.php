<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolClass;
use App\Http\Controllers\MajorController;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::name('students.')->prefix('students')->group(function(){

//     Route::get('/', [StudentController::class,'index'])->name('index');

//     Route::get('/{id}', [StudentController::class,'show'])->name('show');

// });

// Authentication
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerView'])->name('register-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth')->middleware('guest');

Route::name('students.')->middleware(['role:student,teacher', 'auth'])->prefix('students')->group(function(){

    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::get('/{student}', [StudentController::class, 'show'])->name('show');

    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::put('/{student}', [StudentController::class, 'update'])->name('update');

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::name('teachers.')->middleware(['role:teacher', 'auth'])->prefix('teachers')->group(function(){

    Route::get('/', [TeacherController::class, 'index'])->name('index');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');

    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    Route::post('/', [TeacherController::class, 'store'])->name('store');

    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

Route::prefix('classes')->middleware(['role:teacher', 'auth'])->name('classes.')->group(function () {

    Route::get('/', SchoolClass\IndexController::class)->name('index');

    Route::get('/create', SchoolClass\CreateController::class)->name('create');

    Route::get('/{id}', SchoolClass\ShowController::class)->name('show');

    Route::get('/{id}/edit', SchoolClass\EditController::class)->name('edit');

    Route::put('/{id}', SchoolClass\UpdateController::class)->name('update');

    Route::post('/', SchoolClass\StoreController::class)->name('store');

    Route::delete('/{id}', SchoolClass\DestroyController::class)->name('destroy');
});


Route::resource('majors', MajorController::class)->middleware(['role:teacher', 'auth']);