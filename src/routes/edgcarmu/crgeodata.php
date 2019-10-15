<?php

Route::group([
    'namespace' => 'Edgcarmu\Crgeodata\app\Http\Controllers',
    'prefix' => 'api/internal',
], function () { // custom admin routes
    Route::get('provincia', 'GeoDataCrController@provincia_list');
    Route::get('provincia/{id}', 'GeoDataCrControllerr@provincia_show');

    Route::get('canton', 'GeoDataCrController@canton_list');
    Route::get('canton/{id}', 'GeoDataCrController@canton_show');

    Route::get('distrito', 'GeoDataCrController@distrito_list');
    Route::get('distrito/{id}', 'GeoDataCrController@distrito_show');

    Route::get('barrio', 'GeoDataCrController@barrio_list');
    Route::get('barrio/{id}', 'GeoDataCrController@barrio_show');
}); // this should be the absolute last line of this file
