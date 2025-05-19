@extends('leagues.layouts.master')
@section('content')
@php
$slug = session('slug');
if (!$slug) {
    $slug = 'url';
}
@endphp
<div class="content-body" >

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title ">Current Teams</h4>
                        <a href="{{route('league.teams.create',$slug)}}" class="btn btn-primary">Add Team</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        	@if($teams->count() > 0)
                            <table class=" display" id="example3">
                                <thead>
                                    <tr>
                                        <th>Team Name</th>
                                        <th>Division</th>
                                        <th>Club</th>
                                        <!-- <th>Status</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								    @forelse($teams as $leagueTeam)
								    <tr>
								        <td>{{ $leagueTeam->team->name ?? 'N/A' }}</td>
								        <td>
								            <span class="">
								                {{ $leagueTeam->divisions->name ?? 'No Division' }}
								            </span>
								        </td>
								        <td>{{ $leagueTeam->team->club->name ?? 'N/A' }}</td>
								       <!--  <td>
								            <span>
								                {{ $leagueTeam->status ? 'Active' : 'Inactive' }}
								            </span>
								        </td> -->
								        <td>
								            <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal"
								                data-bs-target="#teamModal{{ $leagueTeam->id }}">Payment info</button>
								            <!-- Modal -->
								            <div class="modal fade" id="teamModal{{ $leagueTeam->id }}">
								                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								                    <div class="modal-content">
								                        <div class="modal-header">
								                            <h4 class="modal-title">{{ $leagueTeam->team->name ?? 'Team' }} Players</h4>
								                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								                        </div>
								                        <div class="modal-body">
								                            <div class="table-responsive">
								                               <table class="table display" id="teamPlayersTable{{ $leagueTeam->id }}">
																    <thead>
																        <tr>
																            <th>Player Name</th>
																            <th>Confirmation Status</th>
																            <th>Verification</th>
																        </tr>
																    </thead>
																    <tbody>
																        @forelse($leagueTeam->team->players ?? [] as $player)
																        <tr>
																            <td>{{ $player->user->name ?? 'N/A' }}</td>
																            <td>
																			    @if(auth()->check() && auth()->user()->role == 'player')
																			        @php
																			            $paymentExists = false;
																			            if(is_array($payments) && count($payments) > 0) {
																			                foreach($payments as $payment) {
																			                    if(isset($payment['team_id']) && 
																			                       isset($payment['player_id']) && 
																			                       isset($payment['payment_status']) &&
																			                       $payment['team_id'] == $player['team_id'] &&
																			                       $payment['player_id'] == $player['user_id'] &&
																			                       $payment['payment_status'] == 'paid') {
																			                        $paymentExists = true;
																			                        break;
																			                    }
																			                }
																			            }
																			        @endphp
																			        @if($paymentExists)
																			            <span class="badge bg-success">Confirmed</span>
																			        @else
																			        	@if($player['user_id'] == auth()->user()->id)
																			            <a href="{{ route('league.player.payment.confirm', [$player['user_id'], $player['team_id']]) }}" class="btn btn-sm btn-primary">
																			                Confirm & Pay
																			            </a>
																			            @endif
																			        @endif
																			    @else
																			        @php
																			            $isConfirmed = false;
																			            if(is_array($payments) && count($payments) > 0) {
																			                foreach($payments as $payment) {
																			                    if(isset($payment['team_id']) && 
																			                       isset($payment['player_id']) && 
																			                       isset($payment['payment_status']) &&
																			                       $payment['team_id'] == $player['team_id'] &&
																			                       $payment['player_id'] == $player['user_id'] &&
																			                       $payment['payment_status'] == 'paid') {
																			                        $isConfirmed = true;
																			                        break;
																			                    }
																			                }
																			                
																			            }
																			        @endphp
																			        
																			        <span class="badge bg-{{ $isConfirmed ? 'success' : 'warning' }}">
																			            {{ $isConfirmed ? 'Confirmed' : 'Pending' }}
																			        </span>
																			    @endif
																			</td>
																            <td>
																                @php
																				    $isVerified = false;
																				    if(is_array($payments) && count($payments) > 0) {
																				        foreach($payments as $payment) {
																				            if(isset($payment['is_verified']) && $payment['is_verified'] == 'yes' && 
																				               isset($payment['team_id']) && $payment['team_id'] == $player['team_id'] && 
																				               isset($payment['player_id']) && $payment['player_id'] == $player['user_id']) {
																				                $isVerified = true;
																				                break;
																				            }
																				        }
																				    }
																				$current_league = session('current_league');
																				@endphp
																				@if(auth()->user()->id == $current_league['user_id'])
																			
																				@if($isVerified)
																				    <span class="badge bg-success">Verified</span>
																				@else
																					@if($isConfirmed)
																				    <a href="{{ route('league.payment.is_verified', [$player['user_id'], $player['team_id']]) }}" 
																				       class="btn btn-sm btn-outline-primary">
																				        Verify
																				    </a>
																					@else
																				    <span class="badge bg-warning">Pending</span>
																					@endif
																				@endif
																				@else
																				@if($isVerified)
																				    <span class="badge bg-success">Verified</span>
																				@else
																				    <span class="badge bg-warning">Pending</span>
																				    
																				@endif
																				@endif
																            </td>
																        </tr>
																        @empty
																        <tr>
																            <td colspan="3" class="text-center">No players found for this team</td>
																        </tr>
																        @endforelse
																    </tbody>
																</table>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </td>
								    </tr>
								    @empty
								    <tr>
								        <td colspan="5" class="text-center"></td>
								    </tr>
								    @endforelse
								</tbody>
                            </table>
                            @endif
                            <p class="text-center">No teams found for this league</p>
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

    @endsection