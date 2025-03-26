<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::paginate(10);
    }

    public function show($id){
        $user = User::find($id);

        if(!$user){
            return abort(404, 'Erro! Usuário não encontrado');
        }

        return $user;
    }

    public function create(Request $request){
        $data = $request->all();

        if($data['email']){
            $checkEmail = User::where('email', $data['email'])->count();
            if($checkEmail > 0){
                throw new Exception('Já existe um usuário com esse e-mail cadastrado!');
            }
        }

        $user = new User();
        $user->name = $data['nome'];
        $user->email = $data['email'];
        $user->password = bcrypt( $data['senha']);
        $user->save();

        return $user;
    }

    public function update($id, Request $request){
        $data = $request->all();

        $user = User::find($id);
        $user->name = $data['nome'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['senha']);
        $user->save();

        return User::find($id);
    }

    public function delete($id){
        $user = User::find($id);

        if(!$user){
            return ['msg' => 'Esse usuário não existe no sistema!'];
        }

        $user->delete();

        return ['msg' => 'Usuário removido com sucesso!'];
    }
}
