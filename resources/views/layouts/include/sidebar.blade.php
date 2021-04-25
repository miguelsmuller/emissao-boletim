<div class="page-app-sidebar">
  <div id="" class="page-app-sidebar-inner">
    <div class="app-title">
        <img src="{{ URL::asset('images/logo-ddt.png')}}" width="30" height="30"><a href="{{route('dashboard')}}">{{ config('app.name') }}</a>
    </div>
    <div class="more-apps">
        <i class="eva eva-grid-outline"></i> Aplicativos
    </div>
    <div class="main-menu">



      <div class="ddt-menu-inner">
        <ul>
          @if( Auth::user()->hasrole(['administrador', 'diretor', 'administrativo']) )
            <li class="menu-header">Secretaria</li>
            <li class="menu-item">
              <a href="{{route('dashboard')}}" class="{{ route::is('dashboard') ? 'active' : '' }}"><i class="eva eva-options-outline"></i> Dashboard</a>
            </li>

            <li class="menu-item">
              <a href="{{route('listarPessoa')}}" class="{{ route::is('listarPessoa') ? 'active' : '' }}"><i class="eva eva-person-outline"></i> Pessoas</a>
            </li>

            <li class="menu-item">
              <a href="{{route('listarTurma')}}" class="{{ route::is('listarTurma') ? 'active' : '' }}"><i class="eva eva-people-outline"></i> Turmas</a>
            </li>
          @endif

          @if( Auth::user()->hasrole(['administrador', 'diretor']) )
            <li class="menu-header">Direção</li>
            <li class="menu-item">
              <a href="{{route('listarTipoPeriodoAvaliativo')}}" class="{{ route::is('listarTipoPeriodoAvaliativo') ? 'active' : '' }}"><i class="eva eva-calendar-outline"></i> Períodos Avaliativos</a>
            </li>

            <li class="menu-item"><a href="{{route('listarTurno')}}" class="{{ route::is('listarTurno') ? 'active' : '' }}"><i class="eva eva-bell-outline"></i> Turnos</a></li>

            <li class="menu-item"><a href="{{route('listarComponenteCurricular')}}" class="{{ route::is('listarComponenteCurricular') ? 'active' : '' }}"><i class="eva eva-book-outline"></i> Comp. Curriculares</a></li>

            <li class="menu-item"><a href="{{route('listarGrauEscolaridade')}}" class="{{ route::is('listarGrauEscolaridade') ? 'active' : '' }}"><i class="eva eva-bar-chart-2"></i> Graus de Escolaridade</a></li>
          @endif

          @if( Auth::user()->hasrole(['administrador']) )
            <li class="menu-header">Administração</li>
            <li class="menu-item">
              <a href="{{route('listarEscola')}}" class="{{ route::is('listarEscola') ? 'active' : '' }}"><i class="eva eva-home-outline"></i> Escolas</a>
            </li>

            <li class="menu-item"><a href="{{route('listarUsuario')}}" class="{{ route::is('listarUsuario') ? 'active' : '' }}"><i class="eva eva-shield-outline"></i> Usuários</a></li>

            <!-- <li class="menu-item"><a href="" class=""><i class="eva eva-lock-outline"></i> Acessos</a></li> -->

            <li class="menu-item"><a href="{{route('components')}}" class=""><i class="eva eva-browser-outline"></i> Componentes</a></li>
          @endif


        </ul>
      </div>


    </div>
  </div>
</div>
