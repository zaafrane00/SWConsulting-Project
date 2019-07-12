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
Route::get('image', 'UploadController@countryList');
Route::post('image', 'UploadController@countrySave');


//passport
Route::post('get-token', 'TokenController@getToken');

/* Categories */

Route::apiResource('fichieinformation', 'Category\FichierinformationController');
Route::apiResource('informationspecifique', 'Category\InformationspecifiqueController');

Route::apiResource('ville', 'villeController');
Route::apiResource('marriage', 'marriageController');
Route::apiResource('admin', 'Admin\AdminController');
Route::apiResource('message', 'Message\MessageController');
Route::apiResource('evenement', 'Evenement\EvenementController');
Route::apiResource('galerie', 'Image\GalerieVideoController');
Route::apiResource('galeriephoto', 'Image\GaleriePhotoController');
Route::apiResource('video', 'Image\VideoController');
Route::apiResource('photo', 'Image\PhotoController');
Route::apiResource('liste_invite', 'listeinviteController');
Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('test', 'TestController');
    Route::apiResource('pays', 'PaysController');
    Route::apiResource('categorie', 'Category\CategoryController');
    Route::apiResource('governorate', 'lieux\GovernorateController');
});

/* Sous-Categories */
Route::apiResource('sous_categorie', 'Category\Sous_CategoryController');
/* contact peronne (prestataire) */
Route::apiResource('contact_prestataire', 'Prestataire\ContactprestataireController');
Route::apiResource('disponibilitee', 'Prestataire\DisponibiliteController');
Route::apiResource('liste_promotion', 'Prestataire\ListePromotionsController');
Route::apiResource('reservation', 'Reservation\ReservationController');
/* Prestatire */
Route::apiResource('prestataire', 'Prestataire\PrestataireController');
Route::apiResource('ligneinformation', 'Prestataire\ligneinformationController');
Route::apiResource('favorie', 'Favoris\FavorisController');
Route::apiResource('avis', 'Avis\AvisController');
