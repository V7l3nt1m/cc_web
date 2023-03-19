<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Jan',
        'Jan',
'Fev',
'Mar',
'Abr',
'Mai',
'Jun', 
'Jul',
'Ago',
'Set',
'Out',
'Nov',
'Dev',
'valor_total_a_dever',
'valor_tota_pago',
    ];
}
