@extends('layouts.adminlayout')


@section('content')

<div class="container">
    <h3 style="text-align: center">Gerenciando Logs do Sistema</h3>
</div>

<div class="container-fluid" style="padding-top: 30px">
    <h4 style="text-align: left">Registro de Erros do Sistema</h4>
      <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table" style="text-align: center">
                <thead class="text-primary">
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Codigo de Erro</th>
                    <th>Descriçao</th>
                    <th>Controller</th>
                    <th>Hora</th>
                    <th>Acção</th>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr style="color: black">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$log->nome_usuario}}</td>
                            <td>{{$log->codigo}}</td>
                            <td><textarea id="" cols="30" rows="1" class="form-control">{{$log->descricao}}</textarea></td>
                            <td>{{$log->controller}}</td>
                            <td><input type="datetime-local" value="{{$log->hora_erro}}" class="form-control" disabled></td>
                            <td>{{$log->action}}</td>
                            <td>
                                <form action="/admin/delete_log/{{$log->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                          </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  @endsection
