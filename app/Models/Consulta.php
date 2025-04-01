<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agendamento',
        'id_veterinario',
        'id_animal',
        'imagem',
        'observacoes',
        'data_consulta',
        'valor',
    ];
}
