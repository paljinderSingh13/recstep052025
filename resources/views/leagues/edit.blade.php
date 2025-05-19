@extends('leagues.layouts.master')
@section('content')
<style>
    select.form-select { opacity: 1 !important; height: auto !important; }
    select.form-select option { display: block !important; }
    .logo-preview-container .logo-preview {
        width: 50px!important;
        max-width: 100px;
        max-height: 100px;
        margin-top: 10px;
    }
</style>

<!-- Dashboard page -->
<div class="content-body ">
    <section class="pb-4">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 ">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Edit League</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('leagues.update', $league->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="League Name" value="{{ old('name', $league->name) }}">
                                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">URL Name</label>
                                            <input type="text" name="slug" class="form-control" placeholder="Name in URL" value="{{ old('slug', $league->slug) }}" 
                                                   oninput="updateSlugPreview(this.value)">
                                            <div id="slugHelp" class="form-text">https://recstep.com/leagues/<span id="slugPreview">{{ old('slug', $league->slug) }}</span></div>
                                            @error('slug') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Sport</label>
                                            <select name="sport" class="default-select form-control wide">
                                                <option value="" disabled>Choose a sport...</option>
                                                <option value="soccer" {{ old('sport', $league->sport) == 'soccer' ? 'selected' : '' }}>Soccer</option>
                                                <option value="basketball" {{ old('sport', $league->sport) == 'basketball' ? 'selected' : '' }}>Basketball</option>
                                                <option value="baseball" {{ old('sport', $league->sport) == 'baseball' ? 'selected' : '' }}>Baseball</option>
                                            </select>
                                            @error('sport') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Type</label>
                                           <select name="type" class="default-select form-control wide">
                                            <option value="" disabled>Choose League Type...</option>
                                            <option value="adult_coed" {{ old('type', $league->type) == 'adult_coed' ? 'selected' : '' }}>Adult - Co-ed</option>
                                            <option value="adult_mens" {{ old('type', $league->type) == 'adult_mens' ? 'selected' : '' }}>Adult - Mens</option>
                                            <option value="adult_womens" {{ old('type', $league->type) == 'adult_womens' ? 'selected' : '' }}>Adult - Womens</option>
                                            <option value="youth_boys" {{ old('type', $league->type) == 'youth_boys' ? 'selected' : '' }}>Youth - Boys</option>
                                            <option value="youth_coed" {{ old('type', $league->type) == 'youth_coed' ? 'selected' : '' }}>Youth - Co-ed</option>
                                            <option value="youth_girls" {{ old('type', $league->type) == 'youth_girls' ? 'selected' : '' }}>Youth - Girls</option>
                                        </select>
                                            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Location (City, State)</label>
                                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $league->location) }}" required>
                                            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Time Zone</label>
                                            <select name="timezone" class="default-select form-control">
                                                <option value="" disabled>Please Select a timezone...</option>
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
                                                    <option value="{{ $offset }}" {{ old('timezone', $league->timezone) == $offset ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('timezone') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">League Logo</label>
                                            <input type="file" name="logo" class="form-control" id="logoInput" onchange="previewLogo()">
                                            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            @if($league->logo)
                                                <div class="logo-preview-container">
                                                    <p>Current Logo:</p>
                                                    <img src="{{ asset($league->logo) }}"  alt="League Logo" class="logo-preview" id="logoPreview" style="width: 100px">
                                                </div>
                                            @else
                                                <p>No logo uploaded</p>
                                            @endif
                                        </div>
                                    </div>                                 
                                    <button type="submit" class="btn btn-primary">Update League</button>
                                    <a href="{{ route('leagues.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
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
    
    function previewLogo() {
        const input = document.getElementById('logoInput');
        const preview = document.getElementById('logoPreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                if (!preview) {
                    // Create preview image if it doesn't exist
                    const previewContainer = document.querySelector('.logo-preview-container') || 
                                           document.querySelector('.mb-3.col-md-6:has(#logoInput)');
                    const newPreview = document.createElement('img');
                    newPreview.id = 'logoPreview';
                    newPreview.className = 'logo-preview';
                    newPreview.src = e.target.result;
                    previewContainer.appendChild(newPreview);
                } else {
                    preview.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(input.files[0]);
        }
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