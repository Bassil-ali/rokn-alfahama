<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    public $translatable= ['name'];
    protected $appends =['translations'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function items(){
        return $this->hasMany(FavoriteItem::class);
    }
    public static function createRules($user)
    {
        return [
            'user_id'=>'required|exists:users,id',
            'description'=>'nullable',
            'cover_image_id'=>'sometimes|exists:media,id'
            
        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id'=>'required|exists:users,id',
            'description'=>'nullable',
            'cover_image_id'=>'sometimes|exists:media,id'

        ];
    }
}
