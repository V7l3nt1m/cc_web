@extends('layouts.adminlayout')


@section('content')

            <div class="row" style="padding-top: 30px; padding: 20px; ">
              <div class="row caixa-response" style="padding-top: 80px; padding: 30px;">
                <div class="col-md-6 m-auto">
                    <h4 class="mb-3">Bem vindo, {{$user->name}}</h4>
                    <p>Desejamos para você um bom trabalho!<br> Aqui preparamos um ambiente para que possa trabalhar no seu projecto e interagir com outras pessoas da melhor forma.</p>
                    <p>Então, quais avanços daremos hoje no Projecto?</p>
                </div>
  
                <div class="col-md-6" class="img-fluid" style="background-image: url('/assets1/img/sermon-3.jpg');height: 357px; margin-top: auto; background-color: #92746b; opacity:0.4">
                </div>
            </div>
            </div>
   
  </div>
  @endsection
