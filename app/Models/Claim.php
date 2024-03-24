<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'user_id',
        'status',
        'notes',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
