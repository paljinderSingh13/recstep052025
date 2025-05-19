@extends('layouts.master') @section('content')
<div class="content-body">
    <div class="container-fluid">
          
        <div class="row">
            <div class="col-xl-12 col-lg-12">
<!-- @if ($errors->any())
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Player</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('player.save') }}" id="playerSave">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture" class="form-control" />
                                        <div class="text-danger error-message" id="pictureError"></div>
                                        <div class="text-danger error-message">
                                        @error('picture') {{ $message }} @enderror
                                    </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">First Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="First Name" />
                                        <div class="text-danger error-message" id="nameError"></div>    
                                         <div class="text-danger error-message">
                                        @error('name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lname" class="form-label">Last Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="last_name" id="lname" class="form-control" value="" required="" placeholder="Last Name" />
                                        <div class="text-danger error-message" id="nameError"></div>    
                                         <div class="text-danger error-message">
                                        @error('last_name') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type <span class="text-danger ms-1">*</span></label>
                                        <select name="type" id="type" class="default-select form-control wide" required="">
                                            <option value="permanent">Permanent </option>
                                            <option value="substitute">Substitute </option>
                                        </select>
                                        <div class="text-danger error-message" id="typeError"></div>
                                        <div class="text-danger error-message">
                                            @error('type') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="dob" class="form-label">Date of Birth <span class="text-danger ms-1">*</span></label>
                                       
                                        <input type="text" placeholder="mm/dd/yyyy" name="dob" id="dateInput" class="form-control" value="" required="" placeholder="Date of Birth" />
                                        <div class="text-danger error-message" id="dobError"></div>
                                        <div class="text-danger error-message">
                                            @error('dob') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="proof_id" class="form-label">Proof ID </label>
                                        <input type="file" name="proof_id" id="proof_id" class="form-control" />
                                        <div class="text-danger error-message" id="proofIdError"></div>
                                        <div class="text-danger error-message">
                @error('proof_id') {{ $message }} @enderror
            </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value=""  placeholder="Phone" />
                                        <div class="text-danger error-message" id="phoneError"></div>
                                        <div class="text-danger error-message">
                @error('phone') {{ $message }} @enderror
            </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="" required="" placeholder="Email" />
                                        <div class="text-danger error-message" id="emailError"></div>
                                        <div class="text-danger error-message">
                @error('email') {{ $message }} @enderror
            </div>
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
                                        <label for="password" class="form-label">Password <span class="text-danger ms-1">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" value="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." required="" />
                                        <div class="text-danger error-message" id="passwordError"></div>
                                        <div class="text-danger error-message">
                @error('password') {{ $message }} @enderror
            </div>
                                    </div>
                                </div>

                                <div class="row">                                

                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label d-block">Select Teams <em class="text-dark ms-1">(Select Teams)</em></label>
                                        <select name="team[]" id="teams" class=" wide w-75 rounded-0 border h-50" multiple>
                                            @foreach($teams as $team)
                                            <option value="{{$team['id']}}">{{$team['name']}} 
                                                <!-- ({{$team['age_group']}}) -->
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger error-message" id="teamError"></div>
                                        <div class="text-danger error-message">
                @error('team') {{ $message }} @enderror
            </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                         <h4 class="">Create Player Administrator</h4>
                                        <div class="bg-light bg-opacity-25 rounded py-5 px-4">
                                            <div class="mb-3 row">
                                                <label for="name" class="col-sm-2 col-form-label">Name </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_name" id="admin_name" class="form-control" value="" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="name" class="form-label col-sm-2 col-form-label">Email </label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="admin_email" id="admin_email" class="form-control" value="" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="name" class="form-label col-sm-2 col-form-label">Phone </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_phone" id="admin_phone" class="form-control" value="" placeholder="Phone" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="name" class="form-label col-sm-2 col-form-label">Password </label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="admin_password" id="admin_password" class="form-control" value="" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." />
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                                        <a href="{{ url()->previous() }}" type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
                                    </div>
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

    <script src="{{asset('assets/js/own.js')}}"></script>

    <script>

document.getElementById('dateInput123').addEventListener('input', function(event) {
    const input = event.target;
    let value = input.value;

    // Remove any non-numeric characters
    value = value.replace(/\D/g, '');

    // Apply formatting (MM/DD/YYYY)
    if (value.length >= 3 && value.length <= 4) {
        value = value.replace(/^(\d{2})(\d{1,2})/, '$1/$2');
    } else if (value.length > 4) {
        value = value.replace(/^(\d{2})(\d{2})(\d{1,4})/, '$1/$2/$3');
    }

    // Set the formatted value back to the input
    input.value = value.slice(0, 10);;
});


        
        function moveDown(){
            $('html, body').animate({
                scrollTop: $(window).scrollTop() + 930
            }, 800); // 800 ms duration for smooth scrolling
        }
        function playerSave(){
            let isValid = true;

                // Clear previous error messages
                $('.error-message').text('');

                // Check required fields
                if (!$('#name').val()) {
                    $('#nameError').text('Name is required.');
                    isValid = false;
                }
                if (!$('#type').val()) {
                    $('#typeError').text('Type is required.');
                    isValid = false;
                }
                if (!$('#dob').val()) {
                    $('#dobError').text('Date of Birth is required.');
                    isValid = false;
                }
                if (!$('#phone').val()) {
                    $('#phoneError').text('Phone number is required.');
                    isValid = false;
                }
                if (!$('#email').val()) {
                    $('#emailError').text('Email is required.');
                    isValid = false;
                }
                if (!$('#status').val()) {
                    $('#statusError').text('Status is required.');
                    isValid = false;
                }
                if (!$('#password').val()) {
                    $('#passwordError').text('Password is required.');
                    isValid = false;
                }

                // If all validations pass, submit the form
                if (isValid) {
                    $('#playerSave').submit();
                }
        }
    </script>

    @endsection
</div>
