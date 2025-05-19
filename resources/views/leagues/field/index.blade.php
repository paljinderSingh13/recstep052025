@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
@endphp
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm border rounded">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white">Current Fields/Directions</h4>

                    </div>
                    <div class="card-body">
                        <p>Below is a list of all the fields in the league. To view each field's schedule and get directions, simply click the corresponding button.</p>
                        <div class="mb-5">
                            <a href="{{ route('league.fields.create',$slug) }}" class="btn btn-primary">Add Field</a>
                            <a class="btn btn-success" href="{{route('commissioner.index',$slug)}}">Return to Commissioner</a>
                        </div>
                        
                       <!--  @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif -->
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>Field Name</th>
                                        <th>Address</th>
                                        <th>Action</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fields as $field)
                                    <tr>
                                        <td>{{ $field->name }}</td>
                                        <td>{{ $field->address }}</td>
                                        <td>
                                            @if($field->google_maps_embed)
                                                <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($field->address) }}" 
                                                       target="_blank" class="btn btn-sm btn-primary" >Map/Directions</a>
                                            @else
                                                <button class="btn btn-sm btn-secondary" disabled>No Map Available</button>
                                            @endif
                                        </td>
                                    </tr>
                                    
                                    <!-- Map Modal -->
                                    <div class="modal fade" id="mapModal-{{ $field->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success text-white">
                                                    <h5 class="modal-title">{{ $field->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    {!! $field->google_maps_embed !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($field->address) }}" 
                                                       target="_blank" 
                                                       class="btn btn-primary">
                                                        Get Directions
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Add pagination if needed -->
                        @if($fields->hasPages())
                        <div class="mt-3">
                            {{ $fields->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
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

@endsection

@push('scripts')
<script>
    // Initialize DataTable if needed
    $(document).ready(function() {
        $('#example3').DataTable({
            responsive: true,
            pageLength: 10,
            lengthChange: false,
            searching: true,
            ordering: true
        });
    });
</script>
@endpush