<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_agendamento',
        'id_veterinario',
        'id_animal',
        'imagem',
        'observa,coes'
        'animal_id',
        'data_consu,lta'
        'valor',
    ]
}
