<?php

namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends BaseModel
{
    use HasFactory;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createRules($user)
    {
        return [
            'user_id' => 'nullable',
            'street_address' => 'required',
            'apt_suit_building' => 'nullable',
            'zip_code' => 'required',
            'city' => 'required',
            'country_region' => 'required',
 
           
        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id' => 'nullable',
            'street_address' => 'required',
            'apt_suit_building' => 'nullable',
            'zip_code' => 'required',
            'city' => 'required',
            'country_region' => 'required',
 
        ];
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->user_id, function ($query, $user_id) {
            $query->where('user_id',  $user_id);
        });
    }
}
