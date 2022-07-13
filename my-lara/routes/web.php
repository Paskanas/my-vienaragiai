<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SumaController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/vienaragiai', fn () => 'Valio vienaragi');

Route::get('/vienaragis', [AnimalsController::class, 'vienaragis']);

$id = 20;

Route::get('/vienaragis/{id}/{data}', [AnimalsController::class, 'briedis']);


Route::get('/suma/{num1}/{num2?}', [SumaController::class, 'suma']);


Route::get('/skirtumas', [SumaController::class, 'skirtumas'])->name('forma');
Route::post('/skirtumas', [SumaController::class, 'skaiciuoti'])->name('skaiciuokle');

// Colors

Route::get('/colors', [ColorController::class, 'index'])->name('colors-index');
Route::get('/colors/create', [ColorController::class, 'create'])->name('colors-create');
Route::post('/colors', [ColorController::class, 'store'])->name('colors-store');
Route::get('/colors/edit/{color}', [ColorController::class, 'edit'])->name('colors-edit');
Route::put('/colors/{color}', [ColorController::class, 'update'])->name('colors-update');
Route::delete('/colors/{color}', [ColorController::class, 'destroy'])->name('colors-delete');

Route::get('colors/show/{id}', [ColorController::class, 'show'])->name('colors-show');

// Animals

Route::get('/animals', [AnimalController::class, 'index'])->name('animals-index');
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals-create');
Route::post('/animals', [AnimalController::class, 'store'])->name('animals-store');
Route::get('/animals/edit/{animal}', [AnimalController::class, 'edit'])->name('animals-edit');
Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals-update');
Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals-delete');

Route::get('animals/show/{id}', [AnimalController::class, 'show'])->name('animals-show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
