<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animais extends Model
{
    use HasFactory;

    protected $fillable = [
      'imagem',
      'nome',
      'tipo_animal',
      'raca',
      'idade',
      'peso',
      'descricao',
      'dono_id',
    ];

    public function dono(){
        return $this->hasOne(User::class,'id', 'dono_id');
    }
}
