<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OrderController;
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
  Route::post('/user/show', [DashboardController::class, 'show'])->name('users.show');
  Route::post('/orders/show', [DashboardController::class, 'showOrder'])->name('orders.dashboard.show');
  Route::post('/logout', [Auth::class, 'logout'])->name('logout');
  Route::get('/app/forms', [AppController::class, 'forms'])->name('app.index');
  Route::post('/app/forms', [AppController::class, 'addForm'])->name('app.forms');
  Route::post('/app/forms/add_input', [AppController::class, 'addInput'])->name('app.forms.input');
  Route::get('/app/forms/input/edit/{id}', [AppController::class, 'editInput'])->name('app.forms.input.edit');
  Route::post('/app/forms/input/update/{id}', [AppController::class, 'updateInput'])->name('app.forms.input.update');

  Route::get('/app/design', [AppController::class, 'getDesign'])->name('app.design');
  Route::post('/app/design', [AppController::class, 'addDesign'])->name('app.design.add');

  Route::get('/cms', [CmsController::class, 'index'])->name('cms.index');
  Route::get('/cms/create', [CmsController::class, 'create'])->name('cms.create');
  Route::get('/cms/codeEditor', [CmsController::class, 'cEditorIndex'])->name('cms.cEditor.index');
  Route::post('/cms/codeEditor/store', [CmsController::class, 'cEditorStore'])->name('cms.cEditor.store');
  Route::post('/cms/store', [CmsController::class, 'store'])->name('cms.store');

  Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
  Route::get('/orders/{id}', [OrderController::class, 'edit'])->name('orders.edit');
  Route::post('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
  Route::post('/orders/change_status/{id}', [OrderController::class, 'changeStatus'])->name('orders.change_status');

  Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
  Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
  Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

  Route::get('/media', [MediaController::class, 'index'])->name('media.index');
  Route::post('/media/store', [MediaController::class, 'store'])->name('media.store');

  


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
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('show', 'show')->name('show');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update', 'update')->name('update');
            Route::post('activate', 'activate')->name('activate');
            Route::post('delete', 'delete')->name('delete');
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