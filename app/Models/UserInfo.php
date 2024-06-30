<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;
    protected $table = 'user_infos';

    protected $primaryKey = 'info_id';

    protected $fillable = [
        'user_id',
        'position',
        'company',
        'address',
        'avatar_url',
        'link_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
