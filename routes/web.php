<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
//it is the same consepte of the require function require('app/Https')


// call back function 
Route::get('/', function () {
    return view('welcome');//   return view('welcome'); and it is methoo call file welocome.blade.php in view folder
});

Route::get('/posts',[PostController::class,'index'])->name('posts.index');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');

Route::put('posts/{post}',[PostController::class,'update'])->name('posts.update');

Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');


// 1 - define a new route so the user can access it through browser 
// 2 - define conttroller that renders a view 
// 3 - define view that contains list of pots
// 4 - remove any static html data from the view

// echo TestController::class;// it will print the full name of the class with namespace App\Http\Controllers\TestController
// Route::get('/test', ['App\Http\Controllers\TestController','firstAction']);

// Route::get('/test', [TestController::class,'firstAction']); // it is the same  
// Route::get('/test', [TestController::class,'greet']); // it is the same  

// Route::get('/hello',[TestController::class,'greet']);

//desigin pattern called Mvc model view controller and it is the same as the above line but it is more clear and it is the best practice to use it because it is more readable 



// ----------------------------- DATA BASE -----------------------------------------
//1- structure change for database (create table , edit column, remove column)
//2- operations on database (insert record, edit record , delete record)
