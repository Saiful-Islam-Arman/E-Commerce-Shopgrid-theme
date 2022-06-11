<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('/product-category', [EcommerceController::class, 'categoryProduct'])->name('product-category');
Route::get('/product-detail', [EcommerceController::class, 'productDetail'])->name('product-detail');
Route::get('/show-cart-product', [CartController::class, 'index'])->name('show-cart');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    //category module
    Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/new-category', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //sub-category module
    Route::get('/add-sub-category', [SubCategoryController::class, 'index'])->name('subCategory.add');
    Route::post('/new-sub-category', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::get('/manage-sub-category', [SubCategoryController::class, 'manage'])->name('subCategory.manage');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'update'])->name('subCategory.update');
    Route::post('/delete-sub-category/{id}', [SubCategoryController::class, 'delete'])->name('sub-category.delete');

    //brand module
    Route::get('/add-brand', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/new-brand', [BrandController::class, 'create'])->name('brand.new');
    Route::get('/manage-brand', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete-brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    //unit module
    Route::get('/add-unit', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/new-unit', [UnitController::class, 'create'])->name('unit.create');
    Route::get('/manage-unit', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/edit-unit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/update-unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::post('/delete-unit/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    
    //puduct module
    Route::get('/add-product', [ProductController::class, 'index'])->name('product.add');
    Route::get('/get-sub-category-by-category-id', [ProductController::class, 'getSubCategory'])->name('product.sub-category');
    Route::post('/new-product', [ProductController::class, 'create'])->name('product.create');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product-detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');


});
