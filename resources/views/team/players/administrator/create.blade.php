@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">


            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Player Administrator</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" enctype="multipart/form-data" action="{{route('player.administrator.store')}}">
                                    @csrf
                                    <div class="row">


                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">First Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Name" value="" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="name" class="form-label">Last Name <span class="text-danger ms-1">*</span></label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" value="" required="" placeholder="Last Name" />
                                            <div class="text-danger error-message" id="last_nameError"></div>    
                                             <div class="text-danger error-message">
                                            @error('last_name') {{ $message }} @enderror
                                            </div>
                                        </div>
                                         <div class="mb-3 col-md-6">
                                                <label class="form-label">Players</label>
                                                <select id="inputState" name="player_id" class="default-select form-control wide @error('type') is-invalid @enderror">
                                                    @foreach($players as $player)
                                                    <option value="{{$player->id}}" {{ old('player_id') == $player->id ? 'selected' : '' }}>{{$player->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                @error('type')
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
                                            <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                         <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Status<span class="text-danger ms-1">*</span></label>
                                            <select name="status" id="status" class="default-select form-control wide" required="">
                                                <option value="1">Active </option>
                                                <option value="0">Inactive </option>
                                            </select>
                                            <div class="text-danger error-message" id="statusError"></div>
                                            <div class="text-danger error-message">
                                                @error('status') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                                <label for="name" class="form-label">Password </label>
                                                    <input type="password" name="password" id="admin_password" class="form-control" value="" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." />
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