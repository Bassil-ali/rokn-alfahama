<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController
{
    public function sendEmail(Request $request)  // this is most important function to send mail and inside of that there are another function
    {
        if (!$this->validateEmail($request->email)) {  // this is validate to fail send mail or true
            return response()->json(['data' => $this->failedResponse()->original]);
        }
        $this->send($request->email);  //this is a function to send mail 
        return  response()->json(['data' => $this->successResponse()->original]);
    }

    public function send($email)  //this is a function to send mail 
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetMail($token, $email));  // token is important in send mail 
    }

    public function createToken($email)  // this is a function to get your request email that there are or not to send mail
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();

        if ($oldToken) {
            return $oldToken->token;
        }

        $token = Str::random(40);
        $this->saveToken($token, $email);
        return $token;
    }


    public function saveToken($token, $email)  // this function save new password
    {
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }



    public function validateEmail($email)  //this is a function to get your email from database
    {
        return !!User::where('email', $email)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'data' => __('Email is incorrect !'),
            'status' => '422',
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse()
    {
        return response()->json([
            'data' => __('Reset Email is send successfully, please check your inbox.'),
            'status' => '200',
        ], Response::HTTP_OK);
    }
}
