<?php

namespace App\Models;

use App\Mail\PasswordSetMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasFactory, Notifiable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     * 
     */
   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = [
         'reaction_count'
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function is_permitted_to($name, $class_name, $request)
    {
        if (isset($class_name::$controllable)) {
            if (isset($class_name::$field_to_check)) {
                $model = null;
                $field = $class_name::$field_to_check;
                $params = Route::current()->parameters();
                $model = reset($params);
                if ($request->id) {
                    $model = $class_name::find($request->id);
                }
                if (!$model) {
                    $p_name = $class_name::getSubName($request->$field);
                } else {
                    $p_name = $class_name::getSubName($model->$field);
                }
            } else {
                return true;
            }
            if (!$this->current_role)
                return true;
            $permission = $this->current_role->permissions()->where('code', '=', $p_name)->first();
            if (!$permission)
                return true;
            $p = $name;
            return $permission->$p;
        }
        return true;
    }
    public function getIsAdminAttribute()
    {
        return $this->role == 1;
    }
    public static function createRules($user)
    {
        return [
            'name' => 'required',
            'user_name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|min:11|numeric|unique:users,mobile',
            'status' => 'somtimes|integer',
            'password' => 'required|min:6',
            'permissions' => 'somtimes',
            'role_id'=>"somtimes"
        ];
    }
    public static function updateRules($request, $user)

    {
        if ($request['password']) {
            return [
                'old_password' => 'current_password:api',
                'password' => 'required|min:6',
                'confirm_password' => 'required_with:password|same:password|min:6',
                
            ];
        }
        return [
            'user_name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $user->id,

        ];
    }
    public function scopeSearch($query, $request)
    {
        $query->when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
            ->orWhere('role_id','like',"%{$search}%")
            ->orWhere('name','like',"%{$search}%")
            ->orWhere('user_name','like',"%{$search}%")
            ->orWhere('email','like',"%{$search}%")
            ->orWhere('mobile','like',"%{$search}%");
        });
    }
    public function scopeSort($query, $request)
    {
        $query->when($request->email, function ($q, $email) {
            $q->where('email', '=', $email);
        });
    }
    public function getCurrentRoleAttribute()
    {
    }
    // public function getPermissionsAttribute()
    // {
    //     $permissions = [];
    //     if ($this->current_role)
    //         $permissions = $this->current_role->permissions;
    //     return $permissions;
    // }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function contactUs()
    {
        return $this->hasMany(contactUs::class);
    }
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
    public function getReactionCountAttribute()
    {
        return $this->reactions()->count();
    }
   
}
