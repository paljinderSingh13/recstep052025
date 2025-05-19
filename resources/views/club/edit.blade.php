@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">


            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create a Club</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('club.update', base64_encode($club->id)) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Jhon" value="{{ old('name', $club->name) }}"
                                                required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Address <span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                placeholder="Address" value="{{ old('address', $club->address) }}" required>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label>City <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                name="city" placeholder="City" value="{{ old('city', $club->city) }}"
                                                id="City" required>
                                            @error('city')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Country </label>
                                            <input type="text"
                                                class="form-control @error('country') is-invalid @enderror" name="country"
                                                value="{{ old('country', $club->country) }}" id="Country">
                                            @error('country')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">State </label>
                                            <input type="text" class="form-control @error('state') is-invalid @enderror"
                                                name="state" value="{{ old('state', $club->state) }}" id="State">
                                            @error('state')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Postal Code <span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                name="postal_code" placeholder="Postal Code"
                                                value="{{ old('postal_code', $club->postal_code) }}" id="PostalCode"
                                                required>
                                            @error('postal_code')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Contact Name <span
                                                    class="text-danger ms-1">*</span></label>
                                            <input type="text"
                                                class="form-control @error('contact_name') is-invalid @enderror"
                                                name="contact_name" placeholder="Contact Name"
                                                value="{{ old('contact_name', $club->contact_name) }}" required>
                                            @error('contact_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" placeholder="Phone" value="{{ old('phone', $club->phone) }}"
                                                required>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="Email" value="{{ old('email', $club->email) }}"
                                                required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo <span
                                                class="text-danger ms-1">*</span></label>
                                        <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                            name="logo" id="logo">
                                        <img src="{{ asset($club->logo) }}" id="preview-image" alt="Current Logo"
                                            style="max-width: 300px; margin-top: 10px;">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('club.list') }}" class="btn btn-danger">Cancel</a>
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
                // Event listener for file input change
                $('#logo').change(function(event) {
                    // Get the selected file
                    var input = event.target;
                    // Check if a file is selected and it's an image
                    if (input.files && input.files[0]) {
                        // Create a FileReader to read the selected file
                        var reader = new FileReader();
                        // Event listener for when the file is read
                        reader.onload = function(e) {
                            // Set the src attribute of the img element to display the image
                            $('#preview-image').attr('src', e.target.result).show();
                        };
                        // Read the selected file as a Data URL
                        reader.readAsDataURL(input.files[0]);
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Autocomplete setup
                $('#City').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "{{ route('club.get.city.suggestions') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                query: request.term
                            },
                            success: function(data) {
                                response(data);
                            }
                        });
                    },
                    minLength: 2, // Minimum characters to trigger suggestions
                    select: function(event, ui) {
                        $('#City').val(ui.item.value);
                        // Trigger AJAX to get state and country after selecting a city
                        getLocation(ui.item.value);
                        return false;
                    }
                });

                // Function to get state and country based on city
                function getLocation(city) {
                    $.ajax({
                        url: "{{ route('club.get.location') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            city: city
                        },
                        success: function(response) {
                            $('#State').val(response.state);
                            $('#Country').val(response.country);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        </script>
    @endsection