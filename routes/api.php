<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// So this is like Route::middleware(middleware: 'auth:sanctum')->get adds an endpoint which is user and that user creates a function request.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
