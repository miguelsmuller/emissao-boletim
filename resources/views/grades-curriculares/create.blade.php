@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Grade Curricular - ' . $tipo->nomeCompleto )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header card-header-inverse">
        <div>
          <h4>Grade Curricular - {{$tipo->nomeCompleto}}</h4>
        </div>
        <div>

          <div class="btn-group bth-header float-right" role="group" aria-label="Basic example">
            <a class="btn btn-small btn-primary" href="{{ URL::route('listarGrauEscolaridade', $tipo->id) }}">Listar Graus de escolaridade</a>
            <div id="containerMenuFuncional">
            </div>
          </div>

        </div>
      </div>
      <div class="card-body">


{!! Form::open(['route' => ['salvarGradeCurricular', $tipo->id], 'method' => 'POST']) !!}

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <div><h4>Componentes Curriculares</h4></div>
      </div>
      <div class="card-body">

      <div class="row">
              @php
                $colCount = 0;
              @endphp

              @foreach($listagem as $registro)

                @php
                $colCount += 1;
                @endphp

                <div class="col-md-3">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="{{$registro->nomeCurto}}" name="componentesCurriculares[{{$registro->id}}]" value="{{$registro->id}}" @if($tipo->componentesCurriculares->contains($registro->id)) checked=checked @endif>
                      <label class="custom-control-label" for="{{$registro->nomeCurto}}">{{$registro->nomeCompleto}}</label>
                    </div>
                  </div>
                </div>

                @php
                if($colCount == 4) echo '</div><div class="row">';
                @endphp

              @endforeach
            </div>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</div>

{!! Form::close() !!}


      </div>
    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')

@endsection

