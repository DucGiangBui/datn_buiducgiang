<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'status',
        'template_id',
        'order_info_id',
    ];

    public function orderInfo()
    {
        return $this->belongsTo(OrderInfo::class, 'order_info_id', 'order_info_id');
    }
    public function templateCard()
    {
        return $this->belongsTo(TemplateCard::class, 'template_id', 'template_id');
    }
}
