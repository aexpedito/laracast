<?php

Route::get('charts/getchart', 'dec\charts\ChartsController@getDataChart');
Route::get('charts', 'dec\charts\ChartsController@index');
