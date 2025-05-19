<style >
	.notification_dropdown {
		position: relative;
	}

	.notification-box {
		display: none; /* Initially hidden */
		position: absolute;
		top: 65px;
		left: -86px;
		transform: translateX(-50%);
		width: 300px;
		background-color: #fff;
		border: 1px solid #ddd;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		border-radius: 8px;
		/*    padding: 10px;*/
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
	}
	.header .navbar-brand img{
		width: 150px;
	}
	.header .navbar nav {
		background-color: #006395;
		border-radius: 10px;
		padding: 10px;
	}
	.header .navbar .navbar-nav .nav-link{
		color: #ffffff;
		font-weight: 400;	
		padding: 2px 8px;
	}
	.header .navbar  li.nav-item{
		padding: 0 10px;
	}
	.header .navbar-nav .nav-link.active{
		background: #23b56f;
		border-radius: 10px;
	}
	.header-right .nav-item{
		display: block;
		padding-left: 0px;
	}
	.header-profile > a.nav-link{
		flex-direction: row;
		justify-content: space-between;
		padding: 10px !important;
	}
	.header-profile .nav-link img{
		border-radius: 5px;		
	}
	.ic-sidenav{
		display: none;
	}
	@media (min-width:1025px) { 
		.header-profile .profile-detail{
			top: 55px;
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
        	<div class="row py-2">
        		<div class="col-10 col-sm-10 col-md-10 col-lg-10">
        			<nav class="navbar navbar-expand-lg bg-primary rounded ">
        				<div class="container-fluid "> 					

        					<!-- <a class="navbar-brand" href="#">Navbar</a> -->
        					<a href="#" class="brand-logo navbar-brand bg-white rounded"><img width="100px" class="px-2" src="{{asset('assets/images/logo.png')}}"></a>
        					<button class="navbar-toggler bg-white text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        						<span class="navbar-toggler-icon"></span>
        					</button>
        					<div class="collapse navbar-collapse " id="navbarSupportedContent ">
        						<ul class="navbar-nav ms-auto mt-2">
        							<li class="nav-item">
        								<a class="nav-link active" aria-current="page" href="#">Home</a>
        							</li>
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">Clubs</a>
        							</li>
        							<li class="nav-item dropdown">
        								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
        									Teams
        									<i class="bi bi-caret-down-fill"></i>
        								</a>
        								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        									<a class="dropdown-item" href="#">All Teams</a>
        									<a class="dropdown-item" href="#">All Team Administrator</a>
        									<a class="dropdown-item" href="#">Schedule</a>
        								</div>
        							</li>
        							<li class="nav-item dropdown">
        								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        									Players
        								</a>
        								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        									<a class="dropdown-item" href="#">All Players</a>
        									<a class="dropdown-item" href="#">New Player</a>
        									<a class="dropdown-item" href="#">Player Administrator</a>
        								</div>
        							</li>
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">Schedule</a>
        							</li>
        							
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">Discover</a>
        							</li>
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">Highlights</a>
        							</li>
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">Stats</a>
        							</li>
        							<li class="nav-item">
        								<a class="nav-link" aria-current="page" href="#">News</a>
        							</li>
        							<li class="nav-item dropdown notification_dropdown">
        								<a class="nav-link bell-link" href="javascript:void(0);">
        									<!-- <i class="las la-comments text-white"></i> -->
        									<svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        										<path fill-rule="evenodd" clip-rule="evenodd" d="M23.7994 18.3704L23.8013 18.373C24.1307 18.8032 24.2888 20.2316 22.0258 19.9779C21.3596 19.9033 20.4282 19.7715 19.3088 19.3471C18.5551 19.0613 17.8986 18.7026 17.3584 18.3522C16.4699 18.7098 15.5118 18.9296 14.5113 18.9857C13.1436 20.8155 10.9602 22 8.50001 22C7.69152 22 6.91135 21.8717 6.17973 21.6339C5.74016 21.8891 5.24034 22.1376 4.68789 22.3471C3.56851 22.7715 2.63949 22.9297 1.97092 22.9779C1.47028 23.014 1.11823 22.9883 0.944098 22.9681C0.562441 22.9239 0.219524 22.7064 0.072134 22.3397C-0.0571899 22.0179 -0.0104055 21.6519 0.195537 21.3728C0.448192 21.0283 0.680439 20.6673 0.899972 20.3011C1.32809 19.5868 1.74792 18.8167 1.85418 17.9789C1.30848 16.9383 1.00001 15.7539 1.00001 14.5C1.00001 11.5058 2.75456 8.92147 5.29159 7.71896C6.30144 3.85296 9.81755 1 14 1C18.9706 1 23 5.02944 23 10C23 11.3736 22.6916 12.6778 22.1395 13.8448C21.9492 15.5687 22.8157 17.0204 23.7994 18.3704ZM7.00001 10C7.00001 6.13401 10.134 3 14 3C17.866 3 21 6.13401 21 10C21 11.1198 20.7378 12.1756 20.2723 13.1118C20.2242 13.2085 20.1921 13.3124 20.1772 13.4194C19.9584 14.9943 20.3278 16.43 21.0822 17.8083C19.9902 17.5451 18.9611 17.0631 18.0522 16.4035C17.7546 16.1875 17.3625 16.1523 17.0312 16.3117C16.1152 16.7525 15.0879 17 14 17C10.134 17 7.00001 13.866 7.00001 10ZM5.00353 10.2543C5.11889 14.4129 8.05529 17.8664 11.9674 18.7695C11.0213 19.5389 9.8145 20 8.50001 20C7.7707 20 7.07689 19.8586 6.44271 19.6026C6.14147 19.481 5.79993 19.5133 5.52684 19.6892C5.08797 19.972 4.56616 20.2543 3.9788 20.477C3.58892 20.6248 3.23263 20.7316 2.91446 20.8083C3.24678 20.2012 3.58332 19.4779 3.73844 18.7971C3.81503 18.461 3.8572 18.1339 3.87625 17.8266C3.88848 17.6293 3.84192 17.4327 3.74245 17.2618C3.27058 16.451 3.00001 15.5086 3.00001 14.5C3.00001 12.7904 3.78 11.263 5.00353 10.2543Z" fill="#ffffff"/>
        									</svg>
        									<!-- <span id="unread-count" class="badge text-white bg-secondary">0</span> -->
        								</a>
        							</li>
        						</ul>   
        					</div>
        				</div>
        			</nav>
        		</div>
        		<div class="col-2 col-sm-2 col-md-2 col-lg-2 ps-0">      			

        			<nav class="">
        				<div class="">
        					<ul class="navbar-nav header-right">     				

        						<li class="nav-item dropdown header-profile">
        							<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
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
        								<img src="{{asset(auth()->user()->profile_picture)}}" width="20" alt>
        								@else
        								<img src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
        								@endif	
        								@else
        								<img src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
        								@endif
        								@else
        								<img src="{{ asset('assets/images/dummyUser.jpg') }}" width="20" alt>
        								@endif
        								<div class="header-info ms-3">
        									<span class="fs-14 font-w600 mb-0">{{auth()->user()->name}} @if(auth()->user()->last_name) {{auth()->user()->last_name}} @endif</span>
        								</div>
        								<svg class="ms-4 mt-1 h-line" width="12" height="10" viewBox="0 0 12 10" fill="none"
        								xmlns="http://www.w3.org/2000/svg">
        								<rect y="0.5" width="12" height="1" fill="white" />
        								<rect y="4.5" width="12" height="1" fill="white" />
        								<rect y="8.5" width="12" height="1" fill="white" />
        							</svg>

        						</a>
        						<div class="profile-detail card">
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

        										<div class="ms-3">
        											<h4 class="mb-0">{{auth()->user()->name}} @if(auth()->user()->last_name) {{auth()->user()->last_name}} @endif<span>
        												@php

        												$role = auth()->user()->role;
        												$formattedRole = ucwords(str_replace('_', ' ', $role));
        												@endphp
        												({{$formattedRole }})
        											</span></h4>
        											<p>{{auth()->user()->email}}</p>
        										</div>
        									</div>
        									<a href="{{route('edit.profile',base64_encode(auth()->user()->id))}}">
        										<div class="icon-box">
        											<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
        											xmlns="http://www.w3.org/2000/svg">
        											<path
        											d="M18.379 8.44975L8.96409 17.8648C8.68489 18.144 8.32929 18.3343 7.9421 18.4117L5.00037 19.0001L5.58872 16.0583C5.66615 15.6711 5.85646 15.3155 6.13565 15.0363L15.5506 5.62132M18.379 8.44975L19.7932 7.03553C20.1837 6.64501 20.1837 6.01184 19.7932 5.62132L18.379 4.20711C17.9885 3.81658 17.3553 3.81658 16.9648 4.20711L15.5506 5.62132M18.379 8.44975L15.5506 5.62132"
        											stroke="white" stroke-width="2" stroke-linecap="round"
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
        												fill="white" />
        												<path
        												d="M19.1663 15.833L23.333 19.9997M23.333 19.9997L19.1663 24.1663M23.333 19.9997H6.66634"
        												stroke="white" stroke-linecap="round" />
        											</svg>
        											<p>Logout</p>
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



@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1051; background: white; padding: 2%; font-size: medium;">
	{{ session('error') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@endif
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->