<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Consulta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{

    public function index()
    {
        // select * from consultas;
        $consultas = Consulta::all();
        return $consultas;
    }
    public function createConsulta(Request $request){
        $consulta = null;
        try{
            $agendamento = new Agendamentos();
            $agendamento->id_cliente = $request->get('cliente')['value'];
            $agendamento->data_agendamento = $request->get('data');
            $agendamento->status = 'Ativo';
            $agendamento->save();

            $consulta = new Consulta();
            $consulta->id_agendamento = $agendamento->id;

            $consulta->id_veterinario = $request->get('veterinario')['value'];
            $consulta->id_animal = $request->get('animal')['value'];
            $consulta->imagem = $request->get('imagem');
            $consulta->observacoes = $request->get('descricao');
            $consulta->data_consulta = $request->get('data');
            $consulta->valor = $request->get('valor');
            $consulta->save();
        }catch(\Exception $ex){
            throw $ex;
        }
    }
    public function create(Request $request)
    {
        $consulta = null;
        try{

            $consulta = new Consulta();
            $consulta->id_agendamento = $request->get('id_agendamento');
            $consulta->id_veterinario = $request->get('id_veterinario');
            $consulta->id_animal = $request->get('id_animal');
            $consulta->imagem = $request->get('imagem');
            $consulta->observacoes = $request->get('observacoes');
            $consulta->animal_id = $request->get('animal_id');
            $dataFormatada = Carbon::createFromFormat('d/m/Y H:i', $request->get('data_consulta'))->toDateTimeString();
            $consulta->data_consulta = $dataFormatada;
            $consulta->valor = $request->get('valor');
            $consulta->save();

        }catch(\Exception $e){
            return $e;
        }

        return $consulta;
    }

    public function show($id)
    {
        $consulta = Consulta::find($id);
        return $consulta;
    }


    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);
        $consulta->id_agendamento = $request->get('id_agendamento');
        $consulta->id_veterinario = $request->get('id_veterinario');
        $consulta->id_animal = $request->get('id_animal');
        $consulta->imagem = $request->get('imagem');
        $consulta->observacoes = $request->get('observacoes');
        $consulta->animal_id = $request->get('animal_id');
        $dataFormatada = Carbon::createFromFormat('d/m/Y H:i', $request->get('data_consulta'))->toDateTimeString();
        $consulta->data_consulta = $dataFormatada;
        $consulta->valor = $request->get('valor');
        $consulta->save();
        return $consulta;
    }

    public function delete($id)
    {
        $consulta = Consulta::find($id);
        if($consulta == null){
            return 'Consulta não encontrada!';
        }
        $consulta->delete();
        return $consulta;
    }
}
