<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lancamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'valor',
        'tipo',
        'quantidade',
        'categoria',
        'data_lancamento',
    ];
}
