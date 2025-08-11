<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController as AdminUserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 Route::resource('tasks', TaskController::class);  
 Route::resource('users', UserController::class);  
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('tasks', AdminTaskController::class);
    Route::get('/tasks/create', [AdminTaskController::class, 'make'])->name('admin.tasks.make');
    //Route::get('/tasks/make', [AdminTaskController::class, 'make'])->name('admin.tasks.create');
    Route::post('/tasks/store', [AdminTaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('tasks/{task}/change', [AdminTaskController::class, 'change'])->name('admin.tasks.change');
    Route::put('/admin/tasks/{task}', [AdminTaskController::class, 'update'])->name('admin.tasks.update');
    Route::delete('tasks/{task}/remove', [AdminTaskController::class, 'remove'])->name('admin.tasks.remove');

    Route::get('/tasks/{task}/display', [AdminTaskController::class, 'display'])->name('admin.tasks.display');

    Route::resource('users', AdminUserController::class);
    Route::get('/users/create', [AdminUserController::class, 'make'])->name('admin.users.make');
    Route::post('/users/store', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/change', [AdminUserController::class, 'change'])->name('admin.users.change');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}/remove', [AdminUserController::class, 'remove'])->name('admin.users.remove');
    Route::get('/users/{user}/display', [AdminUserController::class, 'display'])->name('admin.users.display');

});

// Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    
// });

require __DIR__.'/auth.php';
