<?php

use App\Http\Controllers\Api\FeaturedHouseController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ExtrasController;
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


Route::apiResource('houses', FeaturedHouseController::class);
Route::apiResource('search', SearchController::class);
Route::get('/posts-by-category/{category_id}', [PostController::class, 'postsByCategory']);
Route::post('get-houses-by-filters', [SearchController::class, 'houseByFilters']);


Route::get('search/{lon}/{lat}/{radius}', [SearchController::class, 'searchAdvanced'])->name('search.advanced');
Route::apiResource('extras', ExtrasController::class);