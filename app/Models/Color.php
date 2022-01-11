<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $translatable = ['name'];
    protected $appends = ['translations'];
    protected $guarded = [];
    use HasFactory;

    public function property()
    {
        return $this->hasOne(Property::class);
    }
    public static function createRules($user)
    {
        return [
            'hex_code' => 'required',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'hex_code' => 'required',
        ];
    }
}
