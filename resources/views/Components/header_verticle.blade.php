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
/*--------------------------------------------------*/
/*--------------------------------------------------*/
.nav-header .brand-logo img{
	padding: 2px 5px;
	border-radius: 4px;
	background-color: #ffffff;
}
.nav-header{
	background-color: #115a83;
	border-right: 1px solid #e8e8e869;
}
.header{
	background-color: #115a83;
}
.header-left .dashboard_bar{
	color: #ffffff;
}
.hamburger.is-active .line,
.hamburger .line{
	background-color: #ffffff!important;
}

.ic-sidenav{
	overflow: auto; /* or scroll */
	scrollbar-width: none; /* Firefox */
	-ms-overflow-style: none;  /* IE and Edge */
	background-color: #ffffff;
	border-right: 1px solid #e8e8e8!important;
}
.ic-sidenav::-webkit-scrollbar {
	display: none; /* Chrome, Safari, Opera */
}

[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a.mm-active i,
[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a:hover i,
[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a:focus i{
	color: #ffffff!important;
}

[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a.mm-active,
[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a:hover,
[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a:focus{
	background-color: #115a83!important;
	color: #ffffff!important;
	border-bottom: 1px solid #115a83;
}
[data-sidebar-style="full"][data-layout="vertical"] .ic-sidenav .metismenu > li > a{
	color: #414141!important;
	background-color: #ffffff!important;
	border-bottom: 1px dashed #e8e8e8;
	border-radius: 0;
}
[data-sibebarbg="color_3"][data-theme-version="dark"] .ic-sidenav .metismenu > li > a:hover i,
[data-sibebarbg="color_3"] .ic-sidenav .metismenu > li > a:hover i{
	color: #ffffff!important;

}
[data-sibebarbg="color_3"][data-theme-version="dark"] .ic-sidenav .metismenu > li > a i,
[data-sibebarbg="color_3"] .ic-sidenav .metismenu > li > a i{
	color: #414141!important;

}
.ic-sidenav .metismenu > li{
	padding: 0;
	margin: 0;
}
/* .ic-sidenav .metismenu .has-arrow:after {
    border-top: 0.3125rem solid #414141!important;
    border-left: 0.3125rem solid #414141!important;
}*/

[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .ic-sidenav .metismenu > li{
	padding: 0px !important;
}
[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .ic-sidenav .metismenu > li > a{
	border-radius: 0px!important;
	margin: 0;
}
[data-sibebarbg="color_3"][data-theme-version="dark"] .ic-sidenav .metismenu > li > a, 
[data-sibebarbg="color_3"] .ic-sidenav .metismenu > li > a{
	color: #414141 !important;
	background: #ffffff;
	border-bottom: 1px dashed #e8e8e8;
}
</style>
<div id="main-wrapper" class="show">
<!--**********************************
            Nav header start
        ***********************************-->
        
        <div class="nav-header">
        	<a href="#" class="brand-logo">
        		<img src="{{asset('assets/images/logo.png')}}">
        	</a>
        	<div class="nav-control">
        		<div class="hamburger">
        			<span class="line"></span><span class="line"></span><span class="line"></span>
        		</div>
        	</div>
        </div>
		<!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Chat box start
        ***********************************-->
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
					<!-- <div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
										viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
											<rect fill="#000000" opacity="0.3"
												transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
												x="4" y="11" width="16" height="2" rx="1" />
										</g>
									</svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
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
							<div class="card-body contacts_body p-0 ic-scroll" id="IC_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);"
													class="btn btn-primary btn-xs sharp me-1"><i
														class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
														class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);"
													class="btn btn-primary btn-xs sharp me-1"><i
														class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
														class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);"
													class="btn btn-primary btn-xs sharp me-1"><i
														class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
														class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ms-auto">
												<a href="javascript:void(0);"
													class="btn btn-primary btn-xs sharp me-1"><i
														class="fas fa-pencil-alt"></i></a>
												<a href="javascript:void(0);" class="btn btn-danger btn-xs sharp"><i
														class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div> -->
					
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
        	<div class="header-content">
        		<nav class="navbar navbar-expand">
        			<div class="collapse navbar-collapse justify-content-between">
        				<div class="header-left">
        					<div class="dashboard_bar">
        						@if(!empty($title))
        						{{ $title }}
        						@else
        						Club
        						@endif
        					</div>
        				</div>
        				<ul class="navbar-nav header-right">
							<!-- <li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search anything">
									<span class="input-group-text"><a href="javascript:void(0)"><i
												class="flaticon-search-interface-symbol"></i></a></span>
								</div>
							</li> -->
							<!-- <li class="nav-item dropdown notification_dropdown">
								<button class="ic-theme-mode" type="button">
									<span class="light">Light</span>
									<span class="dark">Dark</span>
								</button>
							</li> -->


							<!-- <li class="nav-item dropdown notification_dropdown">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z"
											fill="#717579" />
										<path
											d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z"
											fill="#717579" />
									</svg>

									<span class="badge text-white badge-primary">16</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_Notification1" class="widget-media ic-scroll p-3"
										style="height:380px;">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="{{ asset('assets/images/dummyUser.jpg') }}">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="{{ asset('assets/images/dummyUser.jpg') }}">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<a class="all-notification" href="javascript:void(0);">See all notifications <i
											class="ti-arrow-end"></i></a>
								</div>
							</li> -->
							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link bell-link" href="javascript:void(0);">
									<svg width="28px" height="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M23.7994 18.3704L23.8013 18.373C24.1307 18.8032 24.2888 20.2316 22.0258 19.9779C21.3596 19.9033 20.4282 19.7715 19.3088 19.3471C18.5551 19.0613 17.8986 18.7026 17.3584 18.3522C16.4699 18.7098 15.5118 18.9296 14.5113 18.9857C13.1436 20.8155 10.9602 22 8.50001 22C7.69152 22 6.91135 21.8717 6.17973 21.6339C5.74016 21.8891 5.24034 22.1376 4.68789 22.3471C3.56851 22.7715 2.63949 22.9297 1.97092 22.9779C1.47028 23.014 1.11823 22.9883 0.944098 22.9681C0.562441 22.9239 0.219524 22.7064 0.072134 22.3397C-0.0571899 22.0179 -0.0104055 21.6519 0.195537 21.3728C0.448192 21.0283 0.680439 20.6673 0.899972 20.3011C1.32809 19.5868 1.74792 18.8167 1.85418 17.9789C1.30848 16.9383 1.00001 15.7539 1.00001 14.5C1.00001 11.5058 2.75456 8.92147 5.29159 7.71896C6.30144 3.85296 9.81755 1 14 1C18.9706 1 23 5.02944 23 10C23 11.3736 22.6916 12.6778 22.1395 13.8448C21.9492 15.5687 22.8157 17.0204 23.7994 18.3704ZM7.00001 10C7.00001 6.13401 10.134 3 14 3C17.866 3 21 6.13401 21 10C21 11.1198 20.7378 12.1756 20.2723 13.1118C20.2242 13.2085 20.1921 13.3124 20.1772 13.4194C19.9584 14.9943 20.3278 16.43 21.0822 17.8083C19.9902 17.5451 18.9611 17.0631 18.0522 16.4035C17.7546 16.1875 17.3625 16.1523 17.0312 16.3117C16.1152 16.7525 15.0879 17 14 17C10.134 17 7.00001 13.866 7.00001 10ZM5.00353 10.2543C5.11889 14.4129 8.05529 17.8664 11.9674 18.7695C11.0213 19.5389 9.8145 20 8.50001 20C7.7707 20 7.07689 19.8586 6.44271 19.6026C6.14147 19.481 5.79993 19.5133 5.52684 19.6892C5.08797 19.972 4.56616 20.2543 3.9788 20.477C3.58892 20.6248 3.23263 20.7316 2.91446 20.8083C3.24678 20.2012 3.58332 19.4779 3.73844 18.7971C3.81503 18.461 3.8572 18.1339 3.87625 17.8266C3.88848 17.6293 3.84192 17.4327 3.74245 17.2618C3.27058 16.451 3.00001 15.5086 3.00001 14.5C3.00001 12.7904 3.78 11.263 5.00353 10.2543Z" fill="#000000"/>
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

							<!-- <li class="nav-item dropdown notification_dropdown">
								<a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M22.1666 5.83331H20.9999V3.49998C20.9999 3.19056 20.877 2.89381 20.6582 2.67502C20.4394 2.45623 20.1427 2.33331 19.8333 2.33331C19.5238 2.33331 19.2271 2.45623 19.0083 2.67502C18.7895 2.89381 18.6666 3.19056 18.6666 3.49998V5.83331H9.33325V3.49998C9.33325 3.19056 9.21034 2.89381 8.99154 2.67502C8.77275 2.45623 8.47601 2.33331 8.16659 2.33331C7.85717 2.33331 7.56042 2.45623 7.34163 2.67502C7.12284 2.89381 6.99992 3.19056 6.99992 3.49998V5.83331H5.83325C4.90499 5.83331 4.01476 6.20206 3.35838 6.85844C2.702 7.51482 2.33325 8.40506 2.33325 9.33331V10.5H25.6666V9.33331C25.6666 8.40506 25.2978 7.51482 24.6415 6.85844C23.9851 6.20206 23.0948 5.83331 22.1666 5.83331Z"
											fill="#717579" />
										<path
											d="M2.33325 22.1666C2.33325 23.0949 2.702 23.9851 3.35838 24.6415C4.01476 25.2979 4.90499 25.6666 5.83325 25.6666H22.1666C23.0948 25.6666 23.9851 25.2979 24.6415 24.6415C25.2978 23.9851 25.6666 23.0949 25.6666 22.1666V12.8333H2.33325V22.1666Z"
											fill="#717579" />
									</svg>
									<span class="badge badge-success text-white">23</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div id="DZ_W_TimeLine02" class="widget-timeline ic-scroll style-1  p-3 height370">
										<ul class="timeline">
											<li>
												<div class="timeline-badge primary"></div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>10 minutes ago</span>
													<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong
															class="text-primary">$500</strong>.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge info">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">New order placed <strong
															class="text-info">#XF-2356.</strong></h6>
													<p class="mb-0">Quisque a consequat ante Sit amet magna at
														volutapt...</p>
												</a>
											</li>
											<li>
												<div class="timeline-badge danger">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>30 minutes ago</span>
													<h6 class="mb-0">john just buy your product <strong
															class="text-warning">Sell $250</strong></h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge success">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>15 minutes ago</span>
													<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge warning">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge dark">
												</div>
												<a class="timeline-panel text-muted" href="javascript:void(0);">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>  -->
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
												<!-- <li>
													<a href="#">
														<div class="icon-box-lg">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M5 20C5 11.7157 11.7157 5 20 5C28.2843 5 35 11.7157 35 20C35 28.2843 28.2843 35 20 35C11.7157 35 5 28.2843 5 20Z"
																	fill="white" fill-opacity="0.25" />
																<circle cx="19.9997" cy="16.6667" r="6.66667"
																	fill="white" />
																<path fill-rule="evenodd" clip-rule="evenodd"
																	d="M30.4335 30.5196C30.4904 30.6167 30.4727 30.7398 30.3915 30.8178C27.6957 33.4079 24.034 35 20.0004 35C15.9668 35 12.3051 33.4079 9.60933 30.8179C9.52818 30.7399 9.51048 30.6169 9.56735 30.5198C11.4843 27.2465 15.4363 25 20.0005 25C24.5645 25 28.5165 27.2464 30.4335 30.5196Z"
																	fill="white" />
															</svg>
															<p>Profile</p>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="icon-box-lg">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M6.66699 17.4718C6.66699 16.269 6.66699 15.6676 6.96569 15.1843C7.26439 14.701 7.80231 14.432 8.87814 13.8941L18.2115 9.22744C19.0893 8.78853 19.5282 8.56908 20.0003 8.56908C20.4725 8.56908 20.9114 8.78853 21.7892 9.22744L31.1225 13.8941C32.1983 14.432 32.7363 14.701 33.035 15.1843C33.3337 15.6676 33.3337 16.269 33.3337 17.4718V27.6663C33.3337 29.552 33.3337 30.4948 32.7479 31.0806C32.1621 31.6663 31.2193 31.6663 29.3337 31.6663H10.667C8.78137 31.6663 7.83857 31.6663 7.25278 31.0806C6.66699 30.4948 6.66699 29.552 6.66699 27.6663V17.4718Z"
																	fill="white" fill-opacity="0.25" />
																<path
																	d="M6.66699 29.667V16.9097C6.66699 16.7982 6.78434 16.7257 6.88407 16.7755L18.6587 22.6628C19.5033 23.0851 20.4974 23.0851 21.342 22.6628L33.1166 16.7755C33.2163 16.7257 33.3337 16.7982 33.3337 16.9097V29.667C33.3337 30.7716 32.4382 31.667 31.3337 31.667H8.66699C7.56242 31.667 6.66699 30.7716 6.66699 29.667Z"
																	fill="white" />
															</svg>
															<p>Message</p>
														</div>
													</a>
												</li>
												<li>
													<a href="#">
														<div class="icon-box-lg">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<rect x="6.66699" y="5" width="26.6667" height="30"
																	rx="2" fill="white" fill-opacity="0.25" />
																<path
																	d="M6.66699 31.6663C6.66699 30.4202 6.66699 29.7971 6.93494 29.333C7.11048 29.029 7.36295 28.7765 7.66699 28.601C8.13109 28.333 8.75417 28.333 10.0003 28.333H29.3337C31.2193 28.333 32.1621 28.333 32.7479 27.7472C33.3337 27.1614 33.3337 26.2186 33.3337 24.333V23.333V30.9997C33.3337 32.8853 33.3337 33.8281 32.7479 34.4139C32.1621 34.9997 31.2193 34.9997 29.3337 34.9997H10.0003C8.75417 34.9997 8.13109 34.9997 7.66699 34.7317C7.36295 34.5562 7.11048 34.3037 6.93494 33.9997C6.66699 33.5356 6.66699 32.9125 6.66699 31.6663V31.6663Z"
																	fill="white" />
																<path
																	d="M15.833 17.5003L19.0603 20.7276C19.1189 20.7862 19.2138 20.7862 19.2724 20.7276L25.833 14.167"
																	stroke="white" stroke-width="1.2" />
															</svg>
															<p>Taskboard</p>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:void(0);">
														<div class="icon-box-lg">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<rect x="26.667" y="20" width="6.66667" height="11.6667"
																	rx="3" fill="white" fill-opacity="0.25"
																	stroke="white" stroke-width="1.2"
																	stroke-linejoin="round" />
																<rect x="6.66699" y="20" width="6.66667"
																	height="11.6667" rx="3" fill="white"
																	fill-opacity="0.25" stroke="white"
																	stroke-width="1.2" stroke-linejoin="round" />
																<path d="M6.66699 21.667V26.667" stroke="white"
																	stroke-width="1.2" stroke-linecap="round"
																	stroke-linejoin="round" />
																<path d="M33.333 21.667V26.667" stroke="white"
																	stroke-width="1.2" stroke-linecap="round"
																	stroke-linejoin="round" />
																<path
																	d="M33.3337 21.667C33.3337 17.6887 31.9289 13.8734 29.4284 11.0604C26.9279 8.24735 23.5365 6.66699 20.0003 6.66699C16.4641 6.66699 13.0727 8.24734 10.5722 11.0604C8.07175 13.8734 6.66699 17.6887 6.66699 21.667"
																	stroke="white" stroke-width="1.2"
																	stroke-linecap="round" stroke-linejoin="round" />
															</svg>

															<p>Help</p>
														</div>
													</a>
												</li>
												<li>
													<div class="icon-box-lg">
														<a href="javascript:void(0);">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M9.97675 9.02568L5.65322 17.1923C4.92539 18.5671 4.56147 19.2545 4.56147 19.9997C4.56147 20.7448 4.92539 21.4322 5.65322 22.807L9.97675 30.9737C10.8001 32.5289 11.2118 33.3066 11.9258 33.7365C12.6398 34.1663 13.5197 34.1663 15.2795 34.1663H24.7212C26.4809 34.1663 27.3608 34.1663 28.0748 33.7365C28.7888 33.3066 29.2005 32.5289 30.0239 30.9737L34.3474 22.807C35.0753 21.4322 35.4392 20.7448 35.4392 19.9997C35.4392 19.2545 35.0753 18.5671 34.3474 17.1923L30.0239 9.02568C29.2005 7.47041 28.7888 6.69278 28.0748 6.26289C27.3608 5.83301 26.4809 5.83301 24.7212 5.83301H15.2795C13.5197 5.83301 12.6398 5.83301 11.9258 6.26289C11.2118 6.69278 10.8001 7.47041 9.97675 9.02568Z"
																	fill="white" fill-opacity="0.25" />
																<circle cx="20" cy="20" r="5" fill="white" />
															</svg>
															<p>Settings</p>
														</a>
													</div>
												</li>
												<li>
													<div class="icon-box-lg">
														<a href="javascript:void(0);">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M6.66699 18.667C6.66699 17.7242 6.66699 17.2528 6.95989 16.9599C7.25278 16.667 7.72418 16.667 8.66699 16.667H31.3337C32.2765 16.667 32.7479 16.667 33.0408 16.9599C33.3337 17.2528 33.3337 17.7242 33.3337 18.667V30.2106C33.3337 31.7105 33.3337 32.4604 32.9101 33.0029C32.4865 33.5455 31.7589 33.7273 30.3038 34.0911L29.7018 34.2416C24.8755 35.4482 22.4624 36.0515 20.0003 36.0515C17.5382 36.0515 15.1251 35.4482 10.2989 34.2416L9.69685 34.0911C8.24173 33.7273 7.51417 33.5455 7.09058 33.0029C6.66699 32.4604 6.66699 31.7105 6.66699 30.2106V18.667Z"
																	fill="white" fill-opacity="0.25" />
																<path
																	d="M27.5 16.6667V15C27.5 12.6703 27.5 11.5054 27.1194 10.5866C26.6119 9.36144 25.6386 8.38807 24.4134 7.8806C23.4946 7.5 22.3297 7.5 20 7.5V7.5C17.6703 7.5 16.5054 7.5 15.5866 7.8806C14.3614 8.38807 13.3881 9.36144 12.8806 10.5866C12.5 11.5054 12.5 12.6703 12.5 15V16.6667"
																	stroke="white" />
																<circle cx="20.0003" cy="25.0003" r="3.33333"
																	fill="white" />
																<path d="M12 16V18.5" stroke="white"
																	stroke-linecap="round" />
															</svg>
															<p>Security</p>
														</a>
													</div>
												</li>
												<li>
													<div class="icon-box-lg">
														<a href="javascript:void(0);">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M6.66699 7C6.66699 5.89543 7.56242 5 8.66699 5H31.3337C32.4382 5 33.3337 5.89543 33.3337 7V31.7639C33.3337 33.2507 31.769 34.2177 30.4392 33.5528L20.8948 28.7805C20.3317 28.499 19.669 28.499 19.1059 28.7805L9.56142 33.5528C8.23162 34.2177 6.66699 33.2507 6.66699 31.7639V7Z"
																	fill="white" fill-opacity="0.25" />
																<rect x="10" y="8.33301" width="20" height="3.33333"
																	rx="1.66667" fill="white" />
															</svg>
															<p>Plans</p>
														</a>
													</div>
												</li>
												<li>
													<div class="icon-box-lg">
														<a href="javascript:void(0);">
															<svg width="40" height="40" viewBox="0 0 40 40" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M5 12.667C5 9.83857 5 8.42435 5.87868 7.54567C6.75736 6.66699 8.17157 6.66699 11 6.66699H29C31.8284 6.66699 33.2426 6.66699 34.1213 7.54567C35 8.42435 35 9.83857 35 12.667V15.417C35 15.6493 35 15.7655 34.9808 15.8621C34.9019 16.2588 34.5918 16.5689 34.1951 16.6478C34.0985 16.667 33.9823 16.667 33.75 16.667H33.3333C33.0238 16.667 32.869 16.667 32.7385 16.6784C31.2882 16.8053 30.1383 17.9552 30.0114 19.4055C30 19.536 30 19.6908 30 20.0003C30 20.3099 30 20.4646 30.0114 20.5951C30.1383 22.0455 31.2882 23.1954 32.7385 23.3222C32.869 23.3337 33.0238 23.3337 33.3333 23.3337H33.75C33.9823 23.3337 34.0985 23.3337 34.1951 23.3529C34.5918 23.4318 34.9019 23.7419 34.9808 24.1386C35 24.2352 35 24.3513 35 24.5837V27.3337C35 30.1621 35 31.5763 34.1213 32.455C33.2426 33.3337 31.8284 33.3337 29 33.3337H11C8.17157 33.3337 6.75736 33.3337 5.87868 32.455C5 31.5763 5 30.1621 5 27.3337V24.5837C5 24.3513 5 24.2352 5.01921 24.1386C5.09812 23.7419 5.40822 23.4318 5.80491 23.3529C5.90151 23.3337 6.01767 23.3337 6.25 23.3337H6.66667C6.97621 23.3337 7.13098 23.3337 7.26147 23.3222C8.71181 23.1954 9.8617 22.0455 9.98858 20.5951C10 20.4646 10 20.3099 10 20.0003C10 19.6908 10 19.536 9.98858 19.4055C9.8617 17.9552 8.71181 16.8053 7.26147 16.6784C7.13098 16.667 6.97621 16.667 6.66667 16.667H6.25C6.01767 16.667 5.90151 16.667 5.80491 16.6478C5.40822 16.5689 5.09812 16.2588 5.01921 15.8621C5 15.7655 5 15.6493 5 15.417V12.667Z"
																	fill="white" fill-opacity="0.25" />
																<path
																	d="M19.5961 13.885C19.7958 13.6118 20.2035 13.6118 20.4033 13.885L22.3343 16.5259C22.396 16.6103 22.4826 16.6733 22.582 16.7059L25.6903 17.7263C26.0119 17.8318 26.1379 18.2196 25.9398 18.494L24.0248 21.1466C23.9636 21.2314 23.9305 21.3332 23.9302 21.4377L23.9203 24.7093C23.9193 25.0477 23.5894 25.2874 23.2672 25.1838L20.1527 24.1822C20.0532 24.1502 19.9461 24.1502 19.8466 24.1822L16.7321 25.1838C16.4099 25.2874 16.0801 25.0477 16.079 24.7093L16.0691 21.4377C16.0688 21.3332 16.0357 21.2314 15.9745 21.1466L14.0596 18.494C13.8615 18.2196 13.9875 17.8318 14.309 17.7263L17.4174 16.7059C17.5167 16.6733 17.6034 16.6103 17.6651 16.5259L19.5961 13.885Z"
																	fill="white" />
															</svg>
															<p>Feedback</p>
														</a>
													</div>
												</li> -->
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


	@if(session('error'))
	<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1051; background: white; padding: 2%; font-size: medium;">
		{{ session('error') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>


	@endif
		<!--**********************************
            Header end ti-comment-alt
        ***********************************-->