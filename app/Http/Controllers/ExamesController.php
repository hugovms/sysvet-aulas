<?php

namespace App\Http\Controllers;

use App\Models\Exames;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamesController extends Controller
{
    //Create
    public function create(Request $request){
        $data = $request->all();

        $exame = Exames::create([
            'nome' => $data['nome'],
            'valor' => $data['valor'],
            //formato 15/01/2025 = d/m/Y
            //banco lê 01-15-2025
            'data' => Carbon::createFromFormat('d/m/Y', $data['data'])->toDateTime(),
            'id_consulta' => $data['id_consulta']
        ]);

        return ['msg' => "Criado com sucesso", 'dados' => $exame];
    }

    //Read - Individual
    public function show($id){
        return Exames::find($id);
    }

    //Read - All - Geral
    public function index(){
        return Exames::paginate(10);
    }

    //Update
    public function update($id, Request $request){
        $data = $request->all();

        $exame = Exames::find($id);

        $exame->nome = $data['nome'];
        $exame->data = Carbon::createFromFormat('d/m/Y', $data['data'])->toDateTime();
        $exame->valor = $data['valor'];
        $exame->id_consulta = $data['id_consulta'];
        $exame->save();

        // $exame = Exames::where('id', $id)->update($data);

        return Exames::find($id);
    }

    //Delete
    public function delete($id){
        $exame = Exames::find($id);

        //if(is_null($exame))
        if(!$exame){
            return ['msg' => 'Esse exame já foi excluído!'];
        }

        $exame->delete();

        return ['msg' => 'Item excluído com sucesso!'];
    }


}
