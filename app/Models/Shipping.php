<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends BaseModel
{
    use HasFactory;
    protected $guarded = [];

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
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function shipping()
    {
        return $this->belongsTo(shipping::class);
    }
}
