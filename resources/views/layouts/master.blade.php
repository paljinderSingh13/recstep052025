@include('Components.head')
<div id="main-wrapper" class="show">
@if(request()->is('player/dashboard2'))
    @include('Components.header')
@elseif(request()->is('leagues'))
    @include('Components.header_verticle')
@elseif(request()->is('dashboard4'))
    @include('Components.header4')
@elseif(request()->is('dashboard5'))
    @include('Components.header5')
@else
    @include('Components.header_verticle')
@endif
@if(auth()->user()->role == 'master')
    @include('Components.sidebar')

@else 

    @include('Components.clubsidebar')
@endif

@yield('content')
@include('Components.footer')