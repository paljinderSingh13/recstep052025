@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
$league_id = session('league_id');
@endphp
<!-- Dashboard page -->
<div class="content-body">
 <div class="container">
  <div class="row">
   <div class="col-lg-12 col-sm-12 col-md-12 mb-3 mb-lg-0">
    @if(!$setup_progress['is_complete'])
      <div id="divTodoHolder" class="mb-4">
          <div id="divTodo" class="card mb-3">
              <div class="card-header card-header-xl bg-danger text-white rounded-top">
                <h4 class="card-title mb-0 text-white"><i class="fas fa-clipboard-list me-2"></i> League Setup Checklist</h4>
              </div>
              <div class="card-body">
                  <div class="alert alert-danger">
                      <p class="fw-bold">Please complete these essential setup steps:</p>
                      <ul class="list-group checklist-items">
                          <!-- Divisions -->
                          <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['division_count'] > 0 ? 'list-group-item-success' : '' }}">
                              <div>
                                  <i class="fas fa-sitemap me-2"></i>
                                  <span>Add Divisions to your league</span>
                                  <small class="d-block text-muted">Organize teams by skill level or age group</small>
                              </div>
                              <div>
                                  <span class="badge {{ $setup_progress['division_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                      {{ $setup_progress['division_count'] }} added
                                  </span>
                                  <a href="{{ route('league.division.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                      <i class="fas fa-plus"></i> Add Division
                                  </a>
                              </div>
                          </li>
                          
                          <!-- Fields -->
                          <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['field_count'] > 0 ? 'list-group-item-success' : '' }}">
                              <div>
                                  <i class="fas fa-map-marked-alt me-2"></i>
                                  <span>Add Field Locations</span>
                                  <small class="d-block text-muted">Where your games will be played</small>
                              </div>
                              <div>
                                  <span class="badge {{ $setup_progress['field_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                      {{ $setup_progress['field_count'] }} added
                                  </span>
                                  <a href="{{ route('league.fields.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                      <i class="fas fa-plus"></i> Add Field
                                  </a>
                              </div>
                          </li>
                          
                          <!-- Teams -->
                          <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['team_count'] > 0 ? 'list-group-item-success' : '' }}">
                              <div>
                                  <i class="fas fa-users me-2"></i>
                                  <span>Register Teams</span>
                                  <small class="d-block text-muted">All participating teams in your league</small>
                              </div>
                              <div>
                                  <span class="badge {{ $setup_progress['team_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                      {{ $setup_progress['team_count'] }} added
                                  </span>
                                  <a href="{{ route('league.teams.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                      <i class="fas fa-plus"></i> Add Team
                                  </a>
                              </div>
                          </li>
                          
                          <!-- Schedule -->
                          <li class="list-group-item d-flex justify-content-between align-items-center {{ $setup_progress['game_count'] > 0 ? 'list-group-item-success' : '' }}">
                              <div>
                                  <i class="fas fa-calendar-alt me-2"></i>
                                  <span>Create Game Schedule</span>
                                  <small class="d-block text-muted">Set dates and times for all matches</small>
                              </div>
                              <div>
                                  <span class="badge {{ $setup_progress['game_count'] > 0 ? 'bg-success' : 'bg-danger' }} me-2">
                                      {{ $setup_progress['game_count'] }} scheduled
                                  </span>
                                  <a href="{{ route('league.schedule.create',$slug) }}" class="btn btn-sm btn-outline-primary">
                                      <i class="fas fa-plus"></i> Create Schedule
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
                          100% complete - Setup complete!
                      @else
                          {{ round($setup_progress['completion_percentage']) }}% complete - 
                          {{ $setup_progress['remaining_tasks'] }} steps remaining
                      @endif
                  </small>
              </div>
          </div>
      </div>
      @endif
   </div>
   <div class="col-lg-8 col-sm-12 col-md-12 mb-3 mb-lg-0">
    <div class="shadow-sm border rounded mb-3">
     <div class="card-header bg-primary rounded-top">
      <h4 class="card-title mb-0 text-white">General League Tools</h4>
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-12 col-sm-12 mb-3">
            <div class="card border-0 bg-primary-light rounded border-bottom border-primary border-4 p-4">
             <h4 class="text-primary fs-22"><i class="las la-cog"></i> League Options</h4>
             <p>General league settings, along with teams and commissioners</p>
             <ul class="list-group">
              <li class="list-group-item p-1">
               <a href="{{route('leagues.edit',$league_id)}}" class="text-decoration-none text-primary">
                   <i class="fas fa-cog me-2"></i> Settings
               </a>
           </li>
           <li class="list-group-item p-1">
               <a href="{{route('league.division.index',$slug)}}" class="text-decoration-none text-primary">
                   <i class="fas fa-layer-group me-2"></i> Divisions
               </a>
           </li>
           <li class="list-group-item p-1">
               <a href="{{route('league.fields.index',$slug)}}" class="text-decoration-none text-primary">
                   <i class="fas fa-th me-2"></i> Fields
               </a>
           </li>
           <li class="list-group-item p-1">
               <a href="#statistics" class="text-decoration-none text-primary">
                   <i class="fas fa-chart-bar me-2"></i> Statistics
               </a>
           </li>
           <li class="list-group-item p-1">
               <a href="{{route('commissioner.index',$slug)}}" class="text-decoration-none text-primary">
                   <i class="fas fa-user-tie me-2"></i> Commissioners
               </a>
           </li>
       </ul>
   </div>
