<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;

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

Route::get('/s/{pageid}', [StaticPageController::class, 'show']) -> name('static_page'); 

Route::redirect('/','/s/main');

require_once(__DIR__.'/auth.php');
require_once(__DIR__.'/shop.php');