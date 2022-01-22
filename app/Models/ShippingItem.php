<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingItem extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            '*.item_id' => 'required',
            '*.shipping_id' => 'required',
            '*.price' => 'required',
        ];
    }
    public static function updateRules($user)
    {
        return [
            '*.item_id' => 'sometimes',
            '*.shipping_id' => 'sometimes',
            '*.price' => 'sometimes',
        ];
    }
}