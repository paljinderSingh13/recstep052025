@extends('layouts.master')
@section('content')


<!--Player Dashboard page -->
<div class="content-body player-dashboard4 " style="background-color: #f8f8f8;">


	<section class="section-one pb-5">
		<div class="container">			
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 d-flex">
					<div class="player-wrapper w-100">						
						<div class="card shadow border-0 h-100">
							<div class="card-header p-4">
								<div class="card-title d-flex align-items-center">
									<div class="player-image">
										<img class="img-fluid" src="{{asset($user['profile_picture'])}}">
									</div>
									<h4 class="player-name">John Deo</h4>
								</div>
							</div>
							<div class="card-body p-0">
								<div class="border-bottom mb-3 pt-3 px-3 pb-3">
									<h3 class="mb-0">Clubs</h3>
									<p class="mb-0"><i class="fa-solid fa-circle text-danger"></i> El Mellindo FC</p>
								</div>
								<div class="border-bottom mb-3 px-3 pb-3">
									<h3 class="mb-0">Teams</h3>
									<p class="mb-0"><i class="fa-solid fa-circle text-danger"></i> El Mellindo FC-2008</p>
								</div>
								<div class="border-bottom mb-3 px-3 pb-3">
									<h3 class="mb-0">Groups</h3>
									<p class="mb-0"><i class="fa-solid fa-circle text-success"></i> SLS Youth Soccer</p>
									<p class="mb-0"><i class="fa-solid fa-circle text-warning"></i> Pickup game in Daybreak</p>
								</div>
								<div class="border-bottom mb-3 px-3 pb-3">
									<h3 class="mb-0">Interests</h3>
									<p class="mb-0"><i class="fa-solid fa-circle text-success"></i> Soccer</p>
									<p class="mb-0"><i class="fa-solid fa-circle text-warning"></i> Football</p>
									<p class="mb-0"><i class="fa-solid fa-circle text-danger"></i> Pickleball</p>
								</div>
								<div class="mb-3 px-3 pb-3">
									<h3 class="mb-0">Network</h3>
									<ul class="network-list ms-4">
										<li>24 teammates</li>
										<li>45 friends</li>
										<li>57 following</li>
										<li>84 followers</li>
									</ul>									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 ">
					
					<div class="upcomming-events-wrapper">
						<div class="title-box">
							<img src="https://recstep.com/pictures/sports.png">
							<h4>Upcoming Events</h4>
						</div>
						<div class="pt-3">						

							<ul class="nav nav-fill nav-tabs" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> 
										<div>											
											<div class="event-icon">
												<img width="80px" src="https://recstep.com/pictures/cricket-player.png">
											</div>
											<h4>Game</h4>
											<p class="text-white mb-2">Mar 24 2025</p>
											<p class="date-time">@ 4:00 PM</p>
											<div class="teams-vs-name">
												<p class="mb-0 text-white">El Mellindo FC</p>
												<p class="mb-0 text-white">vs</p>
												<p class="mb-0 text-white">Sparta FC</p>
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false">
										<div>											
											<div class="event-icon">
												<img width="80px" src="https://recstep.com/pictures/soccer-player.png">
											</div>
											<h4>Practice</h4>
											<p class="text-white mb-2">Mar 24 2025</p>
											<p class="date-time">@ 2:00 PM</p>
											<div class="teams-vs-name">												
												<p class="mb-0 text-white">The Blue Tigers</p>
												<p class="mb-0 text-white">vs</p>
												<p class="mb-0 text-white">Sparta FC</p>
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> 
										<div>											
											<div class="event-icon">
												<img width="80px" src="https://recstep.com/pictures/basketball.png">
											</div>
											<h4>Game</h4>
											<p class="text-white mb-2">Mar 24 2025</p>
											<p class="date-time">@ 3:00 PM</p>
											<div class="teams-vs-name">
												<p class="mb-0 text-white">Delhi Capitals</p>
												<p class="mb-0 text-white">vs</p>
												<p class="mb-0 text-white">Sparta FC</p>
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link " id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="fill-tabpanel-3" aria-selected="false"> 
										<div>											
											<div class="event-icon">
												<img width="80px" src="https://recstep.com/pictures/volleyball-net.png">
											</div>
											<h4>Game</h4>
											<p class="text-white mb-2">Apr 02 2025</p>
											<p class="date-time">@ 4:00 PM</p>
											<div class="teams-vs-name">
												<p class="mb-0 text-white">The New York</p>
												<p class="mb-0 text-white">vs</p>
												<p class="mb-0 text-white">Sparta FC</p>
											</div>
										</div>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="fill-tab-4" data-bs-toggle="tab" href="#fill-tabpanel-4" role="tab" aria-controls="fill-tabpanel-4" aria-selected="false"> 
										<div>											
											<div class="event-icon">
												<img width="80px" src="https://recstep.com/pictures/handball.png">
											</div>
											<h4>Practice</h4>
											<p class="text-white mb-2">Apr 10 2025</p>
											<p class="date-time">@ 4:00 PM</p>
											<div class="teams-vs-name">
												<p class="mb-0 text-white">El Mellindo FC</p>
												<p class="mb-0 text-white">vs</p>
												<p class="mb-0 text-white">Mumbai India</p>
											</div>
										</div>
									</a>
								</li>								
							</ul>
							<div class="tab-content " id="tab-content">
								<div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
									<div class="">								
										<div class="row m-auto">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 ">
												<div class="p-3 address-wrapper">
													<div class="text-center">
														<h4>Monday, 24 March 2025 @ 4:00PM</h4>
														<p> El Mellindo FC vs Sparta FC</p>
													</div>
													<div class="map-box">
														<div class="">
															<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.1437171755247!2d-111.99485752397958!3d40.60465267140998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528efaba18dda5%3A0xc2ce3fe39ab53a47!2sWest%20Jordan%20Soccer%20Complex!5e0!3m2!1sen!2sin!4v1742800254468!5m2!1sen!2sin" width="100%" height="222" style="border:0;border-radius: 10px 10px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
														</div>
														<div class="text-center p-2">
															<h4>West Jordan Soccer Complex</h4>
															<p class=""><i class="las la-map-marker text-primary"></i> 8070 4000 W, West Jordan, UT 84088.</p>														
															<button type="button" class="btn btn-rounded btn-outline-secondary btn-sm w-50"> Share</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">

												<div class="attendance-chat-tab-wrapper p-3">
													<ul class="nav nav-tabs nav-justified border-0" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="justified-tab-0" data-bs-toggle="tab" href="#justified-tabpanel-0" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true"> Attendance </a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="justified-tab-1" data-bs-toggle="tab" href="#justified-tabpanel-1" role="tab" aria-controls="justified-tabpanel-1" aria-selected="false"> Event Chat </a>
														</li>

													</ul>
													<div class="tab-content border rounded-bottom" id="tab-content">
														<div class="tab-pane active" id="justified-tabpanel-0" role="tabpanel" aria-labelledby="justified-tab-0">
															<div class="attendance-wrapper">												
																<div class="attendance-box ">
																	<div class="row m-auto border-bottom teams">
																		<div class="col-6 border-end">
																			<div class="p-2">
																				<p class="mb-0">Present Players</p>
																			</div>
																		</div>
																		<div class="col-6 ">
																			<div class="p-2">
																				<p class="mb-0">Absent Players</p>
																			</div>
																		</div>
																	</div>
																	<div class="row m-auto players-list">
																		<div class="col-6 border-end">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>John </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Rohn </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Mohn </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johny </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johina </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Ethan</p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Isabella</p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Mason</p> </li>

																			</ul>
																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-success btn-sm w-50">Present</button>
																			</div>
																		</div>						
																		<div class="col-6">
																			<ul class="attendance-list pt-2">

																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Elijah</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Lionel Messi</p> </li>

																			</ul>
																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-danger btn-sm w-50">Absent</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="tab-pane" id="justified-tabpanel-1" role="tabpanel" aria-labelledby="justified-tab-1">
															<div class="teamchat-wrapper bg-white">												
																<div class="row mb-5 px-3">
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-leftside">
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/abc.png">
																			</div>
																			<div class="user-chat">
																				<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-5 px-3">
																	<div class="col-lg-2 col-md-12 col-sm-12 ">

																	</div>
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-rightside">

																			<div class="user-chat">
																				<p>Oh heck yes, I’m in. Thinking of hitting up that new one basic machine, right?</p>
																			</div>
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
																			</div>
																		</div>
																		<div class="mt-2">
																			<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
																		</div>
																	</div>
																</div>
																<form id="messageFormUnique">
																	<div class="input-group ">

																		<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
																		<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
																	</div>
																</form>

															</div>
														</div>
													</div>
												</div>

												
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
									<div class="">								
										<div class="row m-auto">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="p-3 address-wrapper">
													<div class="text-center">
														<h4>Tuesday, 25 March 2025 @ 2:00PM</h4>
														<p> The Blue Tigers vs Sparta FC</p>
													</div>
													<div class="map-box">
														<div class="">
															<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.1437171755247!2d-111.99485752397958!3d40.60465267140998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528efaba18dda5%3A0xc2ce3fe39ab53a47!2sWest%20Jordan%20Soccer%20Complex!5e0!3m2!1sen!2sin!4v1742800254468!5m2!1sen!2sin" width="100%" height="222" style="border:0;border-radius: 10px 10px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
														</div>
														<div class="text-center p-2">
															<h4>West Jordan Soccer Complex</h4>
															<p class=""><i class="las la-map-marker text-primary"></i> 8070 4000 W, West Jordan, UT 84088.</p>
															<button type="button" class="btn btn-rounded btn-outline-secondary btn-sm w-50">Share</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="attendance-chat-tab-wrapper">
													<ul class="nav nav-tabs nav-justified border-0" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="justified-tab-02" data-bs-toggle="tab" href="#justified-tabpanel-02" role="tab" aria-controls="justified-tabpanel-02" aria-selected="true"> Attendance </a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="justified-tab-12" data-bs-toggle="tab" href="#justified-tabpanel-12" role="tab" aria-controls="justified-tabpanel-12" aria-selected="false"> Event Chat </a>
														</li>

													</ul>
													<div class="tab-content p-3" id="tab-content">
														<div class="tab-pane active" id="justified-tabpanel-02" role="tabpanel" aria-labelledby="justified-tab-02">
															<div class="attendance-wrapper">												
																<div class="attendance-box ">
																	<div class="row m-auto border-bottom teams">
																		<div class="col-6 border-end">
																			<div class="p-2">
																				<p class="mb-0">Present Players</p>
																			</div>
																		</div>
																		<div class="col-6 ">
																			<div class="p-2">
																				<p class="mb-0">Absent Players</p>
																			</div>
																		</div>
																	</div>
																	<div class="row m-auto players-list">
																		<div class="col-6 border-end">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Tom Brady</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Serena Williams</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Roger Federer</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Usain Bolt</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Simone Biles</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Cristiano Ronaldo</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Rafael Nadal</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Novak Djokovic</p></li>
																			</ul>

																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-success btn-sm w-50">Present</button>
																			</div>
																		</div>						
																		<div class="col-6">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Rohit Sharma</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Jos Buttler</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Pat Cummins</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Shubman Gill</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Rashid Khan</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Faf du Plessis</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Quinton de Kock</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Hardik Pandya</p></li>
																			</ul>
																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-danger btn-sm w-50">Absent</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="tab-pane" id="justified-tabpanel-12" role="tabpanel" aria-labelledby="justified-tab-12">
															<div class="teamchat-wrapper bg-white">												
																<div class="row mb-5 px-3">
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-leftside">
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/abc.png">
																			</div>
																			<div class="user-chat">
																				<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-5 px-3">
																	<div class="col-lg-2 col-md-12 col-sm-12 ">

																	</div>
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-rightside">

																			<div class="user-chat">
																				<p>Oh heck yes, They’ve got that retro Pac-Man machine, right?</p>
																			</div>
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
																			</div>
																		</div>
																		<div class="mt-2">
																			<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
																		</div>
																	</div>
																</div>
																<form id="messageFormUnique">
																	<div class="input-group ">

																		<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
																		<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
																	</div>
																</form>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane " id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
									<div class="">								
										<div class="row m-auto">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="p-3 address-wrapper">
													<div class="text-center">
														<h4>Wednesday, 26 March 2025 @ 3:00PM</h4>
														<p> Delhi Capitals vs Sparta FC</p>
													</div>
													<div class="map-box">
														<div class="">
															<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.1437171755247!2d-111.99485752397958!3d40.60465267140998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528efaba18dda5%3A0xc2ce3fe39ab53a47!2sWest%20Jordan%20Soccer%20Complex!5e0!3m2!1sen!2sin!4v1742800254468!5m2!1sen!2sin" width="100%" height="222" style="border:0;border-radius: 10px 10px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
														</div>
														<div class="text-center p-2">
															<h4>West Jordan Soccer Complex</h4>
															<p class=""><i class="las la-map-marker text-primary"></i> 8070 4000 W, West Jordan, UT 84088.</p>
															<button type="button" class="btn btn-rounded btn-outline-secondary btn-sm w-50">Share</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="attendance-chat-tab-wrapper">
													<ul class="nav nav-tabs nav-justified border-0" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="justified-tab-03" data-bs-toggle="tab" href="#justified-tabpanel-03" role="tab" aria-controls="justified-tabpanel-03" aria-selected="true"> Attendance </a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="justified-tab-13" data-bs-toggle="tab" href="#justified-tabpanel-13" role="tab" aria-controls="justified-tabpanel-13" aria-selected="false"> Event Chat </a>
														</li>

													</ul>
													<div class="tab-content p-3" id="tab-content">
														<div class="tab-pane active" id="justified-tabpanel-03" role="tabpanel" aria-labelledby="justified-tab-03">
															<div class="attendance-wrapper">												
																<div class="attendance-box ">
																	<div class="row m-auto border-bottom teams">
																		<div class="col-6 border-end">
																			<div class="p-2">
																				<p class="mb-0">Present Players</p>
																			</div>
																		</div>
																		<div class="col-6 ">
																			<div class="p-2">
																				<p class="mb-0">Absent Players</p>
																			</div>
																		</div>
																	</div>
																	<div class="row m-auto players-list">
																		<div class="col-6 border-end">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Magic Johnson</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Tim Duncan</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Allen Iverson</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Dwyane Wade</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Dirk Nowitzki</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Chris Paul</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Karl Malone</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Charles Barkley</p></li>
																			</ul>

																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-success btn-sm w-50">Present</button>
																			</div>
																		</div>						
																		<div class="col-6">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Shane Warne</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Jacques Kallis</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Ricky Ponting</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>AB de Villiers</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Kumar Sangakkara</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Glenn McGrath</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Brian Lara</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span>Sachin Tendulkar</p></li>
																			</ul>

																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-danger btn-sm w-50">Absent</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="tab-pane" id="justified-tabpanel-13" role="tabpanel" aria-labelledby="justified-tab-13">
															<div class="teamchat-wrapper bg-white">												
																<div class="row mb-5 px-3">
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-leftside">
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/abc.png">
																			</div>
																			<div class="user-chat">
																				<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-5 px-3">
																	<div class="col-lg-2 col-md-12 col-sm-12 ">

																	</div>
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-rightside">

																			<div class="user-chat">
																				<p>Oh heck yes, They’ve got that retro Pac-Man machine, right?</p>
																			</div>
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
																			</div>
																		</div>
																		<div class="mt-2">
																			<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
																		</div>
																	</div>
																</div>
																<form id="messageFormUnique">
																	<div class="input-group ">

																		<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
																		<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
																	</div>
																</form>

															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane " id="fill-tabpanel-3" role="tabpanel" aria-labelledby="fill-tab-3">
									<div class="">								
										<div class="row m-auto">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="p-3 address-wrapper">
													<div class="text-center">
														<h4>Wednesday, 02 April 2025 @ 4:00PM</h4>
														<p> The New York vs Sparta FC</p>
													</div>
													<div class="map-box">
														<div class="">
															<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.1437171755247!2d-111.99485752397958!3d40.60465267140998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528efaba18dda5%3A0xc2ce3fe39ab53a47!2sWest%20Jordan%20Soccer%20Complex!5e0!3m2!1sen!2sin!4v1742800254468!5m2!1sen!2sin" width="100%" height="222" style="border:0;border-radius: 10px 10px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
														</div>
														<div class="text-center p-2">
															<h4>West Jordan Soccer Complex</h4>
															<p class=""><i class="las la-map-marker text-primary"></i> 8070 4000 W, West Jordan, UT 84088.</p>
															<button type="button" class="btn btn-rounded btn-outline-secondary btn-sm w-50">Share</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="attendance-chat-tab-wrapper">
													<ul class="nav nav-tabs nav-justified border-0" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="justified-tab-04" data-bs-toggle="tab" href="#justified-tabpanel-04" role="tab" aria-controls="justified-tabpanel-04" aria-selected="true"> Attendance </a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="justified-tab-14" data-bs-toggle="tab" href="#justified-tabpanel-14" role="tab" aria-controls="justified-tabpanel-14" aria-selected="false"> Event Chat </a>
														</li>

													</ul>
													<div class="tab-content p-3" id="tab-content">
														<div class="tab-pane active" id="justified-tabpanel-04" role="tabpanel" aria-labelledby="justified-tab-04">
															<div class="attendance-wrapper">												
																<div class="attendance-box ">
																	<div class="row m-auto border-bottom teams">
																		<div class="col-6 border-end">
																			<div class="p-2">
																				<p class="mb-0">Present Players</p>
																			</div>
																		</div>
																		<div class="col-6 ">
																			<div class="p-2">
																				<p class="mb-0">Absent Players</p>
																			</div>
																		</div>
																	</div>
																	<div class="row m-auto players-list">
																		<div class="col-6 border-end">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>John </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Rohn </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Mohn </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johny </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johina </p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Ethan</p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Isabella</p> </li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Mason</p> </li>

																			</ul>
																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-success btn-sm w-50">Present</button>
																			</div>
																		</div>						
																		<div class="col-6">
																			<ul class="attendance-list pt-2">

																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Elijah</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Lionel Messi</p> </li>

																			</ul>
																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-danger btn-sm w-50">Absent</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="tab-pane" id="justified-tabpanel-14" role="tabpanel" aria-labelledby="justified-tab-14">
															<div class="teamchat-wrapper bg-white">												
																<div class="row mb-5 px-3">
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-leftside">
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/abc.png">
																			</div>
																			<div class="user-chat">
																				<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-5 px-3">
																	<div class="col-lg-2 col-md-12 col-sm-12 ">

																	</div>
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-rightside">

																			<div class="user-chat">
																				<p>Oh heck yes, They’ve got that retro Pac-Man machine, right?</p>
																			</div>
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
																			</div>
																		</div>
																		<div class="mt-2">
																			<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
																		</div>
																	</div>
																</div>
																<form id="messageFormUnique">
																	<div class="input-group ">

																		<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
																		<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
																	</div>
																</form>

															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane " id="fill-tabpanel-4" role="tabpanel" aria-labelledby="fill-tab-4">
									<div class="">								
										<div class="row m-auto">
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="p-3 address-wrapper">
													<div class="text-center">
														<h4>Thursday, 10 April 2025 @ 4:00PM</h4>
														<p> El Mellindo FC vs Mumbai India</p>
													</div>
													<div class="map-box">
														<div class="">
															<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3029.1437171755247!2d-111.99485752397958!3d40.60465267140998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528efaba18dda5%3A0xc2ce3fe39ab53a47!2sWest%20Jordan%20Soccer%20Complex!5e0!3m2!1sen!2sin!4v1742800254468!5m2!1sen!2sin" width="100%" height="222" style="border:0;border-radius: 10px 10px 0 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
														</div>
														<div class="text-center p-2">
															<h4>West Jordan Soccer Complex</h4>
															<p class=""><i class="las la-map-marker text-primary"></i> 8070 4000 W, West Jordan, UT 84088.</p>
															<button type="button" class="btn btn-rounded btn-outline-secondary btn-sm w-50">Share</button>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0 pe-lg-0">
												<div class="attendance-chat-tab-wrapper">
													<ul class="nav nav-tabs nav-justified border-0" role="tablist">
														<li class="nav-item" role="presentation">
															<a class="nav-link active" id="justified-tab-05" data-bs-toggle="tab" href="#justified-tabpanel-05" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true"> Attendance </a>
														</li>
														<li class="nav-item" role="presentation">
															<a class="nav-link" id="justified-tab-5" data-bs-toggle="tab" href="#justified-tabpanel-5" role="tab" aria-controls="justified-tabpanel-5" aria-selected="false"> Event Chat </a>
														</li>

													</ul>
													<div class="tab-content p-3" id="tab-content">
														<div class="tab-pane active" id="justified-tabpanel-05" role="tabpanel" aria-labelledby="justified-tab-05">
															<div class="attendance-wrapper">												
																<div class="attendance-box ">
																	<div class="row m-auto border-bottom teams">
																		<div class="col-6 border-end">
																			<div class="p-2">
																				<p class="mb-0">Present Players</p>
																			</div>
																		</div>
																		<div class="col-6 ">
																			<div class="p-2">
																				<p class="mb-0">Absent Players</p>
																			</div>
																		</div>
																	</div>
																	<div class="row m-auto players-list">
																		<div class="col-6 border-end">
																			<ul class="attendance-list pt-2">
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Sachin Tendulkar</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Rahul Dravid</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Brian Lara</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Jacques Kallis</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Ricky Ponting</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>AB de Villiers</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Muttiah Muralitharan</p></li>
																				<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Glenn McGrath</p></li>
																			</ul>

																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-success btn-sm w-50">Present</button>
																			</div>
																		</div>						
																		<div class="col-6">
																			<ul class="attendance-list pt-2">

																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Ricky Ponting</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Shane Warne</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Brian Lara</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Kumar Sangakkara</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Chris Gayle</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Glenn McGrath</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Virender Sehwag</p></li>
																				<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Muttiah Muralitharan</p></li>

																			</ul>

																			<div class=" mb-4">
																				<button type="button" class="btn btn-rounded btn-danger btn-sm w-50">Absent</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="tab-pane" id="justified-tabpanel-5" role="tabpanel" aria-labelledby="justified-tab-5">
															<div class="teamchat-wrapper bg-white">												
																<div class="row mb-5 px-3">
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-leftside">
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/abc.png">
																			</div>
																			<div class="user-chat">
																				<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="row mb-5 px-3">
																	<div class="col-lg-2 col-md-12 col-sm-12 ">

																	</div>
																	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
																		<div class="user-chat-wrapper chat-rightside">

																			<div class="user-chat">
																				<p>Oh heck yes, They’ve got that retro Pac-Man machine, right?</p>
																			</div>
																			<div class="user-image">
																				<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
																			</div>
																		</div>
																		<div class="mt-2">
																			<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
																		</div>
																	</div>
																</div>
																<form id="messageFormUnique">
																	<div class="input-group ">

																		<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
																		<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
																	</div>
																</form>

															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>				
			</div>
		</div>
	</section>

