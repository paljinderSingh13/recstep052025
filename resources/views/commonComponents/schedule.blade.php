<div class="row">


                <div class="col-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h4 class="card-title">Schedules</h4>
                            <div class="text-end">
                            <a href="{{ route('schedule.show') }}"
                                class="btn btn-primary ms-2 cbtn mb-2 mb-lg-0 mb-md-0" >Calendar View</a>
                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                            <a href="{{ route('schedule.add') }}"
                                class="btn btn-primary ms-2 cbtn">Create Schedule</a>
                            @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>Tournament</h3>
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th style="width: 140px">Team </th>
                                            <th>Opposing Team </th>
                                            <th>Location</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduleTournaments as $schedule)
                                            <tr>
                                                <td>{{ $schedule->type }}</td>
                                                <td style="min-width: 150px;"> 
                                                    <div style="min-width: 150px;"> {{ $schedule->team->name }} 
                                                        <!-- ({{$schedule->team->age_group}})  -->
                                                    </div>
                                                    </td>
                                                <td>
                                                    @if($schedule->OpTeam)
                                                    {{$schedule->OpTeam['name']}}
                                                    @endif
                                                </td>
                                                <td>@if($schedule->loc){{ $schedule->loc->name }} ({{ $schedule->loc->address }})@endif</td>
                                                <td>{{ $schedule->city }}</td>
                                                <td>{{ $schedule->date }}</td>
                                                <td>{{ $schedule->time }}</td>

                                                <td>{{ $schedule->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                                <td>
                                                    <div class="dropdown ms-auto c-pointer">
                                                        <button type="button" class="btn btn-primary light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#activeModalCenterSchedule"
                                                                data-schedule-id="{{ $schedule->id }}"
                                                                data-schedule-name="{{ $schedule->name }}">Change
                                                                Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('schedule.edit', base64_encode($schedule->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenterSchedule"
                                                                data-schedule-id="{{ $schedule->id }}"
                                                                data-schedule-name="{{ $schedule->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-body">
                            <h3>Practice</h3>
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                        <th>Type</th>
                                            <th style="min-width: 150px;">Team </th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Time From</th>
                                            <th>Time To</th>
                                            <!-- <th>Purpose Details</th> -->
                                            <th>Status</th>
                                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedulePractice as $practice)
                                            <tr>
                                                <td>{{ $practice->type }}</td>
                                                <td style="width: 150px;"> 
                                                    <div style="max-width: 150px;">
                                                        {{ $practice->team->name }} 
                                                        <!-- ({{$practice->team->age_group}}) -->
                                                    </div>
                                                    </td>
                                                <td>{{ $practice->date_from }}</td>
                                                <td>{{ $practice->date_to }}</td>
                                                <td>{{ $practice->timing_from }}</td>
                                                <td>{{ $practice->timing_to }}</td>
                                                <!-- <td>{{ $practice->purpose_detail}}</td> -->
                                                <td>{{ $practice->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                                <td>
                                                    <div class="dropdown ms-auto c-pointer">
                                                        <button type="button" class="btn btn-primary light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#activeModalCenterSchedule"
                                                                data-schedule-id="{{ $practice->id }}"
                                                                data-schedule-name="{{ $practice->name }}">Change
                                                                Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('schedule.edit', base64_encode($practice->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenterSchedule"
                                                                data-schedule-id="{{ $practice->id }}"
                                                                data-schedule-name="{{ $practice->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-body">
                            <h3>Game</h3>
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                        <th>Type</th>
                                            <th style="width: 150px">Team </th>
                                            <th>Opposing Team </th>
                                            <th>Location</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <!-- <th>Purpose Details</th> -->
                                            <th>Status</th>
                                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduleGame as $game)
                                            <tr>
                                                <td>{{ $game->type }}</td>
                                                <td style="width: 150px;"> 
                                                    <div style="max-width: 150px;">
                                                        {{ $game->team->name }} 
                                                        <!-- ({{$game->team->age_group}}) -->
                                                    </div>
                                                    </td>
                                                <td>
                                                    @if($game->OpTeam)
                                                    {{$game->OpTeam['name']}}
                                                    @endif
                                                </td>
                                                <td>@if($game->loc){{ $game->loc->name }} ({{ $game->loc->address }})@endif</td>
                                                <td>{{ $game->city }}</td>
                                                <td>{{ $game->date }}</td>
                                                <td>{{ $game->time }}</td>
                                                <!-- <td>{{ $game->purpose_detail }}</td> -->
                                                <td>{{ $game->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                                <td>
                                                    <div class="dropdown ms-auto c-pointer">
                                                        <button type="button" class="btn btn-primary light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="18px" height="18px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#activeModalCenterSchedule"
                                                                data-schedule-id="{{ $game->id }}"
                                                                data-schedule-name="{{ $game->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('schedule.edit', base64_encode($game->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenterSchedule"
                                                                data-schedule-id="{{ $game->id }}"
                                                                data-schedule-name="{{ $game->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                             <div class="modal fade" id="deleteModalCenterSchedule" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="delete-modal-title">Are you sure you want to delete this team?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="delete-formSchedule">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Yes, Delete It!</button>
                        </form>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Status Modal -->
        <div class="modal fade" id="activeModalCenterSchedule" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="active-modal-title">Are you sure you want to change the status of this team?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="active-formSchedule">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary">Yes!</button>
                        </form>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
                        </div>
                    </div>
                </div>
            </div>