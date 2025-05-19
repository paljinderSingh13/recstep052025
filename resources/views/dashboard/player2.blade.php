@extends('layouts.master')
@section('content')

<style >
	body .player-dashboard2{
    padding-top: 50px!important;
  }
</style>
<!--Player Dashboard page -->
<div class="content-body player-dashboard2" style="padding-top: 50px">
	<section class="section-one">
		<div class="container-fluid">
			<div class="row banner-wrapper">
				<div class="col-12 px-0">
					@if($user['dashboard_banner_1'])
					<img class="img-fluid rounded" src="{{asset($user['dashboard_banner_1'])}}">
					@else
					<img class="img-fluid rounded" src="https://recstep.com/pictures/gamebanner.png">
					@endif
				</div>
			</div>


			<div class="row user-wrapper px-0 px-lg-4 ">
				<div class="col-12 col-lg-3 col-md-12 col-sm-12 mb-2 mb-lg-0">
					<div class="user-sidebar">
						<div class="user-image">
							<img class="img-fluid" src="{{asset($user['profile_picture'])}}">
						</div>
						<h4 class="username">{{$user['name']}} {{$user['last_name']}}</h4>
						<h3 class="jersy-number">{{$user['jersey_no']}}</h3>
						@if($teams)
							@foreach($teams as $team)
						<div class="team-logo">
							<img class="img-fluid" src="{{ asset($team['logo']) }}">
						</div>
						<h4 class="teamname">{{ $team['name'] }}</h4>
						@break 
							@endforeach
						@endif
					</div>
				</div>
				<div class="col-12 col-lg-9 col-md-12 col-sm-12 mb-2 mb-lg-0">
				    <div class="discover-event-wrapper">
				        <div class="title-box">
				            <h4 class="">Discover Events</h4>
				        </div>
				        <ul class="nav nav-fill nav-tabs" role="tablist">
				            @php
				                // Filter schedules for the next 7 days
				                $startDate = now()->startOfDay(); // Today's date
				                $endDate = now()->addDays(6)->endOfDay(); // 6 days from today (total of 7 days including today)
				                $filteredSchedules = $discoversSchedules->filter(function ($schedule) use ($startDate, $endDate) {
				                    $scheduleDate = \Carbon\Carbon::parse($schedule->date);
				                    return $scheduleDate->between($startDate, $endDate);
				                });
				            @endphp

				            @foreach($filteredSchedules->unique('date') as $schedule)
				                <li class="nav-item" role="presentation">
				                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" 
				                       id="fill-tab-{{ $loop->index }}" 
				                       data-bs-toggle="tab" 
				                       href="#fill-tabpanel-{{ $loop->index }}" 
				                       role="tab" 
				                       aria-controls="fill-tabpanel-{{ $loop->index }}" 
				                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
				                        {{ \Carbon\Carbon::parse($schedule->date)->format('D') }}<br>
				                        {{ \Carbon\Carbon::parse($schedule->date)->format('d M') }}
				                    </a>
				                </li>
				            @endforeach
				        </ul>
				        <div class="tab-content pt-4" id="tab-content">
				            @foreach($filteredSchedules->groupBy('date') as $date => $disgroupedSchedules)
				                <div class="tab-pane {{ $loop->first ? 'active' : '' }}" 
				                     id="fill-tabpanel-{{ $loop->index }}" 
				                     role="tabpanel" 
				                     aria-labelledby="fill-tab-{{ $loop->index }}">
				                    <div class="border p-3 rounded">
				                        <div class="row">
				                            @foreach($disgroupedSchedules as $schedule)
				                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">
				                                    <div class="todaymatch-wrapper">
				                                        <div class="title-box">
				                                            <h4>{{ $schedule->type }}</h4>
				                                        </div>
				                                        <div class="teams-vs-box row m-auto mb-2">
				                                            <div class="col-9">
				                                                <p class="">{{ $schedule->team['name'] }} <small> vs</small> {{ $schedule->OpTeam['name'] }}</p>
				                                            </div>
				                                            <div class="col-3">
				                                                <p class="text-end">{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</p>
				                                            </div>
				                                        </div>
				                                        <div class="row m-auto mb-2 team">
				                                            <div class="col-3">
				                                                <div class="team-flag">
				                                                    <img class="img-fluid" src="{{ asset($schedule->team['flag']) }}">
				                                                </div>
				                                            </div>
				                                            <div class="col-9">
				                                                <p class="text-end">{{ $schedule->team['name'] }}</p>
				                                            </div>
				                                        </div>
				                                        <div class="row m-auto mb-2 team">
				                                            <div class="col-3">
				                                                <div class="team-flag">
				                                                    <img class="img-fluid" src="{{ asset($schedule->OpTeam['flag']) }}">
				                                                </div>
				                                            </div>
				                                            <div class="col-9">
				                                                <p class="text-end">{{ $schedule->OpTeam['name'] }}</p>
				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                            @endforeach
				                        </div>
				                    </div>
				                </div>
				            @endforeach
				        </div>
				    </div>
				</div>
			</div>
		</div>	
	</section>
	

	<section class="section-two">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-2 mb-lg-0">
					<div class="weekly-highlights-wrapper h-100">
						<div class="title-box">
							<h4>Weekly highlights</h4>
						</div>
						<div class="row highlight-videos">
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">
								<div class="video">
									<iframe width="100%" height="450" src="https://www.youtube.com/embed/33EY-QsjWYM"  allowfullscreen></iframe>
								</div>
							</div>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-2 mb-lg-0">
								<div class="video">
									<iframe width="100%" height="450" src="https://www.youtube.com/embed/33EY-QsjWYM"  allowfullscreen></iframe>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
					<div class="upcoming-events">
						<div class="title-box">
							<h4>Upcoming events</h4>
						</div>
						<div class="p-4">
							<ul>
								@foreach($upcomingSchedule as $schedule)
								<li><p><span class="icon"><i class="las la-calendar"></i> </span>{{\Carbon\Carbon::parse($schedule->date)->format('l') }} <span class="text-success font-w600">{{$schedule['type']}}:</span> {{ $schedule->team ? $schedule->team['name'] : 'No Team Assigned' }} 
									@if($schedule['type'] != 'Practice')

									vs 
									{{ $schedule->OpTeam ? $schedule->OpTeam['name'] : 'No Opponent Team' }} 
									@endif @ @if($schedule->time)
									{{ \Carbon\Carbon::parse($schedule->time)->format('g:i A') }}
								@endif</p></li>
								@endforeach
								
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- ---------------------------------------------------------- -->
<!-- schedule -->
<!-- ---------------------------------------------------------- -->

<section class="section-three">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class=" p-3 rounded bg-primary">
					<div class="row m-auto schedule-calendar">
						<div class="p-0">
							<div class=" ">
								<div class="col-12">
									<div class="card mb-0">
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
											<form action="{{ route('player.dashboard2.filter') }}" method="POST" id="myForm">
												@csrf 
												<div
													class="row align-items-end mb-4">
													@if (auth()->user()->role != 'player')
													<div class="col-3 my-1">
														<label class="me-sm-2 form-label">Team Wise</label> 
														<select
															class="me-sm-2 default-select form-control wide" name="team_id"
															id="inlineFormCustomSelect">
															<option value="">All</option>
															@foreach ($teams as $team)
															<option value="{{ $team->id }}"
															{{ (old('team_id') ?? $teamId) == $team->id ? 'selected' : '' }}>
															{{ $team->name }} </option>
															@endforeach
														</select>
													</div>
													@endif
													<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Date Wise</label> <input
														class=" dateInput form-control @error('date_from') is-invalid @enderror"
														type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date"
														value="{{ old('date') ?? $date }}"> </div>
													<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1">
														<label class="me-sm-2 form-label">Location Wise</label> 
														<select
															class="me-sm-2 default-select form-control wide" name="location_id"
															id="inlineFormCustomSelect">
															<option value="">Choose...</option>
															@foreach ($locations as $location)
															<option value="{{ $location->id }}"
															{{ (old('location_id') ?? $locationId) == $location->id ? 'selected' : '' }}>
															{{ $location->name }} </option>
															@endforeach
														</select>
													</div>
													<div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1">
														<label class="me-sm-2 form-label">Type Wise</label> 
														<select
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
														</select>
													</div>
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
											        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
											            <th>{{ $day }}</th>
											        @endforeach
											    </tr>
											</thead>
											<tbody>
											    @php
											        $startDate = now(); // Start from the current date
											        $endDate = now()->addDays(6); // End after 7 days
											        $currentDate = $startDate->copy(); // Create a copy of the start date for iteration
											    @endphp

											    <tr>
											        @for ($i = 0; $i < 7; $i++)
											            @php
											                $currentFormattedDate = $currentDate->format('Y-m-d');
											                $schedules = $groupedSchedules[$currentFormattedDate] ?? collect([]);
											                $typeCounts = $schedules->groupBy('type')->map->count();
											            @endphp

											            <td>
											                @if ($schedules->isNotEmpty()) <!-- Only display if there are schedules -->
											                    <div class="date-label">
											                        <span class="date">{{ $currentDate->format('d') }}</span>
											                    </div>

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
											                            <div class="collapse mt-2 event-wrapper" id="scheduleDetails{{ $currentFormattedDate . $type }}">
											                                @foreach ($schedules->where('type', $type) as $schedule)
											                                    <div class="event" style="{{ $loop->last ? 'border-bottom:none;' : '' }}">
											                                        @if ($schedule->OpTeam)
											                                            <span style="display:block;">
											                                                <a style="cursor:pointer;"
											                                                    class="view-player-schedule"
											                                                    data-schedule-id="{{ $schedule->id }}"
											                                                    data-opposing-id="{{ $schedule->team_id }}"
											                                                    data-team-name="{{ $schedule->team->name }}">
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
											                                            <span style="display:block; margin-left:20px; font-weight: 700;font-size:12px;">Vs</span>
											                                            <span style="display:block;">
											                                                <a style="cursor:pointer;"
											                                                    class="view-player-schedule"
											                                                    data-schedule-id="{{ $schedule->id }}"
											                                                    data-opposing-id="{{ $schedule->opposing_team_id }}"
											                                                    data-team-name="{{ $schedule->OpTeam['name'] }}">
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
											                                        @endif

											                                        @if ($schedule->type == 'Practice')
											                                            <span style="display:block;">
											                                                <a style="cursor:pointer;"
											                                                    class="view-player-schedule"
											                                                    data-schedule-id="{{ $schedule->id }}"
											                                                    data-opposing-id="{{ $schedule->team_id }}"
											                                                    data-team-name="{{ $schedule->team->name }}">
											                                                    {{ $schedule->team->name ?? 'Unknown Team' }}
											                                                </a>
											                                            </span>
											                                            <span style="font-size:12px;">
											                                                <i class="las la-clock"></i>
											                                                {{ \Carbon\Carbon::createFromFormat('H:i', $schedule->timing_from)->format('h:i A') }}
											                                            </span>
											                                            <br>
											                                        @else
											                                            <span style="font-size:12px;">
											                                                <i class="las la-clock"></i>
											                                                {{ \Carbon\Carbon::createFromFormat('H:i', $schedule->time)->format('h:i A') }}
											                                            </span>
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
											            </td>

											            @php
											                $currentDate->addDay(); // Move to the next day
											            @endphp
											        @endfor
											    </tr>
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
			</div>
		</div>
	</div>
</section>



<section class="section-four">
	<div class="container-fluid">
		<div class="row mb-5">
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-2 mb-lg-0">
				<div class="today-practice">
					<div class="title-box">
						<h4>Today Game @	@if (!empty($upcomingGame) && isset($upcomingGame['time']))
    {{ \Carbon\Carbon::createFromFormat('H:i', $upcomingGame['time'])->format('h:i A') }}
@else
    No time available
@endif</h4>
					</div>
					<div class="row m-auto border-bottom teams">
						@if($upcomingGame)
						<div class="col-6 border-end">
							<div class="p-2">
								<p class="mb-0">{{$upcomingGame->team['name']}}</p>
							</div>
						</div>
						<div class="col-6 ">
							<div class="p-2">
								<p class="mb-0">{{$upcomingGame->OpTeam['name']}}</p>
							</div>
						</div>
						@endif
					</div>
					<div class="row m-auto players-list">
						@if($upcomingGame)
						@if($upcomingGame->PlayersSchedule)
						<div class="col-6 border-end">
							<ul class="attendance-list pt-2">
						@foreach($upcomingGame->PlayersSchedule as $game)
						@if($upcomingGame->team_id == $game->team_id)
								@if($game['type'] == 'yes')
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>{{$game->player['name']}} </p> </li>
								@endif
								@if($game['type'] == 'no')
								<li><p><span class="icon"><i class="las la-check-circle text-danger"></i> </span>{{$game->player['name']}} </p> </li>
								@endif
						@endif
						@endforeach
							</ul>
						</div>
						<div class="col-6">
							<ul class="attendance-list pt-2">
						@foreach($upcomingGame->PlayersSchedule as $game)
						@if($upcomingGame->opposing_team_id == $game->team_id)
								@if($game['type'] == 'yes')
								<li><p><span class="icon"><i class="las la-check-circle text-success"></i> </span>{{$game->player['name']}} </p> </li>
								@endif
								@if($game['type'] == 'no')
								<li><p><span class="icon"><i class="las la-check-circle text-danger"></i> </span>{{$game->player['name']}} </p> </li>
								@endif
						@endif
						@endforeach
							</ul>
						</div>
						@endif
						@endif
						<!-- <div class="col-6">
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
						</div> -->
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-8 mb-2 mb-lg-0">
				<div class="chat-wrapper">
					<div>
						<ul class="nav nav-fill nav-tabs" role="tablist">
							@foreach($chatTeam as $team)
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="fill-tab-0{{$team['id']}}" data-bs-toggle="tab" href="#fill-team-{{$team['id']}}" role="tab" aria-controls="fill-team-one" aria-selected="true">{{$team['name']}} </a>
							</li>
							@endforeach
							
						</ul>
						<div class="tab-content pt-5 px-2" id="tab-content" >
							@foreach($chatMessages as $message)
							    <div class="tab-pane active" id="fill-team-{{$team['id']}}" role="tabpanel" aria-labelledby="fill-tab-0{{$team['id']}}">
							        <div class="p-4" >
							        	<input type="hidden" name="selectedId" id="selectedId" value="{{$team['id']}}">
							            <!-- Chat message container -->
							            @if($message->sender['id'] == auth()->id())
							        	<input type="hidden" name="senderimg" id="senderimg" value="{{asset(auth()->user()->profile_picture)}}">
							                <!-- Sender (Authenticated User) -->
							                <div class="d-flex justify-content-end mb-4">
							                    <div class="flex-grow-1 me-3" style="max-width: 70%;">
							                        <!-- User name and timestamp -->
							                        <div class="d-flex justify-content-between align-items-center mb-1">
							                            <small class="text-muted">{{$message['created_at']}}</small>
							                            <span class="fw-bold">You</span>
							                        </div>
							                        <!-- Message text -->
							                        <div class="p-3 bg-primary text-white rounded">
							                            <p class="mb-0">{{$message['message']}}</p>
							                        </div>
							                    </div>
							                    <!-- User avatar (optional) -->
							                    <div class="avatar">
							                        <img src="{{asset(auth()->user()->profile_picture)}}" alt="User Avatar" class="rounded-circle" width="40">
							                    </div>
							                </div>
							            @else
							                <!-- Receiver (Other Users) -->
							                <div class="d-flex align-items-start mb-4">
							                    <!-- User avatar (optional) -->
							                    <div class="avatar me-3">
							                        <img src="{{asset($message->sender['profile_picture'])}}" alt="User Avatar" class="rounded-circle" width="40">
							                    </div>
							                    <!-- Message content -->
							                    <div class="flex-grow-1" style="max-width: 70%;">
							                        <!-- User name and timestamp -->
							                        <div class="d-flex justify-content-between align-items-center mb-1">
							                            <span class="fw-bold">{{$message->sender['name']}}</span>
							                            <small class="text-muted">{{$message['created_at']}}</small>
							                        </div>
							                        <!-- Message text -->
							                        <div class="p-3 bg-light rounded">
							                            <p class="mb-0">{{$message['message']}}</p>
							                        </div>
							                    </div>
							                </div>
							            @endif
							        </div>
							    </div>
							@endforeach
						        <div id="chatContainer">
						        	
						        </div>
				            <form id="messageFormUnique">
							    <div class="input-group mb-3">

							        <input type="text" id="messageInputUnique" class="form-control" placeholder="Write Something ...">
							        <button class="btn btn-primary" type="submit">Send</button>
							    </div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div>

@endsection
@section('js')
<script type="text/javascript">
	window.onload = function () {
    document.querySelector(".content-body").style.paddingTop = "32px";
};

</script>
<!-- <script>
	document.addEventListener('DOMContentLoaded', function () {
	    const tabcontent = document.getElementById('tab-content'); // Get the container
	    console.log(tabcontent); // Log the element to verify it exists

	    if (tabcontent && tabcontent.classList.contains('tab-pane')) { // Check if the element exists and has the class
	        console.log('Scroll Height:', tabcontent.scrollHeight); // Total height of the content
	        console.log('Client Height:', tabcontent.clientHeight); // Visible height of the container

	        // Smooth scroll to 320px
	        tabcontent.scrollTo({
	            top: 320, // Scroll to 320px
	            behavior: 'smooth'
	        });

	        console.log('Scroll Top After:', tabcontent.scrollTop); // Verify the scroll position
	    } else {
	        console.error('Element with id="tab-content" and class="tab-pane" not found.');
	    }
	});        
</script> -->
    <script>
        	document.getElementById('messageFormUnique').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const messageInput = document.getElementById('messageInputUnique');
    const message = messageInput.value.trim();
    const selectedId = Number(document.getElementById("selectedId").value);
    const chatContainer = document.getElementById('chatContainer'); // Container where chat messages are displayed
    const senderimg = document.getElementById('senderimg').value; // Container where chat messages are displayed

    if (message) {
        fetch(`/api/teams/team/${selectedId}/messages`, {
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
    		const senderimg = document.getElementById('senderimg').value; // Container where chat messages are displayed

            // Clear the input field after successful submission
            messageInput.value = "";

            // Dynamically append the new message to the chat
            const newMessageHtml = `
                <div class="d-flex justify-content-end mb-4">
                    <div class="flex-grow-1 me-3" style="max-width: 70%;">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <small class="text-muted">Just now</small>
                            <span class="fw-bold">You</span>
                        </div>
                        <div class="p-3 bg-primary text-white rounded">
                            <p class="mb-0">${message}</p>
                        </div>
                    </div>
                    <div class="avatar">
                        <img src="${senderimg}" alt="User Avatar" class="rounded-circle" width="40">
                    </div>
                </div>
            `;

            // Append the new message to the chat container
            chatContainer.insertAdjacentHTML('beforeend', newMessageHtml);

            // Scroll to the bottom of the chat container
            chatContainer.scrollTop = chatContainer.scrollHeight;
        })
        .catch(error => {
            console.error("Error sending message:", error);
        });
    } else {
        console.error("Message cannot be empty");
    }
});
        </script>
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
@endsection