<!-- -------------------------------- -->
<!-- Schedule -->
<!-- -------------------------------- -->
<section class="section-three d-none">
	<div class="container">
		<div class="row m-auto">
			<div class="p-3 schedule-calendar">
				<div class=" ">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Schedule</h4>
								<div> <a href="{{ route('team.schedule') }}" class="btn btn-primary ms-2 cbtn">List View</a>
									@if (auth()->user()->role != 'player')
									<a href="{{ route('schedule.add') }}" class="btn btn-primary ms-2 cbtn">Create
									Schedule</a>
									@endif
								</div>
							</div>
							<div class="card-body">
								<form action="{{ route('player.dashboard.filter') }}" method="POST" id="myForm"> @csrf <div
									class="row align-items-end mb-4">
									@if (auth()->user()->role != 'player')
									<div class="col-6 col-sm-6 col-md-6 col-lg-3 my-1"> <label class="me-sm-2 form-label">Team Wise</label> <select
										class="me-sm-2 default-select form-control wide" name="team_id"
										id="inlineFormCustomSelect">
										<option value="">All</option>
										@foreach ($teams as $team)
										<option value="{{ $team->id }}"
											{{ (old('team_id') ?? $teamId) == $team->id ? 'selected' : '' }}>
											{{ $team->name }} </option>
											@endforeach
										</select> </div>
										@endif
										<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Date Wise</label> <input
											class=" dateInput form-control @error('date_from') is-invalid @enderror"
											type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date"
											value="{{ old('date') ?? $date }}"> </div>
											<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Location Wise</label> <select
												class="me-sm-2 default-select form-control wide" name="location_id"
												id="inlineFormCustomSelect">
												<option value="">Choose...</option>
												@foreach ($locations as $location)
												<option value="{{ $location->id }}"
													{{ (old('location_id') ?? $locationId) == $location->id ? 'selected' : '' }}>
													{{ $location->name }} </option>
													@endforeach
												</select> </div>
												<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Type Wise</label> <select
													class="me-sm-2 default-select form-control wide" name="type"
													id="inlineFormCustomSelect">
													<option value="">Choose...</option>
													<option value="Tournaments"
													{{ (old('type') ?? $typeId) == 'Tournaments' ? 'selected' : '' }}>
												Tournaments</option>
												<option value="Game"
												{{ (old('type') ?? $typeId) == 'Game' ? 'selected' : '' }}>Game</option>
												<option value="Practice"
												{{ (old('type') ?? $typeId) == 'Practice' ? 'selected' : '' }}>Practice
											</option>
										</select> </div>
										<div class="col-6 col-sm-6 col-md-6 col-lg-3 my-1"> <button class="btn btn-primary ms-2 cbtn">Search</button>
										</div>
									</div>

									<div class="table-responsive">
										<h3 class="text-center">
											@php
											$startDate = $startOfMonth->copy()->startOfWeek(); // Adjust to the start of the week
											$endDate = $endOfMonth->copy()->endOfWeek();       // Adjust to the end of the week
											$currentDate = $startDate->copy();
											@endphp

										</h3>
										<div class=" d-flex justify-content-between align-items-center mb-3">
											<div>

												<a href="" class="btn btn-primary ms-2 " id="today-btn">Today</a>
											</div>

											<div >
												<h2 id="current-view-title">{{  \Carbon\Carbon::createFromFormat('m/d/Y', $searchDate)->format('F Y') ?? \Carbon\Carbon::now()->format('F Y') }} </h2>
											</div>
											<div>
												<nav class="d-inline-block" aria-label="Page navigation example">
													<ul class="pagination">
														<li class="page-item">
															<a class="page-link" href="#" id="previous-btn" aria-label="Previous">
																<i class="las la-angle-left"></i>
															</a>
														</li>
														<li class="page-item">
															<a class="page-link" href="#" id="next-btn" aria-label="Next">
																<i class="las la-angle-right"></i>
															</a>
														</li>
													</ul>
												</nav>
												<input type="hidden" id="btnNxtPrv" name="btnNxtPrv">
	                                    <!-- <div class="btn-group" role="group" aria-label="View Type Toggle">
	                                        <input type="radio" class="btn-check" name="view_type" id="btnradio1" value="month" autocomplete="off" {{ $viewType === 'month' ? 'checked' : '' }}>
	                                        <label class="btn btn-outline-primary rounded-start-1" for="btnradio1">Month</label>

	                                        <input type="radio" class="btn-check" name="view_type" id="btnradio2" value="week" autocomplete="off" {{ $viewType === 'week' ? 'checked' : '' }}>
	                                        <label class="btn btn-outline-primary" for="btnradio2">Week</label>

	                                        <input type="radio" class="btn-check" name="view_type" id="btnradio3" value="day" autocomplete="off" {{ $viewType === 'day' ? 'checked' : '' }}>
	                                        <label class="btn btn-outline-primary" for="btnradio3">Day</label>
	                                    </div> -->
	                                </div>
	                            </div>
	                            <input type="hidden" id="todayDate" value="{{ \Carbon\Carbon::now()->format('m/d/Y') }}">
	                            <input type="hidden" name="searchDate" id="searchDate" value="{{ $searchDate ?? \Carbon\Carbon::now()->format('m/d/Y') }}">
	                        </form>
	                        <table class="table table-bordered table-responsive-sm " id="table_calendar">
	                        	<thead>
	                        		<tr>
	                        			@foreach ([ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'] as $day)
	                        			<th>{{ $day }}</th>
	                        			@endforeach
	                        		</tr>
	                        	</thead>
	                        	<tbody>
	                        		@php
	                        		$startFromOne = 'no';
	                        		$isPlayer = 'no';

	                        		@endphp
	                        		@while ($currentDate <= $endDate)
	                        		<tr>
	                        			@for ($i = 0; $i < 7; $i++)
	                        			@php
	                        			$currentFormattedDate = $currentDate->format('Y-m-d');
	                        			$schedules = $groupedSchedules[$currentFormattedDate] ?? collect([]);
	                        			$typeCounts = $schedules->groupBy('type')->map->count();
	                        			@endphp
	                        			<td>
	                        				@if($currentDate->format('d') == '01')
	                        				@php
	                        				$startFromOne = 'yes';
	                        				@endphp
	                        				@endif
	                        				@if($startFromOne == 'yes')
	                        				<div class="date-label"><span class="date">
	                        					{{ $currentDate->format('d') }}</span>
	                        				</div>

	                        				@if ($schedules->isEmpty())
	                        				@if($startFromOne == 'yes')
	                        				<span class="no-schedule">No Schedule</span>
	                        				@endif
	                        				@else
	                        				@foreach ($typeCounts as $type => $count)
	                        				@php
	                        				$typeClass = match ($type) {
	                        					'Practice' => 'practice',
	                        					'Game' => 'game',
	                        					'Tournaments' => 'tournaments',
	                        					default => '',
	                        				};
	                        				@endphp
	                        				<span class="{{ $typeClass }}">
	                        					<b>
	                        						<a class="btn btn-link btn-sm p-0"
	                        						data-bs-toggle="collapse"
	                        						href="#scheduleDetails{{ $currentFormattedDate . $type }}"
	                        						role="button" aria-expanded="false"
	                        						aria-controls="scheduleDetails{{ $currentFormattedDate . $type }}">
	                        						{{ ucfirst($type) }} - {{ $count }}
	                        						{{ $count == 1 ? 'event' : 'events' }}
	                        					</a>
	                        				</b>

	                        				<!-- Collapsible Content -->
	                        				<div class="collapse mt-2 event-wrapper"
	                        				id="scheduleDetails{{ $currentFormattedDate . $type }}">
	                        				@foreach ($schedules->where('type', $type) as $schedule)
	                        				<div class="event" style="{{ $loop->last ? 'border-bottom:none;' : '' }}">
	                        					@if ($schedule->OpTeam)
	                        					<span style="display:block;">
	                        						<a style="cursor:pointer;"
	                        						class="view-player-schedule"
	                        						data-schedule-id="{{ $schedule->id }}"
	                        						data-opposing-id="{{ $schedule->team_id }}" data-team-name="{{ $schedule->team->name }}">
	                        						{{ $schedule->team->name ?? 'Unknown Team' }}
	                        					</a>
	                        					@if (isset($schedule->team) && $schedule->team->players->count() > 0)
	                        					<span style="font-size: 13px;color: #000;font-weight: 600;">
	                        						({{ $schedule->comingTeamPlayers()->where('team_id', $schedule->team_id)->count() ?? 0 }}/{{ $schedule->team->players->count() }})
	                        					</span>
	                        					@else
	                        					<span style="font-size: 13px;color: #000;font-weight: 600;">
	                        						(0/0)
	                        					</span>
	                        					@endif
	                        				</span>
	                        				<span
	                        				style="display:block; margin-left:20px; font-weight: 700;font-size:12px;">Vs</span>
	                        				<span style="display:block;">
	                        					<a style="cursor:pointer;"
	                        					class="view-player-schedule"
	                        					data-schedule-id="{{ $schedule->id }}"
	                        					data-opposing-id="{{ $schedule->opposing_team_id }}" data-team-name="{{ $schedule->OpTeam['name'] }}">
	                        					{{ $schedule->OpTeam['name'] ?? 'Unknown Opposing Team' }}
	                        				</a>

	                        				@if (isset($schedule->team) && $schedule->team->players->count() > 0)
	                        				<span style="font-size: 13px;color: #000;font-weight: 600;">
	                        					({{ $schedule->comingTeamPlayers()->where('team_id', $schedule->opposing_team_id)->count() ?? 0 }}/{{ $schedule->team->players->count() }})
	                        				</span>
	                        				@else
	                        				<span style="font-size: 13px;color: #000;font-weight: 600;">
	                        					(0/0)
	                        				</span>
	                        				@endif
	                        			</span>
	                        		</span>
	                        		@endif

	                        		@if ($schedule->type == 'Practice')
	                        		<span style="display:block;">
	                        			<a style="cursor:pointer;"
	                        			class="view-player-schedule"
	                        			data-schedule-id="{{ $schedule->id }}"
	                        			data-opposing-id="{{ $schedule->team_id }}" data-team-name="{{ $schedule->team->name }}">
	                        			{{ $schedule->team->name ?? 'Unknown Team' }}
	                        		</a>
	                        	</span>
	                        	<span style="font-size:12px;"><i
	                        		class="las la-clock"></i>
	                        		{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->timing_from)->format('h:i A') }}
	                        	</span>
	                        	<br>
	                        	@else
	                        	<span style="font-size:12px;"><i
	                        		class="las la-clock"></i>
	                        		{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->time)->format('h:i A') }}</span>
	                        		<br>
	                        		@endif
	                        		<button type="button"
	                        		class="btn btn-link btn-sm p-0 view-map"
	                        		data-location="{{ $schedule->loc->name ?? 'Unknown' }}"
	                        		data-city="{{ $schedule->city }}">
	                        		<i class="las la-map-marker"></i>
	                        		Location
	                        	</button>
	                        	@if(auth()->user()->role == 'player')
	                        	@if(!array_key_exists($schedule->id, $playerSchedules->toArray()))
	                        	<br>
	                        	<button class="btn btn-success btn-sm respond-button" data-response="yes" data-schedule-id="{{ $schedule->id }}">Yes</button>
	                        	<button class="btn btn-danger btn-sm respond-button" data-response="no" data-schedule-id="{{ $schedule->id }}">No</button>
	                        	@endif
	                        	@endif
	                        </div>
	                        @endforeach
	                    </div>
	                </span>
	                @endforeach
	                @endif
	                @endif
	                @php
	                $currentDate->addDay();
	                @endphp
	            </td>
	            @endfor
	        </tr>
	        @endwhile
	    </tbody>
	</table>



	<!-- Modal for Location Details -->
	<div class="modal fade" id="mapModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Location Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>
				<div class="modal-body">
					<p><strong>Location:</strong> <span id="modalLocation">N/A</span></p>
					<p><strong>City:</strong> <span id="modalCity">N/A</span></p>

					<!-- Map Section -->
					<div id="locationMap" style="height: 300px; width: 100%; margin-top: 20px;">
						<!-- Map will be rendered here -->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="modal fade" id="playerScheduleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" style="max-width: 700px;"
	role="document">
	<div class="modal-content">
		<div class="bg-primary justify-content-evenly modal-header">
			<div class="col-sm-6">
				<h4 class="modal-title text-white" id="teamName">Player Details</h4>

			</div>
			<div class="col-sm-6">

				<span class="fw-medium modal-count text-white" id="model-count"></span>
			</div>
			<button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
		</div>
		<div class="modal-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-responsive-sm">
					<thead>
						<tr>
							<th>Player Name</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="playerDetailsContent">
						<!-- Content will be dynamically loaded via AJAX -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>


