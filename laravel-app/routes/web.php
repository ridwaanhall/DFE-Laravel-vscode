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
    return view('welcome');
});

// show all stories in web frontend
Route::get('/stories', function () {
    $stories = \App\Models\Story::all();
    return view('stories', ['stories' => $stories]);
});

// show stories with search
Route::get('/search', function () {
    $stories = \App\Models\Story::all();
    return view('search', ['stories' => $stories]);
});

// story v2
Route::get('/story_search', function () {
    return view('stories2');
});