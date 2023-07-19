<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

Route::middleware('auth')->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('/home/homePage',App\Http\Controllers\Administrator\HomeController::class)->parameters(['homePage'=>'id']);

    Route::resource('/home/about',App\Http\Controllers\Administrator\AboutController::class)->parameters(['about'=>'id']);

    Route::resource('home/skill',App\Http\Controllers\Administrator\SkillController::class)->parameters(['skill' => 'id']);

    Route::resource('/home/blog',App\Http\Controllers\Administrator\BlogController::class)->parameters(['blog'=>'id']);

});
Route::middleware('view')->group(function (){
    Route::get('/' , [App\Http\Controllers\front\frontController::class , 'index'])->name('front');
});