<section class="section-four d-none">
	
	<div class="container">
		<div class="row ">
			<div class="col-lg-4 col-md-4 col-sm-12 mb-3 mb-lg-0 d-flex">

				<div class="today-practice w-100">
					<div class="title-box">
						<h4>Today Game @ 10:00 AM </h4>
					</div>
					<div class="row m-auto border-bottom teams">
						<div class="col-6 border-end">
							<div class="p-2">
								<p class="mb-0">National American</p>
							</div>
						</div>
						<div class="col-6 ">
							<div class="p-2">
								<p class="mb-0">Mumbai Indian</p>
							</div>
						</div>
					</div>
					<div class="row m-auto players-list">
						<div class="col-6 border-end">
							<ul class="attendance-list pt-2">
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>John </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Rohn </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Mohn </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johny </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>Johina </p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Lionel Messi</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Cristiano</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Neymar Jr.</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Kylian Mbappé</p> </li>
							</ul>
						</div>						
						<div class="col-6">
							<ul class="attendance-list pt-2">
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Ethan</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Isabella</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Mason</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Charlotte</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Erling </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Mohamed </p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Kevin De</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Lucas</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Amelia</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Benjamin</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Harper</p> </li>
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Elijah</p> </li>
							</ul>
						</div>
					</div>
				</div>
				<!-- <div class="practice-players ">
					<div class="pp-title mb-2">
						<p class="m-0">Practice </p>
					</div>	
					<div class="px-3">

					</div>
				</div> -->
			</div>
			<!-- ---------------------- -->
			<!-- Team Chat -->
			<!-- ---------------------- -->
			
			<div class="col-lg-8 col-md-8 col-sm-12 mb-3 mb-lg-0 d-flex">
				<div class="teamchat-wrapper w-100">
					<div class="tcw-title mb-2">
						<div class="d-flex">							
							<div class="team-logo me-3">
								<img src="https://recstep.com/pictures/paris.png">
							</div>
							<div class="text-start">

								<h4 class="m-0">National American Team </h4>
								<span>Online</span>
							</div>
						</div>

						<div class="dropdown">
							<a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="las la-ellipsis-v fs-28"></i></a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#">View</a>
								<a class="dropdown-item" href="#">Edit</a>
							</div>
						</div>
					</div>


					<div class="">
						<div class="row mb-5 px-3 mt-3">
							<div class="col-12 col-sm-12 col-md-12 col-lg-9">
								<div class="user-chat-wrapper chat-leftside">
									<div class="user-image">
										<img width="40px" src="https://recstep.com/pictures/abc.png">
									</div>
									<div class="user-chat">
										<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-5 px-3">
							<div class="col-12 col-sm-12 col-md-12 col-lg-9">
								<div class="user-chat-wrapper chat-leftside">
									<div class="user-image">
										<img width="40px" src="https://recstep.com/pictures/abc.png">
									</div>
									<div class="user-chat">
										<p>Yo, anyone free this weekend? Thinking of hitting up that new arcade spot.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-5 px-3">
							<div class="col-lg-4 col-md-12 col-sm-12 ">
								
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-8">
								<div class="user-chat-wrapper chat-rightside">
									
									<div class="user-chat">
										<p>Oh heck yes, I’m in. Thinking of hitting up that new arcade spot. They’ve got that retro Pac-Man machine, right?</p>
									</div>
									<div class="user-image">
										<img width="40px" src="https://recstep.com/pictures/viratplayer.jpg">
									</div>
								</div>
								<div class="mt-2">
									<span><i class="las la-check-double text-primary"></i> <span>11:50PM</span> </span>
								</div>
							</div>
						</div>
						<form id="messageFormUnique">
							<div class="input-group ">

								<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
								<button class="btn btn-primary rounded" type="submit">Send <i class="las la-paper-plane"></i></button>
							</div>
						</form>

					</div>

				</div>
			</div>
		</div>
	</div>
