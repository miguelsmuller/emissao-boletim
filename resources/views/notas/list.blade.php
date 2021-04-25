@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Lançamento de Notas - ' . $data['turma']->nomeCompleto . ' - ' . $data['componente']->nomeCompleto)

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">

<div class="card-header card-header-inverse">
    <div class="card-header-title">
      <h4>Laçamento de notas - {{$data['componente']->nomeCompleto}} - Turma {{$data['turma']->nomeCompleto}}</h4>
    </div>
    <div class="card-header-buttons">
        <a class="btn btn-small btn-primary" href="{{ URL::route('selecionarNota', [$data['turma']->id]) }}">Selecionar Matéria</a>
        <div id="containerMenuFuncional"></div>
    </div>
</div>

<div class="card-body">
  {!! Form::open(['route' => ['salvarNota', $data['turma']->id, $data['componente']->id], 'id'=>"formulario",'method' => 'POST']) !!}
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" class="align-middle text-center" style="width: 35%;">Nome do Aluno</th>
            @foreach($data['periodo'] as $periodo)
              <th colspan="2" class="text-center" style="width: 13%;"> {{ $periodo->nome }} </th>
            @endforeach
            <th colspan="2" class="text-center" style="width: 13%;">Total</th>
          </tr>
          <tr>
            @foreach($data['periodo'] as $periodo)
              <th>Nota</th>
              <th>Faltas</th>
            @endforeach

            <th>Nota</th>
            <th>Faltas</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['turma']->pessoas as $pessoa)
            <tr>
              <td>
                <input type="hidden" name="periodo[{{$periodo->id}}][{{$pessoa->matriculas->id}}][nota]" value="{{ $pessoa->matriculas->id }}">
                {{$pessoa->matriculas->id}} - {{ $pessoa->id }} - {{ $pessoa->nomeCompleto }}
              </td>

              @php
              $count = 1;
              @endphp

              @foreach($data['periodo'] as $periodo)
                @php
                  $tabindex = $periodo->id . $count;

                  $nameNota = 'periodo['. $periodo->id . '][' . $pessoa->matriculas->id .'][nota]';
                  $nameFalta = 'periodo['. $periodo->id . '][' . $pessoa->matriculas->id .'][falta]';

                  $nota = '0';
                  $falta = '0';

                  if ( isset($data['notas'][$pessoa->matriculas->id][$periodo->id]['nota']) ) {
                    $nota = $data['notas'][$pessoa->matriculas->id][$periodo->id]['nota'];
                  }

                  if ( isset($data['notas'][$pessoa->matriculas->id][$periodo->id]['falta']) ) {
                    $falta = $data['notas'][$pessoa->matriculas->id][$periodo->id]['falta'];
                  }
                @endphp

                <td>
                  <input type="text" class="form-control form-control-sm" tabindex="{{$tabindex . '1'}}" name="{{ $nameNota }}" value="{{ old( 'nomeCurto', $nota) }}">
                </td>

                <td>
                  <input type="text" class="form-control form-control-sm" tabindex="{{$tabindex . '2'}}" name="{{ $nameFalta }}" value="{{ old( 'nomeCurto', $falta) }}">
                </td>

                  @php
                  $count += 1;
                  @endphp
              @endforeach

              <td><input type="text" class="form-control form-control-sm" disabled></td>

              <td><input type="text" class="form-control form-control-sm" disabled></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Salvar</button>

  {!! Form::close() !!}
</div>


    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')

@endsection