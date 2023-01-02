<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//get
Route::get('hello2', function () {
    return response()->json(['message' => 'Hello, World!']);
});

//routing_id
Route::get('hello/{id}', function ($id) {
    return response()->json(['message' => 'Hello, World!', 'id' => $id]);
});


// {
//     "amount" : 12421.3213,
//     "requestRate" : 11.24141251251
// }

//post
//post_body_to_model
Route::post('test-post-data', function (Request $request) {
    error_log('This is a test log message');

    $model = json_decode($request->getContent(), true);
    $model1 = (object)$model;
    
    // return response()->json(['model' => $model-> amount]);
    // return response()->json(['amount' => $model1->amount, 'requestRate' => $model1->requestRate]);
    return response()->json(['amount' => $model1->amount + 1111]);
});


Route::post('test-post-data-2', function (Request $request) {
    $model = json_decode($request->getContent(), true);
    return response()->json(['message' => 'Hello, World!', 'model' => $model]);
});


//get_header
Route::get('test-header', function (Request $request) {
    // error_log(var_export($request->header("user-agent"), true));
    // error_log(var_export($request->header("authorization"), true));
    $output = $request->header("authorization");
    // $model = json_decode($request->getContent(), true);
    return response()->json($output);
});