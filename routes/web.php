<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\EggController;
use App\Http\Controllers\CoopController;


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
    return view('main');
});

/*Chicken Routes*/
Route::get('/chickens', [ChickenController::class, 'index']);
Route::post('/chickens', [ChickenController::class, 'store']);
Route::get('/chickens/add', [ChickenController::class, 'add']);
Route::get('/chickens/{name}', [ChickenController::class, 'show']);
Route::get('/chickens/{name}/edit', [ChickenController::class, 'edit']);
Route::put('/chickens/{name}', [ChickenController::class, 'update']);

/* Egg Routes*/
Route::get('/eggs', [EggController::class , 'index']);
Route::post('/eggs', [EggController::class , 'store']);
Route::get('/eggs/add', [EggController::class, 'add']);


/*Coop Routes*/
Route::get('/coop', [CoopController::class, 'index']);
Route::post('/coop', [CoopController::class, 'store']);
Route::get('/coop/add', [CoopController::class, 'add']);
Route::get('/coop/{name}', [CoopController::class, 'show']);
Route::get('/coop/{name}/edit', [CoopController::class, 'edit']);
Route::put('/coop/{name}', [CoopController::class, 'update']);


Route::get('elements', function () {
    return view('elements');
});