<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    use HasFactory;
    use HasTranslations;
    public $translatable= ['name'];
    protected $appends =['translations'];
    protected $guarded = [];
    public function items(){
        return $this->hasMany(Item::class);
    }
    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
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
}
