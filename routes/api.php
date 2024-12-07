<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\Admin\ColorController;
use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\SubmissionController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
Route::get('/user', function (Request $request) {
    
    return response()->json($request->user()) ;
})->middleware(Authenticate::using('sanctum'));

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware(Authenticate::using('sanctum'));
});
Route::controller(RegisterController::class)->group(function(){
    Route::apiResource('products', 'products');
    
});


// Route::controller(ProblemController::class)->group(function(){
//     Route::apiResource('problems', 'problems');
    
// });

Route::apiResource('problems', ProblemController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::apiResource('submisssion', SubmissionController::class)->only(['index', 'store', 'show', 'update', 'destroy']);


Route::apiResource('products', App\Http\Controllers\ProductController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::apiResource('categories', App\Http\Controllers\CategoryController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

Route::apiResource('colors', ColorController::class)->only(['index','store','edit'])->middleware(Authenticate::using('sanctum'));

