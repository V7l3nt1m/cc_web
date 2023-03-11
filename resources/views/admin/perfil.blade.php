@extends('layouts.adminlayout')


@section('content')

    <div class="card-body p-3" style="margin-top: -5px">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="/photos/admin.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{$user->name}}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
            Administrador do Sistema
            </p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <form action="/admin/perfil/actualizar" method="POST" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Editar Perfil</p>
              <button class="btn btn-primary btn-sm ms-auto">Actualizar</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Informações do Usuário</p>
            <div class="row">
                    @csrf
                    @method('PUT')
                
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nome</label>
                  <input class="form-control" type="text" name="name" required value="{{$user->name}}" class="@error('name') is-invalid @enderror">
                </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Nome de usuário</label>
                      <input class="form-control" type="text" name="username" required value="{{$user->username}}" class="@error('username') is-invalid @enderror">
                    </div>
                  </div>
                 
              </div>

              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Redefinir Palavra-Passe</label>
                  <input class="form-control" type="password" name="password" class="@error('password') is-invalid @enderror">
                </div>
                </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Palavra-Passe Novamente</label>
                      <input class="form-control" type="password" name="password2" class="@error('password') is-invalid @enderror">
                    </div>
                  </div>
                 
              </div>
            </div>
            
        </form>
            
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
           
@endsection
