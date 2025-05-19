@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
@endphp
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="shadow-sm border rounded">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Current Divisions</h4>
                        <div>
                            <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#organizeDivisionsModal">Organize Divisions</button> -->
                            <a href="{{ route('league.division.create',$slug) }}" class="btn btn-primary">Add Division</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p>Divisions are used to group teams for better organization. You can set the display order by clicking the Division Order button.</p>
                        </div>

                       <!--  @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif -->

                        <div class="table-responsive">
                            <table id="divisionsTable" class="display table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Season</th>
                                        <th>Teams</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $division)
                                    <tr>
                                        <td><span class="text-info">{{ $division->name }}</span></td>
                                        <td>{{ $division->seasons_count ?? 0 }}</td>
                                        <td>{{ $division->teams_count ?? 0 }}</td>
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
                                                <!-- <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#statusModal-{{ $division->id }}">Change Status</a>
                                                    <a class="dropdown-item" href="#">Division Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $division->id }}">Delete</a>
                                                </div> -->
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Status Change Modal -->
                                    <div class="modal fade" id="statusModal-{{ $division->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Change Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Status</label>
                                                            <select class="form-select" name="status">
                                                                <option value="active" {{ $division->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                <option value="inactive" {{ $division->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                <option value="archived" {{ $division->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Status</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $division->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the division "{{ $division->name }}"?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
            <div class="right-sidebar">
                <div class="shadow-sm border rounded mb-3 ">
                    <div class="card-header bg-primary rounded-top">
                        <div class="card-title">
                            <h4 class="text-white mb-0">Recent/Upcoming Game</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-3 border-top text-center">
                            <button class="btn btn-sm btn-outline-primary">View Full Schedule</button>
                        </div>
                    </div>
                </div>
                <div class="shadow-sm border rounded mb-3 ">
                    <div class="card-header bg-primary rounded-top">
                        <div class="card-title">
                            <h4 class="text-white mb-0">Apr 23, 2025 08:00 AM</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-3">
                            <p class="mb-0">The Blue Tigers</p>
                        </div>
                        <div class="p-3 bg-primary-light">
                            <p class="mb-0">Mumbai Indian</p>
                        </div>
                        <div class="p-3">
                            <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Boston Park</button>
                            <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Regular Season</button>
                            <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> First Division</button>
                        </div>
                        <div class="p-3 border-top text-center">
                            <button class="btn btn-sm btn-outline-primary">View Game Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Organize Divisions Modal -->
<div class="modal fade" id="organizeDivisionsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Organize Divisions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Drag and drop divisions to set their display order:</p>
                    <ul id="sortableDivisions" class="list-group">
                        @foreach($divisions as $division)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $division->name }}</span>
                            <input type="hidden" name="order[]" value="{{ $division->id }}">
                            <i class="las la-arrows-alt handle" style="cursor: move;"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#divisionsTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthChange: false,
            searching: true,
            ordering: true
        });

        // Make divisions sortable
        $("#sortableDivisions").sortable({
            handle: ".handle",
            update: function(event, ui) {
                // Order is automatically updated as we drag
            }
        });
    });
</script>
@endpush