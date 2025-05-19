@extends('layouts.master')
@section('content')

<!-- Dashboard page -->

<div class="content-body">
	<div class="container-fluid">
		<div class="row userprofile">
			<!-- <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-sm-3">
				<div class="bg-primary p-5 rounded">
					<img class="rounded-circle" src="{{ $user->profile_picture ? asset($user->profile_picture) : 'http://recstep.com/pictures/1729763582_admin2.jpg' }}">
				</div>
			</div> -->
			<div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-sm-3 border-end">
				<div class=" ">
					<h4 class="username fs-26">{{$user['name']}} {{$user['last_name']}}</h4>
					<div class="mb-2">
						<h5 class="user-role fs-20 capitalize">{{auth()->user()->role}}</h5>
						<p class="teams-name fs-16">

							@foreach($teams as $key => $team)
							    {{ $team['name'] }}{{ $key < count($teams) - 1 ? ', ' : '' }}
							@endforeach
						</p>
					</div>
					<div class="mb-2">
						<h5 class="fs-20">Parent</h5>
						<ul class="d-block mb-3 fs-16">
							@foreach($admins as $admin)
							<li>
							    <span>
							        {{$admin['name']}} {{$admin['last_name']}} 
							        @if(isset($admin->teamadmin) && isset($admin->teamadmin->team))
							            ({{$admin->teamadmin->team['name']}})
							        @else
							            (No Team Assigned)
							        @endif
							    </span>
							</li>

							@endforeach
							<!-- <li><span>Joni (The Blue Tigers)</span></li> -->
						</ul>	
					</div>
					<div class="mb-2">
						<h5 class="fs-20">Player</h5>
						<p class="fs-16">The Blue Tigers</p>						
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-sm-3 border-end">
				<div class="latest-action pe-4">
					<h5 class="fs-22">Latest Actions</h5>
					<span class="font-w500 fs-16 text-dark">Today</span>
					<ul class="border-bottom fs-16">
						@foreach($todaySchedule as $schedule)
						<li class="mb-2 pb-2"><span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span><span><b class="text-success">{{$schedule['type']}}: </b>
					                    {{ $schedule->team ? $schedule->team['name'] : 'No Team Assigned' }} 
					                    @if($schedule['type'] != 'Practice')

					                    vs 
					                    {{ $schedule->OpTeam ? $schedule->OpTeam['name'] : 'No Opponent Team' }}
					                    @endif</span></li>
						@endforeach
					</ul>
					<span class="font-w500 fs-16 text-dark">Yesterday</span>
					<ul class="fs-16">
						@foreach($yesterdaySchedule as $schedule)
						<li class="mb-2 pb-2"><span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span><span><b class="text-success">{{$schedule['type']}}: </b>
					                    {{ $schedule->team ? $schedule->team['name'] : 'No Team Assigned' }} 
					                    @if($schedule['type'] != 'Practice')

					                    vs 
					                    {{ $schedule->OpTeam ? $schedule->OpTeam['name'] : 'No Opponent Team' }}
					                    @endif</span></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-12 mb-sm-3">
				<div class="">
					<h5 class="fs-22">Upcoming Events</h5>
					@foreach($upcomingSchedule as $schedule)
					    <div class="mb-2 border-bottom pb-2">						
					        <span class="font-w500 fs-16 text-dark">{{ \Carbon\Carbon::parse($schedule->date)->format('l') }}</span>
					        <ul class="fs-16">
					            <li>
					                <span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span>
					                <span>
					                    <b class="text-success">{{$schedule['type']}}:</b> 
					                    {{ $schedule->team ? $schedule->team['name'] : 'No Team Assigned' }} 
					                    @if($schedule['type'] != 'Practice')

					                    vs 
					                    {{ $schedule->OpTeam ? $schedule->OpTeam['name'] : 'No Opponent Team' }}
					                    @endif
					                </span>
					            </li>
					        </ul>
					    </div>
					@endforeach

					<!-- <div class="mb-2">						
						<span class="font-w500 fs-16 text-dark">Friday</span>
						<ul class="fs-16">
							<li><span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span><span><b class="text-primary">Practice:</b> Blue Tigers</span></li>
						</ul>
					</div>
					<div class="mb-2">						
						<span class="font-w500 fs-16 text-dark">Sunday</span>
						<ul class="fs-16">
							<li><span class="icon"><i class="fa fa-circle" aria-hidden="true"></i></span><span><b class="text-success">Tournament:</b> Blue Tigers vs Mumbai Indian</span></li>
						</ul>
					</div> -->
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
