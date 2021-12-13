<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    use HasTranslations;
    public $translatable = ['name', 'description'];
    protected $appends = ['translations', 'image', 'liked', 'rank'];
    protected $with = ['tax', 'unit'];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
    public function parent()
    {
        return $this->belongsTo(Item::class);
    }
    public static function createRules($user)
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required|exists:categories,id',
            'type' => 'sometimes|numeric',
            'quantity' => 'required|numeric',
            'parent_id' => 'sometimes|exists:items,id',
            'selling_price' => 'required|numeric',
            'purchasing_price' => 'sometimes|numeric',
            'tax_id' => 'sometimes|exists:taxes,id',
            'currency_id' => 'sometimes|exists:currencies,id',
            'cover_image_id' => 'sometimes|exists:media,id',
            'unit_id' => 'sometimes|exists:units,id'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'sometimes|exists:categories,id',
            'type' => 'sometimes|numeric',
            'quantity' => 'sometimes|numeric',
            'parent_id' => 'sometimes|exists:items,id',
            'selling_price' => 'sometimes|numeric',
            'purchasing_price' => 'sometimes|numeric',
            'tax_id' => 'sometimes|exists:taxes,id',
            'currency_id' => 'sometimes|exists:currencies,id',
            'cover_image_id' => 'sometimes|exists:media,id',
            'unit_id' => 'sometimes|exists:units,id'
        ];
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    public function cover_image()
    {
        return $this->belongsTo(Media::class);
    }
    public function getImageAttribute()
    {
        return $this->cover_image->url;
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->most_sold, function ($query) {
            $query->whereRaw('items.id in (select item_id from order_items group by item_id order by (sum(item_quantity))');
        });
        $query->when($request->liked, function ($query,$liked) {
            $user=auth()->user();
            if($user){
                $user_id=$user->id;
                $query->whereRaw("items.id in (select item_id from reactions where user_id=$user_id)");
            }
        });
    }
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
    public function getLikedAttribute()
    {
        if (auth()->user())
            return $this->reactions()->where('user_id', '=', auth()->user()->id)->count() > 0;
        return false;
    }
    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }
    public function getRankAttribute()
    {
        return $this->ranks()->avg('rank');
    }
}
