<style >
	.notification_dropdown {
		position: relative;
	}

.notification-box {
    display: none; /* Initially hidden */
    position: absolute;
    top: 75px;
    right: -75px;
    transform: translateX(-50%);
    width: 300px;
    background-color: #fff;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    border-radius: 8px;
    z-index: 1000;
    overflow-y: auto;
    min-height: 200px;
    max-height: 400px;
}
.notification_dropdown:hover .notification-box {
  display: block;
}

.notification-box{
  background: white;

}
.notification-item{
  color: white;
  border-bottom: 1px solid white;
}
.notification-item h5{
  color: white;

}
.header{
  padding: 0 10px;
  height: auto;
  background-color: #ffffff;
  border-top:4px solid #115A83;
  border-bottom: 4px solid #35AA76;
  z-index: 99;
}
.header .navbar-brand img{
  width: 220px;
}
.header .navbar nav {
  background-color: #115A83;
  border-radius: 10px;
  padding: 10px;
}
.header .navbar .navbar-nav .nav-link{
  color: #35AA76;
  font-weight: 500;
  padding: 5px 10px;
  font-size: 19px;
  position: relative;
  padding-left: 35px;
}
.header .navbar .navbar-nav .nav-link.active i{
    color: #ffffff;
}
.header .navbar .navbar-nav .nav-link i
{
    position: absolute;
    left: 9px;
    color: #35AA76;
    top: 8px;
}
.header .navbar-nav .nav-link:hover i{
    color: #ffffff;
}

.header .navbar  li.nav-item{
  padding: 0 5px;
}
.header .navbar .navbar-nav .nav-link.active, .header .navbar .navbar-nav .nav-link:hover
{
  background: #115A83;
  border-radius: 4px;
  color: #fff;
}
.header .chatbox .nav-tabs .nav-link{
    color: #115A83;
}

.header-right{
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-end;
    align-items: center;
    position: relative;
}
.header-right .notification_dropdown .nav-link svg path{
    fill: #212121;
}
.header-profile .nav-link img{
  border-radius: 5px;		
}
.header-profile .nav-link{
    padding: 28px 10px!important;
}

.header-profile > a.nav-link{
    flex-direction: row-reverse;
/*    flex-direction: column;*/
}
.header .dropdown-menu .dropdown-item{
    font-size: 16px;
}

.ic-sidenav{
    display: none;
}

@media (min-width:1025px) { 
  .header-profile .profile-detail{
     top: 85px;
 }	
}
@media only screen and (max-width: 750px) {
 .header .navbar-brand img{
  width: 150px;

}

.header .navbar-collapse .navbar-nav{
    background: #ffffff;
    position: absolute;
    width: 100%;
    top: 75px;
    border-radius: 5px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    min-width: 350px;
    z-index: 9;
}
.header .navbar .navbar-nav .nav-link{
    border-bottom: 1px dashed #e8e8e8;
    font-size: 16px;
}
.header-profile > a.nav-link{

}

}


.pulse 
{
  display: block;
  cursor: pointer;
  animation: pulse-secondary 2s infinite;
}
@keyframes pulse-secondary {
  0% {

    box-shadow: 0 0 10px rgb(0 99 149 / 80%);
}
70% {

    box-shadow: 0 0 20px rgba(0, 99, 149, 70%);
}
100% {

    box-shadow: 0 0 10px rgba(0, 99, 148, 60%);
}
}

.header-profile .profile-detail .profile-media{
    border-bottom: 1px solid rgba(0, 0, 0, 0.11);
}
.header-profile .profile-detail .profile-media .icon-box{
    background-color: rgb(32 32 32 / 8%);
}
.header-profile .profile-detail .media-box .icon-box-lg{
    border: 1px solid rgb(82 82 82 / 15%);
}
@media only screen and (max-width: 87.5rem) {
    .header-profile > a.nav-link{
        padding: 28px 10px!important;
    }
}

