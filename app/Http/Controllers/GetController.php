<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;

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

}
