<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'social_id';
    protected $table = 'social_infos';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_social_infos', 'social_id', 'user_id')
                    ->withPivot('social_url');
    }

    protected $fillable = [
        'social_id',
        'platform',
        'social_icon',
    ];
}
