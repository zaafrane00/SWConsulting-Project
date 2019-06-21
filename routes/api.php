<?php

use Illuminate\Http\Request;

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

//passport
Route::post('get-token','TokenController@getToken');

/* Categories */
Route::apiResource('categorie','Category\CategoryController');
Route::apiResource('pays','PaysController');
Route::apiResource('ville','villeController');
/* Sous-Categories */
Route::apiResource('sous_categorie','Category\Sous_CategoryController');
/* contact peronne (prestataire) */
Route::apiResource('contact_prestataire','Prestataire\ContactprestataireController');
/* Prestatire */
Route::apiResource('prestataire','Prestataire\PrestataireController');



