<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $with = ['items'];
    protected $appends = ['translations', 'image', 'items_count'];
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public static function createRules($user)
    {
        return [
            'cover_image_id' => 'required',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'cover_image_id' => 'required',
        ];
    }
    public function cover_image()
    {
        return $this->belongsTo(Media::class);
    }
    public function getImageAttribute()
    {
        return $this->cover_image->url;
    }
    public function getItemsCountAttribute()
    {
        return $this->items()->count();
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->top, function ($query, $top) {
            // dd($category_id);
            // $query->whererow("limit $top");
        });
    }
}
