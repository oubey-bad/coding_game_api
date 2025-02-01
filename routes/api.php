<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\Admin\ColorController;
use App\Http\Controllers\Api\LeaderboardController;
use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\SubmissionController;
use App\Models\Problem;
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

// lobby
// problem list and submission
//leaderboard
Route::get('/submissions/game-end', [SubmissionController::class, 'gameEnd']);
Route::get('/submissions/problem-workshop', [SubmissionController::class, 'problemWorkshop']);
Route::post('/submissions/submission-code', [SubmissionController::class, 'submissionCode']);
Route::post('/submissions/check-accuracy', [SubmissionController::class, 'checkAccuracy']);


Route::get('/problems', [ProblemController::class, 'problemsWithStatus']);


Route::get('/leaderboard/day1', [LeaderboardController::class, 'leaderboardDay1']);
Route::get('/leaderboard/day2', [LeaderboardController::class, 'leaderboardDay2']);


