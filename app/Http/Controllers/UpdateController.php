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

    public function updateTesoureiroPerfil(Request $request){
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


    public function lock_user($id){
        $user = auth()->user();
            DB::table('users')->where('id', $id)->update(['estado' => 0]);
            DB::table('sessions')->where('user_id', $id)->delete();
    
            return back()->with('msg', 'Usuario bloqueado com sucesso!');
        }
       


    

    public function unlock_user($id){
        $user = auth()->user();
            DB::table('users')->where('id', $id)->update(['estado' => 1]);
            return back()->with('msg', 'Usuario Desbloqueado com sucesso!');
        }


        public function update(Request $request){
            $user = auth()->user();

            $usuario = User::where('id', $request->id);
            $usuario2 = User::where('id', $request->id)->first();


            $request->validate([
                'nome' => "required",
                'username' => "required",
                'genero' => "required",
                'tipo' => "required",
                'data_nasc' => "required|date"
            ]);

            if($request->username != $usuario2->username){
                $request->validate([
                    'username' => "required|unique:users"
                ]);
            }
            if($request->telefone != $usuario2->telefone){
                $request->validate([
                    'telefone' => "unique:users|integer|min:900000000|max:999999999"
                ]);
            }
            
                    if ($request->hasfile('image') && $request->file('image')->isValid()) {
                        $request->validate([
                            'image' => 'mimes:jpg,bmp,png',
                        ]);
            
                        $requestImage = $request->image;
                                    
                        $requestImage->move(public_path("photo"), $usuario2->photo);
            
                        $usuario->update([
                            'name'  => $request->nome,
                        ]);
            
                                $usuario->update([
                                    'username' => $request->username,
                                ]);
            
                                $usuario->update([
                                    'telefone' => $request->telefone,
                                ]);
                                $usuario->update([
                                    'genero' => $request->genero,
                                ]);
                                    $usuario->update([
                                        'permissao' => $request->tipo,
                                    ]);
                                    $usuario->update([
                                        'data_nasc' => $request->data_nasc,
                                    ]);
                           
                    } else{
                        $usuario->update([
                            'name'  => $request->nome,
                        ]);
            
                                $usuario->update([
                                    'username' => $request->username,
                                ]);
            
                                $usuario->update([
                                    'telefone' => $request->telefone,
                                    ]);
                                    $usuario->update([
                                        'genero' => $request->genero,
                                    ]);
                                    $usuario->update([
                                        'data_nasc' => $request->data_nasc,
                                    ]);

                                    $usuario->update([
                                        'permissao' => $request->tipo,
                                    ]);
                                    
                            
                    }
        
            
                return back()->with('sucesso', 'Dados actualizados com sucesso!');
            
        
        }
        

        public function updateCotaValores(Request $request){

            $caixa = Caixa::orderBy('id', 'desc');

            Cota::find($request->id)->update($request->all());
            
            $cota = Cota::find($request->id);

            $meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

            foreach ($meses as $mes) {
                if(isset($request->$mes)){
                    $cota->valor_total_a_dever-= $request->$mes;
                    $cota->valor_total_pago+= $request->$mes;
                    $cota->save();
                    $caixa->update([
                        
                    ]);
                }
            }
            
               return back();
        }
    
}


