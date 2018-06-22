<?php

namespace App\Http\Controllers\Auth;

use App\Roles;
use App\Executives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Create a new user instance after a valid registration.
     *
     */
    protected function register(Request $request)
    {
        $executive = Executives::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if($executive->save()){
            $role = Roles::where('id', 3)->first();
            $executive->roles()->attach($role);

            return response()->json(['message' => 'Account successfully created.'], 200);
        }else{
            return response()->json(['message' => 'The account could not be created.'], 404);
        }
    }
}
