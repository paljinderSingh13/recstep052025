@extends('layouts.master') @section('content') <style>
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
                            <div> <a href="{{ route('team.schedule') }}" class="btn btn-primary ms-2 cbtn">List View</a>
                                @if (auth()->user()->role != 'player')
                                    <a href="{{ route('schedule.add') }}" class="btn btn-primary ms-2 cbtn">Create
                                        Schedule</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('team.schedule.show.calander') }}" method="POST" id="myForm"> @csrf <div
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
    @endsection
