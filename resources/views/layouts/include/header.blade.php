<header class="ddt-herder">
    <div class="ddt-herder-inner">
        <div class="header-content">
            <div class="header-sidebar-control">
                <button id="sidebarToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="header-custom">
                @yield('header-custom')
            </div>

            <div class="header-commands">
                <div class="ddt-profile-dropdown dropdown" data-dropdown="true">
                    <button class="ddt-profile-dropdown-inner">
                        <div class="ddt-avatar">
                            <div class="ddt-avatar-inner">
                                <img src="https://ui-avatars.com/api/?name={{{ Auth::user()->name }}}&size=300" width="38" height="38">

                                <div class="avatar-information">
                                    <div class="user-name">{{{ Auth::user()->name }}}</div>
                                    <div class="user-description">Perfil de acesso padrão</div>
                                </div>
                            </div>
                        </div>
                        <i class="eva eva-arrow-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <ul>
                            <li><a href="">Configurações</a></li>
                            <li><a href="">Log de Atividades</a></li>
                            <li><a href="{{route('logout')}}">Sair do sistema</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>