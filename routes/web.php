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


//rotte autenticazione
Auth::routes();


//area privata - backoffice
Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("posts", "PostController");
    Route::resource("categories", "CategoryController");
    Route::resource("tags", "TagController");
    Route::patch("comments/{comment}", "CommentController@update")->name("comments.update");
    Route::delete("comments/{comment}", "CommentController@destroy")->name("comments.destroy");
});


//area pubblica - frontoffice
Route::get("{any?}", function() {
    return view("front");
})->where("any", ".*");


