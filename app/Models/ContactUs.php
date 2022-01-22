<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public static function createRules($user)
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'subject' => 'required',
            'message' => 'required',
           
        ];
    }
    public static function updateRules($user)
    {
        return [
           'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
}
