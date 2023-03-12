<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;
use App\Models\CustomLog;


class CreateController extends Controller
{
    public function storeUsers(Request $request){
        $request->validate(
            [
                'username' => 'required|min:2|string|unique:users',
                'nome' => 'required|min:2|string',
                'telefone' => 'integer|unique:users|min: 900000000|max:999999999',
                'image' => 'required|mimes:jpg,bmp,png,jpeg',
                'tipo' => "required",
                'genero' => "required",
                'data_nasc'=> "required|date",
            ]
        );

        try{
            $user = new User;
            $user->name = $request->nome;
            $user->username = $request->username;
            $user->telefone = $request->telefone;
            $user->password = Hash::make("caridade2023");
            $user->permissao = $request->tipo;
            $user->genero = $request->genero;
            $user->data_nasc = $request->data_nasc;

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('photo'), $imageName);

            $user->photo = $imageName;

            $user->save();

                return back()->with('sucesso', "Cadastro feito com sucesso!");
        } catch(\Throwable $e){
            CustomLog::insert([
                'nome_usuario' => auth()->user()->name,
                'descricao' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'controller' => "CadastroController",
                'action' => "storeUsers",
            ]);

            return back()->with('erro', 'Ocorreu um erro '.$e->getCode()." Erro encaminhado para o admin");
        }
    }
}
