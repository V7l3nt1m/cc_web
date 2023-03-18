<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_atualizacao',
        'descricao',
        'tipo_movimento',
        'valor_movimento',
        'saldo',
    ];
}
