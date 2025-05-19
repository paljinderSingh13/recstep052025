@extends('leagues.layouts.master')
@section('content')
@php
    $slug = session('slug');
    $current_league = session('current_league');
    
    if (!$slug) {
        $slug = 'url';
    }
@endphp
<div class="content-body" >

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm border rounded">
                    <div class="card-header">
                        <h4 class="card-title">Referee Positions</h4>
                        <div>
                            <a href="{{route('referee.position.create',$slug)}}" class="btn btn-success">Add New Position</a>
                            <!-- <a href="" class="btn btn-primary">Organize Position Order</a> -->
                            
                        </div>
                    </div>
                    <div class="card-body">
                     <div>
                         <p>Select the referee positions you want to track and assign—such as Center Referee, Asst. Ref 1, Asst. Ref 2, etc. Each game will include a slot for every position you set up.</p>
                     </div>
                     <div class="table-responsive">
                        @if($positions->count() > 0)
    <table class="display table">
        <thead>
            <tr>
                <th>Position</th>
                <th>Name</th>                                    
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $index => $position)
            <tr>
                <td>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}.</td>
                <td>{{ $position->name }}</td>
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
                            <a class="dropdown-item" href="javascript:void(0);" 
                               data-bs-toggle="modal" 
                               data-bs-target="#activeModalCenterTeam" 
                               data-team-id="{{ $position->id }}" 
                               data-team-name="{{ $position->name }}">
                               Change Status
                            </a>
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);" 
                               data-bs-toggle="modal" 
                               data-bs-target="#deleteModalCenterTeam" 
                               data-team-id="{{ $position->id }}" 
                               data-team-name="{{ $position->name }}">
                               Delete
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Create referee first positions</p>
    @endif
    {{ $positions->links() }} <!-- Pagination links -->
</div>
</div>
</div>
</div>

</div>


</div>

@endsection