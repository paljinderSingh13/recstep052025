	@extends('layouts.master')
	@section('content')


<!--Player Dashboard page -->

<style type="text/css">
	.player-dashboard5 .upcomming-events-wrapper {
		border-radius: 10px;
		background: #ffffff;
		
		overflow: hidden;
		margin-bottom: 20px;
	}
	.player-dashboard5 .schedule-calendar .title-box ,
	.player-dashboard5 .upcomming-events-wrapper .title-box {
		padding: 21px;
		border-radius: 10px 10px 0 0;
		/* background: #115A83; */
		position: relative;
		z-index: 1;
		margin-bottom: 20px;
		border-bottom: 1px solid #e8e8e8;
		display: flex
		;
		align-items: center;
	}
	.player-dashboard5 .schedule-calendar .title-box h4, 
	.player-dashboard5 .upcomming-events-wrapper .title-box h4 {
		/* text-transform: uppercase; */
		/* text-align: center; */
		color: #212121;
		font-size: 25px;
		line-height: 35px;
		margin-bottom: 0;
	}
	.player-dashboard5 .schedule-calendar .title-box img,
	.player-dashboard5 .upcomming-events-wrapper .title-box img{
		width: 28px;
		margin-right: 10px;
		animation: flip 4s infinite linear;
	}
	@keyframes flip {
		0% {
			transform: rotateY(0);
		}
		50% {
			transform: rotateY(180deg);
		}
		100% {
			transform: rotateY(360deg);
		}
	}

	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link.active,
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link:hover, 
	.player-dashboard5 .upcomming-events-wrapper .nav-justified .nav-item .nav-link.active .player-dashboard5 .upcomming-events-wrapper .nav-justified .nav-item .nav-link:hover {
		border: 3px solid #35AA76;
		background: #ffffff;
		box-shadow: 2px 5px 10px 1px rgb(53 170 118 / 44%);
		margin-top: -5px;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link, 
	.player-dashboard5 .upcomming-events-wrapper .nav-justified .nav-item .nav-link {
		border-radius: 10px;
		border: 3px solid #115A83;
		padding: 0;
		background: #ffffff;
		margin-bottom: 20px;
		transition: all 0.3s ease-in-out;
		/* transition: transform 0.6s ease; */
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link:hover h4, 
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link.active h4 {
		background: #35AA76;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link h4 {
		padding: 5px;
		color: #fff;
		border-radius: 6px 6px 0 0;
		background: #115A83;
		margin-bottom: 0px;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link .event-icon img {
		width: 60px;
		margin: 10px 0;
		transition: transform 0.3s ease-in-out;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill .nav-item .nav-link:hover img {
		/* transform: rotate(10deg); */
		transform: scaleX(-1);
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-link .date-time {
		font-size: 12px;
		line-height: 16px;
		font-weight: 600;
		margin-bottom: 5px;
		color: #212121;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-item .nav-link:hover .teams-vs-name, 
	.player-dashboard5 .upcomming-events-wrapper .nav-item .nav-link.active .teams-vs-name {
		background-color: #35AA76;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-item .nav-link .teams-vs-name {
		border-radius: 10px;
		padding: 10px;
		background-color: #115A83;
		margin: 0 10px 10px 10px;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill {
		border-bottom: 2px solid #e8e8e8;
		padding: 0 15px 0px 15px;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-fill li.nav-item {
		margin-right: 10px;
	}
	.player-dashboard5 .upcomming-events-wrapper .nav-link .teams-vs-name p {
		font-size: 12px;
		line-height: 14px;
	}
/*	-------------------------------------------------------*/
.player-dashboard5 .attendance-chat-tab-wrapper .nav-fill .nav-item .nav-link.active, 
.player-dashboard5 .attendance-chat-tab-wrapper .nav-justified .nav-item .nav-link.active {
	background-color: #115a83;
	padding: 15px;
	color: #ffffff;
	margin-bottom: 0;
	border-radius: 0;
	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
}
.player-dashboard5 .attendance-chat-tab-wrapper .nav-fill .nav-item .nav-link, 
.player-dashboard5 .attendance-chat-tab-wrapper .nav-justified .nav-item .nav-link {
	background-color: #35aa76;
	padding: 15px;
	color: #ffffff;
	margin-bottom: 0;
	border-radius: 0;
	border: none;
}
.player-dashboard5 .attendance-box {
	/* box-shadow: 0px 5px 16px 1px rgba(0, 0, 0, 0.08); */
	border-radius: 10px;
	background: #ffffff;
}
.player-dashboard5 .attendance-box .attendance-list li {
	border-bottom: 1px dotted #e8e8e8;
	padding-bottom: 5px;
	margin-bottom: 5px;
}
.player-dashboard5 .attendance-box .attendance-list li:last-child {
	border-bottom: none;
}
.player-dashboard5 .attendance-box .attendance-list li p {
	font-size: 14px;
	line-height: 24px;
	color: #212121;
	margin-bottom: 0px;
}
.player-dashboard5 .teamchat-wrapper .user-image img {
	width: 50px;
	border-radius: 50%;
}
.player-dashboard5 .teamchat-wrapper .user-image {
	padding: 0 10px;
}
.player-dashboard5 .teamchat-wrapper .user-chat-wrapper.chat-leftside {
	display: flex
	;
	flex-wrap: nowrap;
	align-items: center;
	justify-content: flex-start;
	flex-direction: row;
	margin-top: 20px;
}
.player-dashboard5 .teamchat-wrapper .user-chat-wrapper.chat-leftside .user-chat {
	padding: 10px;
	background: #ffffff;
	border-radius: 0 6px 6px 6px;
	box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1);
	color: #414141;
}
.player-dashboard5 .teamchat-wrapper .user-chat p {
	font-size: 14px;
	line-height: 20px;
	margin-bottom: 0px;
}
.player-dashboard5 .teamchat-wrapper .user-chat-wrapper.chat-rightside {
	display: flex
	;
	flex-wrap: nowrap;
	align-items: center;
	justify-content: flex-start;
	flex-direction: row;
}
.player-dashboard5 .teamchat-wrapper .user-chat-wrapper.chat-rightside .user-chat {
	padding: 10px;
	background: #E6F0F5;
	border-radius: 6px 0px 6px 6px;
	box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1);
	color: #414141;
}
.player-dashboard5 .teamchat-wrapper .user-chat p {
	font-size: 14px;
	line-height: 20px;
	margin-bottom: 0px;
}
.player-dashboard5 form#messageFormUnique {
	/* box-shadow: 0 0.0625rem 0.375rem 0 rgba(47, 43, 61, 0.1); */
	padding: 15px;
	/* background: #ffffff; */
	/* border-radius: 10px; */
	border-top: 1px solid #e8e8e8;
}
.player-dashboard5 .attendance-box .teams p {
	font-size: 14px;
	line-height: 24px;
	color: #212121;
	/* text-transform: uppercase; */
	font-weight: 500;
}
.player-dashboard5 table tr:nth-last-child(-n+3) {
	display: none;
}
.player-dashboard5 table tr:first-child {
	display: none;
}
</style>
<div class="content-body player-dashboard5 " style="background-color: #f8f8f8;">


	<section class="section-one pb-5">
		<div class="container">
			<div class="row">
				<!-- Main Content -->
				<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
					<!-- -------------------------------- -->
<!-- Schedule -->
<!-- -------------------------------- -->

<div class="rounded border shadow-sm schedule-calendar">
	<div class=" ">
		<div class="">
			<div class="card">
				<div class="card-header p-3 title-box">
					<div class="d-flex">						
						<img src="https://recstep.com/pictures/cal-schedule.png">
						<h6 class="">Schedule</h6>
					</div>
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
						<div class="col-6 col-sm-6 col-md-6 col-lg-6 my-1"> <label class="me-sm-2 form-label">Team Wise</label> <select
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
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 my-1"> <label class="me-sm-2 form-label">Date Wise</label> <input
								class=" dateInput form-control @error('date_from') is-invalid @enderror"
								type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date"
								value="{{ old('date') ?? $date }}"> </div>
								<div class="col-6 col-sm-6 col-md-6 col-lg-6 my-1"> <label class="me-sm-2 form-label">Location Wise</label> <select
									class="me-sm-2 default-select form-control wide" name="location_id"
									id="inlineFormCustomSelect">
									<option value="">Choose...</option>
									@foreach ($locations as $location)
									<option value="{{ $location->id }}"
										{{ (old('location_id') ?? $locationId) == $location->id ? 'selected' : '' }}>
										{{ $location->name }} </option>
										@endforeach
									</select> </div>
									<div class="col-6 col-sm-6 col-md-6 col-lg-6 my-1"> <label class="me-sm-2 form-label">Type Wise</label> <select
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
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 my-1"> <button class="btn btn-primary w-100 cbtn">Search</button>
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
<div class="upcomming-events-wrapper shadow-sm border">
	<div class="title-box p-3">
		<img src="https://recstep.com/pictures/sports.png">
		<h6 class="mb-0">Upcoming Events</h6>
	</div>
	<div class="pt-2">						

		<ul class="nav nav-fill nav-tabs" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="false" tabindex="-1"> 
					<div>											
						<h4>Game</h4>
						<div class="event-icon">
							<img width="80px" src="https://recstep.com/pictures/cricket-player.png">
						</div>
						<p class="date-time">Mar 24 2025 <br> @ 4:00 PM</p>
						<div class="teams-vs-name">
							<p class="mb-0 text-white">El Mellindo FC</p>
							<p class="mb-0 text-white">vs</p>
							<p class="mb-0 text-white">Sparta FC</p>
						</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false" tabindex="-1">
					<div>											
						<h4>Practice</h4>
						<div class="event-icon">
							<img width="80px" src="https://recstep.com/pictures/soccer-player.png">
						</div>
						<p class="date-time">Mar 25 2025 <br> @ 2:00 PM</p>
						<div class="teams-vs-name">												
							<p class="mb-0 text-white">The Blue Tigers</p>
							<p class="mb-0 text-white">vs</p>
							<p class="mb-0 text-white">Sparta FC</p>
						</div>
					</div>
				</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false" tabindex="-1"> 
					<div>											
						<h4>Game</h4>
						<div class="event-icon">
							<img width="80px" src="https://recstep.com/pictures/basketball.png">
						</div>
						<p class="date-time">Mar 26 2025 <br> @ 3:00 PM</p>
						<div class="teams-vs-name">
							<p class="mb-0 text-white">Delhi Capitals</p>
							<p class="mb-0 text-white">vs</p>
							<p class="mb-0 text-white">Sparta FC</p>
						</div>
					</div>
				</a>
			</li>											
		</ul>
		<div class="tab-content " id="tab-content">
			<div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
				<div class="">								
					<div class="row m-auto">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
							<div class="py-2 address-wrapper">
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">

							<div class="attendance-chat-tab-wrapper py-2">
								<ul class="nav nav-tabs nav-justified border-0" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="justified-tab-0" data-bs-toggle="tab" href="#justified-tabpanel-0" role="tab" aria-controls="justified-tabpanel-0" aria-selected="true"> Attendance </a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="justified-tab-1" data-bs-toggle="tab" href="#justified-tabpanel-1" role="tab" aria-controls="justified-tabpanel-1" aria-selected="false" tabindex="-1"> Event Chat </a>
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2 ">
							<div class="py-2 address-wrapper">
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
							<div class="attendance-chat-tab-wrapper py-2">
								<ul class="nav nav-tabs nav-justified border-0" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="justified-tab-02" data-bs-toggle="tab" href="#justified-tabpanel-02" role="tab" aria-controls="justified-tabpanel-02" aria-selected="true"> Attendance </a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="justified-tab-12" data-bs-toggle="tab" href="#justified-tabpanel-12" role="tab" aria-controls="justified-tabpanel-12" aria-selected="false" tabindex="-1"> Event Chat </a>
									</li>

								</ul>
								<div class="tab-content border rounded-bottom" id="tab-content">
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

														<div class="mb-4">
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
														<div class="mb-4">
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
			<div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
				<div class="">								
					<div class="row m-auto">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-2">
							<div class="attendance-chat-tab-wrapper">
								<ul class="nav nav-tabs nav-justified border-0" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="justified-tab-03" data-bs-toggle="tab" href="#justified-tabpanel-03" role="tab" aria-controls="justified-tabpanel-03" aria-selected="true"> Attendance </a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" id="justified-tab-13" data-bs-toggle="tab" href="#justified-tabpanel-13" role="tab" aria-controls="justified-tabpanel-13" aria-selected="false" tabindex="-1"> Event Chat </a>
									</li>

								</ul>
								<div class="tab-content border rounded-bottom" id="tab-content">
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

														<div class="text-center mb-4">
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

														<div class="text-center mb-4">
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


		</div>
	</div>
</div>

<div class="box shadow-sm border rounded bg-white mb-3 osahan-share-post">
	<ul class="nav nav-justified border-bottom osahan-line-tab" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="las la-edit"></i> Share an update</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="las la-image"></i> Upload a photo</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="las la-clipboard"></i> Write an article</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
			<div class="p-3 d-flex align-items-center w-100" href="#">
				<div class="dropdown-list-image me-3">
					<!-- <img class="rounded-circle" src="https://recstep.com/pictures/user.png" alt=""> -->
					<img class="rounded-circle" src="https://recstep.com/profile_pictures/1742038516_player.jpg" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="w-100">
					<textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			<div class="p-3 w-100">
				<textarea placeholder="Write your thoughts..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
			</div>
		</div>
		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			<div class="p-3 w-100">
				<textarea placeholder="Write an article..." class="form-control border-0 p-0 shadow-none" rows="3"></textarea>
			</div>
		</div>
	</div>

	<div class="border-top p-3 d-flex align-items-center">
		<div class="me-auto"><a href="#" class="text-link small"><i class="las la-map-marker"></i> Add Location</a></div>
		<div class="flex-shrink-1">
			<button type="button" class="btn btn-light btn-sm">Preview</button>
			<button type="button" class="btn btn-primary btn-sm">Post Status</button>
		</div>
	</div>
</div>
<div class="box shadow-sm border rounded bg-white mb-3 osahan-post">
	<div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
		<div class="dropdown-list-image me-3">
			<img class="rounded-circle" src="https://recstep.com/pictures/p5.png" alt="">
			<div class="status-indicator bg-success"></div>
		</div>
		<div class="font-weight-bold">
			<div class="text-truncate">Tobia Crivellari</div>
			<div class="small text-gray-500">Product Designer at askbootstrap</div>
		</div>
		<span class="ms-auto small">3 hours</span>
	</div>
	<div class="p-3 border-bottom osahan-post-body">
		<p class="mb-0">Tmpo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
	</div>
	<div class="p-3 border-bottom osahan-post-footer">
		<a href="#" class="me-3 text-secondary"><i class="las la-heart text-danger"></i> 16</a>
		<a href="#" class="me-3 text-secondary"><i class="las la-comment-alt"></i> 8</a>
		<a href="#" class="me-3 text-secondary"><i class="las la-share-alt-square"></i> 2</a>
	</div>
	<div class="p-3">
		<button type="button" class="btn btn-outline-primary btn-sm mr-1">Awesome!!</button>
		<button type="button" class="btn btn-light btn-sm mr-1">😍</button>
		<button type="button" class="btn btn-outline-secondary btn-sm mr-1">Whats it about?</button>
		<button type="button" class="btn btn-outline-secondary btn-sm mr-1">Oooo Great Wow</button>
	</div>
</div>
<div class="mb-3 shadow-sm rounded box bg-white osahan-slider-main">	
	<div id="multiItemCarousel" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row m-auto">
					<div class="col-md-6">

						<a href="job-profile.html" tabindex="-1">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
										<div class="text-truncate text-primary">Envato</div>
										<div class="small text-gray-500"><i class="las la-map-marker"></i> India, Punjab</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l1.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Julia Cox">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p4.png" alt="" data-original-title="Robert Cook">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p5.png" alt="" data-original-title="Sophia Lee">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="job-profile.html" tabindex="-1">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
										<div class="text-truncate text-primary">Envato</div>
										<div class="small text-gray-500"><i class="las la-clock"></i> India, Punjab</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l1.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Julia Cox">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p4.png" alt="" data-original-title="Robert Cook">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p5.png" alt="" data-original-title="Sophia Lee">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
			<div class="carousel-item">
				<div class="row m-auto">
					<div class="col-md-6">
						<a href="job-profile.html" tabindex="-1">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">.NET Developer</h6>
										<div class="text-truncate text-primary">Invision</div>
										<div class="small text-gray-500"><i class="las la-clock"></i> London, UK
										</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l4.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p13.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="Julia Cox">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Robert Cook">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="job-profile.html" tabindex="-1">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">Channel Sales Director</h6>
										<div class="text-truncate text-primary">Slack Inc.</div>
										<div class="small text-gray-500"><i class="las la-clock"></i> London, UK
										</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l7.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p12.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p13.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="Julia Cox">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>

				</div>
			</div>
			<div class="carousel-item">
				<div class="row m-auto">
					<div class="col-md-6">
						<a href="job-profile.html" tabindex="-1">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">UI/UX designer</h6>
										<div class="text-truncate text-primary">Envato</div>
										<div class="small text-gray-500"><i class="las la-clock"></i> India, Punjab</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l1.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Julia Cox">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p4.png" alt="" data-original-title="Robert Cook">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p5.png" alt="" data-original-title="Sophia Lee">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="job-profile.html" tabindex="0">
							<div class="shadow-sm border rounded bg-white job-item job-item mr-2 mt-3 mb-3">
								<div class="d-flex align-items-center p-3 job-item-header">
									<div class="overflow-hidden mr-2">
										<h6 class="font-weight-bold text-dark mb-0 text-truncate">.NET Developer</h6>
										<div class="text-truncate text-primary">Invision</div>
										<div class="small text-gray-500"><i class="las la-clock"></i> London, UK
										</div>
									</div>
									<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l4.png" alt="">
								</div>
								<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
									<div class="overlap-rounded-circle d-flex">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p13.png" alt="" data-original-title="Sophia Lee">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="John Doe">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p2.png" alt="" data-original-title="Julia Cox">
										<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Robert Cook">
									</div>
									<span class="font-weight-bold text-primary">18 connections</span>
								</div>
								<div class="p-3 job-item-footer">
									<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Carousel Controls -->
		<button class="carousel-control-prev text-dark" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</button>
		<button class="carousel-control-next text-dark" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
		</button>
	</div>						
</div>
<div class="box mb-3 shadow-sm border rounded bg-white osahan-post">
	<div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
		<div class="dropdown-list-image me-3">
			<img class="rounded-circle" src="https://recstep.com/pictures/p6.png" alt="">
			<div class="status-indicator bg-success"></div>
		</div>
		<div class="font-weight-bold">
			<div class="text-truncate">Collin Weiland</div>
			<div class="small text-gray-500">Web Developer @Google</div>
		</div>
		<span class="ms-auto small">3 hours</span>
	</div>
	<div class="p-3 border-bottom osahan-post-body">
		<p>Lorem ipsum dolor sit amet, consectetur 😍😎 adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
		<img src="https://recstep.com/pictures/post4.jpg" class="img-fluid" alt="Responsive image">
	</div>
	<div class="p-3 border-bottom osahan-post-footer">
		<a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
		<a href="#" class="me-3 text-secondary"><i class="feather-message-square"></i> 8</a>
		<a href="#" class="me-3 text-secondary"><i class="feather-share-2"></i> 2</a>
	</div>
	<div class="p-3 d-flex align-items-top border-bottom osahan-post-comment">
		<div class="dropdown-list-image me-3">
			<img class="rounded-circle" src="https://recstep.com/pictures/p7.png" alt="">
			<div class="status-indicator bg-success"></div>
		</div>
		<div class="font-weight-bold">
			<div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span></div>
			<div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
		</div>
	</div>
	<div class="p-3">
		<textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
	</div>
</div>
<div class="box mb-3 shadow-sm border rounded bg-white osahan-post">
	<div class="p-3 d-flex align-items-center border-bottom osahan-post-header">
		<div class="dropdown-list-image me-3">
			<img class="rounded-circle" src="https://recstep.com/pictures/p6.png" alt="">
			<div class="status-indicator bg-success"></div>
		</div>
		<div class="font-weight-bold">
			<div class="text-truncate">Collin Weiland</div>
			<div class="small text-gray-500">Web Developer @Google</div>
		</div>
		<span class="ms-auto small">3 hours</span>
	</div>
	<div class="p-3 border-bottom osahan-post-body">
		<p>Lorem ipsum dolor sit amet, consectetur 😍😎 adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <a href="#">laboris consequat.</a></p>
		<img src="https://recstep.com/pictures/post3.jpg" class="img-fluid" alt="Responsive image">
	</div>
	<div class="p-3 border-bottom osahan-post-footer">
		<a href="#" class="me-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
		<a href="#" class="me-3 text-secondary"><i class="feather-message-square"></i> 8</a>
		<a href="#" class="me-3 text-secondary"><i class="feather-share-2"></i> 2</a>
	</div>
	<div class="p-3 d-flex align-items-top border-bottom osahan-post-comment">
		<div class="dropdown-list-image me-3">
			<img class="rounded-circle" src="https://recstep.com/pictures/p7.png" alt="">
			<div class="status-indicator bg-success"></div>
		</div>
		<div class="font-weight-bold">
			<div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span></div>
			<div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
		</div>
	</div>
	<div class="p-3">
		<textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none" rows="1"></textarea>
	</div>
</div>
</main>
<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12 cus-scrollbar">
	<div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
		<div class="py-4 px-3 border-bottom">
			<img style="width: 130px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
			<h5 class="font-weight-bold text-dark mb-1 mt-4">John Deo</h5>
			<p class="mb-0 text-muted">SLS Youth Soccer</p>
		</div>
		<div class="d-flex">
			<div class="col-6 border-right p-3">
				<h6 class="font-weight-bold text-dark mb-1">75</h6>
				<p class="mb-0 text-black-50 small">Connections</p>
			</div>
			<div class="col-6 p-3">
				<h6 class="font-weight-bold text-dark mb-1">55</h6>
				<p class="mb-0 text-black-50 small">Views</p>
			</div>
		</div>
		<div class="overflow-hidden border-top d-none">
			<a class="font-weight-bold p-3 d-block" href="profile.html"> View my profile </a>
		</div>
	</div>
	<div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
		<div class="box-title border-bottom p-3">
			<h6 class="m-0">Networks</h6>
		</div>
		<div class="d-flex flex-wrap text-center">
			<div class="col-6 border-right py-4 px-2">
				<h5 class="font-weight-bold text-info mb-1">24 <i class="las la-users"></i></h5>
				<p class="mb-0 text-black-50 small">Teammates</p>
			</div>
			<div class="col-6 py-4 px-2">
				<h5 class="font-weight-bold text-success mb-1">45<i class="las la-user-friends ms-2"></i></h5>
				<p class="mb-0 text-black-50 small">Friends</p>
			</div>
			<div class="col-6 border-right py-4 px-2">
				<h5 class="font-weight-bold text-info mb-1">57 <i class="las la-walking"></i></h5>
				<p class="mb-0 text-black-50 small">Following</p>
			</div>
			<div class="col-6 py-4 px-2">
				<h5 class="font-weight-bold text-success mb-1">84<i class="las la-user-check ms-2"></i>	</h5>
				<p class="mb-0 text-black-50 small">Followers</p>
			</div>
		</div>
		<div class="overflow-hidden border-top text-center d-none">
			<img src="https://recstep.com/pictures/chart.png" class="img-fluid" alt="Responsive image">
		</div>
	</div>
	<div class="box shadow-sm mb-3 rounded bg-white ads-box text-center d-none">
		<img src="https://recstep.com/pictures/job1.png" class="img-fluid" alt="Responsive image">
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
			<p class="mb-0 text-muted">Looking for talent?</p>
		</div>
		<div class="p-3">
			<button type="button" class="btn btn-outline-primary ps-4 pe-4"> POST A JOB </button>
		</div>
	</div>
</aside>
<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12 cus-scrollbar	">
	<div class="box shadow-sm border rounded bg-white mb-3">
		<div class="box-title border-bottom p-3">
			<h6 class="m-0">People you might know</h6>
		</div>
		<div class="box-body p-3">
			<div class="d-flex align-items-center osahan-post-header mb-3 people-list">
				<div class="dropdown-list-image me-3">
					<img class="rounded-circle" src="https://recstep.com/pictures/p8.png" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="font-weight-bold mr-2">
					<div class="text-truncate">Sophia Lee</div>
					<div class="small text-gray-500">Goalkeeper</div>
				</div>
				<span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="las la-user-plus"></i></button>
				</span>
			</div>
			<div class="d-flex align-items-center osahan-post-header mb-3 people-list">
				<div class="dropdown-list-image me-3">
					<img class="rounded-circle" src="https://recstep.com/pictures/p9.png" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="font-weight-bold mr-2">
					<div class="text-truncate">John Doe</div>
					<div class="small text-gray-500">Defenders
					</div>
				</div>
				<span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="las la-user-plus"></i></button>
				</span>
			</div>
			<div class="d-flex align-items-center osahan-post-header mb-3 people-list">
				<div class="dropdown-list-image me-3">
					<img class="rounded-circle" src="https://recstep.com/pictures/p10.png" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="font-weight-bold mr-2">
					<div class="text-truncate">Julia Cox</div>
					<div class="small text-gray-500">Midfielders
					</div>
				</div>
				<span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="las la-user-plus"></i></button>
				</span>
			</div>
			<div class="d-flex align-items-center osahan-post-header mb-3 people-list">
				<div class="dropdown-list-image me-3">
					<img class="rounded-circle" src="https://recstep.com/pictures/p11.png" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="font-weight-bold mr-2">
					<div class="text-truncate">Robert Cook</div>
					<div class="small text-gray-500">Forwards
					</div>
				</div>
				<span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="las la-user-plus"></i></button>
				</span>
			</div>
			<div class="d-flex align-items-center osahan-post-header people-list">
				<div class="dropdown-list-image me-3">
					<img class="rounded-circle" src="https://recstep.com/pictures/p12.png" alt="">
					<div class="status-indicator bg-success"></div>
				</div>
				<div class="font-weight-bold mr-2">
					<div class="text-truncate">Richard Bell</div>
					<div class="small text-gray-500">Defenders
					</div>
				</div>
				<span class="ms-auto"><button type="button" class="btn btn-light btn-sm"><i class="las la-user-plus"></i></button>
				</span>
			</div>
		</div>
	</div>
	<div class="box shadow-sm border rounded bg-white mb-3">
		<div class="box-title border-bottom p-3 d-flex align-items-center">
			<h6 class="m-0">Gallery</h6>
			<a class="ms-auto" href="#">See All <i class="feather-chevron-right"></i></a>
		</div>
		<div class="box-body p-3">
			<div class="gallery-box-main">
				<div class="gallery-box">
					<img class="img-fluid" src="https://recstep.com/pictures/fp1.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp2.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp3.jpg" alt="">
				</div>
				<div class="gallery-box">
					<img class="img-fluid" src="https://recstep.com/pictures/fp4.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp5.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp6.jpg" alt="">
				</div>
				<div class="gallery-box">
					<img class="img-fluid" src="https://recstep.com/pictures/fp7.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp8.jpg" alt="">
					<img class="img-fluid" src="https://recstep.com/pictures/fp9.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden d-none">
		<img src="https://recstep.com/pictures/ads1.png" class="img-fluid" alt="Responsive image">
		<div class="p-3 border-bottom">
			<h6 class="font-weight-bold text-gold">Osahanin Premium</h6>
			<p class="mb-0 text-muted">Grow &amp; nurture your network</p>
		</div>
		<div class="p-3">
			<button type="button" class="btn btn-outline-gold ps-4 pe-4"> ACTIVATE </button>
		</div>
	</div>
	<div class="box shadow-sm border rounded bg-white mb-3 d-none">
		<div class="box-title border-bottom p-3">
			<h6 class="m-0">Jobs
			</h6>
		</div>
		<div class="box-body p-3">
			<a href="job-profile.html">
				<div class="shadow-sm border rounded bg-white job-item mb-3">
					<div class="d-flex align-items-center p-3 job-item-header">
						<div class="overflow-hidden mr-2">
							<h6 class="font-weight-bold text-dark mb-0 text-truncate">Product Director</h6>
							<div class="text-truncate text-primary">Spotify Inc.</div>
							<div class="small text-gray-500"><i class="las la-clock"></i> India, Punjab</div>
						</div>
						<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l3.png" alt="">
					</div>
					<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
						<div class="overlap-rounded-circle">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p9.png" alt="" data-original-title="Sophia Lee">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p10.png" alt="" data-original-title="John Doe">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p11.png" alt="" data-original-title="Julia Cox">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p12.png" alt="" data-original-title="Robert Cook">
						</div>
						<span class="font-weight-bold text-muted">18 connections</span>
					</div>
					<div class="p-3 job-item-footer">
						<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
					</div>
				</div>
			</a>
			<a href="job-profile.html">
				<div class="shadow-sm border rounded bg-white job-item">
					<div class="d-flex align-items-center p-3 job-item-header">
						<div class="overflow-hidden mr-2">
							<h6 class="font-weight-bold text-dark mb-0 text-truncate">.NET Developer</h6>
							<div class="text-truncate text-primary">Invision</div>
							<div class="small text-gray-500"><i class="las la-clock"></i> London, UK
							</div>
						</div>
						<img class="img-fluid ms-auto" src="https://recstep.com/pictures/l4.png" alt="">
					</div>
					<div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
						<div class="overlap-rounded-circle">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p13.png" alt="" data-original-title="Sophia Lee">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p1.png" alt="" data-original-title="John Doe">
							<img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="https://recstep.com/pictures/p3.png" alt="" data-original-title="Robert Cook">
						</div>
						<span class="font-weight-bold text-muted">18 connections</span>
					</div>
					<div class="p-3 job-item-footer">
						<small class="text-gray-500"><i class="las la-clock"></i> Posted 3 Days ago</small>
					</div>
				</div>
			</a>
		</div>
	</div>
</aside>
</div>
</div>



</section>


</div>


<style type="text/css">	
	
	aside{
		overflow: hidden;
		position: sticky;
		max-height: 100vh;
		top: 100px;
	}
	.btn-light {
		color: #007bff;
		background-color: #ebf2ff;
		border-color: #ebf2ff;
	}
	.btn-light:hover {
		color: #007bff;
		background-color: #ffffff;
		border-color: #007bff;
	}

	a {
		color: var(--primary);
		text-decoration: none;
	}
	body{
		color: #212529;
	}
	/* Tab Design */
	.osahan-line-tab .nav-link {
		font-size: 14px;
		font-weight: 500;
		padding: 1rem!important;
		color:#888da8;
		position: relative;
	}
	.osahan-line-tab .nav-link.active {
		color: #007bff;
	}
	.osahan-line-tab .nav-link.active:after {
		content: "";
		background: -moz-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
		/* ff3.6+ */
		background: -webkit-gradient(linear, left top, right top, color-stop(0%, #007bff), color-stop(100%, #00c9e4));
		/* safari4+,chrome */
		background: -webkit-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
		/* safari5.1+,chrome10+ */
		background: -o-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
		/* opera 11.10+ */
		background: -ms-linear-gradient(194deg, #00c9e4 0%, #007bff 100%);
		/* ie10+ */
		background: linear-gradient(256deg, #00c9e4 0%, #007bff 100%);
		/* w3c */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007bff', endColorstr='#00c9e4',GradientType=1 );
		/* ie6-9 */
		height: 3px;
		position: absolute;
		bottom: -2px;
		left: 0;
		right: 0;
	}
/* End Tab */
.text-gold {
	color: #d3ac2b;
}
.btn-outline-gold {
	color: #d3ac2b;
	border-color: #d3ac2b;
}
.btn-outline-gold:hover {
	color: #ffffff;
	background-color: #d3ac2b;
	border-color: #d3ac2b;
}
.dropdown-menu{
	border-color: #eaebec;
}
.dropdown-item {
	padding: 6px 1rem;
}
/*.btn-outline-secondary {
	color: #b7b9cc;
	border-color: #b7b9cc;
}*/
/*.btn-outline-secondary:hover, .btn-outline-secondary:focus {
	color: #ffffff;
	border-color: #b7b9cc;
	background-color: #b7b9cc;
}*/
.bg-dark {
	background: #1d2f38 !important;
}
.form-control, .btn {
/*	font-size: 13px;*/
}
.input-group-text, .custom-select{
	font-size: 13px;
}
.text-dark {
	color: #1d2f38 !important;
}
.small, small {
	font-size: 14px;
}
.no-arrow .dropdown-toggle::after {
	display: none;
}
.text-truncate {
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
.dropdown .dropdown-menu, .dropdown-item {
	font-size: .85rem;
}
.text-gray-500 {
	color: #b7b9cc!important;
}
.dropdown-list-image {
	position: relative;
	height: 2.5rem;
	width: 2.5rem;
}
.dropdown-list-image img {
	height: 2.5rem;
	width: 2.5rem;
}
.dropdown-list-image .status-indicator {
	background-color: #eaecf4;
	height: .75rem;
	width: .75rem;
	border-radius: 100%;
	position: absolute;
	bottom: 0;
	right: 0;
	border: .125rem solid #fff;
}
.people-list .font-weight-bold div {
	text-overflow: ellipsis;
	overflow: hidden;
}
.h5, h5 {
	font-size: 1.7rem;
}
.h6, h6 {
	font-size: 1.3rem;
}
/* Gallery / Review */
.reviews-members img.mr-3 {
	width: 50px;
	height: 50px;
	border-radius: 50px;
}
.reviews-members {
	border-bottom: 1px solid #eaebec;
	padding: 17px 17px;
	margin: 0 -17px;
}
.reviews-members:last-child {
	border: none;
}
.gallery-box-main {
	border-radius: 10px;
	overflow: hidden;
}
.gallery-box:last-child {
	margin-bottom: 0px;
}
.gallery-box img:last-child {
	margin-right: 0px;
}
.gallery-box {
	align-items: center;
	display: flex;
	margin-bottom: 2px;
	justify-content: space-between;
}
.gallery-box img {
	width: 34%;
	border-right: 2px solid transparent;
}
/* End Gallery /
/* People List */
.people-list .font-weight-bold {
	font-weight: 500 !important;
	word-break: break-all;
	overflow: hidden;
	white-space: nowrap;
}
.people-list .btn-sm {
	font-size: 1.2rem!important;
}
.people-list .font-weight-bold div {
	text-overflow: ellipsis;
	overflow: hidden;
}
/* End People List */
/* Job List */
.job-item-header .img-fluid, .job-item-2 .img-fluid {
	width: 40px;
	height: 40px;
}
/* End Job List */
/* Network Item */
.overlap-rounded-circle .rounded-circle {
	width: 22px;
	height: 22px;
	border: 2px solid #fff;
	margin: 0 0 0 -9px;
}
.overlap-rounded-circle {
	margin-right: 9px;
	padding-left: 9px;
}
.image-overlap-2 .img-fluid {
	width: 75px;
	height: 75px;
	border: 4px solid #fff;
	margin: 0 -12px;
}
/* End Network Item */
/* FAQ */
.card-btn-arrow {
	display: inline-block;
	color: #377dff;
	margin-left: 1rem;
	transition: 0.3s ease-in-out;
}
.collapsed .card-btn-arrow {
	-webkit-transform: rotate(-90deg);
	transform: rotate(-90deg);
}
/* End FAQ */
/* Chat */
.osahan-chat-box {
	height: 322px;
	overflow-y: scroll;
}
.osahan-chat-list {
	overflow-y: auto;
	height: 463px;
	min-height: 463px;
}
/* End Chat */
/* Blog */
.blog-card .card-footer img {
	margin: 0 11px 0 0;
	width: 33px;
}
.blog-card .badge {
	font-size: 12px;
	font-stretch: normal;
	font-style: normal;
	font-weight: 500;
	letter-spacing: 1px;
	line-height: normal;
	margin: 0 0 12px;
	padding: 6px 10px;
	text-transform: uppercase;
}
.blog-card .badge-primary {
	background-color: rgba(92, 93, 232, 0.1);
	color: #5c5de8;
}
.blog-card .badge-danger {
	background-color: rgba(250, 100, 35, 0.1);
	color: #fa6423;
}
.blog-card .badge-success {
	background-color: rgba(0, 216, 200, 0.09);
	color: #00d8c8;
}
.blog-card .badge-dark {
	background-color: rgba(52, 58, 64, 0.19);
	color: #343a40;
}
.blog-card .badge-info {
	background-color: rgba(23, 160, 184, 0.17);
	color: #17a2b8;
}
.blog-card .badge-white {
	background-color: rgba(255, 255, 255, 0.81);
	color: #5c5de8;
}
.reviews-card .d-flex {
	height: 50px;
	width: 50px;
}
.reviews-card h5 small {
	color: #848484;
	font-size: 12px;
	margin: 0 0 0 8px;
}
.star-rating i {
	font-size: 11px;
	letter-spacing: -1px;
}
.list-icon i {
	float: left;
	font-size: 36px;
	line-height: 47px;
	width: 52px;
}
.list-icon {
	margin-bottom: 24px;
}
.list-icon strong {
	text-transform: uppercase;
	vertical-align: text-top;
}
.list-icon p {
	line-height: 11px;
}
.property-single-title {
	bottom: 0;
	left: 0;
	padding: 37px 0;
	position: absolute;
	right: 0;
}
.reviews-card h5.mt-0 {
	font-size: 14px;
}
ul.sidebar-card-list {
	margin: 0;
	padding: 0;
}
.sidebar-card-list li a {
	display: inline-block;
	width: 100%;
	color: #585b5f;
}
.sidebar-card-list > li {
	line-height: 32px;
	list-style: none;
} 
.footer-social a {
	background: #007bff;
	color: #fff;
	width: 24px;
	height: 24px;
	display: inline-block;
	text-align: center;
	line-height: 25px;
	border-radius: 2px;
}
/* End Blog */
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
