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
Route::get('/home', 'BloodRequestController@index')->name('home');
Route::get('/markasread', 'MarkAsReadController@index')->name('markAsRead');
Auth::routes();

Route::resource('blood_request', 'BloodRequestController')
        ->except('index');

Route::resource('donor', 'UserController')
        ->except('index');

Route::post('/blood_request/{bloodRequest}/accept', 'RequestAcceptController@store')
        ->name('blood_request.accept');
Route::delete('/blood_request/{bloodRequest}/accept', 'RequestAcceptController@destroy')
        ->name('blood_request.accept');

Route::post('/blood_request/{user}/{bloodRequest}/donate', 'RequestAcceptController@donate')
        ->name('blood_request.donate');
Route::delete('/blood_request/{user}/{bloodRequest}/donate', 'RequestAcceptController@removeDonate')
        ->name('blood_request.donate');

Route::post('/blood_request/{user}/{bloodRequest}/comment', 'RequestAcceptController@comment')
        ->name('blood_request.comment');
        
