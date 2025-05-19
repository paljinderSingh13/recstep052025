@extends('leagues.layouts.master')

@section('content')
@php
    $slug = session('slug');
    $current_league = session('current_league');
    
    if (!$slug) {
        $slug = 'url';
    }
@endphp
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                @if(!$setup_progress['is_complete'])
                <div id="divTodoHolder" class="mb-4">
                    <div id="divTodo" class="card mb-3">
                        <div class="card-header card-header-xl bg-danger text-white">
                            <h4 class="card-title mb-3 mb-lg-0 text-white">
                                <i class="fas fa-clipboard-list me-2"></i> Referee Setup Checklist
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger">
                                <p class="fw-bold">Please complete these referee setup steps:</p>
                                <ul class="list-group checklist-items">
                                    <!-- Referee Management Items -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['referee_count'] > 0 ? 'list-group-item-success' : '' }}">
                                        <div>
                                            <i class="fas fa-user-tag me-2"></i>
                                            <span>Add Referees</span>
                                            <small class="d-block text-muted">Register officials for your league</small>
                                        </div>
                                        <div>
                                            <span class="badge {{ $setup_progress['referee_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                                {{ $setup_progress['referee_count'] }} added
                                            </span>
                                            <a href="{{ route('referees.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-plus"></i> Add Referee
                                            </a>
                                        </div>
                                    </li>
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['referee_position_count'] > 0 ? 'list-group-item-success' : '' }}">
                                        <div>
                                            <i class="fas fa-user-shield me-2"></i>
                                            <span>Create Referee Positions</span>
                                            <small class="d-block text-muted">Define roles like Head Referee, Assistant, etc.</small>
                                        </div>
                                        <div>
                                            <span class="badge {{ $setup_progress['referee_position_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                                {{ $setup_progress['referee_position_count'] }} created
                                            </span>
                                            <a href="{{ route('referee.position.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-plus"></i> Add Position
                                            </a>
                                        </div>
                                    </li>
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['referee_assignment_count'] > 0 ? 'list-group-item-success' : '' }}">
                                        <div>
                                            <i class="fas fa-tasks me-2"></i>
                                            <span>Assign Referees to Games</span>
                                            <small class="d-block text-muted">Schedule officials for matches</small>
                                        </div>
                                        <div>
                                            <span class="badge {{ $setup_progress['referee_assignment_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                                {{ $setup_progress['referee_assignment_count'] }} assignments
                                            </span>
                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-plus"></i> Make Assignments
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="progress mt-3">
                                <div class="progress-bar progress-bar-striped 
                                    @if($setup_progress['completion_percentage'] > 75) bg-success
                                    @elseif($setup_progress['completion_percentage'] > 30) bg-warning
                                    @else bg-danger @endif" 
                                    role="progressbar" 
                                    style="width: {{ $setup_progress['completion_percentage'] }}%">
                                </div>
                            </div>
                            <small class="text-muted">
                                @if($setup_progress['completion_percentage'] == 100)
                                    100% complete - Referee setup complete!
                                @else
                                    {{ round($setup_progress['completion_percentage']) }}% complete - 
                                    {{ 3 - ($setup_progress['referee_count'] > 0 ? 1 : 0) - ($setup_progress['referee_position_count'] > 0 ? 1 : 0) - ($setup_progress['referee_assignment_count'] > 0 ? 1 : 0) }} steps remaining
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
                @endif
            </div>   
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-header flex-column flex-lg-row">
                        <h4 class="card-title mb-3 mb-lg-0">Assign Referee</h4>
                        <div>
                            <a href="{{route('referees.create',$slug)}}" class="btn btn-success">Add Referee</a>
                            <a href="{{route('referee.position.create',$slug)}}" class="btn btn-primary">Add Position</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p>You can easily view and assign referees to any upcoming game. Just click the options button for a game and assign yourself to the desired position.</p>
                        </div>
                        <div class="table-responsive">
                            <input type="hidden" id="route" value="{{route('leagues.referees.assign',$slug)}}">
                            <input type="hidden" id="get_assignments" value="{{route('leagues.referees.get-assignments',$slug)}}">
                            <table id="gameAssignmentsTable" class="display table">
                                <thead>
                                    <tr>
                                        <th>Game Date</th>
                                        <th>Division</th>
                                        <th>Field</th>
                                        <th>Teams</th>
                                        <th>Referee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($games as $game)
                                    <tr id="game-{{ $game->id }}">
                                        <td>{{ $game->date }}</td>
                                        <td>{{ $game->division->name }}</td>
                                        <td>
                                            <span class="text-info">{{ $game->leaguefieldlocation->name ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-info">{{ $game->homeTeam->name }}</span> vs 
                                            <span class="text-info">{{ $game->awayTeam->name }}</span>
                                        </td>
                                        <td>
                                            @forelse($game->gameReferees as $referee)
                                                <div>
                                                    <span><b>@if($referee->position){{$referee->position['name']}}@endif : </b>{{ $referee->referees->first_name }} {{ $referee->referees->last_name }} 
                                                    </span>
                                                </div>
                                            @empty
                                                <div class="text-danger">No referees assigned</div>
                                            @endforelse
                                        </td>
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <a class="dropdown-item assign-referee-btn" href="#" 
                                                       data-bs-toggle="modal" 
                                                       data-bs-target="#assignRefereeModal" 
                                                       data-game-id="{{ $game->id }}"
                                                       data-home-team="{{ $game->homeTeam->name }}"
                                                       data-away-team="{{ $game->awayTeam->name }}"
                                                       data-game-date="{{ $game->date }}"
                                                       data-field="{{ $game->leaguefieldlocation->name ?? 'N/A' }}">
                                                        Assign Referees
                                                    </a>
                                                    <a class="dropdown-item" href="#">Edit Game</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" 
                                                       data-bs-target="#deleteGameModal" 
                                                       data-game-id="{{ $game->id }}">
                                                        Delete Game
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $games->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Assign Referee Modal -->
<div class="modal fade" id="assignRefereeModal" tabindex="-1" aria-labelledby="assignRefereeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignRefereeModalLabel">Assign Referees</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Game Details</h6>
                        <p id="gameDetailsText"></p>
                    </div>
                    <div class="col-md-6">
                        <h6>Available Referees</h6>
                        <select id="refereeSelect" class="form-select">
                            <option value="">Select Referee</option>
                            @foreach($referees as $referee)
                                <option value="{{ $referee->id }}">
                                    {{ $referee->first_name }} {{ $referee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Assigned Referee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="positionsTableBody">
                            @foreach($positions as $position)
                            <tr data-position-id="{{ $position->id }}">
                                <td>{{ $position->name }}</td>
                                <td id="assigned-referee-{{ $position->id }}">Not assigned</td>
                                <td>
                                    <button class="btn btn-sm btn-primary assign-btn" 
                                            data-position-id="{{ $position->id }}">
                                        Assign
                                    </button>
                                    <button class="btn btn-sm btn-danger remove-btn d-none" 
                                            data-position-id="{{ $position->id }}">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveAssignments">Save Assignments</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    let currentGameId = null;
    let assignedReferees = {};
    
    // Initialize modal with game data
    $('#assignRefereeModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget);
        currentGameId = button.data('game-id');
        
        // Set game details text
        const homeTeam = button.data('home-team');
        const awayTeam = button.data('away-team');
        const gameDate = button.data('game-date');
        const field = button.data('field');
        
        $('#gameDetailsText').html(`
            <strong>Date:</strong> ${gameDate}<br>
            <strong>Teams:</strong> ${homeTeam} vs ${awayTeam}<br>
            <strong>Field:</strong> ${field}
        `);
        
        // Reset assignments
        assignedReferees = {};
        $('.assign-btn').removeClass('d-none');
        $('.remove-btn').addClass('d-none');
        $('[id^="assigned-referee-"]').text('Not assigned');
        $('#refereeSelect').val('');
        
        // Load existing assignments if any
        loadExistingAssignments(currentGameId);
    });
    
    // Assign referee to position
    $(document).on('click', '.assign-btn', function() {
        const positionId = $(this).data('position-id');
        const refereeId = $('#refereeSelect').val();
        const refereeName = $('#refereeSelect option:selected').text();
        
        if (!refereeId) {
            alert('Please select a referee first');
            return;
        }
        
        // Check if this referee is already assigned to another position
        const alreadyAssigned = Object.values(assignedReferees).some(
            assignment => assignment.referee_id == refereeId
        );
        
        if (alreadyAssigned) {
            alert('This referee is already assigned to another position');
            return;
        }
        
        assignedReferees[positionId] = {
            referee_id: refereeId,
            referee_name: refereeName
        };
        
        $(`#assigned-referee-${positionId}`).text(refereeName);
        $(this).addClass('d-none');
        $(this).siblings('.remove-btn').removeClass('d-none');
    });
    
    // Remove assignment
    $(document).on('click', '.remove-btn', function() {
        const positionId = $(this).data('position-id');
        delete assignedReferees[positionId];
        
        $(`#assigned-referee-${positionId}`).text('Not assigned');
        $(this).addClass('d-none');
        $(this).siblings('.assign-btn').removeClass('d-none');
    });
    
    // Save assignments
    $('#saveAssignments').click(function() {
        if (Object.keys(assignedReferees).length === 0) {
            alert('No assignments to save');
            return;
        }
        const route = $('#route').val();
        
        $.ajax({
            url: route,
            method: 'POST',
            data: {
                game_id: currentGameId,
                assignments: assignedReferees,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                $('#saveAssignments').prop('disabled', true).html(`
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Saving...
                `);
            },
            success: function(response) {
                if (response.success) {
                    $('#assignRefereeModal').modal('hide');
                    showToast('success', 'Success', response.message);
                    setTimeout(() => location.reload(), 1000);
                } else {
                    showToast('error', 'Error', response.message);
                }
            },
            error: function(xhr) {
                showToast('error', 'Error', 'An error occurred while saving assignments');
            },
            complete: function() {
                $('#saveAssignments').prop('disabled', false).text('Save Assignments');
            }
        });
    });
    
    // Load existing assignments
    function loadExistingAssignments(gameId) {
        const get_assignments = $('#get_assignments').val();
        $.ajax({
            url: get_assignments,
            method: 'GET',
            data: { game_id: gameId },
            success: function(response) {
                if (response.assignments && response.assignments.length > 0) {
                    response.assignments.forEach(assignment => {
                        assignedReferees[assignment.position_id] = {
                            referee_id: assignment.referee_id,
                            referee_name: assignment.referee_name
                        };
                        
                        $(`#assigned-referee-${assignment.position_id}`).text(assignment.referee_name);
                        $(`button.assign-btn[data-position-id="${assignment.position_id}"]`).addClass('d-none');
                        $(`button.remove-btn[data-position-id="${assignment.position_id}"]`).removeClass('d-none');
                    });
                }
            },
            error: function(xhr) {
                console.error('Error loading assignments');
            }
        });
    }
    
    // Helper function to show toast notifications
    function showToast(type, title, message) {
        const toast = `
            <div class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <strong>${title}:</strong> ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;
        
        $('#toastContainer').append(toast);
        $('.toast').toast('show');
        
        // Remove toast after it's hidden
        $('.toast').on('hidden.bs.toast', function() {
            $(this).remove();
        });
    }
});
</script>
@endsection

@section('styles')
<style>
    .toast-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1100;
    }
    .toast {
        min-width: 300px;
    }
</style>
@endsection