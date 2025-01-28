<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'posologia',
        'validade',
        'id_consulta',
    ];
}