</style>
<div id="main-wrapper" class="show">
<!--**********************************
            Nav header start
        ***********************************-->
       <!--  
        <div class="nav-header">
        	<a href="#" class="brand-logo"><img src="{{asset('assets/images/logo.png')}}"></a>
        	<div class="nav-control">
        		<div class="hamburger">
        			<span class="line"></span><span class="line"></span><span class="line"></span>
        		</div>
        	</div>
        </div> -->
		<!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Chat box start
        ***********************************-->

		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="container-fluid">
             <div class="row">
              <div class="col-8 col-sm-8 col-md-10 col-lg-9 ">
               <nav class="navbar navbar-expand-lg rounded ">
                <div class="container-fluid ps-lg-0 px-0"> 					

                 <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                 <a href="#" class="brand-logo navbar-brand"><img width="100px" class="" src="{{asset('assets/images/logo.png')}}"></a>
                 <button id="navbarToggler" class="navbar-toggler bg-white text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse showNavBar" id="navbarSupportedContent ">
                  <ul class="navbar-nav ms-auto ">
                   <li class="nav-item">
                    @if(auth()->user()->role == 'player')
                    <a class="nav-link {{ Route::currentRouteName() == 'dashboard3' ? 'active' : ''}} " aria-current="page" href="{{ route('dashboard3') }}"><i class="flaticon-home"></i> Dashboard</a>
                    @else
                    <a class="nav-link  {{ Route::currentRouteName() == 'dashboard3' ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard3') }}"><i class="flaticon-home"></i> Home</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'club.dashboard' ? 'active' : ''}}" aria-current="page" href="{{ route('club.dashboard') }}"><i class="flaticon flaticon-app"></i> Clubs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ in_array(Route::currentRouteName(), [ 'team.allTeamDashboard', 'team.team_administrator']) ? 'active show' : '' }}" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                     <i class="flaticon-web"></i> Teams
                     <i class="bi bi-caret-down-fill"></i>
                 </a>
                 <div class="dropdown-menu {{ in_array(Route::currentRouteName(), ['team.schedule.show.calander', 'team.allTeamDashboard', 'team.team_administrator']) ? ' show' : '' }}" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item {{ Route::currentRouteName() == 'team.allTeamDashboard' ? 'active' : ''}}" href="{{route('team.allTeamDashboard')}}">All Teams</a>
                     <a class="dropdown-item {{ Route::currentRouteName() == 'team.team_administrator' ? 'active' : ''}} " href="{{route('team.team_administrator')}}">All Team Administrator</a>
                     <!-- <a class="dropdown-item {{ Route::currentRouteName() == 'team.schedule.show.calander' ? 'active' : ''}}" href="{{route('team.schedule.show.calander')}}">Schedule</a> -->
                 </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ request()->is('players*') ? 'active mm-active' : '' }}" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="flaticon flaticon-user-1"></i> Players
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                 <a class="dropdown-item " href="{{route('player.index')}}">All Players</a>
                 <a class="dropdown-item" href="{{route('player.add')}}">New Player</a>
                 <a class="dropdown-item" href="{{route('player.administrator.list')}}">Player Administrator</a>
             </div>
         </li>
         <li class="nav-item">
            <a class="nav-link  {{ Route::currentRouteName() == 'team.schedule.show.calander' ? 'active' : ''}}" aria-current="page" href="{{route('team.schedule.show.calander')}}"><i class="flaticon-calendar-2"></i> Schedule</a>
        </li>

    </ul>   
