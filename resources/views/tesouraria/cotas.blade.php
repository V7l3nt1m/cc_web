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

        <div class="container-fluid" style="margin-top: 80px">
            <h3 style="text-align: center" style="color:#92746c">Quotização do Ano de {{ date("Y") }}</h3>

            <div class="card ">
            
                  <div class="table-responsive">
                    <table class="table align-items-center ">
                      <tbody>
                        @foreach($cotas as $cota)
                        <tr>
                          <td>
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
                            <td class="align-middle text-sm">
                              <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor a Dever:</p>
                              <input type="number" class="form-control form-control-sm" disabled name="valor_total_a_dever" value="{{ $cota->valor_total_a_dever }}">
                            </div>
                          </td>
                          
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Valor Total Pago:</p>
                              <input type="number" class="form-control form-control-sm" name="valor_total_pago" disabled  value="{{ $cota->valor_total_pago }}">
                            </div>
                          </td>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jan:</p>
                              <input type="number" class="form-control form-control-sm"  name="Jan" value="{{ $cota->Jan }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Fev:</p>
                              <input type="number" class="form-control form-control-sm" name="Fev" value="{{ $cota->Fev }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mar:</p>
                              <input type="number" class="form-control form-control-sm" name="Mar" value="{{ $cota->Mar }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Abr:</p>
                              <input type="number" class="form-control form-control-sm" name="Abr" value="{{ $cota->Abr }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Mai:</p>
                              <input type="number" class="form-control form-control-sm" name="Mai" value="{{ $cota->Mai }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jun:</p>
                              <input type="number" class="form-control form-control-sm" name="Jun" value="{{ $cota->Jun }}">
                            </div>
                          </td>
                        </form> 
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')   
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Jul:</p>
                              <input type="number" class="form-control form-control-sm" name="Jul" value="{{ $cota->Jul }}">
                            </div>
                          </td>
                        </form>
                        <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Ago:</p>
                              <input type="number" class="form-control form-control-sm" name="Ago" value="{{ $cota->Ago }}">
                            </div>
                          </td>
                          </form>
                          <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                            @csrf
                            @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Set:</p>
                              <input type="number" class="form-control form-control-sm" name="Set" value="{{ $cota->Set }}">
                            </div>
                          </td>
                          </form>
                          <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                            @csrf
                            @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Out:</p>
                              <input type="number" class="form-control form-control-sm" name="Out" value="{{ $cota->Out }}">
                            </div>
                          </td>
                          </form>
                          <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                            @csrf
                            @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Nov:</p>
                              <input type="number" class="form-control form-control-sm" name="Nov" value="{{ $cota->Nov }}">
                            </div>
                          </td>
                          </form>
                          <form action="/tesouraria/cotas/update/{{ $cota->id }}" method="POST">
                            @csrf
                            @method('PUT')
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Dez:</p>
                              <input type="number" class="form-control form-control-sm" name="Dez" value="{{ $cota->Dez }}">
                            </div>
                          </td>
                          </form>
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>

        </div>

        
        <div class="container-fluid" style="margin-top: 40px">
                  <h3 style="text-align: center" class="text-sucess">Devedores de {{ date("m/Y") }}</h3>

            <div class="card">
                  <div class="table-responsive">
                    <table class="table align-items-center">
                      <tbody>
                        @foreach($devedores as $cota)
                        <tr>
                          <td class="align-middle text-sm">
                            <h3 class="font-weight-bold mb-0">{{ $loop->index+1 }}#</h3>
                        </td>
                          <td>
                            <div class="d-flex px-1 py-2 align-items-center">
                              
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
                            <td class="align-middle text-sm">
                              <h3 class="font-weight-bold mb-0">{{ number_format($cota->valor_total_a_dever, 2, ',', '.') }} Kz</h3>
                          </td>
                         
                       
                        </tr>
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
                </div>

        </div>
         
  @endsection