</section>


<section class="section-five d-none">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card border-0 shadow">
					<div class="card-header">
						<h4 class="card-title">Upcoming Activities</h4>
						<div class="flex-shrink-0">
							<div class="dropdown card-header-dropdown">
								<a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-end" style="">
									<a class="dropdown-item" href="#">Edit</a>
									<a class="dropdown-item" href="#">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<ul class="list-group list-group-flush border-dashed">
							<li class="list-group-item ps-0">
								<div class="row align-items-center g-3">
									<div class="col-auto">
										<div class="avatar-sm p-1 py-2 h-auto bg-primary-subtle rounded-3 material-shadow">
											<div class="text-center">
												<h5 class="mb-0">25</h5>
												<div class="text-muted">Tue</div>
											</div>
										</div>
									</div>
									<div class="col">
										<h5 class="mt-0 mb-1 fs-22">12:00am - 03:30pm</h5>
										<a href="#" class="text-reset mb-0">Meeting for campaign with sales team</a>
									</div>
									<div class="col-sm-auto">
										<div class="avatar-group">
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Stine Nielsen" data-bs-original-title="Stine Nielsen">
													<img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Jansh Brown" data-bs-original-title="Jansh Brown">
													<img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Dan Gibson" data-bs-original-title="Dan Gibson">
													<img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);">
													<div class="avatar-xxs">
														<span class="avatar-title rounded-circle bg-info text-white">
															5
														</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->
							</li><!-- end -->
							<li class="list-group-item ps-0">
								<div class="row align-items-center g-3">
									<div class="col-auto">
										<div class="avatar-sm p-1 py-2 h-auto bg-primary-subtle rounded-3 material-shadow">
											<div class="text-center">
												<h5 class="mb-0">20</h5>
												<div class="text-muted">Wed</div>
											</div>
										</div>
									</div>
									<div class="col">
										<h5 class="mt-0 mb-1 fs-22">02:00pm - 03:45pm</h5>
										<a href="#" class="text-reset mb-0">Adding a new event with attachments</a>
									</div>
									<div class="col-sm-auto">
										<div class="avatar-group">
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Frida Bang" data-bs-original-title="Frida Bang">
													<img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Malou Silva" data-bs-original-title="Malou Silva">
													<img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Simon Schmidt" data-bs-original-title="Simon Schmidt">
													<img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Tosh Jessen" data-bs-original-title="Tosh Jessen">
													<img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);">
													<div class="avatar-xxs">
														<span class="avatar-title rounded-circle bg-primary text-white">
															3
														</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->
							</li><!-- end -->
							<li class="list-group-item ps-0">
								<div class="row align-items-center g-3">
									<div class="col-auto">
										<div class="avatar-sm p-1 py-2 h-auto bg-primary-subtle rounded-3 material-shadow">
											<div class="text-center">
												<h5 class="mb-0">17</h5>
												<div class="text-muted">Wed</div>
											</div>
										</div>
									</div>
									<div class="col">
										<h5 class="mt-0 mb-1 fs-22">04:30pm - 07:15pm</h5>
										<a href="#" class="text-reset mb-0">Create new project Bundling Product</a>
									</div>
									<div class="col-sm-auto">
										<div class="avatar-group">
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Nina Schmidt" data-bs-original-title="Nina Schmidt">
													<img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Stine Nielsen" data-bs-original-title="Stine Nielsen">
													<img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Jansh Brown" data-bs-original-title="Jansh Brown">
													<img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);">
													<div class="avatar-xxs">
														<span class="avatar-title rounded-circle bg-primary text-white">
															4
														</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->
							</li><!-- end -->
							<li class="list-group-item ps-0">
								<div class="row align-items-center g-3">
									<div class="col-auto">
										<div class="avatar-sm p-1 py-2 h-auto bg-primary-subtle rounded-3 material-shadow">
											<div class="text-center">
												<h5 class="mb-0">12</h5>
												<div class="text-muted">Tue</div>
											</div>
										</div>
									</div>
									<div class="col">
										<h5 class="mt-0 mb-1 fs-22">10:30am - 01:15pm</h5>
										<a href="#" class="text-reset mb-0">Weekly closed sales won checking with sales team</a>
									</div>
									<div class="col-sm-auto">
										<div class="avatar-group">
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Stine Nielsen" data-bs-original-title="Stine Nielsen">
													<img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Jansh Brown" data-bs-original-title="Jansh Brown">
													<img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Dan Gibson" data-bs-original-title="Dan Gibson">
													<img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xxs">
												</a>
											</div>
											<div class="avatar-group-item material-shadow">
												<a href="javascript: void(0);">
													<div class="avatar-xxs">
														<span class="avatar-title rounded-circle bg-warning text-white">
															9
														</span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
								
								
								<!-- end row -->
							</li><!-- end -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-six mb-4">	
	<div class="container">

	</div>
