<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public static function createRules($user)
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'tax_id' => 'nullable|exists:taxes,id',
            'unit_id' => 'sometimes|exists:units,id',
            'free_quantity' => 'sometimes|numeric',
            'item_price' => 'required|numeric',
            'item_quantity' => 'required|numeric',
            'discount' => 'sometimes|numeric',
            'tax_percentage' => 'nullable',
            'image' => 'nullable|string',
            'is_discount_percentage' => 'sometimes|boolean',
            'item_name' => 'sometimes|string',
            'description' => 'nullable',
            'item_id' => 'required|exists:items,id',
            'offer_id' => 'sometimes|exists:offers,id'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'image' => 'nullable|string',
            'order_id' => 'required|exists:orders,id',
            'tax_id' => 'nullable|exists:taxes,id',
            'tax_percentage' => 'nullable',
            'unit_id' => 'nullable|exists:units,id',
            'free_quantity' => 'sometimes|numeric',
            'item_price' => 'sometimes|numeric',
            'item_quantity' => 'sometimes|numeric',
            'discount' => 'sometimes|numeric',
            'is_discount_percentage' => 'sometimes|boolean',
            'item_name' => 'sometimes|string',
            'description' => 'nullable',
            'item_id' => 'required|exists:items,id',
            'offer_id' => 'sometimes|exists:offers,id'

        ];
    }
}
