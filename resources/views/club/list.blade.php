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
                                <a href="javascript:voit(0);" class="btn btn-primary ms-2">Create a Project</a>
                            </div>
                        </div>
                    </div> -->

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List of Club</h4>
                            <a href="{{ route('club.create') }}" class="btn btn-primary ms-2">Create a Club</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display datatable2" style="min-width: 850px">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clubs as $club)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($club->logo) }}" alt="logo"
                                                        class="rounded-circle thumb-md me-1 d-inline">
                                                </td>
                                                <td>{{ $club->name }}</td>
                                                <td>{{ $club->address }}</td>
                                                <td>{{ $club->city }}</td>
                                                <td><a href="javascript:void(0);"><strong
                                                            class="text-black">{{ $club->phone }}</strong></a></td>
                                                <td><a href="javascript:void(0);"><strong
                                                            class="text-black">{{ $club->email }}</strong></a></td>
                                                <td>
                                                    {{ $club->status ? 'Active' : 'Inactive' }}
                                                </td>
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
                                                                data-club-id="{{ $club->id }}"
                                                                data-club-name="{{ $club->name }}">Change Status</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('team.list', base64_encode($club->id)) }}">Team</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('club.edit', base64_encode($club->id)) }}">Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModalCenter"
                                                                data-club-id="{{ $club->id }}"
                                                                data-club-name="{{ $club->name }}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Delete Model  -->
                            <!-- Delete Modal -->
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

                            <!-- Active Status Modal -->
                            <div class="modal fade" id="activeModalCenter" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                                <h3 id="active-modal-title">Are you sure you want to change the status of
                                                    this Club?</h3>
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
                                        modal.find('#delete-form').attr('action', '{{ route('club.destroy', ':id') }}'.replace(
                                            ':id', btoa(clubId)));
                                    });

                                    // Active status modal
                                    $('#activeModalCenter').on('show.bs.modal', function(event) {
                                        var button = $(event.relatedTarget); // Button that triggered the modal
                                        var clubId = button.data('club-id'); // Extract club ID
                                        var clubName = button.data('club-name'); // Extract club name

                                        var modal = $(this);
                                        modal.find('#active-modal-title').text('Are you sure you want to change the status of ' +
                                            clubName + '?');
                                        modal.find('#active-form').attr('action', '{{ route('club.updateStatus', ':id') }}'
                                            .replace(':id', clubId));
                                    });
                                });
                            </script>
                        @endsection