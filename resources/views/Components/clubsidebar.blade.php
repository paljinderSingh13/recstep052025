                            

<!--**********************************
            Sidebar start
            ***********************************-->
            <div class="ic-sidenav">
                <div class="">

                    <div class="user-profile">
                        <div class="p-2 border-bottom text-center">
                            <img style="width: 90px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
                            <h5 class="font-weight-bold text-dark mb-1 mt-3 nav-text">John Deo</h5>
                            <p class="mb-0 text-muted nav-text">SLS Youth Soccer</p>
                        </div>
                    </div>
                    <ul class="metismenu p-0" id="menu">
                        
                        @if(auth()->user()->role == 'player')
                        <li>
                            <a class="" href="{{ route('dashboard3') }}" >
                                <!-- <i class="flaticon-home"></i> -->
                                <i class="las la-tachometer-alt"></i>
                                <span class="nav-text">Dashboard </span>
                            </a>
                        </li>
                        @else
                        <li>
                            <a class="" href="{{ route('dashboard3') }}" >
                                <!-- <i class="flaticon-home"></i> -->
                                <i class="las la-tachometer-alt"></i>
                                <span class="nav-text">Dashboard </span>
                            </a>
                        </li>
                        @endif
                    <!-- <li>
                            <a class="" href="{{ route('player.dashboard') }}" >
                            <i class="fa-solid fa fa-home"></i>
                            <span class="nav-text">Player Dashboard </span>
                        </a>
                        
                    </li> -->
                    <li>
                        <a class="" href="{{ route('club.dashboard') }}" >
                            <!-- <i class="flaticon-home"></i> -->
                            <i class="las la-tools"></i>
                            <span class="nav-text">Management </span>
                        </a>
                        
                    </li>

                    @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                    <li class="{{ request()->is('club-administrator*') ? 'mm-active' : '' }}"><a href="{{ route('club.adm') }}" class="{{ request()->is('club-administrator*') ? 'mm-active' : '' }}" aria-expanded="false">
                        <!-- <i class="flaticon flaticon-user-1"></i> -->
                        <i class="las la-user-shield"></i>
                        <span class="nav-text">Club Administrators</span>
                    </a>                        
                </li>
                @endif
                <li class="{{ request()->is('team*') ? 'mm-active' : '' }}"><a href="javascript:void(0);" class="has-arrow {{ request()->is('team*') ? 'mm-active' : '' }}" aria-expanded="false">
                    <!-- <i class="flaticon flaticon-user"></i> -->
                    <i class="las la-users"></i>
                    <span class="nav-text">Teams</span>
                </a>
                <ul aria-expand="false">
                    <li><a href="{{route('team.allTeamDashboard')}}">All Teams</a></li>
                    <li><a href="{{route('team.team_administrator')}}">All Team Administrator</a></li>
                            <!-- <li><a href="#" class="has-arrow" aria-expanded="false">Players</a>
                                <ul aria-expanded="false">
                                    <li><a href="#">Player Administrator</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="#">Roster</a></li>
                            <li><a href="{{route('schedule.show')}}">All Schedules - Old</a></li> -->
                            <li><a href="{{route('team.schedule.show.calander')}}">All Schedules</a></li>
                            
                        </ul>
                    </li>
                    <li class="{{ request()->is('players*') ? 'mm-active' : '' }}"><a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
                        <!-- <i class="flaticon-cms"></i> -->
                        <i class="las la-user-friends"></i>
                        <span class="nav-text">Players</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('player.index')}}">All Players</a></li>
                        <li><a href="{{route('player.add')}}">New Player </a></li><li><a href="{{route('player.administrator.list')}}">Player Administrator </a></li>
                        <!-- <li><a href="#">List</a></li> -->

                    </ul>
                </li>
                <li class="club-info">
                    <a class="d-flex align-items-center" href="#" >
                      @if(auth()->user()->club)
                      <img src="{{asset(auth()->user()->club['logo'])}}" class="rounded-circle">
                      <span class="fs-16 fw-bolder nav-text mt-1 ms-2">{{auth()->user()->club['name']}} </span>
                      @endif
                  </a>                
              </li>
              @if(request()->is('leagues'))
              <li>
                <a class="" href="#" >
                 <i class="las la-home"></i>
                 <span class="nav-text">My Profile </span>
             </a>
         </li>
         <li>
           <a class="" href="#" >
            <i class="las la-futbol"></i>
            <span class="nav-text">My Teams/Leagues </span>
        </a>
    </li>
    <li>
       <a class="" href="#" >
        <i class="las la-money-bill"></i>
        <span class="nav-text">Payment History</span>
    </a>
</li>
<li>
   <a class="" href="#" >
    <i class="las la-users"></i>
    <span class="nav-text">My Children</span>
</a>
</li>
@endif
<li>
   <a class="" href="{{route('leagues.create')}}" >
    <i class="las la-plus-circle"></i>
    <span class="nav-text">Create/Join League</span>
</a>
</li>
<li>
   <a class="" href="{{route('leagues.index')}}" >
    <i class="las la-plus-circle"></i>
    <span class="nav-text">League</span>
    
</a>
</li>

                    <!-- <li><a href="#" class="ai-icon" aria-expanded="false"> 
                            <i class="flaticon-bar-chart"></i>
                            <span class="nav-text">Chat</span>
                        </a>
                    </li>

                    <li><a href="#" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-phone-book"></i>
                            <span class="nav-text">Contact us</span>
                        </a>
                    </li> -->
                </ul>

            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->