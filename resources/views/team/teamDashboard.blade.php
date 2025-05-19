@extends('layouts.master')
@section('content')
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
                            <h4 class="card-title">All Team Administrator</h4>
                             @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                            <a href="{{ route('administrator.add') }}"
                                class="btn btn-primary ms-2 cbtn">Create Administrator</a>
                                @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Team</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                             @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($administrators as $admin)
                                            <tr>
                                                <td>
                                                    <span style="text-transform: capitalize;">@if($admin->user)
                                                        @if(auth()->user()->role != 'player')
                                                        <a href="{{ route('administrator.edit', base64_encode($admin->id)) }}">
                                                            {{ $admin->user->name }} {{ $admin->user->last_name }}</a> 
                                                        @else
                                                            {{ $admin->user->name }} {{ $admin->user->last_name }}
                                                        @endif
                                                    @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if (!empty($admin->teamAdminMeta) && count($admin->teamAdminMeta) > 0)
                    @foreach ($admin->teamAdminMeta as $team)
                        @if($team->team)
                      {{$team->team->name}} 
                      <!-- ({{$team->team->age_group}}) -->
                       <br>
                        @endif
                    @endforeach
                                                      @else
                                                        No Team Assigned
                                                    @endif
                                                </td>
                                                <td>{{ $admin->type }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->status ? 'Active' : 'Inactive' }}</td>
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
                                                                data-bs-toggle="modal" data-bs-target="#activeModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('administrator.edit', base64_encode($admin->id)) }}">Edit</a>
                                                                @if(auth()->user()->id != $admin->user_id)
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenterAdmin"
                                                                data-admin-id="{{ $admin->id }}"
                                                                data-admin-name="{{ $admin->name }}">Delete</a>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
                        </div>
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
                    modal.find('#delete-formAdmin').attr('action', '{{ route('administrator.destroy', ':id') }}'
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