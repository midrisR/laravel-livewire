<?php

use Illuminate\Support\Facades\Route;

// products
use App\Http\Livewire\Backend\Product\Products;
use App\Http\Livewire\Backend\Product\CreateProduct;
use App\Http\Livewire\Backend\Product\EditProduct;
use App\Http\Livewire\Backend\Product\Categories;
use App\Http\Livewire\Backend\Product\Brand;
use App\Http\Livewire\Backend\Product\Types;
use App\Http\Livewire\Backend\Company\Banner;
use App\Http\Livewire\Backend\Company\About;
use App\Http\Livewire\Backend\User\Employe;
use App\Http\Livewire\Backend\User\Role;
use App\Http\Livewire\Backend\User\Chats;
use App\Http\Livewire\Dashboard;
use App\Http\Controllers\CKEditorController;
// frontend
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Products as fProducts;
use App\Http\Livewire\Frontend\CategoryById;
use App\Http\Livewire\Frontend\ProductDetail;
use App\Http\Livewire\Frontend\Search;
use App\Http\Livewire\Chat;



Route::get('/', Home::class)->name('Home');
Route::get('/chat', Chat::class)->name('Chat');
Route::get('/about', About::class)->name('About');
Route::get('/products', fProducts::class)->name('Products');
Route::get('/products/search', Search::class)->name('Search');
Route::get('/products/{id}/{name}', CategoryById::class)->name('detail-category');
Route::get('/product-detail/{id}/{name}', ProductDetail::class)->name('product-detail');
Route::post('/ckupload', [CKEditorController::class, 'upload'])->name('ckupload');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// products
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/product/', Products::class)->name('list-products');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/product/create',CreateProduct::class)->name('create-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/product/{id}',EditProduct::class)->name('edit-product');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/categories/', Categories::class)->name('list-categories');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/type',Types::class)->name('list-type');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/brand',Brand::class)->name('create-brand');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/chats',Chats::class)->name('chats');

// company route
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/banner',Banner::class)->name('create-banner');

// employes routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/employe',Employe::class)->name('create-employe');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/role', Role::class)->name('create-role');

// main dasboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',Dashboard::class)->name('dashboard');