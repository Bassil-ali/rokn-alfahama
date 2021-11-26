<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteItem extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public static function createRules($user)
    {
        return [
            'favorie_id' => 'required|exists:favorites,id',
            'item_id' => 'required|exists:items,id'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'favorie_id' => 'required|exists:favorites,id',
            'item_id' => 'required|exists:items,id'
        ];
    }
}
