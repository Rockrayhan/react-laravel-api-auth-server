<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function Login(Request $request)
    {


        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;

                return response([
                    'message' => "successfully Login", 
                    'token' => $token,
                    'user' => $user
                ], 200) ;
            }
        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
        return response([
            'message' => 'Invalid Email or Password'
        ], 401);
    }





    public function Register(RegisterRequest $request ){

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]) ;
            $token = $user->createToken('app')->accessToken;

            return response([
                'message' => "Registration Successfully ", 
                'token' => $token,
                'user' => $user
            ], 200) ;
        
        }  catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }
    }


    // Register API (POST, formdata)
    // public function Register(Request $request){

    //     // data validation
    //     $request->validate([
    //         "name" => "required",
    //         "email" => "required|email|unique:users",
    //         "password" => "required|confirmed"
    //     ]);

    //     // Author model
    //     User::create([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "password" => Hash::make($request->password)
    //     ]);

    //     // Response
    //     return response()->json([
    //         "status" => true,
    //         "message" => "User created successfully"
    //     ]);
    // }



      // Login API (POST, formdata)
    //   public function login(Request $request){

    //     // Data validation
    //     $request->validate([
    //         "email" => "required|email",
    //         "password" => "required"
    //     ]);

    //     // Auth Facade
    //     if(Auth::attempt([
    //         "email" => $request->email,
    //         "password" => $request->password
    //     ])){

    //         $user = Auth::user();

    //         $token = $user->createToken("myToken")->accessToken;

    //         return response()->json([
    //             "status" => true,
    //             "message" => "Login successful",
    //             "access_token" => $token
    //         ]);
    //     }

    //     return response()->json([
    //         "status" => false,
    //         "message" => "Invalid credentials"
    //     ]);
    // }


}
