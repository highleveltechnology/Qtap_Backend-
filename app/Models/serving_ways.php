<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class serving_ways extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =['name' , 'brunch_id' , 'tables_number'];
}
