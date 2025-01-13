<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\ProductController;



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
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('/login/action', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('/cart', [CartController::class, 'index'])->name('cart');


Route::post('/favorit/add', [FavoriteController::class, 'add'])->name('favorit.add');
Route::post('/keranjang/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/keranjang', function () {
    return view('keranjang');
});


    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/harga', [HargaController::class, 'index'])->name('harga.index');
    Route::get('/admin/harga/create', [HargaController::class, 'create'])->name('harga.create');
    Route::post('/admin/harga', [HargaController::class, 'store'])->name('harga.store');
    Route::get('/admin/harga/{id}/edit', [HargaController::class, 'edit'])->name('harga.edit');
    Route::put('/admin/harga/{id}', [HargaController::class, 'update'])->name('harga.update');
    Route::delete('/admin/harga/{id}', [HargaController::class, 'destroy'])->name('harga.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth'); 
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/harga', [HargaController::class, 'index'])->name('harga.index');
    // Tambahkan rute lain yang hanya dapat diakses admin
});

Route::post('/adoption', [AdoptionController::class, 'store'])->middleware('auth');

Route::get('/admin/laporan', [AdoptionController::class, 'showReport'])->name('admin.laporan');

Route::get('admin/edit/{id}', [ProductController::class, 'edit'])->name('admin.edit');
Route::post('admin/update/{id}', [ProductController::class, 'update'])->name('admin.update');

Route::get('/admin/kelola-harga', [ProductController::class, 'index'])->name('admin.kelola-harga');

Route::put('/admin/update-harga/{id}', [ProductController::class, 'update'])->name('admin.update-harga');


Route::get('/katalog', [ProductController::class, 'showCatalog']);
Route::get('/katalog', [ProductController::class, 'showCatalog'])->name('katalog');
// Gunakan middleware auth untuk memastikan hanya pengguna yang login yang bisa mengakses katalog
Route::get('/katalog', [ProductController::class, 'showCatalog'])->middleware('auth')->name('katalog');