</section>

</div>

<style type="text/css">
	.table thead th:last-child,
	.table tbody tr td:last-child {
		text-align: left !important;
	}
</style> 

<script>
	document.addEventListener("DOMContentLoaded", () => {
		const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
		tooltips.forEach(tooltip => new bootstrap.Tooltip(tooltip));
	});
</script>

@endsection @section('js')



<script src="{{ asset('assets/js/own.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.view-player-schedule').forEach(function(button) {
			button.addEventListener('click', function() {
                        const scheduleId = this.getAttribute('data-schedule-id'); // Schedule ID
                        const teamId = this.getAttribute('data-opposing-id'); // Team ID
                        const teamName = this.getAttribute('data-team-name'); // Team ID
                        const teamNameElement = document.getElementById('teamName');
                        if (teamNameElement) {
                            teamNameElement.textContent = teamName; // Set teamName as the content of the element
                        }
                        // Make an AJAX request to fetch the player details
                        fetch(`/schedule/${scheduleId}/players/${teamId}`)
                        .then(response => {
                        	if (!response.ok) {
                        		throw new Error('Network response was not ok');
                        	}
                        	return response.json();
                        })
                        .then(data => {
                                // Clear existing content in the modal table body
                        	const tbody = document.getElementById('playerDetailsContent');
                        	tbody.innerHTML = '';

                                // Initialize counters
                        	let totalPlayers = 0;
                        	let comingPlayers = 0;

                                // Check if players exist
                        	if (data.team && data.team.players.length > 0) {
                        		totalPlayers = data.team.players.length;

                        		data.team.players.forEach(player => {
                        			if (player.status === 'Confirmed') {
                        				comingPlayers++;
                        			}

                        			const statusClass = player.status === 'Confirmed' ?
                        			'text-success' :
                        			(player.status === 'Not Coming' ?
                        				'text-danger' : 'text-primary');

                        			const icon = player.status === 'Confirmed' ?
                        			'<i class="fa fa-check"></i>' :
                        			(player.status === 'Not Coming' ?
                        				'<i class="fa fa-times"></i>' :
                        				'<i class="las la-exclamation"></i>');

                        			const row = `
                                <tr>
                                    <td class="text-capitalize">${player.name || 'Unknown Player'}</td>
                                    <td>
                                        <span class="${statusClass}">${icon}</span> ${player.status}
                                    </td>
                                </tr>
                        			`;
                        			tbody.innerHTML += row;
                        		});
                        	} else {
                        		tbody.innerHTML = `
                            <tr>
                                <td colspan="2" class="text-center">No Player Schedules</td>
                            </tr>
                        		`;
                        	}

                                // Update the player count in the modal
                        	const playerCountDiv = document.getElementById('model-count');
                        	playerCountDiv.textContent =
                        `${comingPlayers}/${totalPlayers} Attending`;

                                // Show the modal
                        const modal = new bootstrap.Modal(document.getElementById(
                        	'playerScheduleModal'));
                        modal.show();
                    })
                        .catch(error => {
                        	console.error('Error fetching player details:', error);
                        });
                    });
		});
	});
