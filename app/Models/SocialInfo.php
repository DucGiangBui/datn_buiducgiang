<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'social_id';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_social_infos', 'social_id', 'user_id')
                    ->withPivot('social_url');
    }
}
