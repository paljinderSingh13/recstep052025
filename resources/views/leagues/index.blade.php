@extends('leagues.layouts.master')
@section('content')

<!-- Dashboard page -->
<div class="content-body">   
    <div class="container">            
        <div class="row">
            <!-- Profile Sidebar -->
            <!-- @include('leagues.sidebar') -->
            <!-- Leagues List -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">My Leagues 12</h4>
                        <a href="{{ route('leagues.create') }}" class="btn btn-primary ">
                            <i class="fas fa-plus me-1"></i> Create League
                        </a>
                    </div>
                    <div class="card-body">
                           <!--  @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif -->

                            <div class="table-responsive">
                              @if($leagues->count() > 0)
                                <table class="display" id="example3">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Sport</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <!-- <th>Time</th> -->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($leagues as $league)
                                        <tr>
                                            <td><a href="{{route('league.view',$league->id)}}" class="text-primary">{{ $league->name }}</a></td>
                                            <td>{{ $league->sport }}</td>
                                            <td>{{ ucfirst($league->type) }}</td>
                                            <td>{{ $league->location }}</td>
                                            <!-- <td>{{ \Carbon\Carbon::parse($league->timezone) }}</td> -->
                                            <td>
                                               <!--  <div class="d-flex gap-2">
                                                    <a href="{{ route('leagues.edit', $league->id) }}" 
                                                     class="btn btn-sm btn-outline-primary" title="Edit">
                                                     <i class="fas fa-edit"></i>
                                                 </a>
                                                 <form action="{{ route('leagues.destroy', $league->id) }}" 
                                                  method="POST" class="d-inline">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" 
                                                  class="btn btn-sm btn-outline-danger" 
                                                  title="Delete"
                                                  onclick="return confirm('Are you sure you want to delete this league?')">
                                                  <i class="fas fa-trash"></i>
                                              </button>
                                          </form>
                                      </div> -->

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

                                            <a class="dropdown-item" href="{{route('leagues.show.url',$league->slug)}}">View League</a>
                                            <a class="dropdown-item" href="{{ route('leagues.edit', $league->id) }}">Edit</a>
                                            <!-- <a class="dropdown-item" href="#" data-bs-toggle="modal">Delete</a> -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No leagues found. Create your first league!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                @else
                <p class="text-center">No leagues found. Create your first league!</p>
                @endif
                </div>


            </div>
        </div>
    </div>
</div>
</div>


</div>

@endsection