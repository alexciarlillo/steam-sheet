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

Route::get('login', 'Auth\LoginController@login');
Route::get('logout', function () {
    Auth::logout();

    return redirect('/');
});

Route::get('/home', function () {
    if (Auth::check()) {
        $user = \Auth::user();
        $user->games = [];
        return view('home', ['state' => [ 'user' => $user, 'app' => ['name' => config('app.name')]]]);
    } else {
        return redirect('/login');
    }
});
