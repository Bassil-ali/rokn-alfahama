<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['url'];
    public function mediable()
    {
        return $this->morphTo();
    }
    public static function createRules($user)
    {
        return [
            'name' => 'nullable',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ];
    }
    public static function updateRules($user)
    {
        return [
            'name' => 'nullable',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg'

        ];
    }
    public function getUrlAttribute(){
        return config('app.url').'/storage/'.$this->path;
    }
}
