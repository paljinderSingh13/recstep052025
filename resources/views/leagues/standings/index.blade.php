@extends('leagues.layouts.master')
@section('content')
@php
      $slug = session('slug');
      if (!$slug) {
          $slug = 'url';
      }
  @endphp
<!-- Dashboard page -->
<div class="content-body">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm border rounded">
                    <div class="card-header bg-success">
                        <h4 class="card-title text-white">Division U7 - Spring 2025</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead >
                                    <tr>
                                        <th>Team</th>
                                        <th>GP</th>
                                        <th>Wins</th>
                                        <th>Losses</th>
                                        <th>Ties</th>
                                        <th>Points</th>                                        
                                        <th>PS</th>
                                        <th>PA</th>
                                        <th>Diff</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>The Blue Tigers</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>NAtional American</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr><tr>
                                        <td>Mumbai Indian</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr><tr>
                                        <td>RJ Royal</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr><tr>
                                        <td>King XI</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr><tr>
                                        <td>KK Riders</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr><tr>
                                        <td>HR Sunrise</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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



    <section class="section-one d-none">
        <div class="container">            
            <div class="row">
                <!-- Profile Sidebar -->
                @include('leagues.sidebar')
                
                <!-- Teams List -->
                <div class="col-lg-9 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Teams</h3>
                            </div>
                            <a href="{{route('league.teams.create',$slug)}}" class="btn btn-light">
                                <i class="fas fa-plus me-1"></i> Add New Team
                            </a>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Team Name</th>
                                            <th>Email</th>
                                            <th>Home Field</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($teams as $team)
                                        <tr>
                                            <td class="capitalize">{{ $team->name }}</td>
                                            <td>{{ $team->email ? $team->email : 'None' }}</td>
                                            <td>{{ $team->home_field ? $team->home_field : 'None' }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{route('league.teams.edit',[$team['id'],$slug])}}" 
                                                    class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="#" 
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                class="btn btn-sm btn-outline-danger" 
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this team?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No teams found. Create your first team!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($teams->hasPages())
                <div class="d-flex justify-content-center mt-3">
                    {{ $teams->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</section>

</div>

@endsection