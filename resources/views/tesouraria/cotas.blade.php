@extends('layouts.tesourarialayout')


@section('content')


<div class="container-fluid" style="margin-top: 100px">
      <div class="card">
            <div class="card-body p-3">
              <div class="row gx-4">
                <div class="col-auto my-auto">
                  <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form action="" method="get">
                      <div class="input-group">
                        <h3 style="text-align: center; color: #92746c">Gerenciamento de Quotização</h3>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                  <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                      <li class="nav-item">
                        <form action="/tesouraria/cotas/iniciar" method="POST">
                              @csrf
                              <input type="submit" class="btn bg-gradient-info btn-block" value="Gerar Quotização Anual" style="width: 100%; height: 100%; background: #004d8b; color: white">
                        </form>
                          </div>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
      </div>
    </div>

    {{--
        <div class="container-fluid">
            <h3 style="text-align: left; color:white; margin-top:10px">Ranking Devedores</h3>
            <div class="row">
                  @foreach($rankings_devedores_4 as $devedores4)
                  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-8">
                            <div class="numbers">
                              <p class="text-sm mb-0 text-uppercase font-weight-bold"></p>
                              <h5 class="font-weight-bolder">
                                {{ $devedores4->valor_total_a_dever }} Kz
                              </h5>
                              <p class="mb-0">
                                <span class="text-success text-sm font-weight-bolder"></span>
                                {{ $devedores4->name }}
                              </p>
                            </div>
                          </div>
                          <div class="col-4 text-end">
                              <img src="/photo/{{ $devedores4->photo }}" alt="" style="width: 70px">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>    
                  @endforeach
                </div>
        </div>
        --}}

        <div class="container-fluid">
            <h3 style="text-align: center" class="text-sucess">Quotização do Ano de {{ date("Y") }}</h3>

            <div class="card ">
            
                  <div class="table-responsive">
                    <table class="table align-items-center ">
                      <tbody>
                        @foreach($cotas as $cota)
                        <tr>
                          <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                              <div>
                                @if(isset($cota->photo) && file_exists(public_path("photo/$cota->photo")))
                                <img src="/photo/{{ $cota->photo }}" alt="Country flag" style="width: 70px">
                                @else
                                <img src="/photos/download.png" alt="Country flag" style="width: 70px">
                                @endif                              </div>
                              <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0">Nome:</p>
                                <h6 class="text-sm mb-0">{{ $cota->name }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor a Dever:</p>
                              <h6 class="text-sm mb-0">{{ $cota->valor_total_a_dever }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor Total Pago:</p>
                              <h6 class="text-sm mb-0">{{ $cota->valor_total_a_dever }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jan:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jan }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Fev:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Fev }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mar:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Mar }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Abr:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Abr }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mai:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Mai }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jun:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jun }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jul:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jul }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Ago:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Ago }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Set:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Set }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Out:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Out }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Nov:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Nov }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Dez:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Dez }}</h6>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>

        </div>

        
        <div class="container-fluid">
            <form method="GET">
                  <h3 style="text-align: center" class="text-sucess">Devedores do Mês de 
                        <select name="mes" id="" required>
                        <option value="" disabled selected>Mês</option>
                        <option value="Jan">Jan</option>
                        <option value="Fev">Fev</option>
                        <option value="Mar">Mar</option>
                        <option value="Abr">Abr</option>
                        <option value="Mai">Mai</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Ago">Ago</option>
                        <option value="Set">Set</option>
                        <option value="Out">Out</option>
                        <option value="Nov">Nov</option>
                        <option value="Dez">Dez</option>

                        </select>
                        <button class="btn btn-success" type="submit" style="">Pesquisar</button>
            </div>
                  
                  </h3>
            </form>

            <div class="card ">
                  <div class="table-responsive">
                    <table class="table align-items-center ">
                      <tbody>
                        @foreach($cotas as $cota)
                        <tr>
                          <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                              <div>
                                @if(isset($cota->photo) && file_exists(public_path("photo/$cota->photo")))
                                <img src="/photo/{{ $cota->photo }}" alt="Country flag" style="width: 70px">
                                @else
                                <img src="/photos/download.png" alt="Country flag" style="width: 70px">
                                @endif
                              </div>
                              <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0">Nome:</p>
                                <h6 class="text-sm mb-0">{{ $cota->name }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor a Dever:</p>
                              <h6 class="text-sm mb-0">{{ $cota->valor_total_a_dever }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor Total Pago:</p>
                              <h6 class="text-sm mb-0">{{ $cota->valor_total_a_dever }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jan:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jan }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Fev:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Fev }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mar:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Mar }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Abr:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Abr }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mai:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Mai }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jun:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jun }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jul:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Jul }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Ago:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Ago }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Set:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Set }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Out:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Out }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Nov:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Nov }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Dez:</p>
                              <h6 class="text-sm mb-0">{{ $cota->Dez }}</h6>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>

        </div>
         
  @endsection
