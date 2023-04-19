<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function() {
    Route::get('login', [Auth::class, 'index'])->name('login');
    Route::post('login', [Auth::class, 'login'])->name('login.access');
});

Route::name('admin.')->middleware(['auth:admin'])->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('index');
  Route::post('/logout', [Auth::class, 'logout'])->name('logout');
  Route::get('/app/forms', [AppController::class, 'forms'])->name('app.index');
  Route::post('/app/forms', [AppController::class, 'addForm'])->name('app.forms');
  Route::post('/app/forms/add_input', [AppController::class, 'addInput'])->name('app.forms.input');
  Route::get('/app/forms/input/edit/{id}', [AppController::class, 'editInput'])->name('app.forms.input.edit');
  Route::post('/app/forms/input/update/{id}', [AppController::class, 'updateInput'])->name('app.forms.input.update');

  Route::get('/app/design', [AppController::class, 'getDesign'])->name('app.design');
  Route::post('/app/design', [AppController::class, 'addDesign'])->name('app.design.add');


   Route::prefix('products')->name('products.')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update', 'update')->name('update');
            Route::post('delete', 'delete')->name('delete');
        });

        Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update', 'update')->name('update');
            Route::post('activate', 'activate')->name('activate');
            Route::post('delete', 'delete')->name('delete');
        });

        Route::controller(BrandController::class)->prefix('brand')->name('brand.')->group(function () {
            // Route::get('/', 'index')->name('index');
            // Route::get('create', 'create')->name('create');
            // Route::post('store', 'store')->name('store');
            // Route::get('show', 'show')->name('show');
            // Route::get('edit/{id}', 'edit')->name('edit');
            // Route::post('update', 'update')->name('update');
            // Route::post('activate', 'activate')->name('activate');
            // Route::post('delete', 'delete')->name('delete');
        });

        
    });

//   Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
//   Route::delete('categories/trash/delete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
//   Route::post('categories/trash/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
//   Route::resource('categories', CategoryController::class);

//   Route::resource('products',ProductController::class);
});

Route::get('modal', function () {
  return View('test');
});