<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(Request $request){
        $credentials = $request->only('email','password');

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['message' => 'Invalid Credentials'], 404);
            }
        }
        catch(TokenExpiredException $e){
            return response()->json(['message' => 'Token Expired'], 404);
        }
        catch(TokenInvalidException $e){
            return response()->json(['message' => 'Token Invalid'], 404);
        }
        catch(JWTException $e){
            return response()->json(['message' => 'Could not create a token'], 404);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'token' => $token,
            'user'  => $user,
            'message'   =>  'Successful login'       
        ], 200);

    }


}
