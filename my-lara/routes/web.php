<?php

use App\Http\Controllers\AnimalsController;
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
