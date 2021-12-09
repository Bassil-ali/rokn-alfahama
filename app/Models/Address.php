<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function createRules($user)
    {
        return [
            'user_id'=>'required_without:users,id',
            'title_name'=>'required_without:user_id',
            'area'=>'required_without:user_id',
            'widget'=>'required_without:user_id',
            'street'=>'required_without:user_id',
            'avenue'=>'required_without:user_id',
            'house_number'=>'required|numeric',
            'floor_no'=>'required|numeric',
            'apartment_number'=>'required|numeric',
            'floor_no'=>'required|numeric',
            'apartment_number'=>'required|numeric',
            'notes'=>'sometimes'
        ];
    }
    public static function updateRules($user)
    {
        return [
           'user_id'=>'required_without:users,id',
            'title_name'=>'required_without:user_id',
            'area'=>'required_without:user_id',
            'widget'=>'required_without:user_id',
            'street'=>'required_without:user_id',
            'avenue'=>'required_without:user_id',
            'house_number'=>'required|numeric',
            'floor_no'=>'required|numeric',
            'apartment_number'=>'required|numeric',
            'floor_no'=>'required|numeric',
            'apartment_number'=>'required|numeric',
            'notes'=>'sometimes'
        ];
    }
}
