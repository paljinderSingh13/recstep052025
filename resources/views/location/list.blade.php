@extends('layouts.master')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h4 class="card-title">List of Locations</h4>
                        <a href="{{ route('sports_locations.create') }}" class="btn btn-primary ms-2">Create Location</a>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display datatable2" style="min-width: 850px">
                                <thead>
                                    <tr>
                                        <th>Location Name</th>
                                        <th>Location Address</th>
                                        <th>Google Map Link</th>
                                        <th>Sports</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                     <tr>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $location->address }}</td>
                                        <td><a class="link-info" href="{{ $location->google_map_link }}" target="_blank">View Map</a></td>
                                        <td>
                                            {{ $location->sports->pluck('name')->join(', ') }} <!-- Display associated sports -->
                                        </td>
                                        <td>{{ $location->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        
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
                                                                href="{{ route('sports_locations.edit', $location->id) }}">Edit</a>
                                                                
                                                            <a class="dropdown-item" href="javascript:void(0);"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteModalCenter"
                                                                data-loc-id="{{ $location->id }}"
                                                                data-loc-name="{{ $location->name }}">Delete</a>
                                                                
                                                        </div>
                                                    </div>
                                                </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <div class="m_icon"><i class="las la-exclamation-circle"></i></div>
                                            <h3 id="delete-modal-title">Are you sure you want to delete this location?</h3>
                                            <p>You won't be able to revert this!</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <form method="POST" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Yes, Delete It!</button>
                                        </form>
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Delete modal
        $('#deleteModalCenter').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var locationId = button.data('loc-id');
            var locationName = button.data('loc-name');

            var modal = $(this);
            modal.find('#delete-modal-title').text('Are you sure you want to delete ' + locationName + '?');
            modal.find('#delete-form').attr('action', '{{ route('sports_locations.destroy', ':id') }}'.replace(':id', locationId));
        });
    });
</script>
@endsection
