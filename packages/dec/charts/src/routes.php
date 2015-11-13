<?php

Route::get('charts/getchartang', 'dec\charts\ChartsController@getDataEmailChart');
Route::get('charts/getchart', 'dec\charts\ChartsController@getDataEmailChart');
Route::get('charts/getdatachart', 'dec\charts\ChartsController@getDataChart');
Route::get('charts/getchartCombo', 'dec\charts\ChartsController@getDataEmailChartCombo');
Route::get('charts', 'dec\charts\ChartsController@index');
Route::get('chartsang', 'dec\charts\ChartsController@indexang');
Route::get('chartsang/getClients', 'dec\charts\ChartsController@getClients');
Route::get('chartsang/getPartners', 'dec\charts\ChartsController@getPartners');
