@extends('layouts.print')

{{-- TÍTULO --}}
@section('title', 'Impressão de boletim')

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
@foreach ($notas as $nota)
  <span class="page-h1">Boletim Escolar - 2018</span>

  <span class="page-h2">Unidade Escolar</span>
  <table class="table table-sm small">
    <tbody>
      <tr>
        <td><strong>Nome:</strong> Centro Municipal de Ensino São José</td>
        <td><strong>INEP:</strong> 12016365</td>
      </tr>
      <tr>
        <td><strong>Endereço:</strong> Estrada da Vendinha, S/N</td>
        <td><strong>Telefone:</strong> (24)3332-1717 Ramal 414</td>
      </tr>
    </tbody>
  </table>

  <span class="page-h2">Dados Pessoais</span>
  <table style="width: 100%;" class="table table-sm small">
    <tbody>
      <tr>
        <td colspan="6"><strong>Aluno:</strong> {{ $nota['matricula']['pessoa']['nomeCompleto'] }}</td>
      </tr>
      <tr>
        <td colspan="3"><strong>Matrícula:</strong>{{-- $nota['matricula']['nome_matricula'] --}}</td>
        <td colspan="3"><strong>IUA:</strong> {{ $nota['matricula']['pessoa']['iua'] }}</td>
      </tr>
      <tr>
        <td colspan="2"><strong>Escolaridade:</strong> {{ $turma['grau_escolariade']['nomeCompleto'] }}</td>
        <td colspan="2"><strong>Turma:</strong> {{ $turma['nomeCompleto'] }}</td>
        <td colspan="2"><strong>Turno:</strong> {{ $turma['turno']['nomeCompleto'] }}</td>
      </tr>
    </tbody>
  </table>

  <span class="page-h2">Desempenho Acadêmico</span>
  <table style="width: 100%;" class="table table-bordered table-sm table-boletim small">
    <thead class="thead-light text-center">
      <tr>
        <th rowspan="2" class="align-middle">Disciplina</th>
        <th colspan="2"><small>1º Bimestre</small></th>
        <th colspan="2"><small>2º Bimestre</small></th>
        <th colspan="2"><small>3º Bimestre</small></th>
        <th colspan="2"><small>4º Bimestre</small></th>
        <th rowspan="2" class="align-middle">M.F.</th>
        <th rowspan="2" class="align-middle">%F.A.</th>
        <th rowspan="2" class="align-middle">Resultado Final</th>
      </tr>
      <tr>
        <th><small>Média</small></th>
        <th><small>Faltas</small></th>
        <th><small>Média</small></th>
        <th><small>Faltas</small></th>
        <th><small>Média</small></th>
        <th><small>Faltas</small></th>
        <th><small>Média</small></th>
        <th><small>Faltas</small></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($nota['componentes'] as $componente)
        <tr class="align-middle">
          <td><small>{{ $componente['componenteData']['nomeCompleto'] }}<small></td>
          @foreach ($componente['periodos'] as $periodo)
            <td class="align-middle text-center">{{ $periodo['nota'] }}</td>
            <td class="align-middle text-center">{{ $periodo['falta'] }}</td>
          @endforeach
          <td class="align-middle text-center">MF</td>
          <td class="align-middle text-center">FA</td>
          <td class="align-middle text-center">RS</td>
          </tr>
      @endforeach
    </tbody>
  </table>

  <div style="page-break-after: always;"></div>
@endforeach
@endsection
