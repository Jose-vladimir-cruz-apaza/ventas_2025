<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Clint\ClientController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Provider\ProviderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\SaleDetaor\SaleDetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', function () {
//     return view('category.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('category.index');
// });
// Route::get('/', function () {
//     return redirect()->route('category.index');
// });
Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/login', function () {
//     return view('login.index');
// });

// Route::resource('order',OrderController::class);
// Route::resource('category',CategoryController::class);
// Route::resource('products',ProductController::class);
// Route::resource('provider',ProviderController::class);
// Route::resource('users', UserController::class);
// Route::resource('clients', ClientController::class);
// ----2
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// --
Route::middleware(['auth'])->group(function () {
    Route::resource('order', OrderController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('provider', ProviderController::class);
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);    
    Route::resource('sales', SaleController::class);    
    Route::resource('sale_details', SaleDetailController::class);
    Route::resource('rols', RolController::class);
});

