<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRole;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use HasRoles;
    
    // Khai báo các quan hệ với role và permission
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->unique();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'password',
        'name',
        'email',
        'gender',
    ];

    // Định nghĩa mối quan hệ với UserInfo
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'user_id');
    }

    // Định nghĩa mối quan hệ với SocialInfo
    public function socialInfos()
    {
        return $this->belongsToMany(SocialInfo::class, 'user_social_infos', 'user_id', 'social_id')
                    ->withPivot('social_url');
    }

    // Định nghĩa mối quan hệ với UserSocialInfo
    public function userSocialInfos()
    {
        return $this->hasMany(UserSocialInfo::class, 'user_id', 'user_id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
