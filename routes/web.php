<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurrentMonthExpenseDashboardController;

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


Route::get('/dashboard', [CurrentMonthExpenseDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/current-month-expenses', function () {
    return view('current-month-expenses');
})->middleware(['auth', 'verified'])->name('current-month-expenses');

// Current Month Expenses
Route::get('/current-month-expenses', [CurrentMonthExpenseDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('current-month-expenses');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
});

use App\Http\Controllers\QRCodeController;

Route::get('/qr/google', [QRCodeController::class, 'generateGoogleQr']);
Route::get('/qr/google/save', [QRCodeController::class, 'generateGoogleQrAndSave']);


require __DIR__ . '/auth.php';
