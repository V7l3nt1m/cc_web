<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyRead extends Model
{
    use HasFactory;

    protected $casts = ['liturgia' => 'array'];
}
