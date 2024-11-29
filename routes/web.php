<?php

use Illuminate\Support\Facades\Route;

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
   return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/media.php';

Route::view('sneat-try', 'content.pages.pages-home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class, ["as" => 'admin']);
    Route::post('users/{user}/status', [\App\Http\Controllers\Admin\UserController::class,'updatestatus'])->name('admin.updateStatus');
    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function () {
        Route::group(['prefix' => '{user}/change-password', 'as' => 'changePassword.'], function (){
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'changePassword'])->name('index');
            Route::post('process', [\App\Http\Controllers\Admin\UserController::class, 'changePassword_process'])->name('process');
        });
    });
    Route::group(['prefix' => 'profile/change-password', 'as' => 'admin.users.profile.changePassword.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'changeProfilePassword'])->name('index');
        Route::post('process', [\App\Http\Controllers\Admin\UserController::class, 'changeProfilePasswordProcess'])->name('process');
    });

    Route::get('user/profile', [\App\Http\Controllers\Admin\UserController::class, 'userProfile'])->name('admin.user.profile');
    Route::post('users/search', [\App\Http\Controllers\Admin\UserController::class, 'search'])->name('admin.users.search');

    Route::group(['prefix' => 'roles', 'as' => 'admin.roles.'], function(){
        Route::group(['prefix' => '{role}/manage-permissions', 'as' => 'permissions.manage.'], function(){
            Route::get('/', [\App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('index');
            Route::post('update', [\App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('update');
        });
    });
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class, ["as" => 'admin'])->except([
        'show', 'edit', 'update'
    ]);

    Route::group(['prefix' => 'file', 'as' => 'file.'], function() {
        Route::post('upload-media', [\App\Http\Controllers\Admin\UploadMediaController::class , 'uploadMedia'])->name('upload');
        Route::post('remove-media', [\App\Http\Controllers\Admin\UploadMediaController::class , 'removeMedia'])->name('remove');
    });

    Route::resource('user-profiles', App\Http\Controllers\Admin\UserProfileController::class , ["as" => 'admin']);

});
