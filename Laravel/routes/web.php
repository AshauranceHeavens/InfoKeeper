<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\friendController;
use PhpParser\Node\Expr\BinaryOp\NotEqual;

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

Route::get('/',  [userController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/logout',  [userController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

Route::post('/authenticate',  [userController::class, 'authenticate'])
    ->name('authenticate')
    ->middleware('guest');

Route::get('/user/register',  [userController::class, 'create'])
    ->name('register')
    ->middleware('guest');

Route::post('/user/create',  [userController::class, 'store'])
    ->name('create')
    ->middleware('guest');

Route::get('/home',  [userController::class, 'home'])
    ->name('home')
    ->middleware('auth');

Route::get('/friend/create',  [friendController::class, 'create'])
    ->name('create_friend')
    ->middleware('auth');

Route::post('/friend/store',  [friendController::class, 'store'])
    ->name('store_friend')
    ->middleware('auth');

Route::put('/friend/{friend}/edit',  [friendController::class, 'edit'])
    ->name('edit_friend')
    ->middleware('auth');

Route::get('/friend/{friend}/update',  [friendController::class, 'update'])
    ->name('update_friend')
    ->middleware('auth');

Route::get('/friend/{friend}',  [friendController::class, 'show'])
    ->name('show_friend')
    ->middleware('auth');

Route::post('/friend/delete',  [friendController::class, 'destroy'])
    ->name('delete_friend')
    ->middleware('auth');
