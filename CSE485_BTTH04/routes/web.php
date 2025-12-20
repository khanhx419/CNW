<?php

use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');});

Route::get('/', [IssueController::class, 'index']);

Route::resource('issues', IssueController::class);