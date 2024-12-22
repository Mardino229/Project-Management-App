<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dash');
});


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


//    Route::resource('projects', ProjectController::class);
//    Route::resource('tasks', ProjectController::class);

    Route::get('/project-management', [ProjectController::class, 'index'])->name('project-management');
    Route::post('/project-management', [ProjectController::class, 'search'])->name('project-search');
    Route::get('/project-management-deadline', [ProjectController::class, 'deadline'])->name('project-deadline');
    Route::get('/project-management/in_progress', [ProjectController::class, 'in_progress'])->name('project-in_progress');
    Route::get('/project-management/completed', [ProjectController::class, 'complete'])->name('project-completed');
    Route::post('/project-create', [ProjectController::class, 'store'])->name('project-management.store');
    Route::post('/project-edit/{project}', [ProjectController::class, 'update'])->name('project-management.update');
    Route::post('/project-to-complete/{project}', [ProjectController::class, 'completed'])->name('project-management.complete');
    Route::post('/project-delete/{project}', [ProjectController::class, 'destroy'])->name('project-management.destroy');

    Route::get('/admin-management', [AdminController::class, 'user'])->name('user-management')->middleware('role:admin');
    Route::get('/admin-management/projects', [AdminController::class, 'project'])->name('pro-management')->middleware('role:admin');;
    Route::post('/admin-management/{user}/update', [AdminController::class, 'updateuser'])->name('user-edit-management')->middleware('role:admin');;
    Route::post('/admin-management/{user}/delete', [AdminController::class, 'deleteuser'])->name('user-delete-management')->middleware('role:admin');;


    Route::get('/task-management', [TaskController::class, 'index'])->name('task-management');
    Route::get('/task-management-priority', [TaskController::class, 'priority'])->name('task-priority');
    Route::get('/task-management-status', [TaskController::class, 'status'])->name('task-status');
    Route::post('/task-management', [TaskController::class, 'search'])->name('task-search');
    Route::get('/task-management/not-started', [TaskController::class, 'not_stated'])->name("not-started");
    Route::get('/task-management/in-progress', [TaskController::class, 'in_progress'])->name("in-progress");
    Route::get('/task-management/completed', [TaskController::class, 'completed'])->name("completed");

    Route::post('/task-create/{id}', [TaskController::class, 'store'])->name('task-management.store');
    Route::post('/task-update/{task}', [TaskController::class, 'update'])->name('task-management.update');
    Route::post('/task-delete/{task}', [TaskController::class, 'delete'])->name('task-management.delete');
    Route::post('/task-management/task-setStatus/{task}-{state}', [TaskController::class, 'setStatus'])->name('task-management.setStatus');
    Route::post('/task-setOwner/{task}', [TaskController::class, 'delegate'])->name('task-management.delegate');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification');
    Route::post('/notification/{notification}', [NotificationController::class, 'markAsRead'])->name('notification.marked');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/forbidden', function () {
    abort(403, 'Unauthorized action.');
});

require __DIR__.'/auth.php';
