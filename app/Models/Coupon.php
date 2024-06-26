<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

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
            'code' => 'required',
            'value'=>'required|numeric',
            'is_percentage'=>'sometimes|boolean'
        ];
    }

    public function scopeSearch($query, $request)
    {
        $query->when($request->search, function ($query, $search) {
            $query->where('code', 'like', "%{$search}%")
            ->orWhere('value','like',"%{$search}%");
        });
    }
}
