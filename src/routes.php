<?php

/*
|--------------------------------------------------------------------------
| Edgcarmu\CrGeoData Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Edgcarmu\CrGeoDat package.
|
*/
Route::group([
    'namespace' => 'Edgcarmu\Crgeodata\app\Http\Controllers',
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', backpack_middleware()],
], function () {
    Route::get('geodatacr/canton', 'GeoDataCrController@canton_list');
    Route::get('geodatacr/canton/{id}', 'GeoDataCrController@canton_show');
    Route::get('geodatacr/distrito', 'GeoDataCrController@distrito_list');
    Route::get('geodatacr/distrito/{id}', 'GeoDataCrController@distrito_show');
    Route::get('geodatacr/barrio', 'GeoDataCrController@barrio_list');
    Route::get('geodatacr/barrio/{id}', 'GeoDataCrController@barrio_show');
});
