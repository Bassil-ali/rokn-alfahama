<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $user;
    public function __construct(Request $request)
    {
        $this->user = auth()->user();
        if ($this->user)
            $request->merge(['user_id' => $this->user->id]);
    }
    public static function routeName()
    {
        return Str::snake("Controller");
    }
}
