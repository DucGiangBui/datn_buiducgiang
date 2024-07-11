<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $primaryKey = 'card_id';
    public $incrementing = false;
    protected $keyType = 'bigInteger';

    protected $fillable = [
        'card_url',
        'template_id', // Thêm thuộc tính này
    ];
    public function templateCard()
    {
        return $this->belongsTo(TemplateCard::class, 'template_id', 'template_id');
    }
}