</div>
<div class="col-lg-6 col-md-12 col-12 col-sm-12 mb-3">
    <div class="card border-0 bg-primary-light rounded border-bottom border-primary border-4 p-4">
     <h4 class="text-primary fs-22"><i class="las la-cog"></i> News/League Messaging</h4>
     <p>Send an email/app message to certain teams, players or managers</p>
     <ul class="list-group">
      <li class="list-group-item p-1">
       <a href="#post-news" class="text-decoration-none text-primary">
           <i class="fas fa-newspaper me-2"></i> Post League News
       </a>
   </li>
   <li class="list-group-item p-1">
       <a href="{{route('message.board',$slug)}}" class="text-decoration-none text-primary">
           <i class="fas fa-comments me-2"></i> Message Board Tools
       </a>
   </li>
   <li class="list-group-item p-1">
       <a href="#send-email" class="text-decoration-none text-primary">
           <i class="fas fa-envelope me-2"></i> Send League Email
       </a>
   </li>
</ul>
</div>
</div>

<div class="col-lg-6 col-md-12 col-12 col-sm-12 mb-3">
    <div class="card border-0 bg-primary-light rounded border-bottom border-primary border-4 p-4">
     <h4 class="text-primary fs-22"><i class="las la-cog"></i> Teams/Rosters</h4>
     <p>View teams, players and those that are still unassigned to a team</p>
     <ul class="list-group">
      <li class="list-group-item p-1">
        <a href="{{route('league.teams.index',$slug)}}" class="text-decoration-none text-primary">
          <i class="fas fa-users me-2"></i> Teams
      </a>
  </li>
  <li class="list-group-item p-1">
    <a href="{{route('league.player.index',$slug)}}" class="text-decoration-none text-primary">
      <i class="fas fa-user-friends me-2"></i> All Players
  </a>
</li>
<li class="list-group-item p-1">
    <a href="#free-agents" class="text-decoration-none text-primary">
      <i class="fas fa-user-plus me-2"></i> Free Agents
  </a>
</li>
</ul>
</div>
</div>

<div class="col-lg-6 col-md-12 col-12 col-sm-12 mb-3">
    <div class="card border-0 bg-primary-light rounded border-bottom border-primary border-4 p-4">
     <h4 class="text-primary fs-22"><i class="las la-cog"></i> Referees</h4>
     <p>you can add/assign them to your games</p>
     <ul class="list-group">
      <li class="list-group-item p-1">
        <a href="{{route('referees.create',$slug)}}" class="text-decoration-none text-primary">
          <i class="fas fa-user-check me-2"></i> Add/Edit Referees
      </a>
  </li>
  <li class="list-group-item p-1">
    <a href="#assign-to-games" class="text-decoration-none text-primary">
      <i class="fas fa-clipboard-check me-2"></i> Assign to Games
  </a>
</li>
<li class="list-group-item p-1">
    <a href="{{route('referee.position',$slug)}}" class="text-decoration-none text-primary">
      <i class="fas fa-user-shield me-2"></i> Referee Positions
  </a>
</li>
</ul>
</div>
</div>

</div>
</div>
</div>


<!-- Current Season - Spring 2025 -->
<div class="mb-4">
    <h2>Current Season - Spring 2025</h2>
