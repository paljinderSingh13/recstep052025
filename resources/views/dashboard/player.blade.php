@extends('layouts.master')
@section('content')


<!--Player Dashboard page -->
<div class="content-body player-dashboard" style="padding-top: 50px!important">


	<section class="section-one">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 d-flex">
					<div class="player-wrapper w-100">
						<div>
							<div class="player-image">
								<img class="img-fluid" src="{{asset($user['profile_picture'])}}">
								<span class="edit-image"><a href="{{route('edit.profile',base64_encode(auth()->user()->id))}}"><i class="lar la-edit text-white"></i></a></span>
							</div>
							<div>						
								<h4 class="player-name">John Deo</h4>
								<p class="player-jersey-no">{{$user['jersey_no']}}</p>
							</div>
						</div>

						<div class="team_info mb-4 mb-lg-0">
							<div class="row g-2">
								<div class="col-6 d-flex">
									<div class="team_info_1">
										<h6>Role</h6>
										<h5>Batter</h5>
									</div>
								</div>
								<div class="col-6 d-flex">
									<div class="team_info_1">
										<h6>DOB</h6>
										<h5>Nov 05, 1988</h5>
									</div>
								</div>
							</div>
						</div>

						@if($teams)
						@foreach($teams as $team)
						<div class="team-logo">
							<img class="img-fluid mb-3 rounded-circle" src="{{ asset($team['logo']) }}" >
							<p class="team-name">{{ $team['name'] }}</p>
						</div>
						@break 
						@endforeach
						@endif

					</div>
				</div>
				<div class="col-lg-7 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 d-flex align-items-stretch dash_center flex-wrap">
					<div class="banner-image">
						@if($user['dashboard_banner_1'])
						<img class="img-fluid mb-3" src="{{asset($user['dashboard_banner_1'])}}">
						@else
						<img class="img-fluid mb-3" src="{{asset('assets/banner1_1739948175.jpg')}}">

						@endif					
					</div>
					<div class="discover-event-wrapper">
						<div class="title-box">
							<h4 class="">Discover Events</h4>
						</div>
						<ul class="nav nav-fill nav-tabs" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Tue<br>11 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Wed<br>12 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Thu<br>13 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Fri<br>14 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Sat<br>15 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Sun<br>16 Mar </a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Mon<br>17 Mar </a>
							</li>
						</ul>
						<div class="tab-content pt-2" id="tab-content">
							<div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
								<div class="p-3 border rounded">								
									<div class="row"> 
										<div class="col-12 col-sm-12 col-md-12 col-lg-6 ">
											<div class="team-wrapper-title">
												<h4 class="">Game</h4>
											</div>
											<div class="match-vs-teams">
												<p>Paris Saint vs Brest</p>
												<p>2:30 PM </p>
											</div>
											<div class="team-one">
												<div class="team-logo">
													<img src="https://recstep.com/pictures/paris.png">
												</div>
												<div>												
													<p class="mb-0">Paris Saint</p>
												</div>
											</div>
											<div class="team-one">
												<div class="team-logo">
													<img src="https://recstep.com/pictures/brest.png">
												</div>
												<div>												
													<p class="mb-0">Brest</p>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-12 col-md-12 col-lg-6">
											<div class="team-wrapper-title">
												<h4 class="">Tournament</h4>
											</div>
											<div class="match-vs-teams">
												<p>Real Madrid vs Manchester City</p>
												<p>2:30 PM </p>
											</div>
											<div class="team-one">
												<div class="team-logo">
													<img src="https://recstep.com/pictures/real.png">
												</div>
												<div>												
													<p class="mb-0">Real Madrid</p>
												</div>
											</div>
											<div class="team-one">
												<div class="team-logo">
													<img src="https://recstep.com/pictures/manchester.png">
												</div>
												<div>												
													<p class="mb-0">Manchester City</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">Tab Tab 2 selected</div>
							<div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">Tab Tab 3 selected</div>
						</div>
					</div>

				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 d-flex">

					<div class="upcomming-events-wrapper">
						<div class="uce-title mb-2">
							<h4 class="m-0">Upcoming Events</h4>
						</div>	
						<div class="upcoming_event_inner">
							<ul>
								@foreach($upcomingSchedule as $schedule)
								<li>
									<p class=""><span class="icon"><i class="las la-dot-circle"></i> </span> {{\Carbon\Carbon::parse($schedule->date)->format('l') }} <span class="text-success">{{$schedule['type']}}:</span> 
										{{ $schedule->team ? $schedule->team['name'] : 'No Team Assigned' }} 
										@if($schedule['type'] != 'Practice')

										vs 
										{{ $schedule->OpTeam ? $schedule->OpTeam['name'] : 'No Opponent Team' }} 
										@endif @ @if($schedule->time)
										{{ \Carbon\Carbon::parse($schedule->time)->format('g:i A') }}
									@endif</p>							

								</li>
								@endforeach						
							</ul>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- ------------------------- -->
<!-- Record -->
<!-- ------------------------- -->
<section class="section-two">
	<div class="container-fluid">		
		<div class="row record ">
			<div class="col-12 p-0">
				<div>
					<h4 class="mb-0">Record</h4>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 col-md-6 col-12 mb-3 mb-lg-0 border-end">
				<div class="text-center p-3">
					<p class="mb-0">Regular Season Record - <span>{{$lastgame['regular_season_record']}}</span>  </p>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 col-md-6 col-12 mb-3 mb-lg-0">
				<div class="p-3 text-center">
					<p class="mb-0">Playoff Record - <span>{{$lastgame['playoff_record']}}</span>  </p>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- -------------------------------- -->
