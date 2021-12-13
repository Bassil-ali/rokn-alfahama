<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends BaseModel
{
    protected $guarded =[];
    protected $with=['item'];
    use HasFactory;
    public function item(){
        return $this->belongsTo(Item::class);
    }
    public static function createRules($user)
    {
        return [
            'item_id'=>'required|exists:items,id',
            'rank'=>'required|min:1|max:5'
        ];
    }
    public static function updateRules($user)
    {
        return [
        ];
    }
}
