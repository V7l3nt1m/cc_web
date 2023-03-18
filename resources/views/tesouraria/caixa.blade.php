@extends('layouts.tesourarialayout')


@section('content')

<h3 style="text-align: center; color:white">Gerenciamento da Caixa</h3>


            <div class="row" style="padding-top: 30px; padding: 20px; ">

              <div class="col-lg-6">
                <div class="col-md-1"></div>
                <div class="col-md-9">

                  <h4 style="text-align: center; color:white">Total em Caixa</h3>

                  <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                      <span class="mask bg-gradient-dark"></span>
                      <div class="card-body position-relative z-index-1 p-3">
                        <i class="fas fa-wifi text-white p-2"></i>
                        <h2 class="text-white mt-4 mb-6 pb-1" style="margin-left:20px">{{ number_format($saldo->saldo_atual, 2, ',', '.') }} Kz</h5>
                        <div class="d-flex">
                          <div class="d-flex">
                            <div class="me-4">
                              <p class="text-white text-sm opacity-8 mb-0">Titular</p>
                              <h6 class="text-white mb-0">Caridade Cristã</h6>
                            </div>
                            
                          </div>
                          <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                            <img class="w-60 mt-2" src="/assets/img/logos/mastercard.png" alt="logo">
                          </div>
                        </div>
                      </div>
              </div>
                </div>
              </div>


                  
                    <div class="col-lg-6">
                      <div class="col-md-12">
                        <h4 style="text-align: center; color:white"><a href="#">Tabela de Movimentos</a></h3>
                                <div class="card" id="tabela-custom">
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                  <tbody>
                                    @foreach ($movimentos as $movimento) 
                                        <tr>
                                          <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                              <div class="ms-4">
                                                <p class="text-xs font-weight-bold mb-0">Tipo:</p>
                                                <h6 class="text-sm mb-0">{{ $movimento->tipo_movimento }}</h6>
                                              </div>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="text-center">
                                              <p class="text-xs font-weight-bold mb-0">Valor:</p>
                                              <h6 class="text-sm mb-0">{{ $movimento->valor_movimento }} Kz</h6>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="text-center">
                                              <p class="text-xs font-weight-bold mb-0">Data:</p>
                                              <h6 class="text-sm mb-0">{{ $movimento->data_atualizacao }}</h6>
                                            </div>
                                          </td>
                                          <td class="align-middle text-sm">
                                            <div class="col text-center">
                                              <p class="text-xs font-weight-bold mb-0">Saldo:</p>
                                              <h6 class="text-sm mb-0">{{ $movimento->saldo }}</h6>
                                            </div>
                                          </td>
                                          <td>
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <button type="button" class="btn btn-primary" style="background: #92746b" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="{{ $movimento->descricao }}" data-bs-trigger="focus">
                                                    Descrição
                                                  </button>
                                              </div>
                                          </td>
                                        </tr>
                                    @endforeach
                                    
                                    
                                  </tbody>
                                </table>
                              </div>
                              </div>
                            </div>
                      </div>
                     
                  
                  
                  <div class="container-fluid">
                    
                      <div class="row">
                        <div class="col-lg-11">
                          
                          <div class="col-md-5">
                            <h4 style="text-align: center; color: #92746b">Operações</h3>

                          
                            <div class="row">

                              <div class="col-6">
                                
                                <div class="col-md-6">
                                  
                                  <button type="button" style="border:none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      <div class="card">
                                          <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                              <i class="fas fa-plus opacity-10"></i>
                                            </div>
                                          </div>
                                          <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Adicionar</h6>
                                          </div>
                                        </div>
                                  </button>
                              </div>
                              </div>
                                
                              <div class="col-6">
                                <div class="col-md-2"></div>
                                    <button type="button" style="border:none" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                              <div class="icon icon-shape icon-lg bg-gradient-danger shadow text-center border-radius-lg">
                                                <i class="fas fa-minus opacity-10"></i>
                                              </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                              <h6 class="text-center mb-0">Retirar</h6>
                                            </div>
                                          </div>
                                    </button>
                      
                                </div>
                              </div>
                                
                            </div>
                      
                        </div>
                        </div>
                        
                                      </div>
                  </div>
        
                  


                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Registrar Entrada</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="/tesouraria/caixa/movimento" method="POST">
                            @csrf
                            @method('POST')
                           
                                        
                            <div class="form-group">
                                <div class="input-group">
                                            <input type="number" class="form-control form-control-lg" required name="valor" placeholder="Valor" class="@error('valor') is-invalid @enderror">
                                        </div>
                                        </div>
                                   

                            <div class="form-group">
                                
                                <div class="input-group">
                                    <textarea name="descricao" id="" cols="30" rows="10" class="form-control form-control-lg" placeholder="Descrição do movimento" class="@error('descricao') is-invalid @enderror">
                                    Descrição (opcional)
                                    </textarea>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn bg-gradient-primary" name="accao" value="add">Registrar</button>
                        </div>
                    </form>

                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Registrar Saidas</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="/tesouraria/caixa/movimento" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">          
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-lg" required name="valor" placeholder="Valor" class="@error('valor') is-invalid @enderror">
                                        </div>
                            </div>

                            <div class="form-group">
                                
                                <div class="input-group">
                                    <textarea name="descricao" id="" cols="30" rows="10" class="form-control form-control-lg" placeholder="Descrição do movimento" class="@error('descricao') is-invalid @enderror">
                                    Descrição (opcional)
                                    </textarea>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn bg-gradient-primary" name="accao" value="subtract">Registrar</button>
                        </div>
                    </form>

                      </div>
                    </div>
                  </div>
            
  @endsection

