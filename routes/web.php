<?php

use Illuminate\Support\Facades\Route;

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
return view('landing');
});

Route::get('/show-number/{id}', function ($id) {
    return 'Welcome Mr. '.$id;
}) -> name('a');

Route::get('/show-string/{id?}', function (){
        return ' Welcome Mr. Anonymous';
})-> name('b');




Route::namespace('Front')->group(function(){

    //all route only access controller or mothods in folder Front
    Route::get('Users');

});

Route::group(['namespace'=> 'Admin'],function(){
    Route::get('second0','SecondController@showString0');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3');
});

Route::get('login', function(){
    return 'Must Be Login To access this route';
})-> name('login');
// Route::get('users','UserController@Index');

Route::get('index','Front\UserController@getIndex');

Route::get('/landing', function(){
    return view('landing');
});

Route::get('/about', function(){
    return view('about');
});

Route::resource('news','NewsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
