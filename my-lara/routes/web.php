<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FrontController as F;
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

Route::post('add-anima-to-cart', [CartController::class, 'add'])->name('front-add');


// Colors
Route::prefix('colors')->name('colors-')->group(function () {

    Route::get('', [ColorController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [ColorController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [ColorController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{color}', [ColorController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{color}', [ColorController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{color}', [ColorController::class, 'destroy'])->name('delete')->middleware('rp:admin');

    Route::get('show/{id}', [ColorController::class, 'show'])->name('show')->middleware('rp:user');
});
// Animals
// Route::prefix('colors')->group(function () {

Route::get('/animals', [AnimalController::class, 'index'])->name('animals-index');
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals-create');
Route::post('/animals', [AnimalController::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{animal}', [AnimalController::class, 'edit'])->name('animals-edit');
Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals-update');
Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals-delete');

Route::get('animals/show/{id}', [AnimalController::class, 'show'])->name('animals-show');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
