@extends('leagues.layouts.master')

@section('content')
@php
    $slug = session('slug') ?? 'url';
@endphp

<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header card-header-xl">
                        <h4 class="card-title">Enter Game Results</h4>
                    </div>
                    <div class="card-body">
                        <!-- Game Info Header -->
                        <div class="mb-4">
                            <h5 class="mb-1">{{ $game->awayTeam->name }} @ {{ $game->homeTeam->name }}</h5>
                            <h6 class="text-muted">
                                {{ \Carbon\Carbon::parse($game->date)->format('F j, Y') }} at 
                                {{ \Carbon\Carbon::parse($game->start_time)->format('g:i A') }}
                            </h6>
                            <h6 class="text-muted">{{ $game->leagueField->name ?? 'Location not set' }}</h6>
                        </div>

                        <!-- Score Entry Section -->
                        <form action="{{ route('league.games.store-stat', [$slug, $game->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <input type="hidden" name="away_team_game_id" value="{{ $game->awayTeam->id }}">
                            <input type="hidden" name="home_team_game_id" value="{{ $game->homeTeam->id }}">

                           

                            <!-- Player Statistics Section -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Player Statistics</h5>
                                    <p class="card-text">
                                        You can choose to enter as many statistics as you would like. Listed below is your current roster.
                                        If any of the players were missing from the game, simply click on the "x" next to their name.
                                    </p>
                                </div>
                                <div class="card-body">
                                    <!-- Away Team Stats -->
                                    <div class="mb-4">
                                        <h6 class="card-title">{{ $game->awayTeam->name }}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="awayTeamStats">
                                                <thead>
                                                    <tr>
                                                        <th>Player</th>
                                                        <th>3PA</th>
                                                        <th>3PM</th>
                                                        <th>AST</th>
                                                        <th>BLK</th>
                                                        <th>FGA</th>
                                                        <th>FGM</th>
                                                        <th>PF</th>
                                                        <th>PTS</th>
                                                        <th>REB</th>
                                                        <th>STL</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($game->awayTeam->players as $player)
                                                    <tr>
                                                        <td>{{ $player->user['name'] }}</td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][three_point_attempts]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][three_point_made]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][assists]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][blocks]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][field_goal_attempts]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][field_goal_made]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][fouls]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][points]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][rebounds]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="away_players[{{ $player->id }}][steals]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><button type="button" class="btn btn-sm btn-danger remove-player" data-player-id="{{ $player->id }}">×</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Home Team Stats -->
                                    <div class="mb-4">
                                        <h6 class="card-title">{{ $game->homeTeam->name }}</h6>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="homeTeamStats">
                                                <thead>
                                                    <tr>
                                                        <th>Player</th>
                                                        <th>3PA</th>
                                                        <th>3PM</th>
                                                        <th>AST</th>
                                                        <th>BLK</th>
                                                        <th>FGA</th>
                                                        <th>FGM</th>
                                                        <th>PF</th>
                                                        <th>PTS</th>
                                                        <th>REB</th>
                                                        <th>STL</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($game->homeTeam->players as $player)
                                                    <tr>
                                                        <td>{{ $player->user['name'] }}</td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][three_point_attempts]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][three_point_made]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][assists]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][blocks]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][field_goal_attempts]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][field_goal_made]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][fouls]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][points]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][rebounds]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><input type="number" name="home_players[{{ $player->id }}][steals]" class="form-control form-control-sm" min="0" value="0"></td>
                                                        <td><button type="button" class="btn btn-sm btn-danger remove-player" data-player-id="{{ $player->id }}">×</button></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Buttons -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-refresh fa-spin button-spinner d-none"></i>
                                    <span class="button-text-main">Save All Game Data</span>
                                </button>
                                <a href="{{ route('league.schedule.index', $slug) }}" class="btn btn-secondary">Cancel</a>
                                <a href="{{ route('league.schedule.index', $slug) }}" class="btn btn-outline-secondary ml-2">Skip Statistics</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    // Initialize DataTables for stats tables
    $('#awayTeamStats, #homeTeamStats').DataTable({
        scrollX: true,
        scrollY: '300px',
        scrollCollapse: true,
        paging: false,
        searching: true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 1
        }
    });

    // Remove player row
    $('.remove-player').click(function() {
        $(this).closest('tr').remove();
    });

    // Form submission loading state
    $('form').submit(function() {
        $('.button-spinner').removeClass('d-none');
        $('.button-text-main').addClass('d-none');
    });
});
</script>

@endsection