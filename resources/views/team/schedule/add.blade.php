@extends('layouts.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style >
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
               <form  action="{{ route('schedule.ScheduleStore') }}" method="POST">
                    @csrf
                    <div class="row"> 
                        <div class="mb-3 col-md-6">
                            <label for="Team" class="form-label">Team <span class="text-danger">*</span></label>
                            <select class="default-select form-control wide searchable-select @error('team') is-invalid @enderror" 
                                    id="team_id" 
                                    name="team_id" 
                                    required>
                                <option value="">Select Team</option>
                                @foreach($teams as $team)
                                <option value="{{$team->id}}" {{ old('team') == $team->id ? 'selected' : '' }}>
                                    {{$team->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('team')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
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
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="default-select form-control wide  @error('status') is-invalid @enderror" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <!-- Tournaments Fields -->
                        <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: none;">
                            <label for="Team" class="form-label">Opposing Team <span class="text-danger">*</span></label>
                            <select class=" form-control wide  @error('team') is-invalid @enderror" id="Team" name="opposing_team_id" style="width:100%">
                                <option value="">Select Opposing Team</option>
                               
                            </select>
                            @error('opposing_team_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6 tournament-fields game-fields practice-fields" style="display: none;">
                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
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
                        <div class="mb-3 col-md-6 tournament-fields game-fields practice-fields" style="display: none;">
                            <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="City">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: none;">
                            <label for="Date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input class="form-control @error('date') is-invalid @enderror" type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date" value="{{ old('date') }}" onblur="validateDate(this)">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 tournament-fields game-fields" style="display: none;">
                            <label for="Time" class="form-label">Time <span class="text-danger">*</span></label>
                            <input class="form-control @error('time') is-invalid @enderror" type="time" id="Time" name="time" value="{{ old('time') }}">
                            @error('time')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <!-- Practice Fields -->
                        <!-- <div class="mb-3 col-md-6 practice-fields game-fields" style="display: none;">
                            <label for="purposeD" class="form-label">Purpose Detail <span class="text-danger">*</span></label>
                            <input class="form-control @error('purpose_detail') is-invalid @enderror" type="text" id="purposeD" name="purpose_detail" value="{{ old('purpose_detail') }}">
                            @error('purpose_detail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> -->
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="DateFrom" class="form-label">Date From <span class="text-danger">*</span></label>
                            <input class=" dateInput form-control @error('date_from') is-invalid @enderror" type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date_from" value="{{ old('date_from') }}" onblur="validateDate(this)">
                            @error('date_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="Dateto" class="form-label">Date To <span class="text-danger">*</span></label>
                            <input class="dateInput form-control @error('date_to') is-invalid @enderror" type="text" id="dateInput" placeholder="mm/dd/yyyy" name="date_to" value="{{ old('date_to') }}" onblur="validateDate(this)">
                            @error('date_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="TimeFrom" class="form-label">Time From <span class="text-danger">*</span></label>
                            <input class="form-control @error('time_from') is-invalid @enderror" type="time" id="TimeFrom" name="time_from" value="{{ old('time_from') }}">
                            @error('time_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 practice-fields" style="display: none;">
                            <label for="Timeto" class="form-label">Time To <span class="text-danger">*</span></label>
                            <input class="form-control @error('time_to') is-invalid @enderror" type="time" id="Timeto" name="time_to" value="{{ old('time_to') }}">
                            @error('time_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                    </div>
                        <div class="mt-3">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger ">Cancel</a>
                        </div>
                </form>
<!--end form-->            
            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection
@section('js')
 <script src="{{asset('assets/js/own.js')}}"></script>
<script>
        $(document).on('change','#Type',function(){
           var selectedType = $('#Type').val();
            $('.tournament-fields').css('display','none');
            $('.practice-fields').css('display','none');
            $('.game-fields').css('display','none');

            if (selectedType === 'Tournaments') {
                $('.tournament-fields').css('display','block');
            } else if (selectedType === 'Practice') {
                $('.practice-fields').css('display','block');
            } else if (selectedType === 'Game') {
                $('.game-fields').css('display','block');
            }
        });
</script>

<script>
    if($errors->any()){

        var validationErrors = json($errors->toArray());
    }else{


        var validationErrors = {};
    }
</script>
<script>
$(document).ready(function () {

           var selectedType = $('#Type').val();
            if (selectedType === 'Tournaments') {
                $('.tournament-fields').css('display','block');
            } else if (selectedType === 'Practice') {
                $('.practice-fields').css('display','block');
            } else if (selectedType === 'Game') {
                $('.game-fields').css('display','block');
            }
    if (Object.keys(validationErrors).length > 0) {
        $.each(validationErrors, function (field, messages) {
            var errorMessage = messages[0]; // Get the first error message for the field
            var fieldSelector = '[name="' + field + '"]';
            
            // Add 'is-invalid' class to input
            $(fieldSelector).addClass('is-invalid');
            
            // Insert the error message in a small element below the input field
            $(fieldSelector).parent().append('<small class="text-danger">' + errorMessage + '</small>');
        });
    }
});

</script>
    <script src="{{asset('assets/js/own.js')}}"></script>

<script>
$(document).ready(function () {
    // Initialize Select2 for the opposing team dropdown
    $('#Team').select2({
        placeholder: 'Select or Search Opposing Team',
        minimumInputLength: 1, // Minimum characters to trigger the search
        ajax: {
            url: '/get-opposing-teams', // Adjust to the endpoint for fetching teams
            dataType: 'json',
            delay: 250, // Delay to reduce server requests
            data: function (params) {
                return {
                    search: params.term, // Search term entered by the user
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name,
                        };
                    }),
                };
            },
            cache: true,
        },
    });

    // If team selection depends on another dropdown (e.g., team_id)
    $('#team_id').change(function () {
        // Reset the Select2 opposing team dropdown
        $('#Team').val(null).trigger('change');

        // Fetch the team_id and append it as a query parameter
        var selectedTeamId = $(this).val();
        var url = `/get-opposing-teams?team_id=${selectedTeamId}`;
        $('#Team').select2({
            ajax: {
                url: url,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.id,
                                text: item.name,
                            };
                        }),
                    };
                },
                cache: true,
            },
        });
    });
});
</script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM4QuEWeOy5nLZAbTHsR_Ssm7KUMQDP9U&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
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
<script>
    function validateDate(inputElement) {
    const today = new Date();
    today.setHours(0, 0, 0, 0); // Remove time for accurate date comparison
    const inputDate = new Date(inputElement.value);

    // Check if the entered date is valid and in the future
    if (inputDate < today) {
        alert('You cannot select a past date.');
        inputElement.value = ''; // Clear invalid date
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
    $(document).ready(function () {
    $('#team_id').select2({
        placeholder: "Select a Team", // Placeholder text
        allowClear: true,            // Allows clearing the selection
        width: '100%'                // Makes the dropdown full width
    });
});
</script>
@endsection