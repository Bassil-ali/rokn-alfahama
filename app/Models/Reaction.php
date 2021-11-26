<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function createRules($user)
    {
        return [
            'user_id'=>'required|exists:users,id',
            'item_id'=>'required|exists:items,id',
            'type'=>'sometimes|numeric'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id'=>'sometimes|exists:users,id',
            'item_id'=>'sometimes|exists:items,id',
            'type'=>'sometimes|numeric'
        ];
    }
}
