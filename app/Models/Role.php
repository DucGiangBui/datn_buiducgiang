<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_id';
    protected $fillable = [
        'name',
        'display_name'
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}
