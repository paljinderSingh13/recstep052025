    @extends('leagues.layouts.master')
    @section('content')

@php
    $slug = session('slug');
    
    if (!$slug) {
        $slug = 'url';
    }
@endphp
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Create Game</h4>
                        </div>
                        <div class="card-body">
                            <p>To manually create an individual game, please use the form below. For generating a complete season schedule, we recommend using one of our automated tools.</p>
                            <div class="basic-form">
    <form method="POST" action="{{ route('league.games.store',$slug) }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Game Date</label>
                <input type="date" name="game_date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Game Time</label>
                <input type="time" name="game_time" class="form-control" required>
            </div> 
            <div class="col-md-6 mb-3">
                <label class="form-label">Field</label>
                <select name="field_id" class="default-select form-control wide" required>
                        <option value="1">dummy</option>
                        <option value="2">sdasd</option>
                    <!-- @foreach($fields as $field) -->
                        <option value="1">dummy</option>
                    <!-- @endforeach -->
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Game Type</label>
                <select name="game_type" class="default-select form-control wide" required>
                    <option value="Regular Season">Regular Season</option>
                    <option value="Playoff">Playoff</option>
                    <option value="Exhibition">Exhibition</option>
                    <option value="Tournament">Tournament</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Length of time for field reservation (minutes)</label>
                <input type="number" name="duration_minutes" class="form-control" placeholder="90" min="30" max="240" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Division</label>
                <select name="division" class="default-select form-control wide" required>
                    <option value="Multi Division">Multi Division</option>
                    <option value="Division 1">Division 1</option>
                    <option value="Division 2">Division 2</option>
                    <option value="Division 3">Division 3</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Home Team</label>
                <select name="home_team_id" class="default-select form-control wide" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Away Team</label>
                <select name="away_team_id" class="default-select form-control wide" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Create Game</button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>

</div>

@endsection