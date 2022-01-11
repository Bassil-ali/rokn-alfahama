<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function color()
    {
        return $this->belongsTo(Item::class);
    }
    public function size()
    {
        return $this->belongsTo(Item::class);
    }

    public static function createRules($user)
    {
        return [
            'item_id' => 'required',
            'color_id' => 'sometimes|exists:colors,id',
            'size_id' => 'sometimes|exiests:sizes,id',
            'price' => 'sometimes|numeric',
            'qty' => 'sometimes',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'item_id' => 'required',
            'color_id' => 'sometimes|exists:colors,id',
            'size_id' => 'sometimes|exiests:sizes,id',
            'price' => 'sometimes|numeric',
            'qty' => 'sometimes',
        ];
    }
}
