@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .modal-lg {
        max-width: 800px;
    }
    .list-group-item {
        border-left: 0;
        border-right: 0;
        padding: 12px 15px;
        transition: all 0.3s;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    .list-group-item i {
        opacity: 0.5;
        transition: all 0.3s;
    }
    .list-group-item:hover i {
        opacity: 1;
    }
    .card {
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .modal-header .close{
        padding: 0px 1.215rem;
    background: none;
    border: none;
    color: white;
    top: -15px;
    font-size: 3.875rem;
    font-weight: 300;
    }
</style>
<style>
        .text-right {
            text-align: right;
        }
        #playerDetailsContent tr td{
            color:#000;
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <!-- Page Head -->
            <!-- <div class="page-head">
                            <div class="row">
                                <div class="col-sm-6 mb-sm-4 mb-3">
                                    <h3 class="mb-0">List of team</h3>
                                    
                                </div>
                                <div class="col-sm-6 mb-4 text-sm-end">
                                     <a href="javascript:voit(0);" class="btn btn-outline-secondary">Add Task</a>
                                    <a href="javascript:voit(0);" class="btn btn-primary ms-2 cbtn">Create a Project</a>
                                </div>
                            </div>
                        </div> -->
            <div class="row schedule-calendar">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Schedule</h4>
                            <div> <a href="{{ route('schedule.list',$slug) }}" class="btn btn-primary ms-2 cbtn">List View</a>
                                    <a href="{{ route('league.schedule.create',$slug) }}" class="btn btn-primary ms-2 cbtn">Create New Game</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('league.schedule.index',$slug) }}" method="POST" id="myForm"> @csrf <div
                                    class="row align-items-end mb-4">
                                    @if (auth()->user()->role != 'player')
                                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 my-1"> <label class="me-sm-2 form-label">Team</label> <select
                                                class="me-sm-2 default-select form-control wide" name="team_id"
                                                id="inlineFormCustomSelect">
                                                <option value="">All</option>
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team->id }}"
                                                        {{ (old('team_id') ?? $teamId) == $team->id ? 'selected' : '' }}>
                                                        {{ $team->team->name }} </option>
                                                @endforeach
                                            </select> </div>
                                    @endif
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1">
                                        <label class="me-sm-2 form-label">Division</label>
                                        <select class="me-sm-2 default-select form-control wide" name="division_id" id="divisionSelect">
                                            <option value="">All Divisions</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ (old('division_id') ?? $divisionId) == $division->id ? 'selected' : '' }}>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Date</label> <input
                                            class=" dateInput form-control @error('date_from') is-invalid @enderror"
                                            type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date"
                                            value="{{ old('date') ?? $date }}"> </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-2 my-1"> <label class="me-sm-2 form-label">Location</label> <select
                                            class="me-sm-2 default-select form-control wide" name="location_id"
                                            id="inlineFormCustomSelect">
                                            <option value="">Choose...</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ (old('location_id') ?? $locationId) == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }} </option>
                                            @endforeach
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
                                                                        default => 'game',
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
                                                                            {{ $count == 1 ? 'Game' : 'Games' }}
                                                                        </a>
                                                                    </b>
                                                                    <!-- Collapsible Content -->
                                                                    <div class="collapse mt-2 event-wrapper"
                                                                        id="scheduleDetails{{ $currentFormattedDate . $type }}">
                                                                        @foreach ($schedules as $schedule)
                                                                            <div class="event" style="{{ $loop->last ? 'border-bottom:none;' : '' }}">
                                                                                @if ($schedule->awayTeam)
                                                                                    <span style="display:block;">
                                                                                        <a style="cursor:pointer;"
                                                                                            class="view-player-schedule"
                                                                                            data-schedule-id="{{ $schedule->id }}"
                                                                                            data-opposing-id="{{ $schedule->home_team_id }}" data-team-name="{{ $schedule->homeTeam->name }}">
                                                                                            {{ $schedule->homeTeam->name ?? 'Unknown Team' }}
                                                                                        </a>
                                                                                   
                                                                                    </span>
                                                                                    <span
                                                                                        style="display:block; margin-left:20px; font-weight: 700;font-size:12px;">Vs</span>
                                                                                    <span style="display:block;">
                                                                                        <a style="cursor:pointer;"
                                                                                            class="view-player-schedule"
                                                                                            data-schedule-id="{{ $schedule->id }}"
                                                                                            data-opposing-id="{{ $schedule->away_team_id }}" data-team-name="{{ $schedule->awayTeam['name'] }}">
                                                                                            {{ $schedule->awayTeam['name'] ?? 'Unknown Away Team' }}
                                                                                        </a>

                                                                                          
                                                                                    </span>
                                                                                    </span>
                                                                                @endif

                                                                                
                                                                                    <span style="font-size:12px;"><i
                                                                                            class="las la-clock"></i>
                                                                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                                                                    <br>
                                                                                    <button type="button"
                                                                                        class="btn btn-link btn-sm p-0 view-map"
                                                                                        data-location="{{ $schedule->leaguefieldlocation->name ?? 'Unknown' }}"
                                                                                        data-city="{{ $schedule->leaguefieldlocation->address ?? 'Unknown' }}">
                                                                                        <i class="las la-map-marker"></i>
                                                                                        Location
                                                                                    </button>
                                                                                
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
                                            <p><strong>Address:</strong> <span id="modalCity">N/A</span></p>
                                            
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
               <div class="row">
    <div class="col-12">
        <div class="card"> 
            <div class="card-header">
                <h4 class="card-title">May 2025</h4>
                <div class="text-end">
                    <a href="#" class="btn btn-primary ms-2 cbtn mb-2 mb-lg-0 mb-md-0">Calendar View</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="schedule_wrapper" class="dataTables_wrapper no-footer">
                        <table id="schedule" class="display datatable2 dataTable no-footer" style="min-width: 850px" aria-describedby="schedule_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="schedule" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Date: activate to sort column descending" style="width: 100px;">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="schedule" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending" style="width: 197.406px;">Location</th>
                                    <th style="width: 150px" class="sorting" tabindex="0" aria-controls="schedule" rowspan="1" colspan="1" aria-label="Home Team: activate to sort column ascending">Home Team</th>
                                    <th class="sorting" tabindex="0" aria-controls="schedule" rowspan="1" colspan="1" aria-label="Away Team: activate to sort column ascending" style="width: 145.422px;">Away Team</th>
                                    <th class="sorting" tabindex="0" aria-controls="schedule" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 80px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                <tr>
                                    <td class="sorting_1">{{ date('m/d/Y', strtotime($game->date)) }}</td>
                                    <td><a href="#">{{ $game->leaguefieldlocation['name'] }}</a></td>
                                    <td style="width: 150px;"> 
                                        <div style="max-width: 150px;">
                                            <a class="" href="#">{{ $game->homeTeam['name'] }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="" href="#">{{ $game->awayTeam['name'] }}</a>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle game-options-btn" 
                                                    type="button" 
                                                    data-game-id="{{ $game->id }}"
                                                    data-home-team="{{ $game->homeTeam['name'] }}"
                                                    data-away-team="{{ $game->awayTeam['name'] }}"
                                                    data-date="{{ date('l F j, Y g:i A', strtotime($game->date)) }}"
                                                    data-location="{{ $game->leaguefieldlocation['name'] }}"
                                                    data-status="{{ $game->status }}"
                                                    data-has-report="{{ $game->has_report }}"
                                                    data-is-makeup="{{ $game->is_makeup }}"
                                                    data-score-entered="{{ $game->score_entered }}"
                                                    data-stats-entered="{{ $game->stats_entered }}"
                                                    data-edit-score-url=""
                                                    data-edit-stats-url=""
                                                    data-enter-score-url="{{route('league.score.create',[$slug,$game->id])}}"
                                                    data-postpone-url=""
                                                    data-change-time-url=""
                                                    data-reschedule-url=""
                                                    data-delete-url="">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Game Options Modal -->
                    <div class="modal fade" id="gameOption" tabindex="-1" role="dialog" aria-labelledby="gameOptionLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h4 class="modal-title text-white" id="gameOptionLabel">Game Options</h4>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#gameOption').modal('hide')">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-4">
                                    <!-- Game Info Card -->
                                    <div class="card border-primary mb-4 shadow-sm">
                                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0 font-weight-bold" id="gameTitle"></h5>
                                            <span class="badge badge-primary" id="gameTypeBadge"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary rounded-circle p-2 me-3">
                                                            <i class="far fa-calendar-alt fa-lg text-white"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-muted small">DATE & TIME</h6>
                                                            <p class="mb-0 font-weight-bold" id="gameDate"></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary rounded-circle p-2 me-3">
                                                            <i class="fas fa-map-marker-alt fa-lg text-white"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-muted small">LOCATION</h6>
                                                            <p class="mb-0 font-weight-bold" id="gameField"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="bg-primary rounded-circle p-2 me-3">
                                                            <i class="fas fa-info-circle fa-lg text-white"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-muted small">STATUS</h6>
                                                            <p class="mb-0 font-weight-bold" id="gameStatus"></p>
                                                        </div>
                                                    </div>
                                                    <div id="divGameReport" class="d-flex align-items-center mb-3" style="display: none;">
                                                        <div class="bg-primary rounded-circle p-2 me-3">
                                                            <i class="fas fa-file-alt fa-lg text-white"></i>
                                                        </div>
                                                        <div>
                                                            <a id="linkGameReport" href="" class="text-decoration-none">
                                                                <h6 class="mb-0 text-muted small">GAME REPORT</h6>
                                                                <p class="mb-0 font-weight-bold text-primary">View Report</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="divMakeup" class="d-flex align-items-center" style="display: none;">
                                                        <div class="bg-warning rounded-circle p-2 me-3">
                                                            <i class="fas fa-calendar-check fa-lg text-white"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-muted small">RESCHEDULED</h6>
                                                            <p class="mb-0 font-weight-bold text-warning">This game has been rescheduled</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Commissioner Options -->
                                    <div class="card border-primary shadow-sm">
                                        <div class="card-header bg-light">
                                            <h5 class="card-title mb-0 font-weight-bold">Commissioner Options</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="row no-gutters">
                                                <div class="col-md-6 border-right">
                                                    <div class="list-group list-group-flush">
                                                        <div id="divEnterScore" style="display: none;">
                                                            <a id="linkEnterScore" href="{{route('league.score.create',[$slug,$game->id])}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Enter Score</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                        <div id="divEditScore" style="display: none;">
                                                            <a id="linkEditScore" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Edit Game Score</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                        <div id="divEditStats" style="display: none;">
                                                            <a id="linkEditStats" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Edit Stats</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                        <div id="divChangeTime" style="display: none;">
                                                            <a id="linkChangeTime" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Change Field/Time</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="list-group list-group-flush">
                                                        <div id="divPostponeGame" style="display: none;">
                                                            <a id="linkPostponeGame" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Postpone Game</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                        <div id="divReschedule" style="display: none;">
                                                            <a id="linkReschedule" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4">
                                                                <span class="font-weight-bold">Re-schedule</span>
                                                                <i class="fas fa-chevron-right text-muted"></i>
                                                            </a>
                                                        </div>
                                                        <div id="divDeleteGame" style="display: none;">
                                                            <a id="linkDeleteGame" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3 px-4 text-danger">
                                                                <span class="font-weight-bold">Delete Game</span>
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="$('#gameOption').modal('hide')">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style>
                        .modal-lg {
                            max-width: 800px;
                        }
                        .list-group-item {
                            transition: all 0.2s ease;
                            border-left: 0;
                            border-right: 0;
                        }
                        .list-group-item:hover {
                            background-color: #f8f9fa;
                            transform: translateX(3px);
                        }
                        .list-group-item i {
                            transition: all 0.2s ease;
                        }
                        .list-group-item:hover i {
                            color: #007bff !important;
                            transform: translateX(3px);
                        }
                        .list-group-item.text-danger:hover i {
                            color: #dc3545 !important;
                        }
                        .rounded-circle {
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }
                        .card {
                            border: 1px solid rgba(0,0,0,0.1);
                        }
                        .card-header {
                            border-bottom: 1px solid rgba(0,0,0,0.05);
                        }
                    </style>



                                    <!-- Font Awesome CSS (if not already included) -->

                                </div>
                            </div>
                        </div>
                    </div>


            </div>
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
            // document.getElementById("next-btn").addEventListener("click", function(e) {
            //     e.preventDefault(); // Prevent default action
            //     document.getElementById("btnNxtPrv").value = "Next";
            //     document.getElementById("myForm").submit();
            // });

            // document.getElementById("previous-btn").addEventListener("click", function(e) {
            //     e.preventDefault(); // Prevent default action
            //     document.getElementById("btnNxtPrv").value = "Previous";
            //     document.getElementById("myForm").submit();
            // });
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
        <script>
    document.getElementById('previous-btn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('btnNxtPrv').value = 'previous';
        document.getElementById('myForm').submit();
    });

    document.getElementById('next-btn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('btnNxtPrv').value = 'next';
        document.getElementById('myForm').submit();
    });

    document.getElementById('today-btn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('searchDate').value = document.getElementById('todayDate').value;
        document.getElementById('btnNxtPrv').value = '';
        document.getElementById('myForm').submit();
    });
