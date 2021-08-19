<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;

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
    $id = auth()->user()->id;   
    $categories = DB::table('categories')->where('user_id', '=', $id)->get();
    return view('products.create',['masses'=>$masses,'distances'=>$distances,'currencies'=>$currencies,'categories'=>$categories]);
}]);

Route::get('createClient', ['as' => 'createClient', function () {

  return view('clients.create');
}]);
Route::post('/filterPrice', [ProductController::class, 'filterPrice']);
Route::POST('/filterDate', [ProductController::class, 'filterDate']);
Route::post('/filterCategory', [ProductController::class, 'filterCategory']);

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('showproducts');
Route::get('/productsEdit/{id}', [ProductController::class, 'Getupdate']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::get('/products/{id}/delete', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/{id}/delete', [CategoryController::class, 'destroy']);

Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clientsEdit/{id}', [ClientController::class, 'Getupdate']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::get('/clients/{id}/delete', [ClientController::class, 'destroy']);

require __DIR__ . '/auth.php';
