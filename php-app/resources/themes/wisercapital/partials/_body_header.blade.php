<header class="main-header">
    @if(Auth::user())
        @if(Auth::user()->hasRole(\App\Models\Role::TYPE_HOST_FACILITIES))
            {!! MenuBuilder::renderMenu('host-facility', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @elseif(Auth::user()->hasRole(\App\Models\Role::TYPE_INVESTOR))
            {!! MenuBuilder::renderMenu('investor', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @elseif(Auth::user()->hasRole(\App\Models\Role::TYPE_SOLAR_INTEGRATOR) && !(Request::is('hf/*')))
            {!! MenuBuilder::renderMenu('solar-installer', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @elseif(Auth::user()->hasRole(\App\Models\Role::TYPE_SOLAR_INTEGRATOR) && (Request::is('hf/*')))
            {!! MenuBuilder::renderMenu('host-facility', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @elseif(Request::is('hf/*') )
            {!! MenuBuilder::renderMenu('host-facility', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @elseif(Auth::user()->hasRole('admins'))
            {!! MenuBuilder::renderMenu('home', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @else
            {!! MenuBuilder::renderMenu('Blank', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
        @endif
    @else
        {!! MenuBuilder::renderMenu('home', false, 'App\Handlers\BootstrapTopNavHandler')  !!}
    @endif
</header>
