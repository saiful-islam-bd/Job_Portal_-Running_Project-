<?php

use Illuminate\Support\Facades\Route;

//add by me
use App\Http\Controllers\Jobs\SingleJobController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Users\UsersController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/jobs/single.job/{id}', [App\Http\Controllers\Jobs\SingleJobController::class, 'singleJobs'])->name('single.job');
Route::post('/jobs/save', [App\Http\Controllers\Jobs\SingleJobController::class, 'saveJob'])->name('save.job');
Route::post('/jobs/apply', [App\Http\Controllers\Jobs\SingleJobController::class, 'applyJob'])->name('apply.job');

Route::get('/categories/single.job/{name}', [App\Http\Controller\Categories\CategoriesController::class, 'categoryJobs'])->name('categories.job');

Route::get('/users/profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');
Route::get('/users/applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');
Route::get('/users/saved_jobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('saved_jobs');

Route::get('/users/edit_profile', [App\Http\Controllers\Users\UsersController::class, 'editProfile'])->name('edit.profile');
Route::post('/users/edit_profile', [App\Http\Controllers\Users\UsersController::class, 'updateProfile'])->name('update.profile');

Route::get('/users/edit_cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');
Route::post('/users/edit_cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');
