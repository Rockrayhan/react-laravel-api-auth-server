<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetRequest;
use App\Mail\Forgetmail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgetController extends Controller
{
    public function ForgetPassword( ForgetRequest $request ){
        $email = $request->email ;

        if( User::where('email', $email)->doesntExist()){
            return response([
                'message'=>'Email Invalid'
            ], 401);
        }

        $token = rand(10, 100000);

        try {
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token
            ]);

            return response([
                'message' => 'Reset Password has Sent to your mail'
            ]) ;

            // mail send to user
            Mail::to($email)->send(new Forgetmail($token)) ;

            return response([
                'message' => 'Reset Password has Sent to your mail'
            ]) ;
            

        } catch (Exception $exception) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }



    }


}
