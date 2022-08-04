<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SumaController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/vienaragiai', fn () => 'Valio vienaragi');

// Route::get('/vienaragis', [AnimalsController::class, 'vienaragis']);

// $id = 20;

// Route::get('/vienaragis/{id}/{data}', [AnimalsController::class, 'briedis']);


// Route::get('/suma/{num1}/{num2?}', [SumaController::class, 'suma']);


// Route::get('/skirtumas', [SumaController::class, 'skirtumas'])->name('forma');
// Route::post('/skirtumas', [SumaController::class, 'skaiciuoti'])->name('skaiciuokle');

//Front
Route::get('', [F::class, 'index'])->name('front-index');

Route::post('add-animal-to-order', [OrderController::class, 'add'])->name('front-add');
Route::get('my-orders', [OrderController::class, 'showMyOrders'])->name('my-orders');
Route::get('pdf/{order}', [OrderController::class, 'getPdf'])->name('pdf')->middleware('rp:admin');



Route::post('add-animal-to-cart', [CartController::class, 'add'])->name('front-add-cart');
Route::get('my-small-cart', [CartController::class, 'showSmallCart'])->name('my-small-cart');
Route::delete('my-small-cart', [CartController::class, 'deleteSmallCart'])->name('my-small-cart');

// Orders
Route::prefix('orders')->name('orders-')->group(function () {

    Route::get('', [OrderController::class, 'index'])->name('index')->middleware('rp:user');
    Route::put('status/{order}', [OrderController::class, 'setStatus'])->name('status')->middleware('rp:admin');
});

// Masters
Route::prefix('masters')->name('masters-')->group(function () {
    Route::get('', [MasterController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('edit/{master}', [MasterController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{master}', [MasterController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{master}', [MasterController::class, 'destroy'])->name('delete')->middleware('rp:admin');
});

// Colors
Route::prefix('colors')->name('colors-')->group(function () {

    Route::get('', [ColorController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [ColorController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [ColorController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{color}', [ColorController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{color}', [ColorController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{color}', [ColorController::class, 'destroy'])->name('delete')->middleware('rp:admin');

    Route::get('show/{id}', [ColorController::class, 'show'])->name('show')->middleware('rp:user');
    Route::get('show', [AnimalController::class, 'link'])->name('show-route');
});
// Animals
// Route::prefix('colors')->group(function () {

Route::get('/animals', [AnimalController::class, 'index'])->name('animals-index');
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals-create');
Route::post('/animals', [AnimalController::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{animal}', [AnimalController::class, 'edit'])->name('animals-edit');
Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals-update');
Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals-delete');
Route::delete('/animals/delete-picture/{animal}', [AnimalController::class, 'deletePicture'])->name('animals-delete-picture');

Route::get('animals/show/{id}', [AnimalController::class, 'show'])->name('animals-show');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
