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
                    <div class="card-header">
                        <h4 class="card-title">Enter Game Score</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('league.games.store-score', [$slug, $game->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <input type="hidden" name="away_team_game_id" value="{{ $game->awayTeam->id }}">
                            <input type="hidden" name="home_team_game_id" value="{{ $game->homeTeam->id }}">

                            <h5 class="mb-1">{{ $game->awayTeam->name }} @ {{ $game->homeTeam->name }}</h5>
                            <h6 class="text-muted">
                                {{ \Carbon\Carbon::parse($game->date)->format('F j, Y') }} at 
                                {{ \Carbon\Carbon::parse($game->start_time)->format('g:i A') }}
                            </h6>
                            <h6 class="text-muted">{{ $game->leagueField->name ?? 'Location not set' }}</h6>

                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $game->awayTeam->name }}</td>
                                        <td>
                                            <input type="number" name="away_team_score" class="form-control" 
                                                   value="{{ old('away_team_score', $game->away_team_score ?? 0) }}" 
                                                   min="0" required>
                                        </td>
                                        <td>
                                            <select name="away_team_status" class="form-control">
                                                <option value="completed" {{ old('away_team_status', $game->away_team_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="forfeit" {{ old('away_team_status', $game->away_team_status) == 'forfeit' ? 'selected' : '' }}>Forfeit</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $game->homeTeam->name }}</td>
                                        <td>
                                            <input type="number" name="home_team_score" class="form-control" 
                                                   value="{{ old('home_team_score', $game->home_team_score ?? 0) }}" 
                                                   min="0" required>
                                        </td>
                                        <td>
                                            <select name="home_team_status" class="form-control">
                                                <option value="completed" {{ old('home_team_status', $game->home_team_status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="forfeit" {{ old('home_team_status', $game->home_team_status) == 'forfeit' ? 'selected' : '' }}>Forfeit</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="mt-4">
                                <label for="away_team_report" class="form-label">Away Team Game Report <span class="text-muted">(Optional)</span></label>
                                <textarea name="away_team_report" class="form-control" id="away_team_report" rows="3">{{ old('away_team_report', $game->away_team_report) }}</textarea>
                            </div>

                            <div class="mt-4">
                                <label for="home_team_report" class="form-label">Home Team Game Report <span class="text-muted">(Optional)</span></label>
                                <textarea name="home_team_report" class="form-control" id="home_team_report" rows="3">{{ old('home_team_report', $game->home_team_report) }}</textarea>
                            </div>

                            <div class="mt-4">
                                <label for="game_notes" class="form-label">Game Notes <span class="text-muted">(Optional)</span></label>
                                <textarea name="game_notes" class="form-control" id="game_notes" rows="3">{{ old('game_notes', $game->notes) }}</textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-refresh fa-spin button-spinner d-none"></i>
                                    <span class="button-text-main">Save Game Score</span>
                                </button>
                                <a href="{{ route('league.schedule.index', $slug) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
