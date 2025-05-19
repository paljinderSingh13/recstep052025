<!--**********************************
    Sidebar start
***********************************-->
@php
    $slug = session('slug');
    $current_league = session('current_league');
    
    if (!$slug) {
        $slug = 'url';
    }
@endphp
<div class="ic-sidenav">
    <div class="">
        <div class="user-profile">
            <div class="p-2 border-bottom text-center">
                @auth
                    <!-- Check if user has profile picture -->
                    @if($current_league['logo'])
                        <img style="width: 90px;" src="{{ asset($current_league['logo']) }}" class="img-fluid mt-2 rounded-circle" alt="User profile picture">
                    @else
                       <img style="width: 90px;" src="{{ asset('assets/images/dummyUser.jpg') }}" class="img-fluid mt-2 rounded-circle" alt="User profile picture">
                    @endif
                    
                    <!-- Display user's full name if available -->
                    <h5 class="font-weight-bold text-dark mb-1 mt-3 nav-text">
                        &nbsp; 
                        @if($current_league['name'])
                            {{ $current_league['name'] }}
                        @endif
                    </h5>
                    
                    <!-- Display organization if available, otherwise show role or generic text -->
                    <p class="mb-0 text-muted nav-text">
                        {{ $current_league['sport'] }} 
                    </p>
                @else
                    <!-- Display for non-authenticated users -->
                    <div style="width: 90px; height: 90px;" class="d-inline-block mt-2 rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center">
                        <i class="fas fa-user"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mb-1 mt-3 nav-text">Guest</h5>
                    <p class="mb-0 text-muted nav-text">Please log in</p>
                @endauth
            </div>
        </div>
        <ul class="metismenu p-0" id="league-menu">
            <li class="{{ request()->routeIs('leagues.show.url') ? 'mm-active' : '' }}">
                <a href="{{ route('leagues.show.url', $slug) }}" class="{{ request()->routeIs('leagues.show.url') ? 'mm-active' : '' }}">
                    <i class="las la-home"></i>
                    <span class="nav-text">League Home</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('commissioner.index') ? 'mm-active' : '' }}">
                <a href="{{ route('commissioner.index', $slug) }}" class="{{ request()->routeIs('commissioner.index') ? 'mm-active' : '' }}">
                    <i class="las la-tools"></i>
                    <span class="nav-text">Commissioner Tool</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('standing.index') ? 'mm-active' : '' }}">
                <a href="{{ route('standing.index', $slug) }}" class="{{ request()->routeIs('standing.index') ? 'mm-active' : '' }}">
                    <i class="las la-list-ol"></i>
                    <span class="nav-text">Standings</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('league.schedule.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.schedule.index', $slug) }}" class="{{ request()->routeIs('league.schedule.index') ? 'mm-active' : '' }}">
                    <i class="las la-calendar"></i>
                    <span class="nav-text">Schedule</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('league.division.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.division.index', $slug) }}" class="{{ request()->routeIs('league.division.index') ? 'mm-active' : '' }}">
                    <i class="las la-layer-group"></i>
                    <span class="nav-text">Divisions</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('league.teams.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.teams.index', $slug) }}" class="{{ request()->routeIs('league.teams.index') ? 'mm-active' : '' }}">
                    <i class="las la-users"></i>
                    <span class="nav-text">Teams</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('league.fields.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.fields.index', $slug) }}" class="{{ request()->routeIs('league.fields.index') ? 'mm-active' : '' }}">
                    <i class="las la-map-marked-alt"></i>
                    <span class="nav-text">Fields/Directions</span>
                </a>
            </li>
            <!-- <li class="{{ request()->routeIs('league.game.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.game.index', $slug) }}" class="{{ request()->routeIs('league.game.index') ? 'mm-active' : '' }}">
                    <i class="las la-futbol"></i>
                    <span class="nav-text">Games</span>
                </a>
            </li> -->
         <!--    <li class="{{ request()->routeIs('league.player.index') ? 'mm-active' : '' }}">
                <a href="{{ route('league.player.index', $slug) }}" class="{{ request()->routeIs('league.player.index') ? 'mm-active' : '' }}">
                    <i class="las la-user-friends"></i>
                    <span class="nav-text">Players</span>
                </a>
            </li> -->
            <li class="{{ request()->routeIs('message.board') ? 'mm-active' : '' }}">
                <a href="{{ route('message.board', $slug) }}" class="{{ request()->routeIs('message.board') ? 'mm-active' : '' }}">
                    <i class="las la-comments"></i>
                    <span class="nav-text">Message Boards</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('referee.position.assign') ? 'mm-active' : '' }}">
                <a href="{{ route('referee.position.assign', $slug) }}" class="{{ request()->routeIs('referee.position.assign') ? 'mm-active' : '' }}">
                    <i class="las la-user-shield"></i>
                    <span class="nav-text">Umpires</span>
                </a>
            </li>
            <li class="{{ (request()->is('news*') || request()->is('#news')) ? 'mm-active' : '' }}">
                <a href="#news" class="{{ (request()->is('news*') || request()->is('#news')) ? 'mm-active' : '' }}">
                    <i class="las la-newspaper"></i>
                    <span class="nav-text">News</span>
                </a>
            </li>
            <li class="{{ (request()->is('contact-us*') || request()->is('#contact-us')) ? 'mm-active' : '' }}">
                <a href="#contact-us" class="{{ (request()->is('contact-us*') || request()->is('#contact-us')) ? 'mm-active' : '' }}">
                    <i class="las la-envelope"></i>
                    <span class="nav-text">Contact Us</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->