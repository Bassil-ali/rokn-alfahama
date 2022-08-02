<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends BaseModel
{
    use HasFactory;


    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            'name'=>'required',
            'percentage'=>'required|numeric'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'name'=>'required',
            'percentage'=>'required|numeric'
        ];
    }

    public function scopeSearch($query, $request)
    {
        $query->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
            
        });
    }
}
