<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ChangePasswordController  
{
    public function passwordResetProcess(UpdatePasswordRequest $request)
    {

        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) :  response()->json(['data' => $this->tokenNotFoundError()->original]);
    }

    // Verify if token is valid
    private function updatePasswordRow($request)
    {
        return DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->resetToken
        ]);
    }

    // Token not found response  
    private function tokenNotFoundError()
    {
        return response()->json([
            'data' => __('Either your email or token is wrong.') 
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    // Reset password
    private function resetPassword($request)
    {
        // find email
        $userData = User::whereEmail($request->email)->first();
        // update password
        $userData->update([
            'password' => bcrypt($request->password)
        ]);
        // remove verification data from db
        $this->updatePasswordRow($request)->delete();

        // reset password response
        return  response()->json(['data' => response()->json([
            'data' => __('Password has been updated.'),
            "status"=>200
        ], Response::HTTP_CREATED)->original]);
    }
}
