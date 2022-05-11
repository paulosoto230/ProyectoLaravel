<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // estamos vinculado con el controlador
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
/*
// direcciona a la vista
Route::get('/', function () {
    return view('welcome');
});
Route::get('/producto', function () {
    return view('producto.index');
});

// acceder al uso de clases
Route::get('/producto/create',[ProductoController::class,'create']);
*/
// con esto permite a que pueda acceder a todos los metodos o las urls
// que mantenga el controlador
Route::resource('producto', ProductoController::class);

