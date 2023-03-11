<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\User;

class UpdateController extends Controller
{
    public function updateAdminPerfil(Request $request){
        $user = auth()->user();
            $request->validate([
                'name' => "required",
                'username' => "required"
            ]);

            if($request->username != $user->username){
                $request->validate([
                    'username' => "required|unique:users"
                ]);
            }

            if ($request->password != $request->password2) {
                return back()->with('erro', 'Palavras passes não coincidem');
            }else{
                if(isset($request->password) && !Hash::check($request->password, $user->password)) {
                    $request->validate([
                        'password' => 'min: 6',
                    ]);
                    $user->update(['password' => Hash::make($request->password)]);
                }
            }

            $user->update(['name' => $request->name]);
            $user->update(['username' => $request->username]);


            return back()->with('sucesso', "Dados Actualizados com Sucesso!");
        
    }
}
