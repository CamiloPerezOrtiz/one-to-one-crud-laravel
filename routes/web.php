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

/*Route::get('/', function () {
    #return view('welcome');
    $user = App\User::findOrFail(2);
    return $user->address;

    #$address = App\Address::findOrFail(1);
    #return $address->user;
});*/
Route::get('/', 'UserController@list_addres')->name('list_addres');
Route::get('/register-addres', 'UserController@register_addres')->name('register_addres');
Route::post('/register-addres', 'UserController@register_addres_data')->name('register_addres_data');
Route::get('/edit-addres/{id}', 'UserController@edit_addres')->name('edit_addres');
Route::post('/edit-addres/{id}', 'UserController@edit_addres_data')->name('edit_addres_data');
Route::get('/delete-addres/{id}', 'UserController@delete_addres')->name('delete_addres');