<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;

use App\Models\Post;

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
    return view('auth.login');
});
//Auth::routes();
Auth::routes(['register'=>false]);

//Route::get('/{page}', 'AdminController@index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//mo2a9atn

 //Route::get('/',[PostController::class,'index']);

 Route::get('/create',function(){
    return view('create');
    });
    
    Route::post('/post',[PostController::class,'store']);
    Route::delete('/delete/{id}',[PostController::class,'destroy']);
    Route::get('/edit/{id}',[PostController::class,'edit']);
    Route::get('/show/{id}',[PostController::class,'show']);
    
    Route::delete('/deleteimage/{id}',[PostController::class,'deleteimage']);
    Route::delete('/deletecover/{id}',[PostController::class,'deletecover']);
    
    Route::put('/update/{id}',[PostController::class,'update']);
    
    Route::get('/liee',[PostController::class,'liee']);
    Route::get('/nonliee',[PostController::class,'nonliee']);
    Route::get('/incomplet',[PostController::class,'incomplet']);
    Route::get('/homme',[PostController::class,'index'])->name('index');
    
    
    
    Route::get('/search',[SearchController::class, 'search'])->name('web.search');
    Route::get('/find',[SearchController::class, 'find'])->name('web.find');

    Route::get('export_comptes', [PostController::class, 'export']);
    Route::get('import_comptes', [PostController::class, 'import']);
    
    //Route::view('/signup' , 'your.view.path')->name('auth.signup');
    //Route::post('/signup' , 'AuthController@postSignup')->name('auth.signup.post');
    //Route::view('/login' , 'your.view.path')->name('auth.login');
    //Route::post('/login' , 'AuthController@postLogin')->name('auth.login.post');
    