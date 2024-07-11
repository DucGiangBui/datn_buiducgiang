<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_social_id';
    protected $table = 'user_social_infos';

    protected $fillable = ['user_id', 'social_id', 'social_url', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function socialInfo()
    {
        return $this->belongsTo(SocialInfo::class, 'social_id', 'social_id');
    }
}
