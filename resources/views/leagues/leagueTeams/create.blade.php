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
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Add Team</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Add a team to your league using the form below. If you provide a team manager's email address, they’ll receive an invitation to join Leageez and will be automatically assigned to their team.</p>
                            </div>
                            <div class="basic-form">
                                <form method="POST" action="{{route('league.teams.store',$slug)}}">                @csrf              
                                    <div class="row">
                                         <div class="mb-3 col-md-12">
                                            <label class="form-label">Division</label>
                                            <select name="division" class="default-select form-control wide">
                                                <option value="" selected="" disabled="">Choose a Division...</option>
                                                @foreach($divisions as $division)
                                                <option value="{{$division['id']}}">{{$division['name']}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Club</label>
                                            <select name="club_id" id="clubSelect" class="default-select form-control wide">
                                                <option value="" selected disabled>Choose a Club...</option>
                                                @foreach($clubs as $club)
                                                <option value="{{ $club['id'] }}">{{ $club['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Club Team</label>
                                            <select name="team_id" id="teamSelect" class="form-control" disabled>
    <option value="">Select a club first</option>
</select>
                                        </div>
                                                                           
                                    </div>                                 
                                    <button type="submit" class="btn btn-primary">Add Team</button>
                                </form>
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
<input type="hidden" id="slug" value="{{$slug}}">
</div>

@endsection
@section('js')
<script>
     document.getElementById('clubSelect').addEventListener('change', function() {
    const clubId = this.value;
    const teamSelect = document.getElementById('teamSelect');
    const slug = document.getElementById('slug').value;
    
    if (!clubId) {
        teamSelect.innerHTML = '<option value="" selected disabled>Select a Club first...</option>';
        teamSelect.disabled = true;
        return;
    }

    // Show loading state
    teamSelect.innerHTML = '<option value="" selected disabled>Loading teams...</option>';
    teamSelect.disabled = false;

    // Make AJAX request to fetch teams
    fetch(`/league/${slug}/clubs/${clubId}/teams`, {
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(teams => {
        if (teams && teams.length > 0) {
            let options = '<option value="" selected disabled>Choose a Team...</option>';
            teams.forEach(team => {
                options += `<option value="${team.id}">${team.name}</option>`;
            });
            teamSelect.innerHTML = options;
        } else {
            teamSelect.innerHTML = '<option value="" selected disabled>No teams found for this club</option>';
        }
    })
    .catch(error => {
        console.error('Error fetching teams:', error);
        teamSelect.innerHTML = '<option value="" selected disabled>Error loading teams</option>';
    });
});
</script>
@endsection