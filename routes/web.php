<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;


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

Route::get('login', function () {
    return  view ('login');
});

Route::post('logged', function () {
    return' you are logged in';
})->name('logged');





// we must use control in the URL
//http://127.0.0.1/tasks/public/control
Route::get('control', [ExampleController::class, 'show']);



// store data into car table
//Route::get('storeCar',[CarController::class,'store']);

// store data into car table
Route::get('createCar',[CarController::class,'create'])->name('createCar');
Route::get('cars',[CarController::class,'index'])->name('cars');
Route::get('updateCar/{id}',[CarController::class,'edit']);

Route::get('showCar/{id}',[CarController::class,'show'])->name('show');
Route::get('deleteCar/{id}',[CarController::class,'destroy']);
Route::get('trashed',[CarController::class,'trashed'])->name('trashed');
Route::get('forceDelete/{id}',[CarController::class,'forceDelete'])->name('forceDelete');

Route::get('restoreCar/{id}',[CarController::class,'restore'])->name('restoreCar');



Route::put('update/{id}',[CarController::class,'update'])->name('update');

Route::post('storeCar',[CarController::class,'store'])->name('storeCar');


//for image

Route::get('test', function () {
    return view('test');
});

Route::get('image', function () {
    return view('image');
});

Route::post('imageUpload', [ExampleController::class,'upload'])->name('imageUpload');

Route::get('editimage/{id}',[CarController::class,'edit'])->name('editimage');
Route::put('updateimage/{id}',[CarController::class,'update'])->name('update');


// <td><a href="/editimage/{{ $car->id }}" class="btn btn-suscess"> Edit </a></td>
// Route::get('updateCar/{id}',[CarController::class,'edit']);
// Route::put('update/{id}',[CarController::class,'update'])->name('update');


Route::get('testHome', function () {
    return view('testHome');
})->name('testHome');


//404

Route::get('404', function () {
    return  view ('404');
})->name('404');

//contact

Route::get('contact', function () {
    return  view ('contact');
})->name('contact');


Route::resource('categories', CategoryController::class);