<!-- Schedule -->
<!-- -------------------------------- -->
<section class="section-three">
	<div class="container-fluid">
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


<section class="section-four">
	
	<div class="container-fluid">
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
								<li><p><span class="icon"><i class="las la-times-circle text-danger"></i> </span> Elijah</p> </li>
							</ul>
						</div>						
						<div class="col-6">
							<ul class="attendance-list pt-2">
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Ethan</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Isabella</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Mason</p> </li>
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span> Charlotte</p> </li>
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
						<h4 class="m-0">Team Chat</h4>
					</div>
					<div class="p-3">
						<div class="row mb-5">
							<div class="col-8">
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
						<div class="row mb-5">
							<div class="col-8">
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
						<div class="row mb-5">
							<div class="col-lg-4 col-md-12 col-sm-12 ">
								
							</div>
							<div class="col-8">
								<div class="user-chat-wrapper chat-rightside">
									
									<div class="user-chat">
										<p>Oh heck yes, I’m in. Thinking of hitting up that new arcade spot. They’ve got that retro Pac-Man machine, right?</p>
									</div>
									<div class="user-image">
										<img width="40px" src="https://recstep.com/pictures/cde.png">
									</div>
								</div>
							</div>
						</div>
						<form id="messageFormUnique">
							<div class="input-group ">

								<input type="text" id="messageInputUnique" class="form-control border-0 bg-white" placeholder="Write Something ...">
								<button class="btn btn-primary rounded" type="submit">Send</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="section-five">
	<div class="container-fluid">
		
		<div class="row ">
			<div class="col-12 col-lg-8 col-md-8 col-sm-12 mb-3 mb-lg-0 d-flex">
				<div class="weekly-highlights-wrapper w-100">
					<div class="title-box">
						<h4>Weekly highlights</h4>
					</div>
					<div class="row p-4 highlight-videos">
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">
							<iframe width="100%" height="420" src="https://www.youtube.com/embed/33EY-QsjWYM" title="India vs Newzealand Match Full Highlights 2025, Champions Trophy 2025, IND VS NZ ODI Full Highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">
							<iframe width="100%" height="420" src="https://www.youtube.com/embed/33EY-QsjWYM" title="India vs Newzealand Match Full Highlights 2025, Champions Trophy 2025, IND VS NZ ODI Full Highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</div>
					</div>
				</div>

			</div>
			<div class="col-12 col-lg-4 col-md-4 col-sm-12 mb-3 mb-lg-0 d-flex">
				<div class="invites-wrapper w-100">
					<div class="inv-title">
						<h4 class="m-0">INVITES</h4>
					</div>
					<div class="bg-secondary-subtle p-3 text-center">						
						<h4 class="mb-0">Brad 24 @ The Blue Tigers </h4>
					</div>
					<div class="">
						<ul>
							<li><a href="#">Are the Delhi Capitals interested in participating in a game on March 21, 2025 8:00am @ The Sports Complex?</a><span class="d-flex px-3"><button class="btn btn-primary btn-sm me-2">Yes</button><button class="btn btn-danger btn-sm">No</button>  </span> </li>
							<li><a href="#">Are the Delhi Capitals interested in participating in a game on March 21, 2025 8:00am @ The Sports Complex?</a><span class="d-flex px-3"><button class="btn btn-primary btn-sm me-2">Yes</button><button class="btn btn-danger btn-sm">No</button>  </span> </li>
							<li><a href="#">Are the Delhi Capitals interested in participating in a game on March 21, 2025 8:00am @ The Sports Complex?</a><span class="d-flex px-3"><button class="btn btn-primary btn-sm me-2">Yes</button><button class="btn btn-danger btn-sm">No</button>  </span> </li>
							<li><a href="#">Are the Delhi Capitals interested in participating in a game on March 21, 2025 8:00am @ The Sports Complex?</a><span class="d-flex px-3"><button class="btn btn-primary btn-sm me-2">Yes</button><button class="btn btn-danger btn-sm">No</button>  </span> </li>
						</ul>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-six mb-4">	
	<div class="container-fluid">
		<div class=" club-announcements-wrapper">
			
			<div class="title-box">
				<h4 class="mb-0">CLUB ANNOUNCEMENTS</h4>
			</div>
			
			<div class="row">
				<div class="col-lg-6 col-md-7 col-sm-12 col-12 border-end">
					<div class="p-4">
						@foreach($announcements as $announcement)
						<p><span class="font-w600">{{$announcement->user->name}} {{$announcement->user->last_name}} </span>-  {{$announcement->announcements}}</p>
						@endforeach


			<!-- <p><b>ADMIN </b>-  Big win for our grassroots team... 10-1  against the Thunder Birds.  Future athletes are being cultivated here.  Stay strong little Capitals!</p>
			<p><b>ADMIN</b> -  Practice this week will be held in a different location.  Please notify your players.  Details in the schedule.  See you all tonight.  Let’s show up ready to work.  Thank you!</p> -->
		</div>
	</div>
	<div class="col-lg-6 col-md-5 col-sm-12 col-12">
		<div class="p-4 text-center">
			
			<img class="img-fluid rounded w-75" src="https://recstep.com/pictures/iccworldcup.png">
			
		</div>
	</div>
</div>

</div>
</div>
</section>

</div>

<style type="text/css">
	.table thead th:last-child,
	.table tbody tr td:last-child {
		text-align: left !important;
	}
</style> @endsection @section('js')
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
