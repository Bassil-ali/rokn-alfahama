<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user', 'items' , 'addresses'];
    protected $appends = ['items_count'];
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
            'issue_date' => 'sometimes|date',
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
    public function scopeSearch($query, $request)
    {
        $query->when(($request->status != null), function ($query) {
            $query->where('status', '=', request('status'));
        });
    }
    public function getItemsCountAttribute()
    {
        return $this->items()->count();
    }
    public function calcOrderItems($items)
    {
        $totlas = [
            'total' => 0,
            'discount' => 0,
            'tax' => 0,
            'taxed_total' => 0,
            'status' => 0,
        ];

        for ($i = 0; $i < count($items); $i++) {
            $totlas['total'] += ($items[$i]['item_price'] * $items[$i]['item_quantity']);
            $totlas['discount'] +=  $items[$i]['discount'];
            // if ($items[$i]['tax_id'] >= 1) {
            //     $tax = Tax::find($items[$i]['tax_id']);
            //     $totlas['tax'] += ($tax->percentage / 100) * ($totlas['total'] * $totlas['discount']);
            // }
            $totlas['taxed_total'] =   $totlas['total'] + $totlas['tax'] - $totlas['discount'];
        }
        return $totlas;
    }
}
