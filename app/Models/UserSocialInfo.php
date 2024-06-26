<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialInfo extends Model
{
    use HasFactory;
    protected $table = 'user_social_infos';

    public function userSocialInfo()
    {
        return $this->hasOne(SocialInfo::class, 'social_id', 'social_id');
    }
}
