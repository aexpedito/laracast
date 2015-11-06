<?php

Route::get('charts/getchartang', 'dec\charts\ChartsController@getDataEmailChart');
Route::get('charts/getchart', 'dec\charts\ChartsController@getDataEmailChart');
Route::get('charts/getchartColumn', 'dec\charts\ChartsController@getDataEmailChartColumn');
Route::get('charts/getchartCombo', 'dec\charts\ChartsController@getDataEmailChartCombo');
Route::get('charts', 'dec\charts\ChartsController@index');
