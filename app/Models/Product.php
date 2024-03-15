<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'provider',
        'location',
        'ram_capacity',
        'ram_bandwith',
        'cpu',
        'disk_name',
        'disk_bandwith',
        'disk_capacity',
        'price'
    ];
}
