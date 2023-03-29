<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Login;

use GuzzleHttp\Client;

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

// Route::get('/', function () {
//     return view('login');
// });


Route::get('/users', [Login::class, 'users']);
Route::get('/products', [Login::class, 'products']);

Route::get('/', [Login::class, 'index']);
Route::get('/register', [Login::class, 'register']);
Route::post('/save', [Login::class, 'simpanRegister']);
Route::get('/home', [Login::class, 'home']);
Route::get('/create', [Login::class, 'create']);
Route::get('/delete/{id}', [Login::class, 'delete']);
Route::get('/edit/{id}', [Login::class, 'edit']);
Route::post('/auth', [Login::class, 'AuthLogin']);
Route::post('/store', [Login::class, 'store']);
Route::put('/update/{id}', [Login::class, 'update']);
//Route::post('/user/{id}/update', 'UserController@update')->name('user.update');

