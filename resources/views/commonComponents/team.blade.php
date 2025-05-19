<div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Teams</h4>
                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator' && auth()->user()->role != 'administrator')
                            <a href="{{ route('team.create', base64_encode($id)) }}" class="btn btn-primary ms-2 cbtn">Create Team</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Team Id</th>
                                            <th>Age Group</th>
                                            <th>Season</th>
                                            <th>Status</th>                                            
                                            <th>Number of Players</th>                                            
                                             @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator' && auth()->user()->role != 'administrator')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teams as $team)
                                            <tr>
                                                <td><a href="{{ route('team.info', base64_encode($team->id)) }}">{{ $team->name }}</a></td>
                                                <td>{{ $team->team_unique_id }}</td>
                                                <td>{{ $team->age_group }}</td>
                                                <td>{{ $team->season }}</td>
                                                <td>{{ $team->status ? 'Active' : 'Inactive' }}</td>
                                                <td> {{ $team->players_count }} </td>
                                                    @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator' && auth()->user()->role != 'administrator')
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
                                                                data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam"
                                                                data-team-id="{{ $team->id }}"
                                                                data-team-name="{{ $team->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('team.info', base64_encode($team->id)) }}">Team
                                                                Info</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('team.edit', base64_encode($team->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam"
                                                                data-team-id="{{ $team->id }}"
                                                                data-team-name="{{ $team->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                    @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModalCenterTeam" tabindex="-1" role="dialog">
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
                            <div class="modal fade" id="activeModalCenterTeam" tabindex="-1" role="dialog">
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