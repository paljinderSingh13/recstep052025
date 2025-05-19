 <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Players</h4>
                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                            <a href="{{ route('player.add') }}" class="btn btn-primary ms-2 cbtn">Create Player</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">  
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th style="min-width: 170px;" >Teams</th>
                                            <th style="min-width: 50px;">Name</th>
                                            <th>Type</th>
                                            <th>Priority</th>
                                            <th>Date of Birth</th>
                                            <th>Proof ID</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Player Administrator</th>
                                            <th>Status</th>
                                            @if(auth()->user()->role != 'player' && auth()->user()->role != 'player_administrator')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($players as $player)
                                            <tr>
                                                <!-- <td>{{ $player->id }}</td> -->
                                                <td class="sorting_1">
                                                    @if ($player->picture)
                                                        <a href="{{ route('player.editPlayer', base64_encode($player->id)) }}"><img class="rounded-circle" width="35" src="{{ asset($player->picture) }}" alt="logo"></a>
                                                        
                                                    @else
                                                        <img class="rounded-circle" width="35" src="{{ asset('assets/images/dummyUser.jpg') }}" alt="logo">
                                                        
                                                    @endif
                                                </td>
                                                <td style="width: 180px;"> 
                                                    <div style="max-width: 180px;">
                                                    @if (!empty($player->teamMeta) && count($player->teamMeta) > 0)
                    @foreach ($player->teamMeta as $team)
                    @if($team->team)
                      <a href="{{ route('team.info', base64_encode($team->team->id)) }}">{{$team->team->name}}  </a> <br>
                    @endif
                    @endforeach
                                                      @else
                                                        No Team Assigned
                                                    @endif
                                                </div>
                                                </td>
                                                <td style="min-width: 70px;"><span style="text-transform: capitalize;min-width: 70px;">
                                                    <a href="{{ route('player.editPlayer', base64_encode($player->id)) }}">{{ $player->name }}</a>
                                                </span></td>
                                               
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
                                                <td> 
                                                @if (!empty($player->administrator) && count($player->administrator) > 0)
                                                        {!! $player->administrator->pluck('user.name')->implode('</br>') !!}  
                                                    @else
                                                        Not Assigned
                                                    @endif
                                                </td>
                                                <td>{{ $player->status == 1 ? 'Active' : 'Inactive' }}</td>
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
                                                                data-bs-target="#activeModalCenterPlayer"
                                                                data-player-id="{{ $player->id }}"
                                                                data-player-name="{{ $player->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('player.editPlayer', base64_encode($player->id)) }}">Edit</a>
                                                                @if(auth()->user()->id != $player->user_id)
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenterPlayer"
                                                                data-player-id="{{ $player->id }}"
                                                                data-player-name="{{ $player->name }}">Delete</a>
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
                            <div class="modal fade" id="deleteModalCenterPlayer" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3 id="delete-modal-title">Are you sure you want to delete this player?</h3>
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
                           <!-- Active Status Modal -->
                            <div class="modal fade" id="activeModalCenterPlayer" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3 id="active-modal-title">Are you sure you want to change the status of
                                                    this player?</h3>
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