</script>
<script>
// Initialize DataTable
$(document).ready(function() {
       
    // Status change handler
    $('#status-formSchedule').submit(function(e) {
        e.preventDefault();
        // Implement your status change logic here
        console.log('Status change form submitted');
        $('#statusModalCenterSchedule').modal('hide');
        // Update the status in the table via AJAX or reload
    });
});
</script>

<script>
  $(document).ready(function() {  
    $('.game-options-btn').click(function() {
        // Get game data from data attributes
        const gameId = $(this).data('game-id');
        const homeTeam = $(this).data('home-team');
        const awayTeam = $(this).data('away-team');
        const gameDate = $(this).data('date');
        const location = $(this).data('location');
        const status = $(this).data('status');
        const hasReport = $(this).data('has-report');
        const isMakeup = $(this).data('is-makeup');
        const scoreEntered = $(this).data('score-entered');
        const statsEntered = $(this).data('stats-entered');

        // Set modal content
        $('#gameTitle').text(`${awayTeam} @ ${homeTeam}`);
        $('#gameDate').text(gameDate);
        $('#gameField').text(location);
        $('#gameStatus').text(`Status: ${status.charAt(0).toUpperCase() + status.slice(1)}`);

        // Toggle game report link
        if (hasReport) {
            $('#divGameReport').show();
            $('#linkGameReport').attr('href', `/games/${gameId}/report`);
        } else {
            $('#divGameReport').hide();
        }

        // Toggle makeup notice
        if (isMakeup) {
            $('#divMakeup').show();
        } else {
            $('#divMakeup').hide();
        }

        // Set action links
        $('#linkEditScore').attr('href', $(this).data('edit-score-url'));
        $('#linkEditStats').attr('href', $(this).data('edit-stats-url'));
        $('#linkEnterScore').attr('href', $(this).data('enter-score-url'));
        $('#linkPostponeGame').attr('href', $(this).data('postpone-url'));
        $('#linkChangeTime').attr('href', $(this).data('change-time-url'));
        $('#linkReschedule').attr('href', $(this).data('reschedule-url'));
        $('#linkDeleteGame').attr('href', $(this).data('delete-url'));

        // Toggle action buttons based on game state
        if (scoreEntered) {
            $('#divEditScore').show();
            $('#divEnterScore').hide();
        } else {
            $('#divEditScore').hide();
            $('#divEnterScore').show();
        }

        if (statsEntered) {
            $('#divEditStats').show();
        } else {
            $('#divEditStats').hide();
        }

        // Always show these options to commissioner
        $('#divPostponeGame').show();
        $('#divChangeTime').show();
        $('#divReschedule').show();
        $('#divDeleteGame').show();

        // Show the modal
        $('#gameOption').modal('show');
    });
});
</script>
<script>
// Make sure jQuery and Bootstrap JS are properly loaded
$(document).ready(function() {
    // This ensures both click methods work
    $('[data-dismiss="modal"]').click(function() {
        $('#gameOption').modal('hide');
    });
});
</script>
    @endsection
