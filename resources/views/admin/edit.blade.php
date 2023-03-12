@extends('layouts.adminlayout')


@section('content')

<div class="background">
    <div class=" d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class=" mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h3>Actualizando: {{$usuario->name}}</h3>
            <h6 class="font-weight-light" style="
            margin-top: 20px !important;
        ">Preencha os dados corretamente.</h6>
              <form class="pt-3" method="POST" action="/admin/update/{{$usuario->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" class="@error('nome') is-invalid @enderror" required name="nome" id="input-field" placeholder="Nome Completo" onkeyup="validate();" value="{{$usuario->name}}">
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="telefone" class="form-control form-control-lg" class="@error('telefone') is-invalid @enderror" placeholder="Telefone" value="{{$usuario->telefone}}">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select required name="tipo" id="" class="form-control form-control-lg" class="@error('tipo') is-invalid @enderror">
                            <option disabled>Função</option>
                            <option value="normal" {{$usuario->permissao == "normal" ? 'selected=selected' : ''}}>Normal</option>
                            <option  value="coordenador" {{$usuario->permissao == "coordenador" ? 'selected=selected' : ''}}>Coordenador</option>
                            <option  value="vice-coordeandor" {{$usuario->permissao == "vice-coordeandor" ? 'selected=selected' : ''}}>Vice-Coordenador</option>
                            <option  value="secretario" {{$usuario->permissao == "secretario" ? 'selected=selected' : ''}}>Secretario</option>
                            <option  value="tesoureiro" {{$usuario->permissao == "tesoureiro" ? 'selected=selected' : ''}}>Tesoureiro</option>
                        </select>
                    </div>
                </div>

            </div>

                 
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg" required class="@error('username') is-invalid @enderror" required name="username" placeholder="Nome de usuário" title="username de inicio de sessão" value="{{$usuario->username}}">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <select name="genero" required class="form-control form-control-lg" class="@error('genero') is-invalid @enderror">
                          <option value="" disabled selected>Genero</option>
                          <option value="masculino" {{$usuario->genero == "masculino" ? 'selected=selected' : ''}}>Masculino</option>
                          <option value="feminino" {{$usuario->genero == "feminino" ? 'selected=selected' : ''}}>Feminino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="date" class="form-control form-control-lg" name="data_nasc" class="@error('data_nasc') is-invalid @enderror" required value="{{date("Y-m-d", strtotime($usuario->data_nasc))}}">
                      </div>
                    </div>
                  </div>

                  

                        <div class="form-group">
                            <input type="file" id="image" name="image" class="form-control form-control-lg" class="@error('imagem') is-invalid @enderror" accept="image/*"
                                                onchange="updatePreview(this, 'image-preview')" onchange="isImagem(this)"  placeholder="Foto meio corpo" title="Faça o upload de uma fotografia meio corpo" data-toggle="tooltip"  data-placement="top" >
                          </div>

                          <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                              <label for="">Previsualização da Imagem</label>
                              <img id="image-preview"
                              class="img-fluid img-thumbnail rounded d-block" src="/photo/{{$usuario->photo}}" width="400px">
                            </div>
                            <div class="col-md-3"></div>
                          </div>

                          <div class="mt-3">
                          

                              <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Actualizar</button>


                           
                            </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>



    </div>

          
@endsection
