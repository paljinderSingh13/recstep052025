@include('leagues.Components.head')
<div id="main-wrapper" class="show">
@if(request()->is('player/dashboard2'))
    @include('leagues.Components.header')
@elseif(request()->is('leagues'))
    @include('leagues.Components.header_verticle')
@elseif(request()->is('dashboard4'))
    @include('leagues.Components.header4')
@elseif(request()->is('dashboard5'))
    @include('leagues.Components.header5')
@else
    @include('leagues.Components.header_verticle')
@endif
@if(auth()->user()->role == 'master')
    @include('leagues.Components.sidebar')

@else 
	@if(request()->is('leagues') || request()->is('leagues/create') || request()->routeIs('leagues.index') || request()->routeIs('league.profile.index'))
        <h1> helllo leagues helllo leagues</h1>		
    @include('Components.clubsidebar')
    @elseif(request()->is('league/setup') )
    		@include('Components.clubsidebar') 		 
	@elseif(request()->is('leagues', 'leagues/*') && !request()->is('leagues/create') && !request()->is('league/setup') && !request()->routeIs('league.profile.index'))
	    @include('leagues.Components.leagueSidebar')
	@else
    @include('leagues.Components.leagueSidebar')
	@endif
		
@endif

@yield('content')
@include('leagues.Components.footer')