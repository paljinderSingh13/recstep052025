@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">


            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Club Administrator</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('club.admstore') }}">
                                    @csrf
                                    <div class="row">

                                        

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="First Name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Last Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                            @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                                <label class="form-label">Role</label>
                                                <select id="inputState" name="role" class="default-select form-control wide @error('role') is-invalid @enderror">
                                                    <option value="President">President</option>
                                                    <option value="Senior Manager">Senior Manager</option>
                                                    <option value="Assistant Manager" >Assistant Manager</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('role')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>

                                       
                                    
                                        <div class="mb-3  col-md-6">
                                            <label for="image" class="form-label">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                name="image" id="image" >
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <img id="preview-image" src="#" alt="Image Preview"
                                                style="display: none; max-width: 150px; margin-top: 10px;">
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="Email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password <span class="text-danger ms-1">*</span></label>
                                            <input class="form-control " type="password" name="password" id="Password" placeholder="Password" min="8" max="20" value="{{ old('password') }}" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
        title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." required>
                                            @error('password')
                                                <small class="text-danger error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Status</label>
                                            <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('status')
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