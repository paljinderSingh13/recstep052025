@extends('layouts.master')
@section('content')
<style>
    .text-right{
        text-align: right;
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Schedule</h4>
                                    <div>
                                        
                                        <a href="{{ route('team.schedule') }}"
                                            class="btn btn-primary ms-2 cbtn" >List View</a>
                                            <a href="{{ route('team.schedule.show.calander') }}"
                                            class="btn btn-primary ms-2 cbtn" >New Schedule View</a>
                                            @if(auth()->user()->role != 'player')
                                        <a href="{{ route('schedule.add') }}"
                                            class="btn btn-primary ms-2 cbtn">Create Schedule</a>
                                            @endif
                                    </div>
                                       
                                    <!-- <a href="#" class="btn btn-primary ms-2 cbtn">Schedule</a> -->
                                </div>
                                <div class="card-body">
                                     <form action="{{ route('schedule.show') }}" method="POST" id="myForm">
                                        @csrf
                                        <div class="row align-items-end mb-4">
                                            @if(auth()->user()->role != 'player')
                                            <div class="col-auto my-1">
                                                <label class="me-sm-2 form-label">Team Wise</label>
                                                <select class="me-sm-2 default-select form-control wide" name="team_id" id="inlineFormCustomSelect">
                                                    <option value="">All</option>
                                                     @foreach ($teams as $team)
                <option value="{{ $team->id }}" {{ (old('team_id') ?? $teamId) == $team->id ? 'selected' : '' }}>
                    {{ $team->name }}
                </option>
            @endforeach
                                                    
                                                </select>
                                            </div>
                                            @endif
                                            <!-- <div class="col-auto my-1">
                                                <label class="me-sm-2 form-label">Plan Wise</label>
                                                <select class="me-sm-2 default-select form-control wide" name="plan_id" id="inlineFormCustomSelect">
                                                    <option value="">Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div> -->
                                            <div class="col-auto my-1">
                                                <label class="me-sm-2 form-label">Date Wise</label>
                                                <input class=" dateInput form-control @error('date_from') is-invalid @enderror" type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date" value="{{ old('date') ?? $date }}">
                                            </div>
                                            <div class="col-auto my-1">
                                                <label class="me-sm-2 form-label">Location Wise</label>
                                                <select class="me-sm-2 default-select form-control wide" name="location_id" id="inlineFormCustomSelect">
                                                    <option value="">Choose...</option>
                                                    @foreach ($locations as $location)
                <option value="{{ $location->id }}" {{ (old('location_id') ?? $locationId) == $location->id ? 'selected' : '' }}>
                    {{ $location->name }}
                </option>
            @endforeach
                                                </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                <label class="me-sm-2 form-label">Type Wise</label>
                                                <select class="me-sm-2 default-select form-control wide" name="type" id="inlineFormCustomSelect">
                                                    <option value="">Choose...</option>
                                                    <option value="Tournaments" {{ (old('type') ?? $typeId) == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                                                    <option value="Game" {{ (old('type') ?? $typeId) == 'Game' ? 'selected' : '' }}>Game</option>
                                                    <option value="Practice" {{ (old('type') ?? $typeId) == 'Practice' ? 'selected' : '' }}>Practice</option>
                                                    
            
                                                </select>
                                            </div>
                                            <div class="col-auto my-1">
                                                <button class="btn btn-primary ms-2 cbtn">Search</button>
                                            </div>
                                        </div>
                                         <div class="d-flex justify-content-between align-items-center">
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
        <button class="btn btn-primary ms-2 cbtn" id="today-btn">Today</button>
    </div>
    <div>
        <h2 id="current-view-title">{{ $startOfWeek->copy()->format('M d  Y') }} To {{ $endOfWeek->copy()->format('M d  Y') }}</h2>
    </div>
    <div>
        <div class="btn-group" role="group" aria-label="View Type Toggle">
            <input type="radio" class="btn-check" name="view_type" id="btnradio1" value="month" autocomplete="off" {{ $viewType === 'month' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary rounded-start-1" for="btnradio1">Month</label>

            <input type="radio" class="btn-check" name="view_type" id="btnradio2" value="week" autocomplete="off" {{ $viewType === 'week' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="btnradio2">Week</label>

            <input type="radio" class="btn-check" name="view_type" id="btnradio3" value="day" autocomplete="off" {{ $viewType === 'day' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="btnradio3">Day</label>
        </div>
    </div>
</div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th >Teams</th>

                                                    @for ($i = 0; $i < 5; $i++)
                                                        <th>{{ $startOfWeek->copy()->addDays($i)->format('d D') }}</th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($groupedSchedules as $team => $teamSchedules)
                                                    @php
                                                        $team = json_decode($team); // Decode team JSON
                                                    @endphp
                                                    <tr>
                                                        <th class="text-black">{{ $team->name }}</th>
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @php
                                                                $currentDate = $startOfWeek->copy()->addDays($i)->format('m/d/Y');
                                                                $schedules = $teamSchedules->where('date', $currentDate);
                                                            @endphp
                                                            <td>
                                                                @if ($schedules->isEmpty())
                                                                    No Schedule
                                                                @else
                                                                    @foreach ($schedules as $schedule)
                                                                        @php
                                                                            $typeClass = match ($schedule->type) {
                                                                                'Practice' => 'practice',
                                                                                'Game' => 'game',
                                                                                'Tournaments' => 'tournaments',
                                                                                default => '',
                                                                            };
                                                                        @endphp
                                                                        <span class="{{ $typeClass }}">
                                                                            <b>{{ ucfirst($schedule->type) }}</b><br>
                                                                            
                                                                            @if($schedule->OpTeam)
                                                                                <span style="display:block; ">
                                                                                <a  style="cursor:pointer;" class=" view-player-schedule  "  data-schedule-id="{{ $schedule->id }}" data-opposing-id="{{ $schedule->team_id }}"> 
                                                                                    {{ $team->name }} 
                                                                                </a>
                                                                            </span>  
                                                                                <span style="display:block; margin-left:20px; font-weight: 700; "> Vs  </span>  
                                                                                <span style="display:block; "> 
                                                                                <a   style="cursor:pointer;" class=" view-player-schedule "  data-schedule-id="{{ $schedule->opposing_schedule_id }}" data-opposing-id="{{ $schedule->opposing_team_id }}">    
                                                                                    {{ $schedule->OpTeam['name'] }}
                                                                                </a>
                                                                            </span> 
                                                                            @endif
                                                                                @if ($schedule->type == 'Practice')
                                                                                <i class="las la-calendar"></i>{{ \Carbon\Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('m/d/Y') }} to 
                                                                                {{ \Carbon\Carbon::createFromFormat('m/d/Y', $schedule->date_to)->format('m/d/Y') }} <br>
                                                                                <i class="las la-clock"></i>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->timing_from)->format('h:i A') }} - 
                                                                                {{ \Carbon\Carbon::createFromFormat('H:i', $schedule->timing_to)->format('h:i A') }}<br>
                                                                            @else
                                                                                <!-- @if($schedule->loc) {{ $schedule->loc->name }} @endif<br> -->
                                                                                <!-- {{ $schedule->city }}<br> -->
                                                                                <i class="las la-calendar"></i>{{ \Carbon\Carbon::createFromFormat('m/d/Y', $schedule->date)->format('m/d/Y') }}<br>
                                                                                <i class="las la-clock"></i>{{ \Carbon\Carbon::createFromFormat('H:i', $schedule->time)->format('h:i A') }} <br>
                                                                            @endif
                                                                                <!-- @if(auth()->user()->role != 'player')
                                                                                    <button type="button" class="btn btn-link btn-sm view-player-schedule " data-schedule-id="{{ $schedule->opposing_schedule_id }}" data-opposing-id="{{ $schedule->opposing_team_id }}"><br>
                                                                                        View Opposing Team
                                                                                    </button>

                                                                            @endif -->
                                                                           
                                                                           @if ($schedule->type != 'Practice')
                                                                            <button type="button" class="btn btn-link btn-sm view-map" data-location="{{ $schedule->loc->name ?? 'Unknown' }}" 
 data-city="{{ $schedule->city }}">
            View Address
        </button>
        @endif
                                                                        <br>
                                                                        @if(auth()->user()->role != 'player')
                                                                            <!-- <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleModalCenter{{ $schedule->id }}">View</button> -->
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="exampleModalCenter{{ $schedule->id }}" tabindex="-1" role="dialog">
                                                                                <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title">Player Details</h5>
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="table-responsive">
                                                                                                <table class="table table-striped table-responsive-sm">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Player Name</th>
                                                                                                            <th>Status</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        @if(array_key_exists($schedule->id, $playerSchedules->toArray()))
                                                                                                            @foreach ($playerSchedules[$schedule->id] as $val)
                                                                                                                <tr>
                                                                                                                    <td>{{ $val->player ? $val->player['name'] : 'Unknown Player' }}</td>
                                                                                                                    <td>
                                                                                                                        @if($val['type'] == 'yes')
                                                                                                                            <span class="text-success"><i class="fa fa-check"></i></span> Confirmed
                                                                                                                        @else
                                                                                                                            <span class="text-danger"><i class="fa fa-close"></i></span> Not Coming
                                                                                                                        @endif
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            @endforeach
                                                                                                        @else
                                                                                                            <tr>
                                                                                                                <td colspan="2" class="text-center">No Player Schedules</td>
                                                                                                            </tr>
                                                                                                        @endif
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        @else
                                                                            @if(!array_key_exists($schedule->id, $playerSchedules->toArray()))
                                                                                <a href="{{ route('player.schedule.store', ['yes', $schedule->id]) }}" class="btn btn-success">Yes</a>
                                                                                <a href="{{ route('player.schedule.store', ['no', $schedule->id]) }}" class="btn btn-danger">No</a>
                                                                            @endif
                                                                        @endif
                                                                        </span>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                        @endfor
                                                    </tr>
                                                @endforeach
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
            </div>
        </div>
    </div>
</div>
                                            </tbody>

                                        </table>
                                    </div>
<div class="modal fade" id="playerScheduleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Player Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm">
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
                <style type="text/css">
                    .table thead th:last-child,
                    .table tbody tr td:last-child{
                        text-align: left!important;
                    }
                </style>
                @endsection
                @section('js')
                <script src="{{asset('assets/js/own.js')}}"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.view-player-schedule').forEach(function (button) {
        button.addEventListener('click', function () {
            const scheduleId = this.getAttribute('data-schedule-id');
            const opposingId = this.getAttribute('data-opposing-id');

            // Make an AJAX request to fetch the player details
            fetch(`/schedule/${scheduleId}/players/${opposingId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate the modal with the fetched data
                    const tbody = document.getElementById('playerDetailsContent');
                    tbody.innerHTML = ''; // Clear any existing content

                    if (data.length > 0) {
                        data.forEach(player => {
                            const row = `
                                <tr>
                                    <td>${player.name || 'Unknown Player'}</td>
                                    <td>
                                        ${player.status === 'yes' 
                                            ? '<span class="text-success"><i class="fa fa-check"></i></span> Confirmed' 
                                            : '<span class="text-danger"><i class="fa fa-close"></i></span> Not Coming'}
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

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('playerScheduleModal'));
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
            // Get location and city data from the button attributes
            const location = this.getAttribute('data-location');
            const city = this.getAttribute('data-city');

            // Update the modal content
            document.getElementById('modalLocation').textContent = location;
            document.getElementById('modalCity').textContent = city;

            // Show the modal
            const modal = new bootstrap.Modal(document.getElementById('mapModal'));
            modal.show();
        });
    });
});

                </script>
                <script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get references to the radio buttons
    const btnradio1 = document.getElementById("btnradio1");
    const btnradio2 = document.getElementById("btnradio2");
    const btnradio3 = document.getElementById("btnradio3");

    // Get the 'Today' button
    const todayBtn = document.getElementById("today-btn");

    // Add event listeners to each radio button
    btnradio1.addEventListener("click", function () {
        todayBtn.click();
    });

    btnradio2.addEventListener("click", function () {
        todayBtn.click();
    });

    btnradio3.addEventListener("click", function () {
        todayBtn.click();
    });
});

</script>
<script>
    document.getElementById("next-btn").addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default action
    document.getElementById("btnNxtPrv").value = "Next";
    document.getElementById("myForm").submit();
});

document.getElementById("previous-btn").addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default action
    document.getElementById("btnNxtPrv").value = "Previous";
    document.getElementById("myForm").submit();
});
</script>
                @endsection