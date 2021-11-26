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
    public $translatable= ['name','description'];
    protected $appends =['translations'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tax(){
        return $this->belongsTo(Tax::class);
    }
    public function parent(){
        return $this->belongsTo(Item::class);
    }
    public static function createRules($user)
    {
        return [
            'category_id'=>'required|exists:categories,id',
            'type'=>'sometimes|numeric',
            'quantity'=>'required|numeric',
            'parent_id'=>'sometimes|exists:items,id',
            'selling_price'=>'required|numeric',
            'purchasing_price'=>'sometimes|numeric',
            'tax_id'=>'sometimes|exists:taxes,id',
            'currency_id'=>'sometimes|exists:currencies,id'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'category_id'=>'sometimes|exists:categories,id',
            'type'=>'sometimes|numeric',
            'quantity'=>'sometimes|numeric',
            'parent_id'=>'sometimes|exists:items,id',
            'selling_price'=>'sometimes|numeric',
            'purchasing_price'=>'sometimes|numeric',
            'tax_id'=>'sometimes|exists:taxes,id',
            'currency_id'=>'sometimes|exists:currencies,id'
        ];
    }
}
