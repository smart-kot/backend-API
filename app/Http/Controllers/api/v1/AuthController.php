<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 417);
        }
        
        $credentials = $request->only(['email', 'password']);
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    /**
     * register API
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 417);
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        

        $success['username'] = $user->username;
        $success['token'] = $user->createToken('MyApp')->accessToken;
        return response()->json(['success' => $success], 200);
    }
}
