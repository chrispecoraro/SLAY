
<?php

use App\Http\Controllers\AddMovie;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetMovies;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/movies', GetMovies::class);

Route::post('/addMovie', AddMovie::class);
