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
    return view('welcome');
});

Route::get('/sms', function () {
    $nexmo = app('Nexmo\Client');
    $nexmo->message()->send([
        'to' => '8801743343876',
        'from' => '16105552344',
        'text' => 'HI! Sutki.'
    ]);

    return "Message has been send";
});

Route::get('excel-export','ExcelController@ExportClients');
Route::get('excel-import','ExcelController@upload_excel');
Route::post('excel-import','ExcelController@post_upload_excel');

Route::get('show-pdf','PdfController@make_pdf');