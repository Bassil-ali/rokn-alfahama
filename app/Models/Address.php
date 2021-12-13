<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends BaseModel
{
    use HasFactory;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function createRules($user)
    {
        return [
            'user_id'=>'required|exists:users,id',
            'title_name'=>'nullable',
            'area'=>'nullable',
            'widget'=>'nullable',
            'street'=>'nullable',
            'avenue'=>'nullable',
            'house_number'=>'sometimes|numeric',
            'floor_no'=>'sometimes|numeric',
            'apartment_number'=>'sometimes|numeric',
            'floor_no'=>'sometimes|numeric',
            'apartment_number'=>'sometimes|numeric',
            'notes'=>'nullable'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id'=>'required|exists:users,id',
            'title_name'=>'nullable',
            'area'=>'nullable',
            'widget'=>'nullable',
            'street'=>'nullable',
            'avenue'=>'nullable',
            'house_number'=>'sometimes|numeric',
            'floor_no'=>'sometimes|numeric',
            'apartment_number'=>'sometimes|numeric',
            'floor_no'=>'sometimes|numeric',
            'apartment_number'=>'sometimes|numeric',
            'notes'=>'nullable'
        ];
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->user_id,function($query,$user_id){
            $query->where('user_id','=',$user_id);
        });
    }
}
