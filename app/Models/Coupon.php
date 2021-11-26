<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            'code' => 'required|unique:coupons,code',
            'value'=>'required|numeric',
            'is_percentage'=>'sometimes|boolean'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'value'=>'required|numeric',
            'is_percentage'=>'sometimes|boolean'
        ];
    }
}
