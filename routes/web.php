<?php

use Illuminate\Support\Facades\Route;

// products
use App\Http\Livewire\Backend\Product\Products;
use App\Http\Livewire\Backend\Product\CreateProduct;
use App\Http\Livewire\Backend\Product\EditProduct;
use App\Http\Livewire\Backend\Product\Categories;
use App\Http\Livewire\Dashboard;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/ckupload', [CKEditorController::class, 'upload'])->name('ckupload');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/dashboard/product/', Products::class)->name('list-products');
Route::get('/dashboard/product/create',CreateProduct::class)->name('create-product');
Route::get('/dashboard/product/{id}',EditProduct::class)->name('edit-product');
Route::get('/dashboard/list-categories/', Categories::class)->name('list-categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',Dashboard::class)->name('dashboard');