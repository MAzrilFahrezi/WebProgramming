<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get("/variant", [CoffeeController::class, "variant"])->name("variant");

Route::get("/transaksi", function() {
    return view('transaksi.index');
});

Route::get("/detailpembelian/{id}", [DetailPembelianController::class, "index"])->name('detailpembelian.index');

Route::post("/detailpembelian/store/{id}", [DetailPembelianController::class, "store"])->name("detailpembelian.store");

Route::get('/about', function () {
    return view('about', [
        "title" => "POP About",
        "name" => "POP Coffe Shop",
        "deskripsi" => "POP Coffee adalah sebuah toko kopi yang hanya dibuat karena ownernya iseng"
    ]);
});

// Coffee
Route::get("/coffee", [CoffeeController::class, "index"])->name("coffee.index");
Route::get("/coffee/create", [CoffeeController::class, "create"])->name("coffee.create");
Route::post("/coffee/store", [CoffeeController::class, "store"])->name("coffee.store");
Route::get("/coffee/edit/{id}", [CoffeeController::class, "edit"])->name("coffee.edit");
Route::patch("/coffee/update/{id}", [CoffeeController::class, "update"])->name("coffee.update");
Route::delete("/coffee/delete/{id}", [CoffeeController::class, "destroy"]);

// Cart
Route::get('/tes', [CoffeeController::class, 'tes']);
Route::get('cart', [CoffeeController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CoffeeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CoffeeController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [CoffeeController::class, 'remove'])->name('remove.from.cart');

// Customer
Route::get("/customer", [CustomerController::class, "index"])->name("customer.index");
Route::get("/customer/create", [CustomerController::class, "create"])->name("customer.create");
Route::post("/customer/store", [CustomerController::class, "store"])->name("customer.store");
Route::get("/customer/edit/{id}", [CustomerController::class, "edit"])->name("customer.edit");
Route::patch("/customer/update/{id}", [CustomerController::class, "update"])->name("customer.update");
Route::delete("/customer/delete/{id}", [CustomerController::class, "destroy"]);

require __DIR__.'/auth.php';
