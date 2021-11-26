<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public static function createRules($user)
    {
        return [
            'order_id'=>'sometimes|exists:orders,id',
            'amount'=>'required|numeric',
            'date'=>'required|timestamp',
            'currency_id'=>'sometimes|exists:currencies,id',
            'main_currency_id'=>'sometimes|exists:currencies,id',
            'conversion_factor'=>'sometimes|numeric',
            'main_currency_amount'=>'required|numeric',
            'currency'=>'required',
            'main_currency'=>'required',
            'status'=>'required|in:0,1,255'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'order_id'=>'sometimes|exists:orders,id',
            'amount'=>'sometimes|numeric',
            'date'=>'sometimes|timestamp',
            'currency_id'=>'sometimes|exists:currencies,id',
            'main_currency_id'=>'sometimes|exists:currencies,id',
            'conversion_factor'=>'sometimes|numeric',
            'main_currency_amount'=>'sometimes|numeric',
            'currency'=>'sometimes',
            'main_currency'=>'sometimes',
            'status'=>'sometimes|in:0,1,255'
        ];
    }
}
