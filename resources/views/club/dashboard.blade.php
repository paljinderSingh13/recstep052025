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
            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator' && auth()->user()->role != 'administrator')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Club Administrators</h4>
                            <a href="{{ route('club.admform', base64_encode($id)) }}" class="btn btn-primary ms-2 cbtn">Create Administrator</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($club_administrator as $admin)
                                            <tr>
                                           
                                                <td> 
                                                @if($admin->image && File::exists(public_path($admin->image)))        
                                                <a href="{{ route('club.adm.edit', base64_encode($admin->id)) }}"><img class="rounded-circle" src="{{ asset($admin->image) }}" /></a> 
                                                @else
                                                <a href="{{ route('club.adm.edit', base64_encode($admin->id)) }}"> <img class="rounded-circle" width="35" src="{{ asset('assets/images/dummyUser.jpg') }}" alt="logo"></a>
                                                @endif


                                            </td>
                                                <td><a href="{{ route('club.adm.edit', base64_encode($admin->id)) }}">{{ $admin->name }}</a></td>
                                                <td> @php

                                                        $role = $admin->role;
                                                        $adRole = ucwords(str_replace('_', ' ', $role));
                                                        @endphp
                                                    {{ $adRole }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->status ? 'Active' : 'Inactive' }}</td>
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
                                                                data-bs-toggle="modal" data-bs-target="#activeModalCenter"
                                                                data-team-id="{{ $admin->id }}"
                                                                data-team-name="{{ $admin->name }}">Change Status</a>
                                                          
                                                            <a class="dropdown-item"
                                                                href="{{ route('clubadm.edit', base64_encode($admin->id)) }}">Edit</a>
                                                                @if(auth()->user()->id != $admin->user_id)
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenter"
                                                                data-team-id="{{ $admin->id }}"
                                                                data-team-name="{{ $admin->name }}">Delete</a>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                            <tbody>
                                        </table>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog">
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
                                            <form method="POST" id="delete-form">
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
                            <div class="modal fade" id="activeModalCenter" tabindex="-1" role="dialog">
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
                                            <form method="POST" id="active-form">
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
                        </div>
                    </div>
                </div>
            </div>
            @endif



            <div class="row">
                
                @include('commonComponents.team')
                @include('commonComponents.player')
                @include('commonComponents.schedule')
            </div>

        </div>
    @endsection
    @section('js')
        <script>
            
            document.addEventListener('DOMContentLoaded', function() {
                // Delete modal
                $('#deleteModalCenter').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('clubadm.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                $('#deleteModalCenterTeam').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name

                    var modal = $(this);
                    modal.find('#delete-modal-title').text('Are you sure you want to delete ' + teamName + '?');
                    modal.find('#delete-form').attr('action', '{{ route('team.destroy', ':id') }}'.replace(
                        ':id', btoa(teamId)));
                });

                // Active status modal
                $('#activeModalCenter').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('clubadm.updateStatus', ':id') }}'
                        .replace(':id', teamId));
                });

                $('#activeModalCenterTeam').on('show.bs.modal', function(event) {

                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var teamId = button.data('team-id'); // Extract team ID
                    var teamName = button.data('team-name'); // Extract team name
                    var modal = $(this);
                    modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                        teamName + '?');
                    modal.find('#active-form').attr('action', '{{ route('team.updateStatus', ':id') }}'
                        .replace(':id', teamId));
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



            });
        </script>
    @endsection