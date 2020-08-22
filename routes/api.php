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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', function (Request $request) {
    $data = $request->all();

    try {
        $model = \App\User::create(
            $data
        );
    } catch (\Illuminate\Database\QueryException $exeption) {
        if ($exeption->errorInfo[1] == 1062) {
            $returnData = array(
                'status' => 'error',
                'code' => '409',
                'message' => 'Username or email address already exists!'
            );
        }
        
        return Response::json($returnData, 409);
    }
});
