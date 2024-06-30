<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateCard extends Model
{
    use HasFactory;
    protected $primaryKey = 'template_id';

    protected $fillable = [
        'template_id',
        'template_url',
        'description',
        'cost',
    ];
}
