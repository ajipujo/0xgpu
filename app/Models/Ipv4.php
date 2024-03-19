<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipv4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'datacenter',
        'cost_per_hour',
    ];
}
