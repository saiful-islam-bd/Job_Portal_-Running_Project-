<?php

use Illuminate\Support\Facades\Route;

//add by me
use App\Http\Controllers\Jobs\SingleJobController;
use App\Http\Controllers\Categories\CategoriesController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admin\AdminController;


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/jobs/single.job/{id}', [App\Http\Controllers\Jobs\SingleJobController::class, 'singleJobs'])->name('single.job');
Route::post('/jobs/save', [App\Http\Controllers\Jobs\SingleJobController::class, 'saveJob'])->name('save.job');
Route::post('/jobs/apply', [App\Http\Controllers\Jobs\SingleJobController::class, 'applyJob'])->name('apply.job');
Route::any('search', [App\Http\Controllers\Jobs\SingleJobController::class, 'search'])->name('search.job');

Route::get('/categories/single_job/{name}', [App\Http\Controllers\Categories\CategoriesController::class, 'categoryJobs'])->name('categories.job');

Route::get('/users/profile', [App\Http\Controllers\Users\UsersController::class, 'profile'])->name('profile');
Route::get('/users/applications', [App\Http\Controllers\Users\UsersController::class, 'applications'])->name('applications');
Route::get('/users/saved_jobs', [App\Http\Controllers\Users\UsersController::class, 'savedJobs'])->name('saved_jobs');

Route::get('/users/edit_profile', [App\Http\Controllers\Users\UsersController::class, 'editProfile'])->name('edit.profile');
Route::post('/users/edit_profile', [App\Http\Controllers\Users\UsersController::class, 'updateProfile'])->name('update.profile');

Route::get('/users/edit_cv', [App\Http\Controllers\Users\UsersController::class, 'editCV'])->name('edit.cv');
Route::post('/users/edit_cv', [App\Http\Controllers\Users\UsersController::class, 'updateCV'])->name('update.cv');


 
Route::get('admin/login', [App\Http\Controllers\Admin\AdminController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [App\Http\Controllers\Admin\AdminController::class, 'checkLogin'])->name('check.login');


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');

    //admins
    Route::get('/all_admins', [App\Http\Controllers\Admin\AdminController::class, 'admins'])->name('view.admins');
    
    Route::get('/create_admins', [App\Http\Controllers\Admin\AdminController::class, 'createAdmins'])->name('create.admins');
    Route::post('/create_admins', [App\Http\Controllers\Admin\AdminController::class, 'storeAdmins'])->name('store.admins');
    
    Route::get('/delete_admins/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteAdmins'])->name('delete.admins');
    
    //show categories
    Route::get('/display_categories', [App\Http\Controllers\Admin\AdminController::class, 'displayCategories'])->name('display.categories');
    
    //create categories
    Route::get('/create_categories', [App\Http\Controllers\Admin\AdminController::class, 'createCategories'])->name('create.categories');
    Route::post('/create_categories', [App\Http\Controllers\Admin\AdminController::class, 'storeCategories'])->name('store.categories');
    
    //update categories
    Route::get('/edit_categories/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editCategories'])->name('edit.categories');
    Route::post('/edit_categories/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateCategories'])->name('update.categories');
    
    //delete categories
    Route::get('/delete_categories/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteCategories'])->name('delete.categories');


    //show jobs
    Route::get('/display_jobs', [App\Http\Controllers\Admin\AdminController::class, 'displayJobs'])->name('display.jobs');
    
    //create jobs
    Route::get('/create_jobs', [App\Http\Controllers\Admin\AdminController::class, 'createJobs'])->name('create.jobs');
    Route::post('/create_jobs', [App\Http\Controllers\Admin\AdminController::class, 'storeJobs'])->name('store.jobs');
    
    //update jobs
    Route::get('/edit_jobs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editJobs'])->name('edit.jobs');
    Route::post('/edit_jobs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateJobs'])->name('update.jobs');
    
    //delete jobs
    Route::get('/delete_jobs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteJobs'])->name('delete.jobs');


     //show applications
     Route::get('/display_applications', [App\Http\Controllers\Admin\AdminController::class, 'displayApplications'])->name('display.applications');
     Route::get('/delete_applications/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteApplications'])->name('delete.applications');
     

});



