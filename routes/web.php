<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    $packages = DB::table('packages')->get();
    return view('welcome', ['packages' => $packages]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('createProduct', ['as' => 'createProduct', function () {
    $masses = DB::table('masses')->get();
    $distances = DB::table('distances')->get();
    $currencies = DB::table('currencies')->get();
    $categories = DB::table('categories')->get();
    return view('products.create',['masses'=>$masses,'distances'=>$distances,'currencies'=>$currencies,'categories'=>$categories]);
}]);
Route::get('editProduct/{id}', ['as' => 'editProduct', function () {
    return view('products.edit,');
}]);
Route::get('/products', [ProductController::class, 'index']);
Route::post('/filterPrice', [ProductController::class, 'filterPrice']);
Route::POST('/filterDate', [ProductController::class, 'filterDate']);
Route::post('/filterCategory', [ProductController::class, 'filterCategory']);

Route::post('/products', [ProductController::class, 'store']);

Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/productsEdit/{id}', [ProductController::class, 'Getupdate']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::get('/products/{id}/delete', [ProductController::class, 'destroy']);

require __DIR__ . '/auth.php';