</div>
<div class="border shadow-sm rounded mb-4">
    <div class="card-header border-bottom">
        <h4 class="card-title">Player Payments</h4>
    </div>
    <div class="card-body">
        <div class="row m-auto border-bottom mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 mb-3 mb-lg-0">
                <div>
                    <p>Manage all the payments for the current season</p>
                    <ul class="list-group">
                      <li class="list-group-item border-0 p-1">
                        <a href="#player-payments" class="text-decoration-none text-primary">
                          <i class="fas fa-money-check-alt me-2"></i> View/Edit Player Payments
                      </a>
                  </li>
                  <li class="list-group-item border-0 p-1">
                    <a href="#withdrawals" class="text-decoration-none text-primary">
                      <i class="fas fa-university me-2"></i> View/Make Withdrawals From Leageez
                  </a>
              </li>
              <li class="list-group-item border-0 p-1">
                <a href="#payment-settings" class="text-decoration-none text-primary">
                  <i class="fas fa-sliders-h me-2"></i> Payment Settings
              </a>
          </li>
      </ul>
  </div>
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-3 mb-lg-0">
    <div class="d-flex justify-content-evenly mb-3">
        <div class="mt-2">
            <p class="mb-0 p-1 rounded border-5 border border-success"></p>
        </div>
        <div>
            <h4 class="mb-0">0 Players</h4>
            <p class="small">Fully paid</p>
        </div>
    </div>
    <div class="d-flex justify-content-evenly">
        <div class="mt-2">
            <p class="mb-0 p-1 rounded border-5 border border-danger"></p>
        </div>
        <div>
            <h4 class="mb-0">0 Players</h4>
            <p class="small"> Unpaid</p>
        </div>
    </div>

</div>
</div>

<div class="row m-auto mb-4">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-3 mb-lg-0">
        <div class="card border-0 rounded border-bottom border-primary border-4">
            <div class="card-header bg-primary rounded-top">
                <h4 class="card-title text-white"><i class="fas fa-calendar-alt me-2"></i> Scheduling</h4>
            </div>
            <div class="card-body">
                <p>View, edit, postpone any games for the current season</p>
                <li class="list-group-item p-1 border-0">
                    <a href="{{route('league.schedule.index',$slug)}}" class="text-decoration-none text-primary">
                      <i class="fas fa-calendar-alt me-2"></i> Full League Schedule
                  </a>
              </li>
              <li class="list-group-item p-1 border-0">
                <a href="{{route('league.schedule.create',$slug)}}" class="text-decoration-none text-primary">
                  <i class="fas fa-plus-circle me-2"></i> Create New Game
              </a>
          </li>
          <li class="list-group-item p-1 border-0">
            <a href="#postpone-games" class="text-decoration-none text-primary">
              <i class="fas fa-clock me-2"></i> Postpone Multiple Games
          </a>
      </li>
  </div>
</div>
</div>    
<div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-3 mb-lg-0">
    <div class="card border-0 rounded border-bottom border-success border-4">
        <div class="card-header bg-success rounded-top">
            <h4 class="card-title text-white"><i class="fas fa-object-group me-2"></i> Divisions</h4>
        </div>
        <div class="card-body">
            <p>To add or edit your divisions for the current season</p>
            <ul class="list-group">
              <li class="list-group-item p-1 border-0">
                <a href="#manage-divisions" class="text-decoration-none text-primary">
                  <i class="fas fa-object-group me-2"></i> Add/Remove Divisions
              </a>
          </li>
      </ul>
  </div>
</div>
</div>    
</div>

</div>
</div>

<div class="border shadow-sm rounded mb-4">
    <div class="card-header border-bottom">
        <h4 class="card-title">Division - U7</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <p>Division Options</p>
            <ul class="list-group">

            </li>
            <li class="list-group-item p-1 border-0">
                <a href="#full-division-schedule" class="text-decoration-none text-primary">
                  <i class="fas fa-calendar-days me-2"></i> Full Division Schedule
              </a>
          </li>
          <li class="list-group-item p-1 border-0">
            <a href="#email-division-teams" class="text-decoration-none text-primary">
              <i class="fas fa-envelope-open-text me-2"></i> Email Division Teams
          </a>
      </li>
      <li class="list-group-item p-1 border-0">
        <a href="#edit-division-teams" class="text-decoration-none text-primary">
          <i class="fas fa-users-gear me-2"></i> Add/Edit Division Teams
      </a>
  </li>
