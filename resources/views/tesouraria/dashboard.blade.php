@extends('layouts.tesourarialayout')


@section('content')

            <div class="row" style="padding-top: 30px; padding: 20px; ">
              <div class="row caixa-response" style="padding-top: 80px; padding: 30px;">
                <div class="col-md-6 m-auto">
                    <h4 class="mb-3">Bem vindo, {{$user->name}}</h4>
                    <p>É uma alegria tê-lo como parte do nosso <br> grupo  e contar com a sua dedicação e compromisso com a gestão financeira do grupo Caridade Cristã. Estamos confiantes de que juntos podemos alcançar nossos objetivos e servir melhor nossa comunidade. Este sistema foi criado para tornar o gerenciamento das finanças mais eficiente e transparente, permitindo que você tenha acesso rápido e fácil a informações importantes e relatórios detalhados.</p>
                    <p>Que Deus abençoe!</p>
                </div>
  
                <div class="col-md-6" class="img-fluid" style="background-image: url('/assets1/img/sermon-3.jpg');height: 357px; margin-top: auto; background-color: #92746b; opacity:0.4">
                </div>
            </div>
            </div>
   
  </div>
  @endsection
