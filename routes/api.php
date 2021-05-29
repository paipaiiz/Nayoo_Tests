<?php

use App\Http\Controllers\AlCategoryController;
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

Route::post(
    '/changepayment',
    'App\Http\Controllers\ChangePaymentController@changePayment'
);

Route::post(
    '/comparsion',
    'App\Http\Controllers\ComparisonController@comparing'
);

Route::apiResource(
    '/alcategory',
    'App\Http\Controllers\AlCategoryController'
);

Route::apiResource(
    '/tag',
    'App\Http\Controllers\TagController'
);

Route::apiResource(
    '/album',
    'App\Http\Controllers\AlbumController'
);

Route::apiResource(
    '/album_tag',
    'App\Http\Controllers\AlbumTagController'
);

Route::apiResource(
    '/picture',
    'App\Http\Controllers\PictureController'
);

Route::post('/add/topic',[AlCategoryController::class,'store']);
Route::get('/query/topic',[AlCategoryController::class,'index']);
