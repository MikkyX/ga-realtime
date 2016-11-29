<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $google = new Google_Client();
    $google->setApplicationName('Mike Analytics Test');
    $google->setAuthConfig(resource_path(env('KEY_JSON')));
    $google->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
    $analytics = new Google_Service_Analytics($google);

    dd($analytics->data_realtime->get(
        'ga:'.env('VIEW_ID'),
        'rt:activeUsers',
        ['dimensions' => 'rt:medium']
    ));
});
