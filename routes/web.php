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


Route::domain('localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
  Route::get('/dzial/{category}', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
  Route::get('/serach/', [App\Http\Controllers\HomeController::class, 'serach'])->name('serach');

});

Route::domain('fakty.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Fakty\HomeController::class, 'index'])->name('fakty.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Fakty\PostController::class, 'show'])->name('fakty.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Fakty\PostController::class, 'category'])->name('fakty.category');
  Route::get('/serach/', [App\Http\Controllers\Fakty\PostController::class, 'serach'])->name('fakty.serach');
});

Route::domain('biznes.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Biznes\HomeController::class, 'index'])->name('biznes.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Biznes\PostController::class, 'show'])->name('biznes.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Biznes\PostController::class, 'category'])->name('biznes.category');
  Route::get('/serach/', [App\Http\Controllers\Biznes\PostController::class, 'serach'])->name('biznes.serach');
});

Route::domain('historia.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Historia\HomeController::class, 'index'])->name('historia.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Historia\PostController::class, 'show'])->name('historia.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Historia\PostController::class, 'category'])->name('historia.category');
  Route::get('/serach/', [App\Http\Controllers\Historia\PostController::class, 'serach'])->name('historia.serach');
});

Route::domain('hobby.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Hobby\HomeController::class, 'index'])->name('hobby.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Hobby\PostController::class, 'show'])->name('hobby.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Hobby\PostController::class, 'category'])->name('hobby.category');
  Route::get('/serach/', [App\Http\Controllers\Hobby\PostController::class, 'serach'])->name('hobby.serach');
});

Route::domain('kobieta.facet.dziecko.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\KobietaFacetDziecko\HomeController::class, 'index'])->name('kfd.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\KobietaFacetDziecko\PostController::class, 'show'])->name('kfd.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\KobietaFacetDziecko\PostController::class, 'category'])->name('kfd.category');
  Route::get('/serach/', [App\Http\Controllers\KobietaFacetDziecko\PostController::class, 'serach'])->name('kfd.serach');
});

Route::domain('art.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Kultura\HomeController::class, 'index'])->name('kultura.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Kultura\PostController::class, 'show'])->name('kultura.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Kultura\PostController::class, 'category'])->name('kultura.category');
  Route::get('/serach/', [App\Http\Controllers\Kultura\PostController::class, 'serach'])->name('kultura.serach');
});

Route::domain('motoryzacja.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Motoryzacja\HomeController::class, 'index'])->name('motoryzacja.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Motoryzacja\PostController::class, 'show'])->name('motoryzacja.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Motoryzacja\PostController::class, 'category'])->name('motoryzacja.category');
  Route::get('/serach/', [App\Http\Controllers\Motoryzacja\PostController::class, 'serach'])->name('motoryzacja.serach');
});

Route::domain('naukaitechnologie.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\NaukaITechnologie\HomeController::class, 'index'])->name('naukaitechnologie.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\NaukaITechnologie\PostController::class, 'show'])->name('naukaitechnologie.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\NaukaITechnologie\PostController::class, 'category'])->name('naukaitechnologie.category');
  Route::get('/serach/', [App\Http\Controllers\NaukaITechnologie\PostController::class, 'serach'])->name('naukaitechnologie.serach');
});

Route::domain('salonpolityczny.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\SalonPolityczny\HomeController::class, 'index'])->name('salonpolityczny.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\SalonPolityczny\PostController::class, 'show'])->name('salonpolityczny.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\SalonPolityczny\PostController::class, 'category'])->name('salonpolityczny.category');
  Route::get('/serach/', [App\Http\Controllers\SalonPolityczny\PostController::class, 'serach'])->name('salonpolityczny.serach');
});

Route::domain('sluzbymundurowe.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\SluzbyMundurowe\HomeController::class, 'index'])->name('sluzbymundurowe.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\SluzbyMundurowe\PostController::class, 'show'])->name('sluzbymundurowe.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\SluzbyMundurowe\PostController::class, 'category'])->name('sluzbymundurowe.category');
  Route::get('/serach/', [App\Http\Controllers\SluzbyMundurowe\PostController::class, 'serach'])->name('sluzbymundurowe.serach');
});

Route::domain('spoleczenstwo.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Spoleczenstwo\HomeController::class, 'index'])->name('spoleczenstwo.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Spoleczenstwo\PostController::class, 'show'])->name('spoleczenstwo.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Spoleczenstwo\PostController::class, 'category'])->name('spoleczenstwo.category');
  Route::get('/serach/', [App\Http\Controllers\Spoleczenstwo\PostController::class, 'serach'])->name('spoleczenstwo.serach');
});

Route::domain('sport.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Sport\HomeController::class, 'index'])->name('sport.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Sport\PostController::class, 'show'])->name('sport.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Sport\PostController::class, 'category'])->name('sport.category');
  Route::get('/serach/', [App\Http\Controllers\Sport\PostController::class, 'serach'])->name('sport.serach');
});

Route::domain('turystyka.localhost')->group(function () {
  Route::get('/', [App\Http\Controllers\Turystyka\HomeController::class, 'index'])->name('turystyka.index');
  Route::get('/artykuly/{post}', [App\Http\Controllers\Turystyka\PostController::class, 'show'])->name('turystyka.show');
  Route::get('/dzial/{category}', [App\Http\Controllers\Turystyka\PostController::class, 'category'])->name('turystyka.category');
  Route::get('/serach/', [App\Http\Controllers\Turystyka\PostController::class, 'serach'])->name('turystyka.serach');
});

Route::domain('admin.localhost')->group(function () {
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
