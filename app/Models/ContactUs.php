<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends BaseModel
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createRules($user)
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'subject' => 'required',
            'message' => 'required',

        ];
    }
    public static function updateRules($user)
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
            ->orWhere('subject','like',"%{$search}%")
            ->orWhere('message','like',"%{$search}%")
            ->orWhere('email','like',"%{$search}%");

        });
    }
}
