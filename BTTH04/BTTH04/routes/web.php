<?php

use App\Http\Controllers\IssuesController;
use Illuminate\Support\Facades\Route; 
// returns the home page with all posts 
Route::get('/', IssuesController::class .'@index')->name('issues.index'); 
// returns the form for adding a post 
Route::get('/issues/create', IssuesController::class . '@create')->name('issues.create'); 
// adds a post to the database 
Route::post('/issues', IssuesController::class .'@store')->name('issues.store'); 
// returns a page that shows a full post 
Route::get('/issues/{post}', IssuesController::class .'@show')->name('issues.show'); 
// returns the form for editing a post 
Route::get('/issues/{issues}/edit', IssuesController::class .'@edit')->name('issues.edit'); 
// updates a post 
Route::put('/issues/{issues}', IssuesController::class .'@update')->name('issues.update'); 
// deletes a post 
Route::delete('/issues/{issues}', [IssuesController::class, 'destroy'])->name('issues.destroy');