</script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('.view-map').forEach(function (button) {
			button.addEventListener('click', function () {
				const location = this.getAttribute('data-location');
				const city = this.getAttribute('data-city');

            // Update modal details
				document.getElementById('modalLocation').textContent = location || 'N/A';
				document.getElementById('modalCity').textContent = city || 'N/A';

            // Initialize map
				const mapElement = document.getElementById('locationMap');
            mapElement.innerHTML = ''; // Clear previous map
            const map = new google.maps.Map(mapElement, {
                center: { lat: 0, lng: 0 }, // Default center
                zoom: 15
            });

            const geocoder = new google.maps.Geocoder();
            const address = location ? `${location}, ${city}` : city;

            geocoder.geocode({ address }, function (results, status) {
            	if (status === 'OK') {
            		map.setCenter(results[0].geometry.location);
            		new google.maps.Marker({
            			map,
            			position: results[0].geometry.location
            		});
            	} else {
            		console.error('Geocode was not successful for the following reason:', status);
            	}
            });

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('mapModal'));
            modal.show();
        });
		});
	});

</script>
<script>


	document.addEventListener("DOMContentLoaded", function() {
                // Get references to the radio buttons
		const btnradio1 = document.getElementById("btnradio1");
		const btnradio2 = document.getElementById("btnradio2");
		const btnradio3 = document.getElementById("btnradio3");

                // Get the 'Today' button
		const todayBtn = document.getElementById("today-btn");

                // Add event listeners to each radio button
		btnradio1.addEventListener("click", function() {
			todayBtn.click();
		});

		btnradio2.addEventListener("click", function() {
			todayBtn.click();
		});

		btnradio3.addEventListener("click", function() {
			todayBtn.click();
		});
	});
