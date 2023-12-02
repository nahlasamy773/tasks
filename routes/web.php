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

Route::get('/', function () {
    return view('welcome');
});

// task 1 
Route::get('/about', function () {
    return 'about';
});


Route::get('/Contact', function () {
    return '<h2>  Contact us  </h2>';
});

Route::get('/Blog  ', function () {
    return '<h2>  Blog    </h2>';
});

Route::get('/Science  ', function () {
    return '<h2>  Science   </h2>';
});

Route::get('/Sports ', function () {
    return '<h2>  Sports   </h2>';
});

Route::get('/Math  ', function () {
    return '<h2>  Math    </h2>';
});

Route::get('/Medical   ', function () {
    return '<h2>  Medical     </h2>';
});