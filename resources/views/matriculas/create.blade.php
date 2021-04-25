@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Enturmação - Turma ' . $registro->nomeCompleto )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">

<div class="card-header card-header-inverse">
    <div class="card-header-title">
      <h4>Enturmação - Turma {{$registro->nomeCompleto}}</h4>
    </div>
    <div class="card-header-buttons">
        <a class="btn btn-small btn-primary" href="{{ URL::route('listarTurma') }}">Listar Turmas</a>
        <div id="containerMenuFuncional"></div>
    </div>
</div>


<div class="card-body">
  {!! Form::open(['route' => ['salvarMatricula', $registro->id], 'id'=>"formulario", 'method' => 'POST']) !!}

  <div class="row"> {{-- SELECT INSERÇÃO DE ALUNO --}}
    <div class="col-sm-12">
      <div class="form-group select2-group">
        <div class="input-group">
          <select id="slcProcurarPessoa" class="form-control select2-allow-clear" name="people">
            <option></option>
          </select>
          <div class="input-group-append">
            <button id="cmdMatricularAluno" class="btn btn-success" type="button">Inserir</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row"> {{-- TABLE COM A LISTAGEM DE MATRICULAS --}}
    <div class="col-sm-12">
      <div class="table-responsive">
        <table id="tblListagem" class="table table-striped table-bordered table-hover responsive nowrap mb-10 w-100">
          <thead class="thead-dark">
            <tr>
              <th scope="col" data-priority="3">Matrícula</th>
              <th scope="col" data-priority="1">Nome</th>
              <th scope="col">IUA</th>
              <th scope="col">D. Nascimento</th>
              <th scope="col">Situação</th>
              <th scope="col" data-priority="2">Opções</th>
            </tr>
          </thead>

          <tbody>
            @foreach($registro->pessoas as $pessoa)
              <tr>
                <td>{{ $pessoa->matriculas->id }} </td>
                <td>
                  <input type="hidden" name="novosAlunos[{{ $pessoa->id }}][idPessoa]" value="{{ $pessoa->id }}">
                  <input type="hidden" name="novosAlunos[{{ $pessoa->id }}][dtMatricula]" value="{{ $pessoa->matriculas->dtMatricula }}">
                  {{ $pessoa->nomeCompleto }}
                </td>

                <td>{{ $pessoa->iua }}</td>

                <td>{{ $pessoa->dtNascimento }}</td>

                <td>{{ $pessoa->matriculas->situacao }}</td>

                <td>
                  @php
                    $dropdownTemplate = '<div class="dropdown">
                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdown-'. $pessoa->id .'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opções
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdown-'. $pessoa->id .'">
                        <a class="dropdown-item" href="'. URL::route('formularioPessoa', [$pessoa->id]) .'"><i class="fas fa-edit"></i> Editar</a>
                      </div>
                    </div>';

                    echo ($dropdownTemplate);
                  @endphp
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row"> {{-- RODAPÉ DO FORM --}}
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
  <script>
    /*
    VARIAVEIS GLOBAIS
    */
    let slcProcurarPessoa
    let objPessoaSelecionado
    let tblListagem

    /*
    CONFIGURAÇÃO DO SELECT BOX
    */
    $(document).ready(function() {
      slcProcurarPessoa = $('#slcProcurarPessoa').select2({
        placeholder: "Pesquise aqui por Código, Código INEP, Nome ou CPF",
        minimumInputLength: 3,
        theme: "bootstrap4",
        templateResult: customSelectList,
        templateSelection: customSelectText,
        ajax: {
          delay: 400,
          url: '{{URL::to('ajax/pessoas/')}}',
          data: function (params) {
            return { search: params.term };
          }
        }
      }).on('select2:select', function(e) {
        objPessoaSelecionado = e.params.data;
      });

      tblListagem = $('#tblListagem').DataTable( {
        "rowReorder": true,
        "columnDefs": [
            { targets: 0, width: 20, className: 'reorder'},
            { targets: 4, width: 80, className: "text-center"},
            { targets: 5, width: 65, orderable: false, className: "text-center"},
            { targets: '_all', orderable: true }
        ]
      });

      slcProcurarPessoa.on("select2:open", () => {
        slcProcurarPessoa.on("select2:selecting", () => false);
        setTimeout(() => slcProcurarPessoa.off("select2:selecting"));
      });
    });

    /*
    FUNÇÃO DE INSERÇÃO DO ALUNO NA TABELA
    */
    $( "#cmdMatricularAluno" ).click(function() {
      if (objPessoaSelecionado && objPessoaSelecionado instanceof Object && !objPessoaSelecionado.length) {

        cmdMaisOpcoes = criarDrowpDown(objPessoaSelecionado.id);

        tblListagem.row.add( {
          0: objPessoaSelecionado.attr.iua,
          1: '<input type="hidden" name="novosAlunos['+ objPessoaSelecionado.id +'][idPessoa]" value="'+ objPessoaSelecionado.id +'"><input type="hidden" name="novosAlunos['+ objPessoaSelecionado.id +'][dtMatricula]" value="'+ moment(new Date()).format('DD/MM/YYYY') +'">' + objPessoaSelecionado.text,
          2: objPessoaSelecionado.attr.iua,
          3: objPessoaSelecionado.attr.dtNascimento,
          4: '<input type="hidden" name="novosAlunos['+ objPessoaSelecionado.id +'][situacao]" value="0">' + '<span class="badge badge-primary">Novo</span>',
          5: cmdMaisOpcoes
        } )
        .draw();

        $('#slcProcurarPessoa').val(null).trigger('change');
      }
    });

    function criarDrowpDown(idPessoa){
      templateDropdown = '<div class="dropdown">\
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdown-%IDPESSOA%" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\
          Opções\
        </button>\
        <div class="dropdown-menu" aria-labelledby="dropdown-%IDPESSOA%">\
          <a class="dropdown-item" href="{{ URL::route('formularioPessoa') }}/%IDPESSOA%"><i class="fas fa-edit"></i> Editar</a>\
        </div>\
      </div>';

      return templateDropdown.replace(/%IDPESSOA%/g, idPessoa);
    };

    /*
    FUNÇÃO DE EXIBIÇÃO PERSONALIZADA DA LISTA DO SELECT BOX
    */
    function customSelectList (item) {
      if (!item.id) {
        return item.text;
      }

      var $contentHTML = '<div style="line-height: 15px;"><b>' + item.text + '</b></div>';

      if ((item.attr.iua) || (item.attr.cpf) || (item.attr.dtNascimento)){
        $contentHTML += '<div style="line-height: 15px;">';
          if (item.attr.iua) { $contentHTML += '<span style="font-size: 11px;"><b>UIA</b>: ' + item.attr.iua + '</span> | ' }
          if (item.attr.cpf) { $contentHTML += '<span style="font-size: 11px;"><b>CPF</b>: ' + item.attr.cpf + '</span> | ' }
          if (item.attr.dtNascimento) { $contentHTML += '<span style="font-size: 11px;"><b>D.Nascimento</b>: ' + item.attr.dtNascimento + '</span>' }
        $contentHTML += '</div>';
      }

      return $( $contentHTML );
    };

    /*
    FUNÇÃO DE EXIBIÇÃO PERSONALIZADA DO TEXTO DO SELECT BOX
    */
    function customSelectText (item) {
      if (!item.id) {
        return item.text;
      }

      var $contentHTML = '<b>' + item.text + '</b> (' + item.attr.dtNascimento + ')'

      return $( $contentHTML );
    };
  </script>
@endsection