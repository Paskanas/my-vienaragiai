<?php

use App\Http\Controllers\AccountController;
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

Route::get('/', [AccountController::class, 'index'])->name('accounts-index');
Route::get('/create', [AccountController::class, 'create'])->name('accounts-create');
Route::post('/', [AccountController::class, 'store'])->name('accounts-store');
// Route::get('/account/add/{account}', [AccountController::class, 'edit'])->name('accounts-edit-add');
// Route::get('/account/withdraw/{account}', [AccountController::class, 'edit'])->name('accounts-edit-withdraw');
// Route::put('/account/add/{account}', [AccountController::class, 'update'])->name('accounts-update-add');
// Route::put('/account/withdraw/{account}', [AccountController::class, 'update'])->name('accounts-update-withdraw');

Route::get('/account/{addOrWithdraw}/{account}', [AccountController::class, 'edit'])->name('accounts-edit');
Route::put('/account/{addOrWithdraw}/{account}', [AccountController::class, 'update'])->name('accounts-update');

Route::delete('/{account}', [AccountController::class, 'destroy'])->name('accounts-delete');

Route::get('/show/{accountId}', [AccountController::class, 'show'])->name('account-show');
