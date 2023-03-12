<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;
use App\Models\CustomLog;

class GetController extends Controller
{
    public function index(){

    $response = Http::get('https://liturgia.up.railway.app/');
    $liturgia = $response->json();

    $admins = User::where('permissao','tesoureiro')->orWhere('permissao','secretario')->orWhere('permissao','coordenador')->orWhere('permissao','subcoordenador')->get();

     return view('welcome', ['liturgia'=>$liturgia, 'admins' => $admins]);
    }

    public function admin_dashboard(){
        $user = auth()->user();

        return view('admin.dashboard', ['user' => $user]);
    }

    public function perfil_admin(){
        $user = auth()->user();

        return view('admin.perfil', ['user' => $user]);
    }

    public function gestaoUsuariosAdmin(){
        $user = auth()->user();

        $search = request('search');
        if($search){
            $usuarios = User::where('name', 'like', '%'.$search.'%')->orWhere('genero',  'like', '%'.$search.'%')->get();
        }else{
            $usuarios = User::where('id',"<>", $user->id)->get();
        }

        return view('admin.gestaousuarios', ['user' => $user, 'usuarios' => $usuarios]);
    }

    public function gestaoLogs(){
        $user = auth()->user();

        $logs = CustomLog::all();

        return view('admin.logs ', ['user' => $user, 'logs' => $logs]);

    }


    public function edit($id){
        $user = auth()->user();

        $usuario = User::where('id', $id)->first();

        return view('admin.edit', ['user' => $user, 'usuario' => $usuario]);

    }

}
