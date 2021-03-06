<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/polls', PollController::class, [
    'excerpt' => ['create', 'edit']
]);

Route::any('errors', 'PollController@errors');

Route::apiResource('questions', QuestionController::class, [
    'excerpt' => ['create', 'edit']
]);

Route::get('polls/{poll}/questions', 'PollController@questions');
