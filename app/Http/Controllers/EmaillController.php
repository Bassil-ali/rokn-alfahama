<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmaillController extends BaseController
{
    public function sendEmail(Request $request)
    {
        dd($request);
    }
}
