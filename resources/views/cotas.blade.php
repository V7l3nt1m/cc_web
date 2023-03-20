@extends('layouts.mainlayout')

@section('content')

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

<p style="text-align: right">Não estavam a espera dessa!</p>

@endsection