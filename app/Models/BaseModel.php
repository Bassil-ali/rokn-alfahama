<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    public function scopeSearch($query, $request)
    {
    }
    public function scopeSort($query, $request)
    {
    }
}
