<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meals_discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount',
        'status',
        'brunch_id'
    ];
}
