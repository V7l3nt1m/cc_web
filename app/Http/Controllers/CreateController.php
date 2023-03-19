<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;
use App\Models\DailyRead;
use App\Models\Cota;
use App\Models\Movimento;
use App\Models\Caixa;
use App\Models\CustomLog;


class CreateController extends Controller
{
    public function storeUsers(Request $request){
        $request->validate(
            [
                'username' => 'required|min:2|string|unique:users',
                'nome' => 'required|min:2|string',
                'image' => 'mimes:jpg,bmp,png,jpeg',
                'tipo' => "required",
                'genero' => "required",
            ]
        );

        try{

            $id = User::orderBy('id', 'desc')->limit(1)->first()->id+1;

            $user = new User;
            $user->id = $id; 
            $user->name = $request->nome;
            $user->username = $request->username;
            $user->telefone = $request->telefone;
            $user->password = Hash::make("caridade2023");
            $user->permissao = $request->tipo;
            $user->genero = $request->genero;
            $user->data_nasc = $request->data_nasc;

            if(isset($request->imagem)){
                $requestImage = $request->image;

                $extension = $requestImage->extension();
    
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                $requestImage->move(public_path('photo'), $imageName);
    
                $user->photo = $imageName;
            }

            $user->save();

            Cota::insert([
                'user_id' =>  $id,
             ]);

                return back()->with('sucesso', "Cadastro feito com sucesso!");
        } catch(\Throwable $e){
            CustomLog::insert([
                'nome_usuario' => auth()->user()->name,
                'descricao' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'controller' => "CreateController",
                'action' => "storeUsers",
            ]);

            return back()->with('erro', 'Ocorreu um erro '.$e->getCode()." Erro encaminhado para o admin");
        }
    }

    public function storeMoviment(Request $request){
        $saldo = Caixa::first();

        $request->validate([
            'valor' => "required|max:$saldo->saldo_atual"
        ]);

        try {
            if($request->accao == "add"){

                Movimento::insert([
                'descricao' => $request->descricao,
                'valor_movimento' => $request->valor,
                'tipo_movimento' => "entrada",
                'saldo' => $saldo->saldo_atual,
            ]);
    
            $saldo_atual = $saldo->saldo_atual + $request->valor;
    
                Caixa::find($saldo->id)->update([
                    'saldo_atual' => $saldo_atual
                ]);
                
            }elseif($request->accao = "subtract"){
                Movimento::insert([
                    'descricao' => $request->descricao,
                    'valor_movimento' => $request->valor,
                    'tipo_movimento' => "saida",
                    'saldo' => $saldo->saldo_atual,
                ]);
        
                $saldo_atual = $saldo->saldo_atual - $request->valor;
        
                    Caixa::find($saldo->id)->update([
                        'saldo_atual' => $saldo_atual
                    ]);
            }

            return back()->with('sucesso', "Operação Efectuada com Sucesso!");
        } catch(\Throwable $e){
            CustomLog::insert([
                'nome_usuario' => auth()->user()->name,
                'descricao' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'controller' => "CreateController",
                'action' => "storeMoviment",
            ]);

            return back()->with('erro', 'Ocorreu um erro '.$e->getCode()." Erro encaminhado para o admin");
        }

       
    }


    public function iniciarCotas(){
        $usuarios = User::where('permissao',"<>","admin")->get();

        $cota = Cota::where('ano', date("Y"))->first();

        if(!isset($cota)){
            foreach ($usuarios as $users) {
                Cota::insert([
                    'user_id' =>  $users->id,
                    'valor_total_a_dever' => $users->valor_total_a_dever,
                ]);
            }
        }else{
            return back()->with('erro', 'Quotização Anual Já foi gerada'); 
        }

       

        return back()->with('sucesso','Quotização Anual Gerada com Sucesso!');
    }
}
