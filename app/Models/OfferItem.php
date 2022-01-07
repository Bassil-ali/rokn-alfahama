<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            'offer_id' => 'required|exists:offers,id',
            'items_ids' => 'required|array',

        ];
    }
    public static function updateRules($user)
    {
        return [
            'offer_id' => 'required|exists:offers,id',
            'items_ids' => 'required|exists:items,id',


        ];
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
