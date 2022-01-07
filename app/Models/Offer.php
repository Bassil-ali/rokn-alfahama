<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    use HasTranslations;
    protected $with = ['image'];
    public $translatable = ['name', 'brief'];
    public static function createRules($user)
    {
        return [
            'percentage' => 'required|numeric',
            'image_id' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
        ];
    }
    public static function updateRules($user)
    {
        return [
            'percentage' => 'nullable',
            'image_id' => 'nullable',
            // 'start_date' => 'sometimes',
            // 'end_date' => 'sometimes',
        ];
    }
    public function image()
    {
        return $this->belongsTo(Media::class);
    }
}
