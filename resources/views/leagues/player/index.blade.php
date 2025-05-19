@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
@endphp
<div class="content-body" >

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
               <div class="card shadow-sm border rounded">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">League Players</h4>
        <a href="{{ route('league.player.create',$slug) }}" class="btn btn-primary">Add New Player</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <p>This page shows the complete list of players currently in the league.</p>
        </div>
        <div class="table-responsive">
            <table class="display table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Team</th>
                        <th>Email</th>
                        <th>Leageez User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($players as $player)
                    <tr>
                        <td>
                            <span class="text-info">
                                {{ $player->first_name }} {{ $player->last_name }}
                            </span>
                        </td>
                        <td>
                            <span class="text-info">
                                {{ $player->team->name ?? 'No Team' }}
                            </span>
                        </td>
                        <td>{{ $player->email }}</td>
                        <td>{{ $player->is_leageez_user ? 'Yes' : 'No' }}</td>
                        <td>
                            <div class="dropdown ms-auto c-pointer">
                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                        </g>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item change-status" 
                                       href="#" 
                                       data-player-id="{{ $player->id }}">
                                        Change Status
                                    </a>
                                    <a class="dropdown-item" 
                                       href="{{ route('league.players.show', $player->id) }}">
                                        Player Info
                                    </a>
                                    <a class="dropdown-item" 
                                       href="">
                                        Edit
                                    </a>
                                    <a class="dropdown-item delete-player" 
                                       href="#" 
                                       data-player-id="{{ $player->id }}"
                                       data-player-name="{{ $player->first_name }} {{ $player->last_name }}">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No players found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!-- Pagination -->
            @if($players->hasPages())
            <div class="mt-3">
                {{ $players->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deletePlayerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <span id="playerNameToDelete"></span>?</p>
            </div>
            <div class="modal-footer">
                <form id="deletePlayerForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    
</div>


</div>

@endsection