</script>
<script>
	document.getElementById("next-btn").addEventListener("click", function(e) {
                e.preventDefault(); // Prevent default action
                document.getElementById("btnNxtPrv").value = "Next";
                document.getElementById("myForm").submit();
            });

	document.getElementById("previous-btn").addEventListener("click", function(e) {
                e.preventDefault(); // Prevent default action
                document.getElementById("btnNxtPrv").value = "Previous";
                document.getElementById("myForm").submit();
            });
        </script>
        <script>
        	function navigate(direction) {
        		document.getElementById('calendar-direction').value = direction;
        		document.getElementById('calendar-navigation-form').submit();
        	}



        </script>
        <script>
        	document.querySelectorAll('.respond-button').forEach(button => {
        		button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default button behavior (e.g., form submission)

        const type = this.getAttribute('data-response'); // 'yes' or 'no'
        const scheduleId = this.getAttribute('data-schedule-id');

        fetch(`/player/schedule/store/${type}/${scheduleId}`, {
        	method: "POST",
        	headers: {
        		"Content-Type": "application/json",
        		"X-CSRF-TOKEN": "{{ csrf_token() }}"
        	}
        })
        .then(response => response.json())
        .then(data => {
        	if (data.success) {
        		alert(data.message);
                // Optionally update the UI
        		this.parentNode.innerHTML = `<span class="text-success">Response recorded as "${data.message.toUpperCase()}"</span>`;
        	} else {
        		alert("Error: " + data.message);
        	}
        })
        .catch(error => console.error("Error:", error));
    });
        	});

        </script>

        <!-- ajax -->

        @section('js')
        <script>
        	document.getElementById('messageFormUnique').addEventListener('submit', function(event) {
			    event.preventDefault(); // Prevent the default form submission

			    const messageInput = document.getElementById('messageInputUnique');
			    const message = messageInput.value.trim();
			    const selectedId = Number(document.getElementById("selectedId").value);

			    if (message) {
			    	fetch(`/api/teams/admin/${selectedId}/messages`, {
			    		method: "POST",
			    		headers: {
			    			"Content-Type": "application/json",
			    			"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
			    		},
			    		body: JSON.stringify({ message }),
			    	})
			    	.then(response => {
			    		if (!response.ok) {
			    			throw new Error('Network response was not ok');
			    		}
			    		return response.json();
			    	})
			    	.then(data => {
			    		console.log('Message sent successfully:', data);
			            messageInput.value = ""; // Clear the input field after successful submission
			        })
			    	.catch(error => {
			    		console.error("Error sending message:", error);
			    	});
			    } else {
			    	console.error("Message cannot be empty");
			    }
			});
		</script>
		@endsection
		@endsection
