<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BaseModel
{
    use HasFactory;
    // protected $casts = [
    //     'value'=>'encrypted:array'
    // ];
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function createRules($user)
    {
        return [
            'settings' => 'required',
            // 'user_id'=>'sometimes|exists:users,id',
            // 'key'=>'required',
            // 'value'=>'nullable',
            // 'description'=>'nullable'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'settings' => 'required',
        ];
    }
}
