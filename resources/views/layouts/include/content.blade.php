<div class="page-app-content-inner">
    @if(Session::has('message'))
        <div class="alert alert-dark" role="alert">{!! Session::get('message') !!}</div>
    @endif

    @yield('content')
</div>