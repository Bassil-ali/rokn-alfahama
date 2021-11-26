<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            'coupon_id' => 'required|exists:coupons,id',
            'item_id' => 'required|exists:items,id',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'coupon_id' => 'required|exists:coupons,id',
            'item_id' => 'required|exists:items,id',
        ];
    }
}
