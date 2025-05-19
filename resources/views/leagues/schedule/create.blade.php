@extends('leagues.layouts.master')
@section('content')
@php
    $slug = session('slug');

    if (!$slug) {
        $slug = 'url';
    }
@endphp

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container--default .select2-selection--single { 
    height: 100% !important;
    border: 1px solid var(--border);
    z-index: 0 !important;
    border-radius: 4px;
    font-size: 14px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    font-size: 13px;
    color: #444444bf;
}
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">           
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Schedule</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('league.schedule.Store',$slug) }}" method="POST" id="scheduleForm">
                                @csrf
                                <div class="row"> 
                                    <div class="mb-3 col-md-6">
                                        <label for="location_id" class="form-label">Field <span class="text-danger">*</span></label>
                                        <select class="form-control wide @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>
                                            <option value="">Select Field</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }} ({{ $location->address }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('date') is-invalid @enderror" id="dateInput" placeholder="mm/dd/yyyy" name="date" value="{{ old('date') }}"  required>
                                        @error('date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="start_time" class="form-label"> Time <span class="text-danger">*</span></label>
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                        @error('start_time')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="duration" class="form-label">Length of time for field reservation <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', 90) }}" min="30" max="180" required>
                                        <small id="durationDisplay" class="text-muted">1 hour 30 minutes</small>
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="game_type" class="form-label">Game Type <span class="text-danger">*</span></label>
                                        <select class="form-control wide @error('game_type') is-invalid @enderror" id="game_type" name="game_type" required>
                                            <option value="">Select Game Type</option>
                                            <option value="regular" {{ old('game_type') == 'regular' ? 'selected' : '' }}>Regular Season</option>
                                            <option value="playoff" {{ old('game_type') == 'playoff' ? 'selected' : '' }}>Playoffs</option>
                                            <option value="friendly" {{ old('game_type') == 'friendly' ? 'selected' : '' }}>Friendly</option>
                                            <option value="tournament" {{ old('game_type') == 'tournament' ? 'selected' : '' }}>Tournament</option>
                                        </select>
                                        @error('game_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="division_id" class="form-label">Division <span class="text-danger">*</span></label>
                                        <select class="form-control wide @error('division_id') is-invalid @enderror" id="division_id" name="division_id" required>
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" {{ old('division_id') == $division->id ? 'selected' : '' }}>
                                                    {{ $division->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="home_team_id" class="form-label">Home Team <span class="text-danger">*</span></label>
                                        <select class="form-control wide @error('home_team_id') is-invalid @enderror" id="home_team_id" name="home_team_id" required>
                                            <option value="">Select Home Team</option>
                                            <!-- Teams will be loaded via AJAX based on division selection -->
                                        </select>
                                        @error('home_team_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label for="away_team_id" class="form-label">Away Team <span class="text-danger">*</span></label>
                                        <select class="form-control wide @error('away_team_id') is-invalid @enderror" id="away_team_id" name="away_team_id" required>
                                            <option value="">Select Away Team</option>
                                            <!-- Teams will be loaded via AJAX based on division selection -->
                                        </select>
                                        @error('away_team_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/js/own.js') }}"></script>

<script>
$(document).ready(function() {
    // Initialize Select2
    $('.wide').select2();
    
    // Convert duration to hours/minutes display
    $('#duration').on('input', function() {
        const minutes = parseInt($(this).val()) || 0;
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        $('#durationDisplay').text(`${hours} hour${hours !== 1 ? 's' : ''} ${mins} minute${mins !== 1 ? 's' : ''}`);
    }).trigger('input');
    
    // Load teams when division changes
    $('#division_id').change(function() {
        const divisionId = $(this).val();
        if (divisionId) {
            $.ajax({
                url: '/teamsByDivision/' + divisionId,
                type: 'GET',
                success: function(data) {
                    const homeTeamSelect = $('#home_team_id');
                    const awayTeamSelect = $('#away_team_id');
                    
                    homeTeamSelect.empty().append('<option value="">Select Home Team</option>');
                    awayTeamSelect.empty().append('<option value="">Select Away Team</option>');
                    
                    data.forEach(function(team) {
                        homeTeamSelect.append(`<option value="${team.team.id}">${team.team.name}</option>`);
                        awayTeamSelect.append(`<option value="${team.team.id}">${team.team.name}</option>`);
                    });
                }
            });
        } else {
            $('#home_team_id, #away_team_id').empty().append('<option value="">Select Team</option>');
        }
    });
    
    // Prevent same team selection for home and away
    $('#home_team_id, #away_team_id').change(function() {
        const homeTeam = $('#home_team_id').val();
        const awayTeam = $('#away_team_id').val();
        
        if (homeTeam && awayTeam && homeTeam === awayTeam) {
            alert('Home and Away teams cannot be the same!');
            $(this).val('').trigger('change');
        }
    });
    
    // Form validation
    $('#scheduleForm').submit(function(e) {
        const homeTeam = $('#home_team_id').val();
        const awayTeam = $('#away_team_id').val();
        
        if (homeTeam && awayTeam && homeTeam === awayTeam) {
            e.preventDefault();
            alert('Home and Away teams cannot be the same!');
            return false;
        }
    });
});
</script>
@endsection