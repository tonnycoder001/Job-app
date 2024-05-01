<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Mail\JobPosted;


// sending email
Route::get('test', function () {
    return new JobPosted();
});


Route::view('/', 'home');
// contact page
Route::view('/contact', 'contact');

// You can use this method, the method group, this method helps to stop repetition of code and makes you work clean and less complex.
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs/create','create');
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// resources method is way too fancy, you dont have to include anything from your controller only importing the controller you are using.
Route::resource('jobs', JobController::class);

Route::get('/register', [RegisterUserController::class, 'register']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [LoginUserController::class, 'login']);
Route::post('/login', [LoginUserController::class, 'store']);

Route::post('/logout', [LoginUserController::class, 'destroy']);
