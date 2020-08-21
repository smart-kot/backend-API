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
        // if ((int)$exeption->errorInfo[2] == 1062) {
        //     abort(409, 'This email address already exists');
        // } else {
        //     abort(400, 'Bad Request');
        // }

        $returnData = array(
            'status' => 'error',
            'code' => '409',
            'message' => 'This email address already exists!',
            'exeption' => $exeption
        );

        return Response::json($returnData, 409);
    }
});
