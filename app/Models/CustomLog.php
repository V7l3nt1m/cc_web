<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomLog extends Model
{
    use HasFactory;

    protected $fillable = ['nome_usuario', 'descricao', 'codigo', 'hora_erro', 'action','controller'];
}
