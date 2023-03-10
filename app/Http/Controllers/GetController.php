<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class GetController extends Controller
{
    public function index(){

    $response = Http::get('https://liturgia.up.railway.app/');
    $liturgia = $response->json();

     return view('welcome', ['liturgia'=>$liturgia]);
    }

}
