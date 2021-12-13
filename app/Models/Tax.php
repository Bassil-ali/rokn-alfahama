<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends BaseModel
{
    use HasFactory;
    use HasTranslations;
    public $translatable= ['name'];
    protected $appends =['translations'];
    protected $guarded = [];
    public static function createRules($user)
    {
        return [
            'name'=>'required',
            'percentage'=>'required|numeric'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'name'=>'required',
            'percentage'=>'required|numeric'
        ];
    }
}
