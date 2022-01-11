<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function property()
    {
        return $this->hasOne(Property::class);
    }
    public static function createRules($user)
    {
        return [
            'name' => 'required',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'name' => 'required',
        ];
    }
}
