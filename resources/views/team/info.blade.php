@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <!-- Page Head -->
            <!-- <div class="page-head">
                        <div class="row">
                            <div class="col-sm-6 mb-sm-4 mb-3">
                                <h3 class="mb-0">List of Club</h3>
                                
                            </div>
                            <div class="col-sm-6 mb-4 text-sm-end">
                                 <a href="javascript:voit(0);" class="btn btn-outline-secondary">Add Task</a>
                                <a href="javascript:voit(0);" class="btn btn-primary ms-2 cbtn">Create a Project</a>
                            </div>
                        </div>
                    </div> -->

            <div class="row">
                @if(auth()->user()->role != 'player')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Administrators</h4>
                            <!-- <a href="{{ route('administrator.create', base64_encode($id)) }}"
                                class="btn btn-primary ms-2 cbtn">Create Administrator</a> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrators as $admin)
                                            <tr>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->type }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->status ? 'Active' : 'Inactive' }}</td>
                                                <!-- <td>
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
                                                                data-bs-toggle="modal" data-bs-target="#activeModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('administrator.edit', base64_encode($admin->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Players</h4>
                            <!-- <a href="{{ route('player.create', base64_encode($id)) }}" class="btn btn-primary ms-2 cbtn">Create
                                Player</a> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Priority</th>
                                            <th>Date of Birth</th>
                                            <th>Proof ID</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($players as $player)
                                            <tr>
                                                <!-- <td>{{ $player->id }}</td> -->
                                                <td class="sorting_1">
                                                    @if ($player->picture)
                                                        <img class="rounded-circle" width="35"
                                                            src="{{ asset($player->picture) }}" alt="logo">
                                                    @else
                                                        <img class="rounded-circle" width="35" src="{{ asset('assets/images/dummyUser.jpg') }}" alt="logo">
                                                    @endif
                                                </td>
                                                <td>{{ $player->name }}</td>
                                                <td>{{ $player->type }}</td>
                                                <td>{{ $player->priority }}</td>
                                                <td>{{ $player->dob }}</td>
                                                <td>
                                                    @if ($player->proof_id)
                                                        <a href="{{ asset($player->proof_id) }}" target="_blank">View
                                                            Document</a>
                                                    @endif
                                                </td>
                                                <td>{{ $player->phone }}</td>
                                                <td>{{ $player->email }}</td>
                                                <td>{{ $player->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <!-- <td>
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
                                                                data-bs-target="#activeModalCenterPlayer"
                                                                data-player-id="{{ $player->id }}"
                                                                data-player-name="{{ $player->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('player.edit', base64_encode($player->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenterPlayer"
                                                                data-player-id="{{ $player->id }}"
                                                                data-player-name="{{ $player->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="deleteModalCenterPlayer" tabindex="-1" role="dialog">
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
                                            <form method="POST" id="delete-formPlayer">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Yes, Delete It!</button>
                                            </form>
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Active Status Modal -->
                            <div class="modal fade" id="activeModalCenterPlayer" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3 id="active-modal-title">Are you sure you want to change the status of
                                                    this team?</h3>
                                                <p>You won't be able to revert this!</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <form method="POST" id="active-formPlayer">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-primary">Yes!</button>
                                            </form>
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Model  -->
                            <div class="modal fade" id="exampleModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <!-- <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div> -->
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3>Are you sure you want to delete this Administrator?</h3>
                                                <p>You won't be able to revert this!</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-primary">Yes, Delete It !</button>
                                            <button type="button"
                                                class="btn btn-danger light"data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ----------------------------------------------------------- -->
                            <!-- Active Model -->
                            <div class="modal fade" id="activeModalCenter">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <!-- <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div> -->
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3>Are you sure you want to change the status of this Administrator?</h3>
                                                <p>You won't be able to revert this!</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-primary">Yes !</button>
                                            <button type="button"
                                                class="btn btn-danger light"data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- @if(auth()->user()->role != 'player')
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Schedule</h4>
                            <a href="{{ route('schedule.create', base64_encode($id)) }}"
                                class="btn btn-primary ms-2 cbtn">Create Schedule</a>
                        </div>
                        <div class="card-body">
                            <h3>Tournament</h3>
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Opposing Team </th>
                                            <th>Location</th>
                                            <th>City</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduleTournaments as $schedule)
                                            <tr>
                                                <td>{{ $schedule->type }}</td>
                                                <td>{{ $schedule->opposing_team_id }}</td>
                                                <td>{{ $schedule->location }}</td>
                                                <td>{{ $schedule->city }}</td>
                                                <td>{{ $schedule->date }}</td>
                                                <td>{{ $schedule->time }}</td>

                                                <td>{{ $schedule->status == 1 ? 'Active' : 'Inactive' }}</td>
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
                                            <th>Purpose Detail</th>
                                            <th>Date From</th>
                                            <th>Date To</th>
                                            <th>Time From</th>
                                            <th>Time To</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedulePractice as $practice)
                                            <tr>
                                                <td>{{ $practice->type }}</td>
                                                <td>{{ $practice->purpose_detail }}</td>

                                                <td>{{ $practice->date_from }}</td>
                                                <td>{{ $practice->date_to }}</td>
                                                <td>{{ $practice->timing_from }}</td>
                                                <td>{{ $practice->timing_to }}</td>
                                                <td>{{ $practice->status == 1 ? 'Active' : 'Inactive' }}</td>
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
                                            <th>Purpose Detail</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scheduleGame as $game)
                                            <tr>
                                                <td>{{ $game->type }}</td>
                                                <td>{{ $game->purpose_detail }}</td>
                                                <td>{{ $game->date }}</td>
                                                <td>{{ $game->time }}</td>
                                                <td>{{ $game->status == 1 ? 'Active' : 'Inactive' }}</td>
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
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                @endif -->
            </div>
        </div>
        <!-- Delete Model  -->
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
        <div class="modal fade" id="deleteModalCenterAdmin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="delete-modal-title">Are you sure you want to delete this admin?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="delete-formAdmin">
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
        <div class="modal fade" id="activeModalCenterAdmin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                            <h3 id="active-modal-title">Are you sure you want to change the status of this admin?</h3>
                            <p>You won't be able to revert this!</p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <form method="POST" id="active-formAdmin">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary">Yes!</button>
                        </form>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Delete modal
                $('#deleteModalCenter').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var adminId = button.data('admin-id'); // Extract admin ID
                    var adminName = button.data('admin-name'); // Extract admin name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + adminName +
                    '?');
                    modal.find('#delete-form').attr('action', '{{ route('administrator.destroy', ':id') }}'
                        .replace(':id', btoa(adminId)));
                });


                // Active status modal
                $('#activeModalCenter').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var adminId = button.data('admin-id'); // Extract admin ID
                    var adminName = button.data('admin-name'); // Extract admin name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        adminName + '?');
                    modal.find('#active-form').attr('action',
                        '{{ route('administrator.updateStatus', ':id') }}'.replace(':id', btoa(adminId)));
                });
                $('#deleteModalCenterAdmin').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var adminId = button.data('admin-id'); // Extract admin ID
                    var adminName = button.data('admin-name'); // Extract admin name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + adminName +
                    '?');
                    modal.find('#delete-form').attr('action', '{{ route('administrator.destroy', ':id') }}'
                        .replace(':id', btoa(adminId)));
                });


                // Active status modal
                $('#activeModalCenterAdmin').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var adminId = button.data('admin-id'); // Extract admin ID
                    var adminName = button.data('admin-name'); // Extract admin name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        adminName + '?');
                    modal.find('#active-formAdmin').attr('action',
                        '{{ route('administrator.updateStatus', ':id') }}'.replace(':id', btoa(adminId)));
                });

                // schedule
                $('#deleteModalCenterSchedule').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var scheduleId = button.data('schedule-id'); // Extract schedule ID
                    var scheduleName = button.data('schedule-name'); // Extract schedule name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + scheduleName +
                        '?');
                    modal.find('#delete-formSchedule').attr('action', '{{ route('schedule.destroy', ':id') }}'.replace(
                        ':id', btoa(scheduleId)));
                });
                $('#activeModalCenterSchedule').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var scheduleId = button.data('schedule-id'); // Extract schedule ID
                    var scheduleName = button.data('schedule-name'); // Extract schedule name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        scheduleName + '?');
                    modal.find('#active-formSchedule').attr('action', '{{ route('schedule.updateStatus', ':id') }}'
                        .replace(':id', btoa(scheduleId)));
                });


                // player
                $('#deleteModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + playerName +
                        '?');
                    modal.find('#delete-formPlayer').attr('action', '{{ route('player.destroy', ':id') }}'.replace(
                        ':id', btoa(playerId)));
                });
                $('#activeModalCenterPlayer').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var playerId = button.data('player-id'); // Extract player ID
                    var playerName = button.data('player-name'); // Extract player name

                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        playerName + '?');
                    modal.find('#active-formPlayer').attr('action', '{{ route('player.updateStatus', ':id') }}'
                        .replace(':id', btoa(playerId)));
                });
            });
        </script>
    @endsection