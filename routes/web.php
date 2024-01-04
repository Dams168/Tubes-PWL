<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction');

    Route::get('/products/print', [ProductController::class, 'print'])->name('product.print');
    Route::get('/transactions/print', [TransactionController::class, 'print'])->name('transaction.print');
});

// hak owner
Route::middleware('auth')->group(function () {
    Route::view('/cabangs', 'cabang')->name('cabang')->middleware(['role:owner']); 
});


// hak manager 1
Route::middleware('auth')->group(function () {
// hak
});

// hak manager 2
Route::middleware('auth')->group(function () {
    // hak
});

    // hak manager 3
Route::middleware('auth')->group(function () {
    // hak
});
    

require __DIR__.'/auth.php';
