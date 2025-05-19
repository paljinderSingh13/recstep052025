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
                <div class="card shadow-sm border rounded">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Current Referees</h4>
                        <div>
                            <a href="{{ route('referees.create',$slug) }}" class="btn btn-success">Add Referee</a>
                            <a href="{{ route('referee.position.assign',$slug) }}" class="btn btn-primary">Assign to Game</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p>Here is the current list of referees in your league. To add a new referee, just click the button below. To remove an existing referee, click the "Remove" link next to their name.</p>
                        </div>
                        
                      <!--   @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif -->
                        
                        <div class="table-responsive">
                            <table class="display table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Badge/ID</th>
                                        <th>Region</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referees as $referee)
                                    <tr>
                                        <td><span class="text-info">{{ $referee->first_name }} {{ $referee->last_name }}</span></td>
                                        <td>{{ $referee->email }}</td>
                                        <td>{{ $referee->phone ?? 'N/A' }}</td>
                                        <td>{{ $referee->badge_id ?? 'N/A' }}</td>
                                        <td>{{ $referee->region ?? 'N/A' }}</td>
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
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="{{ $referee->id }}" data-team-name="{{ $referee->first_name }} {{ $referee->last_name }}">Change Status</a>
                                                    <a class="dropdown-item" href="{{ route('referees.edit',[$slug, $referee->id]) }}">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterReferee" data-referee-id="{{ $referee->id }}" data-referee-name="{{ $referee->first_name }} {{ $referee->last_name }}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $referees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModalCenterReferee">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Referee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <span id="refereeName"></span>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Handle delete modal
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('deleteModalCenterReferee');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var refereeId = button.getAttribute('data-referee-id');
            var refereeName = button.getAttribute('data-referee-name');
            
            var modal = this;
            modal.querySelector('#refereeName').textContent = refereeName;
            modal.querySelector('#deleteForm').action = '/referees/' + refereeId;
        });
    });
</script>
@endpush