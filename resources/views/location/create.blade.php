@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Location </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="{{ route('sports_locations.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <!-- Name Field -->
                                           
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Google Map Link</label>
                                                <input type="url" name="google_map_link" class="form-control" value="{{ old('google_map_link') }}" required>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                        <label class="form-label">Select Available Sports</label>
                                                        <div class="form-check">
                                                <div class="row">
                                                            @foreach ($sports as $sport)
                                                             <div class="col-md-6">
                                                                <div class="form-check mb-2">
                                                                    <input type="checkbox" name="sport_id[]" value="{{ $sport->id }}" id="sport_{{ $sport->id }}" 
                                                                        class="form-check-input" 
                                                                        {{ is_array(old('sport_id')) && in_array($sport->id, old('sport_id')) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="sport_{{ $sport->id }}">
                                                                        {{ $sport->name }}
                                                                    </label>
                                                                </div>
                                                             </div>
                                                            @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Type Field -->
                                            
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

    
    
@endsection
@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
<script>
function initAutocomplete() {
    // Get the input elements for location and city
    const locationInput = document.getElementById('address');

    // Check if both elements are present and are HTMLInputElements
    if (locationInput instanceof HTMLInputElement) {
        const locationAutocomplete = new google.maps.places.Autocomplete(locationInput);
        locationAutocomplete.addListener('place_changed', function() {
            const place = locationAutocomplete.getPlace();
            console.log("Selected address:", place.formatted_address);
        });
    } else {
        console.error('Location input element not found or not an HTMLInputElement.');
    }

    
}
</script>

@endsection