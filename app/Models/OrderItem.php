<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function tax(){
        return $this->belongsTo(Tax::class);
    }
    public static function createRules($user)
    {
        return [
            'order_id'=>'required|exists:orders,id',
            'tax_id'=>'required|exists:taxes,id',
            'unit_id'=>'required|exists:units,id',
            'quantity'=>'required|numeric',
            'free_quantity'=>'sometimes|numeric',
            'item_price'=>'required|numeric',
            'item_quantity'=>'required|numeric',
            'discount'=>'sometimes|numeric',
            'is_discount_percentage'=>'sometimes|boolean',
            'item_name'=>'required|string',
            'description'=>'nullable'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'order_id'=>'required|exists:orders,id',
            'tax_id'=>'sometimes|exists:taxes,id',
            'unit_id'=>'sometimes|exists:units,id',
            'quantity'=>'sometimes|numeric',
            'free_quantity'=>'sometimes|numeric',
            'item_price'=>'sometimes|numeric',
            'item_quantity'=>'sometimes|numeric',
            'discount'=>'sometimes|numeric',
            'is_discount_percentage'=>'sometimes|boolean',
            'item_name'=>'sometimes|string',
            'description'=>'nullable'
        ];
    }
}
