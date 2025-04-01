<?php

namespace App\Http\Controllers;

use App\Models\Animais;
use Illuminate\Http\Request;

class AnimaisController extends Controller
{

    public function index()
    {
        return Animais::with('dono')->paginate(10);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $animal  = new Animais();
        $animal->imagem = $data['imagem'];
        $animal->nome = $data['nome'];
        $animal->tipo_animal = $data['tipo_animal'];
        $animal->raca = $data['raca'];
        $animal->idade = $data['idade'];
        $animal->peso = $data['peso'];
        $animal->descricao = $data['descricao'];
        $animal->dono_id = $data['dono_id'];
        $animal->save();

        return $animal;
    }

    public function show($id)
    {
        $animal = Animais::where('id', '=',$id)->with('dono')->first();

        if(!$animal){
            return abort(404, 'Erro! Animal não encontrado.');
        }

        return $animal;
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $animal  = Animais::find($id);

        if(!$animal){
            return abort(404, 'Erro! Animal não encontrado.');
        }

        $animal->imagem = $data['imagem'];
        $animal->nome = $data['nome'];
        $animal->tipo_animal = $data['tipo_animal'];
        $animal->raca = $data['raca'];
        $animal->idade = $data['idade'];
        $animal->peso = $data['peso'];
        $animal->descricao = $data['descricao'];
        $animal->dono_id = $data['dono_id'];
        $animal->save();

        return Animais::find($id);
    }


    public function delete($id)
    {
        $animal = Animais::find($id);

        if(!$animal){
            return ['msg' => 'Esse animal não existe.'];
        }

        $animal->delete();

        return ['msg' => 'Animal removido com sucesso!'];
    }
}