</ul>
</div>
<div class="table-responsive">
<table id="example3" class="display">
    <thead class="bg-success">
        <tr>
            <th class="text-white">Team</th>
            <th class="text-white">W</th>
            <th class="text-white">L</th>
            <th class="text-white">T</th>
            <th class="text-white">PTS</th>
            <th class="text-white">Games</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>The Blue Tigers</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0/1</td>
        </tr>
        <tr>
            <td>NAtional American</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0/1</td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>

<div class="border shadow-sm rounded mb-4">
    <div class="card-header border-bottom">
        <h4 class="card-title">Division - U10</h4>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <p>Division Options</p>
            <ul class="list-group">

              <li class="list-group-item p-1 border-0">
                <a href="#full-division-schedule" class="text-decoration-none text-primary">
                  <i class="fas fa-calendar-days me-2"></i> Full Division Schedule
              </a>
          </li>
          <li class="list-group-item p-1 border-0">
            <a href="#email-division-teams" class="text-decoration-none text-primary">
              <i class="fas fa-envelope-open-text me-2"></i> Email Division Teams
          </a>
      </li>
      <li class="list-group-item p-1 border-0">
        <a href="#edit-division-teams" class="text-decoration-none text-primary">
          <i class="fas fa-users-gear me-2"></i> Add/Edit Division Teams
      </a>
  </li>
</ul>
</div>
<div class="table-responsive">
<table id="example3" class="display">
    <thead class="bg-success">
        <tr>
            <th class="text-white">Team</th>
            <th class="text-white">W</th>
            <th class="text-white">L</th>
            <th class="text-white">T</th>
            <th class="text-white">PTS</th>
            <th class="text-white">Games</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>The Blue Tigers</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0/1</td>
        </tr>
        <tr>
            <td>NAtional American</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0/1</td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>


</div>
<div class="col-lg-4 col-sm-12 col-md-12 mb-3 mb-lg-0">
    <div class="shadow-sm border rounded mb-3 right-sidebar">
     <div class="card-header bg-primary rounded-top">
      <h4 class="card-title text-white mb-0">Recent Activity</h4>
  </div>
  <div class="card-body p-0">
      <div class="row m-auto p-2 bg-primary-light">
       <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
        <div>
         <img style="width: 40px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
     </div>
 </div>
 <div class="col-12 col-lg-10 col-md-12 col-sm-12">
    <div class="align-items-center d-flex justify-content-between">
     <h4 class="text-primary mb-0">John Deo</h4>
     <p class="fs-12 mb-0">Apr 09 2025</p>
 </div>
 <p class="small mb-0">Commissioner</p>
 <p class="mb-0 small">Hockey has been created!!</p>
</div>
</div>
<div class="row m-auto p-2 ">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div>
     <img style="width: 40px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
 </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">
    <div class="align-items-center d-flex justify-content-between">
     <h4 class="text-primary mb-0">John Deo</h4>
     <p class="fs-12 mb-0">Apr 09 2025</p>
 </div>
 <p class="small mb-0">Commissioner</p>
 <p class="mb-0 small">Initial League Setup Complete</p>
</div>
</div>
<div class="row m-auto p-2 bg-primary-light">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div>
     <img style="width: 40px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
 </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">
    <div class="align-items-center d-flex justify-content-between">
     <h4 class="text-primary mb-0">John Deo</h4>
     <p class="fs-12 mb-0">Apr 09 2025</p>
 </div>
 <p class="small mb-0">Commissioner</p>
 <p class="mb-0 small">National American was added as a new team.</p>
 <button class="btn btn-sm btn-primary">View more</button>
</div>
</div>

<div class="row m-auto p-2">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div>
     <img style="width: 40px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
 </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">
    <div class="align-items-center d-flex justify-content-between">
     <h4 class="text-primary mb-0">John Deo</h4>
     <p class="fs-12 mb-0">Apr 09 2025</p>
 </div>
 <p class="small mb-0">Commissioner</p>
 <p class="mb-0 small">A new season was created! Spring 2025</p>
</div>
</div>

<div class="row m-auto p-2 bg-primary-light">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div>
     <img style="width: 40px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
 </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">
    <div class="align-items-center d-flex justify-content-between">
     <h4 class="text-primary mb-0">John Deo</h4>
     <p class="fs-12 mb-0">Apr 09 2025</p>
 </div>
 <p class="small mb-0">Commissioner</p>
 <p class="mb-0 small">Boston Park was added as a new field.</p>
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