<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;
use App\Models\DailyRead;
use App\Models\Movimento;
use App\Models\Cota;
use App\Models\Caixa;
use App\Models\CustomLog;

class GetController extends Controller
{
    public function index(){

    $datetoday = date('d/m/Y');

    $liturgia = DailyRead::orderBy('id', 'desc')->limit(1)
    ->select('liturgia')
    ->get();

    try {
        
        if($datetoday != $liturgia[0]->liturgia['data']){

            $response = Http::get('https://liturgia.up.railway.app/');
        $liturgia = $response->json();
           
            DailyRead::orderBy('id', 'desc')->limit(1)->delete();

            DailyRead::insert([
                'liturgia' => json_encode($liturgia),
            ]);
        }
    } catch (\Throwable $th) {
    }

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
    //tesouraria

    public function tesouraria_dashboard(){
        $user = auth()->user();

        return view('tesouraria.dashboard', ['user' => $user]);
    }

    public function perfil_tesoura(){
        $user = auth()->user();

        return view('tesouraria.perfil', ['user' => $user]);
    }

    public function caixa_tesouraria(){
        $user = auth()->user();
        
        $movimentos = Movimento::orderBy('id', 'desc')->get();
        $saldo = Caixa::first();

        return view('tesouraria.caixa', ['user' => $user, 'movimentos' => $movimentos, 'saldo' => $saldo]);
    }

    public function cotas_tesouraria(){
        $user = auth()->user();

        $cotas = Cota::join('users', 'users.id', 'cotas.user_id')->orderBy('name', 'asc')->get();

        $rankings  = Cota::join('users', 'users.id', 'cotas.user_id')->where('ano', date("Y"))->orderBy('valor_total_a_dever', 'desc')->get();

        $search = request('search');
        if($search){
            $rankings_devedores_4  = Cota::join('users', 'users.id', 'cotas.user_id')->select(request('mes'))->where('ano', date("Y"))->orderBy('valor_total_a_dever', 'desc')->limit(4)->get();
        }else{
            $rankings_devedores_4  = Cota::join('users', 'users.id', 'cotas.user_id')->where('ano', date("Y"))->orderBy('valor_total_a_dever', 'desc')->limit(4)->get();
        }


        return view('tesouraria.cotas', ['user' => $user, 'cotas' => $cotas, 'rankings' => $rankings, 'rankings_devedores_4' => $rankings_devedores_4]);

    }



}
