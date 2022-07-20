<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AccountController::class, 'index'])->name('accounts-index')->middleware('checkUR:user');
Route::get('/create', [AccountController::class, 'create'])->name('accounts-create')->middleware('checkUR:admin');
Route::post('/', [AccountController::class, 'store'])->name('accounts-store')->middleware('checkUR:admin');
// Route::get('/account/add/{account}', [AccountController::class, 'edit'])->name('accounts-edit-add');
// Route::get('/account/withdraw/{account}', [AccountController::class, 'edit'])->name('accounts-edit-withdraw');
// Route::put('/account/add/{account}', [AccountController::class, 'update'])->name('accounts-update-add');
// Route::put('/account/withdraw/{account}', [AccountController::class, 'update'])->name('accounts-update-withdraw');

Route::get('/account/{addOrWithdraw}/{account}', [AccountController::class, 'edit'])->name('accounts-edit')->middleware('checkUR:admin');
Route::put('/account/{addOrWithdraw}/{account}', [AccountController::class, 'update'])->name('accounts-update')->middleware('checkUR:admin');

Route::delete('/{account}', [AccountController::class, 'destroy'])->name('accounts-delete')->middleware('checkUR:admin');

Route::get('/show/{accountId}', [AccountController::class, 'show'])->name('account-show')->middleware('checkUR:user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
