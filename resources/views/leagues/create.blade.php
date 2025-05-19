@extends('leagues.layouts.master')
@section('content')
<style>
    select.form-select { opacity: 1 !important; height: auto !important; }
select.form-select option { display: block !important; }
</style>


<!-- Dashboard page -->
<div class="content-body ">
    <section class="pb-4">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 ">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Create New League</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Simply fill out the items below and your league will be ready to go. It's that easy!</p>
                            </div>
                            <div class="basic-form">
                                <form method="POST" action="{{ route('leagues.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="League Name" value="{{ old('name') }}">
                                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">URL Name</label>
                                            <input type="text" name="slug" class="form-control" placeholder="Name in URL" value="{{ old('slug') }}" 
                                                   oninput="updateSlugPreview(this.value)">
                                            <div id="slugHelp" class="form-text">https://recstep.com/leagues/<span id="slugPreview"></span></div>
                                            @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Sport</label>
                                            <select name="sport" class="default-select form-control wide">
                                                <option value="" selected disabled>Choose a sport...</option>
                                                <option value="soccer" {{ old('sport') == 'soccer' ? 'selected' : '' }}>Soccer</option>
                                                <option value="basketball" {{ old('sport') == 'basketball' ? 'selected' : '' }}>Basketball</option>
                                                <option value="baseball" {{ old('sport') == 'baseball' ? 'selected' : '' }}>Baseball</option>
                                            </select>
                                            @error('sport') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Type</label>
                                           <select name="type" class="default-select form-control wide">
                                            <option value="" selected disabled>Choose League Type...</option>
                                            <option value="adult_coed" {{ old('type') == 'adult_coed' ? 'selected' : '' }}>Adult - Co-ed</option>
                                            <option value="adult_mens" {{ old('type') == 'adult_mens' ? 'selected' : '' }}>Adult - Mens</option>
                                            <option value="adult_womens" {{ old('type') == 'adult_womens' ? 'selected' : '' }}>Adult - Womens</option>
                                            <option value="youth_boys" {{ old('type') == 'youth_boys' ? 'selected' : '' }}>Youth - Boys</option>
                                            <option value="youth_coed" {{ old('type') == 'youth_coed' ? 'selected' : '' }}>Youth - Co-ed</option>
                                            <option value="youth_girls" {{ old('type') == 'youth_girls' ? 'selected' : '' }}>Youth - Girls</option>
                                        </select>
                                            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Location (City, State)</label>
                                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                                            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Time Zone</label>
                                        <select name="timezone" class="default-select form-control">
                                            <option value="" selected disabled>Please Select a timezone...</option>
                                            @php
                                                $majorTimeZones = [
                                                    'UTC-12:00' => 'UTC-12:00 (International Date Line West)',
                                                    'UTC-11:00' => 'UTC-11:00 (Samoa)',
                                                    'UTC-10:00' => 'UTC-10:00 (Hawaii)',
                                                    'UTC-09:00' => 'UTC-09:00 (Alaska)',
                                                    'UTC-08:00' => 'UTC-08:00 (Pacific Time - US & Canada)',
                                                    'UTC-07:00' => 'UTC-07:00 (Mountain Time - US & Canada)',
                                                    'UTC-06:00' => 'UTC-06:00 (Central Time - US & Canada)',
                                                    'UTC-05:00' => 'UTC-05:00 (Eastern Time - US & Canada)',
                                                    'UTC-04:00' => 'UTC-04:00 (Atlantic Time - Canada)',
                                                    'UTC-03:00' => 'UTC-03:00 (Buenos Aires)',
                                                    'UTC-02:00' => 'UTC-02:00 (Mid-Atlantic)',
                                                    'UTC-01:00' => 'UTC-01:00 (Azores)',
                                                    'UTC+00:00' => 'UTC+00:00 (London)',
                                                    'UTC+01:00' => 'UTC+01:00 (Berlin)',
                                                    'UTC+02:00' => 'UTC+02:00 (Cairo)',
                                                    'UTC+03:00' => 'UTC+03:00 (Moscow)',
                                                    'UTC+04:00' => 'UTC+04:00 (Dubai)',
                                                    'UTC+05:00' => 'UTC+05:00 (Islamabad)',
                                                    'UTC+05:30' => 'UTC+05:30 (India)',
                                                    'UTC+06:00' => 'UTC+06:00 (Dhaka)',
                                                    'UTC+07:00' => 'UTC+07:00 (Bangkok)',
                                                    'UTC+08:00' => 'UTC+08:00 (Beijing)',
                                                    'UTC+09:00' => 'UTC+09:00 (Tokyo)',
                                                    'UTC+10:00' => 'UTC+10:00 (Sydney)',
                                                    'UTC+11:00' => 'UTC+11:00 (Solomon Islands)',
                                                    'UTC+12:00' => 'UTC+12:00 (Auckland)',
                                                    'UTC+13:00' => 'UTC+13:00 (Samoa)',
                                                    'UTC+14:00' => 'UTC+14:00 (Line Islands)',
                                                ];
                                            @endphp

                                            @foreach ($majorTimeZones as $offset => $label)
                                                <option value="{{ $offset }}" {{ old('timezone') == $offset ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('timezone') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>                                 
                                    <button type="submit" class="btn btn-primary">Create League</button>
                                </form>
                            </div>
                        </div>
                    </div>   

                </div>

            </div>
        </div>
    </section>


    <section class="section-one d-none">
        <div class="container">            
            <div class="row">
                <!-- Profile Sidebar -->
                @include('leagues.sidebar')

                <!-- Create League Form -->
                <div class="col-lg-9 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Create New League</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('leagues.store') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> 

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">League Name *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                        id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="sports" class="form-label">Sports *</label>
                                        <select class=" form-select @error('sports') is-invalid @enderror" 
                                        id="sports" name="sports" required>
                                        <option value="">Select Sport</option>
                                        <option value="Soccer" @if(old('sports') == 'Soccer') selected @endif>Soccer</option>
                                        <option value="Basketball" @if(old('sports') == 'Basketball') selected @endif>Basketball</option>
                                        <option value="Baseball" @if(old('sports') == 'Baseball') selected @endif>Baseball</option>
                                        <option value="Volleyball" @if(old('sports') == 'Volleyball') selected @endif>Volleyball</option>
                                        <option value="Tennis" @if(old('sports') == 'Tennis') selected @endif>Tennis</option>
                                    </select>
                                    @error('sports')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="url" class="form-label">Website URL</label>
                                <input type="url" class="form-control @error('url') is-invalid @enderror" 
                                id="url" name="url" value="{{ old('url') }}">
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">League Type *</label>
                                    <select class="form-select @error('type') is-invalid @enderror" 
                                    id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="recreational" @if(old('type') == 'recreational') selected @endif>Recreational</option>
                                    <option value="competitive" @if(old('type') == 'competitive') selected @endif>Competitive</option>
                                    <option value="youth" @if(old('type') == 'youth') selected @endif>Youth</option>
                                    <option value="adult" @if(old('type') == 'adult') selected @endif>Adult</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label">Time *</label>
                                <input type="time" class="form-control @error('time') is-invalid @enderror" 
                                id="time" name="time" value="{{ old('time') }}" required>
                                @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location *</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                            id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('leagues.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create League
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</div>

@endsection
@section('js')
<script>
    function updateSlugPreview(value) {
        document.getElementById('slugPreview').textContent = value.replace(/\s+/g, '-');
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
<script>
function initAutocomplete() {
    // Get the input elements for location and city
    const locationInput = document.getElementById('location');

    // Check if both elements are present and are HTMLInputElements
    if (locationInput instanceof HTMLInputElement) {
        const locationAutocomplete = new google.maps.places.Autocomplete(locationInput);
        locationAutocomplete.addListener('place_changed', function() {
            const place = locationAutocomplete.getPlace();
            console.log("Selected location:", place.formatted_address);
        });
    } else {
        console.error('Location input element not found or not an HTMLInputElement.');
    }

    
}
</script>

@endsection