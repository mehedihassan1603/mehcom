<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dash', 'Index');
});

Route::controller(CategoryController::class)->group(function(){
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/admin/all-category', 'Index')->name('all_category');
        Route::get('/admin/add-category', 'Add')->name('add_category');
        Route::post('/admin/post-category', 'PostCategory')->name('post_category');
        Route::post('/admin/update-category', 'UpdateCategory')->name('update_category');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('edit_category');
    });
});

Route::controller(SubcategoryController::class)->group(function(){
    Route::get('/admin/all-subcategory', 'Index')->name('all_subcategory');
    Route::get('/admin/add-subcategory', 'Add')->name('add_subcategory');
    Route::post('/admin/post-subcategory', 'PostSubcategory')->name('post_subcategory');
    Route::get('/admin/edit-subcategory/{id}', 'EditSubcategory')->name('edit_subcategory');
    Route::post('/admin/update-subcategory', 'UpdateSubcategory')->name('update_subcategory');
});

Route::post('/api/subcategories', [SubcategoryController::class, 'getSubcategories'])->name('getSubcategories');

Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-product', 'Index')->name('all_product');
    Route::get('/admin/add-product', 'Add')->name('add_product');
    Route::post('/admin/post-product', 'Post')->name('post_product');
});
Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/pending-orders', 'Index')->name('pending_orders');
    Route::get('/admin/completed-orders', 'Index')->name('completed_orders');
});

require __DIR__.'/auth.php';
