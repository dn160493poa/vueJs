<?php

use App\Http\Controllers\Person\IndexController;
use App\Http\Controllers\Person\StoreController;
use App\Http\Controllers\Person\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Person', 'prefix' => 'people'], function (){
    Route::get('/', [IndexController::class, '__invoke'])->name('persons.index');
    Route::post('/', [StoreController::class, '__invoke'])->name('persons.store');
    Route::patch('/{person}', [UpdateController::class, '__invoke'])->name('persons.update');
});
