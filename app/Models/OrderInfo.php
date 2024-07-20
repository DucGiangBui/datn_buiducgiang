<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_info_id';

    protected $fillable = [
        'name',
        'position',
        'address',
        'phone',
        'payment_id',
        'info_print_id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'order_info_id', 'order_info_id');
    }
}
