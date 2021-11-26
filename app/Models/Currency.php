<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    use HasTranslations;
    public $translatable= ['name'];
    protected $appends =['translations'];
    public static function createRules($user)
    {
        return [
        ];
    }
    public static function updateRules($user)
    {
        return [
        ];
    }
}
