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
Route::apiResource('marriage','marriageController');
Route::apiResource('admin','Admin\AdminController');
Route::apiResource('message','Message\MessageController');
Route::apiResource('evenement','Evenement\EvenementController');
Route::apiResource('galerie','Image\GalerieVideoController');
Route::apiResource('galeriephoto','Image\GaleriePhotoController');
Route::apiResource('vedio','Image\VideoController');
Route::apiResource('photo','Image\PhotoController');
/* Sous-Categories */
Route::apiResource('sous_categorie','Category\Sous_CategoryController');
/* contact peronne (prestataire) */
Route::apiResource('contact_prestataire','Prestataire\ContactprestataireController');
Route::apiResource('liste_promotion','Prestataire\ListePromotionsController');
/* Prestatire */
Route::apiResource('prestataire','Prestataire\PrestataireController');
Route::apiResource('avis','Avis\AvisController');



