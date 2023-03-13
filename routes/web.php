<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/test1', function () {
    return 'welcome';
});

Route::namespace('front')->group(function(){

    Route::get('users','UserController@showAdminName');
});

Route::group(['prefix'=>'users','Middleware'=>['auth']] , function(){

    Route::get('/', function () {
        return 'hiii im prefix /////';
    });

    Route::get('show', function () {
        return 'hiii im prefix showwwww';
    });
    //Route::get('sh','UserController@showAdminName');
    
});

/*Route::prefix('test1')->group(function(){

    Route::get('show','UserController@showAdminName');
    //Route::get('delete','UserController@showAdminName');

});
*/
/////////////////////////////////////////////////////////////////////
///                     basic middleware first version           ////
/////////////////////////////////////////////////////////////////////
Route::get('/check', function () {
    return 'middleware';
})->middleware('auth');
 
/////////////////////////////////////////////////////////////////////
///  middleware +namespace + group is correct with this script //////
/////////////////////////////////////////////////////////////////////
/*Route::middleware(['auth'])->namespace('Admin') 
    ->group(function() {
        Route::get('second', 'SecondController@ShowString');      
    });*/

/////////////////////////////////////////////////////////////////////
///                     namespace                                ////
/////////////////////////////////////////////////////////////////////
Route::group(['namespace'=>'Admin'] , function(){

    Route::get('second', 'SecondController@ShowString1');//->middleware('auth');
    Route::get('second2', 'SecondController@ShowString2');
    Route::get('second3', 'SecondController@ShowString3');


});

/*Route::group(['Middleware'=>'auth'] , function(){

    Route::get('hola', function () {
        return 'hiii im prefix showwwww';
    });
    
});*/

/////////////////////////////////////////////////////////////////////
///        middleware +group is correct with this script        /////
/////////////////////////////////////////////////////////////////////
Route::middleware(['auth']) ////////// this version is work 
    ->group(function() {
        Route::get('hola', function () {
            return 'hiii im prefix showwwww';
        });
        
    });


Route::resource('news', 'NewsController');

Route::get('ouss','Front\UserController@getindex');//->with('data',5);


Route::get('/landing', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function(){
    return 'home';
});

