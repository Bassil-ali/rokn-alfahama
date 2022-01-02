<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public static function createRules($user)
    {
        return [
            'user_id' => 'required_without:customer_name,customer_mobile,customer_email|exists:users,id',
            'customer_name' => 'required_without:user_id',
            'customer_mobile' => 'required_without:user_id',
            'customer_email' => 'required_without:user_id',
            'issue_date' => 'required|date',
            'due_date' => 'sometimes|date',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'sometimes|numeric',
            'taxed_total' => 'required|numeric',
            'status' => 'required|in:0,1,128,255',
            'currency_id' => 'sometimes|exists:currencies,id',
            'address_id' => 'sometimes|exists:addresses,id'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id' => 'required_without:customer_name,customer_mobile,customer_email|exists:users,id',
            'customer_name' => 'required_without:user_id',
            'customer_mobile' => 'required_without:user_id',
            'customer_email' => 'required_without:user_id',
            'issue_date' => 'sometimes|timestamp',
            'due_date' => 'sometimes|date',
            'total' => 'sometimes|numeric',
            'discount' => 'sometimes|numeric',
            'tax' => 'sometimes|numeric',
            'taxed_total' => 'sometimes|numeric',
            'status' => 'sometimes|in:0,1,128,255',
            'currency_id' => 'sometimes|exists:currencies,id'
        ];
    }

    public function addresses()
    {
        return $this->belongsTo(Address::class);
    }
}
