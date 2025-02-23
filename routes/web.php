<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PhotoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function() {
//     return 'Hello World';
// });

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function() {
    return 'World';
});

// Route::get('/', function() {
//     return 'Selamat Datang';
// });

Route::get('/', [PageController::class,'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class,'articles']);

// Route::get('/about', function() {
//     return 'NIM : 2341720253 <br> Nama : Hizkia Elsadanta';
// });

Route::get('/user/{name}', function($name) {
    return 'Nama saya ' .$name;
});

Route::get('/posts/{post}/comments/{comment}', function($postid, $commentid) {
    return 'Pos ke-' .$postid. " Komentar ke-" .$commentid;
});

// Route::get('/articles/{id}', function($id) {
//     return 'Halaman Artikel dengan ID ' .$id ;
// });

Route::get('/user/{name?}', function($name='John') {
    return 'Nama saya ' .$name;
});

Route::get('/user/profile', function() {
    //
})->name('profile');

Route::resource('photos', PhotoController::class);


Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

// Route::get('/greeting', function() {
//     return view ('blog.hello', ['name' => 'Hizkia Elsadanta']);
// });

Route::get('/greeting', [WelcomeController::class,'greeting']);