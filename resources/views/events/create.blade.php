<!-- resources/views/event/create.blade.php -->

@extends('layouts.master') <!-- Assuming you have a layout file -->

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Event</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('event.store') }}">
                                @csrf
                                <div class="row">
                                    <!-- Event Name -->
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Event Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control @error('event_name') is-invalid @enderror"
                                            name="event_name" placeholder="Event Name" value="{{ old('event_name') }}" required>
                                        @error('event_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Event Description -->
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Event Description <span class="text-danger ms-1">*</span></label>
                                        <textarea class="form-control @error('event_description') is-invalid @enderror"
                                            name="event_description" placeholder="Event Description" rows="5" required>{{ old('event_description') }}</textarea>
                                        @error('event_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Status (Public or Private) -->
                                    <div class="mb-3 col-md-6 d-flex align-items-center">
                                        <label class="form-label me-2">Status <span class="text-danger ms-1">*</span></label>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="status_public" name="status" value="public" 
                                                    class="form-check-input @error('status') is-invalid @enderror" 
                                                    {{ old('status') == 'public' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="status_public">Public</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="status_private" name="status" value="private" 
                                                    class="form-check-input @error('status') is-invalid @enderror"
                                                    {{ old('status') == 'private' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="status_private">Private</label>
                                            </div>
                                        </div>
                                        @error('status')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <!-- Location -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Location <span class="text-danger ms-1">*</span></label>
                                        <select class=" form-control wide  @error('team') is-invalid @enderror"  name="location">
                                            <option value="">Select location </option>
                                           @foreach($locations as $location )
                                           <option value="{{$location->id}}">{{$location->name}} ({{$location->address}})</option>
                                           @endforeach
                                        </select>
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Event Type (Soccer) -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Event Type <span class="text-danger ms-1">*</span></label>
                                        <label for="Type" class="form-label">Type <span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide  @error('type') is-invalid @enderror" id="Type" name="type" required>
                                            <option value="">Select Type</option>
                                            <option value="Tournaments" {{ old('type') == 'Tournaments' ? 'selected' : '' }}>Tournaments</option>
                                            <option value="Game" {{ old('type') == 'Game' ? 'selected' : '' }}>Game</option>
                                            <option value="Practice" {{ old('type') == 'Practice' ? 'selected' : '' }}>Practice</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address <span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Address">
                                        @error('city')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Date <span class="text-danger ms-1">*</span></label>
                                        <input class="dateInput form-control @error('date') is-invalid @enderror" type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date" value="{{ old('date') }}" onblur="validateDate(this)">
                                        @error('date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Time <span class="text-danger ms-1">*</span></label>
                                        <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="Time" value="{{ old('time') }}" required>
                                        @error('time')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Cost -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Cost <span class="text-danger ms-1">*</span></label>
                                        <input type="number" class="form-control @error('cost') is-invalid @enderror"
                                            name="cost" placeholder="Cost" value="{{ old('cost') }}" required>
                                        @error('cost')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Number of Players -->
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Number of Players <span class="text-danger ms-1">*</span></label>
                                        <select name="players[]" class="form-control @error('players') is-invalid @enderror h-50" multiple required>
                                            @foreach ($players as $player)
                                                <option value="{{ $player->id }}" {{ (collect(old('players'))->contains($player->id)) ? 'selected' : '' }}>
                                                    {{ $player->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('players')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit and Cancel Buttons -->
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
 <script src="{{asset('assets/js/own.js')}}"></script>
<script>
    function validateDate(input) {
        let datePattern = /^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/\d{4}$/;
        let dateValue = input.value.trim();

        if (dateValue && !datePattern.test(dateValue)) {
            alert("Please enter the date in MM/DD/YYYY format.");
            input.value = "";  // Clear incorrect value
        }
    }
</script>
<script>
function initAutocomplete() {
    // Get the input elements for location and city
    const locationInput = document.getElementById('city');
    // const cityInput = document.getElementById('city');

    // Check if both elements are present and are HTMLInputElements
    if (locationInput instanceof HTMLInputElement) {
        const locationAutocomplete = new google.maps.places.Autocomplete(locationInput);
        locationAutocomplete.addListener('place_changed', function() {
            const place = locationAutocomplete.getPlace();
            console.log("Selected City:", place.formatted_address);
        });
    } else {
        console.error('City input element not found or not an HTMLInputElement.');
    }

    // if (cityInput instanceof HTMLInputElement) {
    //     const cityAutocomplete = new google.maps.places.Autocomplete(cityInput);
    //     cityAutocomplete.addListener('place_changed', function() {
    //         const place = cityAutocomplete.getPlace();
    //         console.log("Selected City:", place.formatted_address);
    //     });
    // } else {
    //     console.error('City input element not found or not an HTMLInputElement.');
    // }
}
</script>
@endsection