</div>
</div>
</nav>
</div>
<div class="col-4 col-sm-4 col-md-2 col-lg-3 ps-0">      			

 <nav class="">
    <div class="">
       <ul class="navbar-nav header-right">    

        <li class="nav-item dropdown notification_dropdown">
            <a class="nav-link bell-link" href="javascript:void(0);">
             <!-- <i class="las la-comments text-white"></i> -->
             <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
                <path d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z" fill="#717579"></path>
            </svg>
            <span id="unread-count" class="badge text-white bg-secondary pulse">0</span>
        </a>
    </li>
    <div class="notification-box widget-media" id="notification-box">
        <ul class="timeline" id="timeline">
            <!-- Content for the box -->
            <p>No new notifications</p>

        </ul>
    </div>  
    <div class="chatbox">
        <div class="chatbox-close"></div>
        <div class="custom-tab-1">
            <ul class="nav nav-tabs">
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="chat" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card ic-chat-user-box" id="chat-list">
                            <div class="card-header chat-list-header text-center">
                                <!-- <a href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                            <rect fill="#000000" opacity="0.3"
                                                transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                                x="4" y="11" width="16" height="2" rx="1" />
                                        </g>
                                    </svg>
                                </a> -->
                                <!-- <div> -->
                                    <input type="search" id="searchUser" class="form-control" placeholder="Search" oninput="filterUsers()">
                                    <!-- <h6 class="mb-1">Chat List</h6>
                                    <p class="mb-0">Show All</p> -->
                                    <!-- </div> -->
                                <!-- <a href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                        </g>
                                    </svg>
                                </a> -->
                            </div>
                            <div class="card-body contacts_body p-0 ic-scroll  " id="IC_W_Contacts_Body">
                                <ul class="contacts" id="team-list">

                                </ul>
                            </div>
                        </div>
                        <div class="card chat ic-chat-history-box d-none" id="chat-history-box">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);" class="ic-chat-history-back">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.3"
                                        transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) "
                                        x="14" y="7" width="2" height="10" rx="1" />
                                        <path
                                        d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                    </g>
                                </svg>
                            </a>
                            <div>
                                <h6 class="mb-1" id="chatName">Chat with </h6>
                                <p class="mb-0 text-success">Online</p>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                    </g>
                                </svg></a>
                                <ul class="dropdown-menu dropdown-menu-end" id="messages">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i>
                                    View profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to
                                    btn-close friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to
                                    group</li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body ic-scroll" id="IC_W_Contacts_Body3">

                        </div>
                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <textarea class="form-control" id="message" placeholder="Type your message..." onkeydown="checkEnter(event)"></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="sendMessage()"><i
                                        class="fa fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="alerts" role="tabpanel">
                        <div class="card mb-sm-3 mb-md-0 contacts_card">
                            <div class="card-header chat-list-header text-center">
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="5" cy="12" r="2" />
                                        <circle fill="#000000" cx="12" cy="12" r="2" />
                                        <circle fill="#000000" cx="19" cy="12" r="2" />
                                    </g>
                                </svg></a>
                                <div>
                                    <h6 class="mb-1">Notications</h6>
                                    <p class="mb-0">Show All</p>
                                </div>
                                <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                    viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg></a>
                            </div>
                            <div class="card-body contacts_body p-0 ic-scroll" id="IC_W_Contacts_Body1">
                                <ul class="contacts">
                                    <li class="name-first-letter">SEVER STATUS</li>
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">KK</div>
                                            <div class="user_info">
                                                <span>David Nester Birthday</span>
                                                <p class="text-primary">Today</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">SOCIAL</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont success">RU</div>
                                            <div class="user_info">
                                                <span>Perfection Simplified</span>
                                                <p>Jame Smith commented on your status</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="name-first-letter">SEVER STATUS</li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont primary">AU</div>
                                            <div class="user_info">
                                                <span>AharlieKane</span>
                                                <p>Sami is online</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight">
                                            <div class="img_cont info">MO</div>
                                            <div class="user_info">
                                                <span>Athan Jacoby</span>
                                                <p>Nargis left 30 mins ago</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <li class="nav-item dropdown header-profile">
         <a class="nav-link bg-white" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
            @if(auth()->user())
            @php
            $adminData['logo'] = 'assets/images/dummyUser.jpg';
            if(auth()->user()->role == 'club'){
               $admin = \DB::table('club_administrators')->where('user_id',auth()->user()->id)->first();
               $adminData['logo'] = $admin->image;
           }

           if(auth()->user()->role == 'administrator'){
               $admin = \DB::table('administrators')->where('user_id',auth()->user()->id)->first();
               $adminData['logo'] = 'assets/images/dummyUser.jpg';
           }

           if(auth()->user()->role == 'player_administrator'){
               $admin = \DB::table('players')->where('user_id',auth()->user()->id)->first();
               $adminData['logo'] = 'assets/images/dummyUser.jpg';
           }

           @endphp
           @if(auth()->user())
           @if(auth()->user()->profile_picture)
           <img class="rounded-circle" src="{{asset(auth()->user()->profile_picture)}}" width="20" alt>
           @else
           <img class="rounded-circle" src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
           @endif	
           @else
           <img class="rounded-circle" src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
           @endif
           @else
           <img class="rounded-circle" src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
           @endif
           <div class="header-info ms-2 me-2">
               <span class="fs-14 font-w600 mb-0 text-primary">{{auth()->user()->name}} @if(auth()->user()->last_name) {{auth()->user()->last_name}} @endif</span>
           </div>
           <svg class="ms-4 mt-1 h-line d-none" width="12" height="10" viewBox="0 0 12 10" fill="none"
           xmlns="http://www.w3.org/2000/svg">
           <rect y="0.5" width="12" height="1" fill="white" />
           <rect y="4.5" width="12" height="1" fill="white" />
           <rect y="8.5" width="12" height="1" fill="white" />
       </svg>

   </a>
   <div class="profile-detail card bg-white shadow">
     <div class="card-body p-0">
        <div class="d-flex profile-media justify-content-between align-items-center">
           <div class="d-flex">
              @if(auth()->user())

              @if(auth()->user()->profile_picture)
              <img src="{{asset(auth()->user()->profile_picture)}}" width="20" alt>
              @else
              <img src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
              @endif	
              @else
              <img src="{{ asset('assets/images/dummyUser.jpg') }}">
              @endif

              <div class="ms-3 ">
                 <h4 class="mb-0 text-dark">{{auth()->user()->name}} @if(auth()->user()->last_name) {{auth()->user()->last_name}} @endif<span>
                    @php

                    $role = auth()->user()->role;
                    $formattedRole = ucwords(str_replace('_', ' ', $role));
                    @endphp
                    ({{$formattedRole }})
                </span></h4>
                <p class="text-dark">{{auth()->user()->email}}</p>
            </div>
        </div>
        <a href="{{route('edit.profile',base64_encode(auth()->user()->id))}}">
          <div class="icon-box">
             <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
             xmlns="http://www.w3.org/2000/svg">
             <path
             d="M18.379 8.44975L8.96409 17.8648C8.68489 18.144 8.32929 18.3343 7.9421 18.4117L5.00037 19.0001L5.58872 16.0583C5.66615 15.6711 5.85646 15.3155 6.13565 15.0363L15.5506 5.62132M18.379 8.44975L19.7932 7.03553C20.1837 6.64501 20.1837 6.01184 19.7932 5.62132L18.379 4.20711C17.9885 3.81658 17.3553 3.81658 16.9648 4.20711L15.5506 5.62132M18.379 8.44975L15.5506 5.62132"
             stroke="#212121" stroke-width="2" stroke-linecap="round"
             stroke-linejoin="round" />
         </svg>
     </div>
 </a>
</div>
<div class="media-box">
    <ul class="d-flex flex-colunm gap-2 flex-wrap">

       <li>
          <a href="{{route('logout')}}">
             <div class="icon-box-lg">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.25"
                d="M28.6325 11.2111L16.3162 7.10573C15.6687 6.88989 15 7.37186 15 8.05442V31.9462C15 32.6288 15.6687 33.1108 16.3162 32.8949L28.6325 28.7895C29.4491 28.5173 30 27.753 30 26.8921V13.1085C30 12.2476 29.4491 11.4834 28.6325 11.2111Z"
                fill="#212121" />
                <path
                d="M19.1663 15.833L23.333 19.9997M23.333 19.9997L19.1663 24.1663M23.333 19.9997H6.66634"
                stroke="#212121" stroke-linecap="round" />
            </svg>
            <p class="text-dark">Logout</p>
        </div>
    </a>
</li>
</ul>
</div>
</div>
</div>
</li>
</ul>

</div>
</nav>
</div>


</div>
</div>

</div>



@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1051; background: white; padding: 2%; font-size: medium;">
	{{ session('error') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@endif
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->