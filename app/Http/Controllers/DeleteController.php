<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;
use App\Models\CustomLog;

class DeleteController extends Controller
{
    public function destroy_log($log_id){

        try{
            CustomLog::where('id', $log_id)->delete();
            
            return back()->with('sucesso', 'Operação concluida com sucesso!');
        }catch(\Throwable $e){
            CustomLog::insert([
                'nome_usuario' => auth()->user()->name,
                'descricao' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'controller' => "DeleteController",
                'action' => "destroy_log",
            ]);
        
            return back()->with('erro', 'Ocorreu um erro '.$e->getCode()." Erro encaminhado para o admin");
        }


    }

    public function destroy_user($id){
        try{
            User::where('id', $id)->delete();
            return back()->with('sucesso', 'Usuário Eliminado com sucesso!');
        }catch(\Throwable $e){
            CustomLog::insert([
                'nome_usuario' => auth()->user()->name,
                'descricao' => $e->getMessage(),
                'codigo' => $e->getCode(),
                'controller' => "DeleteController",
                'action' => "destroy_user(id)",
            ]);
            return back()->with('erro', 'Ocorreu um erro '.$e->getCode()." Erro encaminhado para o admin");
        }

     

    }
}
