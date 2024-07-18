<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCard extends Model
{
    use HasFactory;
    protected $primaryKey = 'template_id';
    protected $table = 'template_cards';

    protected $fillable = [
        'template_id',
        'front',
        'behind',
        'description',
        'cost',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
