<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;


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
Route::get('/products/{id}', [ProductController::class, 'show'])->name('showproducts');
Route::post('/products', [ProductController::class, 'store']);
Route::get('/productsEdit/{id}', [ProductController::class, 'edit']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::get('/products/{id}/delete', [ProductController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::get('/categories/{id}/delete', [CategoryController::class, 'destroy']);

Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('showclient');
Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clientsEdit/{id}', [ClientController::class, 'edit']);
Route::put('/clients/{id}', [ClientController::class, 'update']);
Route::get('/clients/{id}/delete', [ClientController::class, 'destroy']);

Route::get('/shipments', [ShipmentController::class, 'index'])->name('shipments');
Route::get('/shipments/{id}', [ShipmentController::class, 'show'])->name('showShipments');
Route::get('/CreateShipments', [ShipmentController::class, 'create']);
Route::post('/shipments', [ShipmentController::class, 'store']);
Route::get('/shipmentsEdit/{id}', [ShipmentController::class, 'edit']);
Route::put('/shipments/{id}', [ShipmentController::class, 'updateShipment']);
Route::put('/shipmentsPS/{id}', [ShipmentController::class, 'add_PS']);
Route::put('/updateShipmentsPS/{Sid}/{PSid}', [ShipmentController::class, 'update_PS']);
Route::get('/shipments/{id}/delete', [ShipmentController::class, 'destroy']);
Route::get('/shipments/{Pid}/{Sid}', [ShipmentController::class, 'destroyPS']);

Route::get('/profile', [UserController::class, 'show'])->name('profile');
Route::put('/profileE', [UserController::class, 'edit']);
Route::get('/Editprofile', ['as' => 'Editprofile', function () {
  $user = auth()->user();
  return view('users.edit', ['user' =>$user]);
}]);

require __DIR__ . '/auth.php';
