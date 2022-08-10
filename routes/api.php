<?php

use App\Http\Controllers\post\postController;
use Carbon\Carbon;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});


Route::get('/', function () {

    return response()->json([
        //"version" => Route::app->version(),
        "time"   => Carbon::now()->toDateTime(),
        "php"    =>  phpversion()
    ]);
});


/** routes para category **/

Route::get('categories', [\App\Http\Controllers\category\categoryController::class,'_index']);
Route::get('categories/{id}', [\App\Http\Controllers\category\categoryController::class,'_show']);
Route::post('categories', [\App\Http\Controllers\category\categoryController::class,'_store']);
Route::put('categories/{id}', [\App\Http\Controllers\category\categoryController::class,'_update']);
Route::delete('categories/{id}', [\App\Http\Controllers\category\categoryController::class,'_delete']);


/** routes para product **/
Route::get('products/filter', [\App\Http\Controllers\product\productController::class,'filter']);
Route::get('products/filter/report', [\App\Http\Controllers\product\productController::class,'report']);
Route::get('products', [\App\Http\Controllers\product\productController::class,'_index']);
Route::get('products/{id}', [\App\Http\Controllers\product\productController::class,'_show']);
Route::post('products', [\App\Http\Controllers\product\productController::class,'_store']);
Route::put('products/{id}', [\App\Http\Controllers\product\productController::class,'_update']);
Route::delete('products/{id}', [\App\Http\Controllers\product\productController::class,'_delete']);
