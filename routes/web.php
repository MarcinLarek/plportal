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


Route::domain(config('app.name'))->group(function () {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
  Route::get('/dział/{category}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
  Route::get('/serach/', [App\Http\Controllers\HomeController::class, 'serach'])->name('serach');
  Route::get('/{section}', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
  Route::get('/{section}/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
  Route::get('/{section}/{category}', [App\Http\Controllers\PostController::class, 'category'])->name('post.category');
  Route::get('/{section}/serach/', [App\Http\Controllers\PostController::class, 'serach'])->name('post.serach');
});

Route::domain('admin.'.config('app.name'))->group(function () {
  Route::middleware('auth:admin')->group(function () {
        Route::prefix('/admins')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminsController::class, 'adminslist'])->name('admin.admins');
            Route::get('/create', [\App\Http\Controllers\Admin\AdminsController::class, 'create'])->name('admin.admins.create');
            Route::post('/store', [\App\Http\Controllers\Admin\AdminsController::class, 'store'])->name('admin.admins.store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\AdminsController::class, 'edit'])->name('admin.admins.edit');
            Route::patch('/{id}/update', [\App\Http\Controllers\Admin\AdminsController::class, 'update'])->name('admin.admins.update');
            Route::get('/{id}/delete', [\App\Http\Controllers\Admin\AdminsController::class, 'delete'])->name('admin.admins.delete');
            Route::post('/{id}/deleteadmin', [\App\Http\Controllers\Admin\AdminsController::class, 'deleteadmin'])->name('admin.admins.deleteadmin');
        });

        Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
        Route::get('/create/{section}', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.post.store');

    });
});

Route::middleware('guest')->group(function () {
        Route::prefix('/sign-in')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\SignInController::class, 'index'])->name('admin.sign-in');
            Route::post('/login', [\App\Http\Controllers\Admin\SignInController::class, 'login'])->name('admin.login');
            Route::get('/LoginAdmin', [\App\Http\Controllers\Admin\SignInController::class, 'LoginAdmin'])->name('admin.LoginAdmin');
            Route::get('/AdminLogin/{token}', [\App\Http\Controllers\Admin\SignInController::class, 'AdminLogin'])->name('admin.AdminLogin');
            Route::get('/adminlogout', [\App\Http\Controllers\Admin\SignInController::class, 'adminlogout'])->name('admin.adminlogout');
        });
    });

Route::post('/images', [App\Http\Controllers\ImageController::class, 'store'])->name('images.store');

Auth::routes();
