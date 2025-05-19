@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                                <h4 class="card-title">Player Administrators</h4>
                                @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                <a href="{{route('player.administrator.create')}}" class="btn btn-primary ms-2 cbtn">Create Player Administrator</a>
                                @endif
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Player Name</th>
                                            <th width="150px">Teams</th>
                                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($PlayerMetaAdministrators as $admin)
                                            <tr>
                                                <td><span style="text-transform: capitalize;">@if($admin->user)<a href="{{route('player.administrator.edit',base64_encode($admin->id))}}">{{ $admin->user['name'] }}</a> @if($admin->user['last_name']) <a href="{{route('player.administrator.edit',base64_encode($admin->id))}}">{{ $admin->user['last_name'] }}</a> @endif @endif</span></td>
                                                <td>@if($admin->user){{ $admin->user['email'] }} @endif</td>
                                                <td>{{ $admin->user['phone'] }}</td>
                                                <td><span style="text-transform: capitalize;">@if($admin->player)<a href="{{ route('player.editPlayer', base64_encode($admin->player['id'])) }}">{{ $admin->player['name'] }}</a> @endif</span></td>
                                                <td width="150px">

                                                @if (!empty($admin->teamMeta) && count($admin->teamMeta) > 0)
                                                       <span>{!! $admin->teamMeta->pluck('team.name')->implode('<br> ') !!}</span>
                                                    @else
                                                        No Team Assigned
                                                    @endif

                                                    <!-- @if($admin->teamMeta)
                                                    @foreach($admin->teamMeta as $team)
                                                        @if($team->team)
                                                        <b >{{ $team->team['name'] }}</b><br>
                                                        @endif
                                                    @endforeach
                                                    @endif -->
                                                </td>
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
                                                          
                                                            <a class="dropdown-item"
                                                                href="{{route('player.administrator.edit',base64_encode($admin->id))}}">Edit</a>
                                                                @if(auth()->user()->id != $admin->user_id)
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenter"
                                                                data-club-id="{{ $admin->id }}"
                                                                data-club-name="{{ $admin->name }}">Delete</a>
                                                                @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                    @endif
                                            </tr>
                                    @endforeach
                                            <tbody>
                                        </table>
                            </div>
                            <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3 id="delete-modal-title">Are you sure you want to delete this club?</h3>
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
                                        var clubId = button.data('club-id'); // Extract club ID
                                        var clubName = button.data('club-name'); // Extract club name

                                        var modal = $(this);
                                        modal.find('#delete-modal-title').text('Are you sure you want to delete ' + clubName + '?');
                                        modal.find('#delete-form').attr('action', '{{ route('player.administrator.destroy', ':id') }}'.replace(
                                            ':id', btoa(clubId)));
                                    });

                                });
                            </script>
                        @endsection