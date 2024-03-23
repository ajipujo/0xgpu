<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'memory_capacity',
        'memory_type',
        'bandwith',
        'form_factor',
        'max_cpu_per_gpu',
        'max_memory_per_gpu',
        'cost_per_month'
    ];
}
