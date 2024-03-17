<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_type',
        'user_id',
        'status',
        'notes'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
