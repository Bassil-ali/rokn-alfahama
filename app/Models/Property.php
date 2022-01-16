<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends BaseModel
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

            '*.item_id' => 'sometimes',
            '*.color_id' => 'sometimes|exists:colors,id',
            '*.size_id' => 'sometimes|exists:sizes,id',
            '*.price' => 'sometimes|numeric',
            '*.qty' => 'sometimes',
        ];
    }
    public static function updateRules($user)
    {
        return [
            '*.item_id' => 'sometimes',
            '*.color_id' => 'sometimes|exists:colors,id',
            '*.size_id' => 'sometimes|exists:sizes,id',
            '*.price' => 'sometimes|numeric',
            '*.qty' => 'sometimes',
        ];
    }

    public function scopeSearch($query, $request)
    {
        $query->when($request->item_id, function ($query, $item_id) {
            $query->where('item_id', '=', $item_id);
        });
    }
}
