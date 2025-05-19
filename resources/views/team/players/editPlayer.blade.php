@extends('layouts.master')

@section('content')
@php
use Illuminate\Support\Str;

@endphp
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                @if($errors)
                    @foreach($errors as $error)
                        <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 end-0 m-3" role="alert" style="z-index: 1051; background: white; padding: 2%; font-size: medium;">
                            {{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Player</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('player.updatePlayer', base64_encode($player->id)) }}" id="playerSave">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="club_id" id="club_id" value="{{ $player->club_id}}">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture" class="form-control" accept="image/*"
                                            onchange="previewImage(event, 'picturePreview')"  />
                                        <img id="picturePreview" src="{{ $player->picture ? asset($player->picture) : '#' }}" 
                                             alt="Picture Preview" style="display: {{ $player->picture ? 'block' : 'none' }}; max-width: 200px; margin-top: 10px;">
                                        <div class="text-danger error-message" id="pictureError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">First Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $player->name) }}" required placeholder="First Name" />
                                        <div class="text-danger error-message" id="nameError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lname" class="form-label">Last Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="last_name" id="lname" class="form-control" value="@if($player->user){{ old('lname', $player->user->last_name) }} @endif" required placeholder="Last Name" />
                                        <div class="text-danger error-message" id="nameError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type <span class="text-danger ms-1">*</span></label>
                                        <select name="type" id="type" class="default-select form-control wide" required>
                                            <option value="permanent" {{ $player->type == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                            <option value="substitute" {{ $player->type == 'substitute' ? 'selected' : '' }}>Substitute</option>
                                        </select>
                                        <div class="text-danger error-message" id="typeError"></div>
                                    </div>
                                    <!-- <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" id="priority" class="default-select form-control wide">
                                            <option value="Na" {{ $player->priority == 'Na' ? 'selected' : '' }}>NA</option>
                                        </select>
                                        <div class="text-danger error-message" id="priorityError"></div>
                                    </div> -->
                                    <div class="mb-3 col-md-6">
                                        <label for="dob" class="form-label">Date of Birth <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="dob" id="dob" class="dateInput form-control" value="{{ old('dob', $player->dob) }}" required placeholder="Date of Birth" />
                                        <div class="text-danger error-message" id="dobError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="proof_id" class="form-label">Proof ID</label>
                                        <input type="file" name="proof_id" id="proof_id" class="form-control" accept="image/*"
                                            onchange="previewImages(event, 'proofPreview')" />
                                       <img id="proofPreview" src="{{ $player->proof_id && !Str::endsWith($player->proof_id, '.pdf') ? asset($player->proof_id) : '#' }}" 
     alt="Proof ID Preview" 
     style="display: {{ $player->proof_id && !Str::endsWith($player->proof_id, '.pdf') ? 'block' : 'none' }}; max-width: 300px; margin-top: 10px;">

<img id="pdfIcon" src="{{asset('assets/images/pdf.png')}}" 
     alt="PDF Icon" 
     style="display: {{ $player->proof_id && Str::endsWith($player->proof_id, '.pdf') ? 'block' : 'none' }}; width: 50px; height: auto; margin-top: 10px;">
                                             <img id="pdfIcon" src="{{asset('assets/images/pdf.png')}}" style="display: none; width: 50px; height: auto;">
                                        <div class="text-danger error-message" id="proofIdError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Phone </label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $player->phone) }}"  placeholder="Phone" />
                                        <div class="text-danger error-message" id="phoneError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $player->email) }}" required placeholder="Email" />
                                        <div class="text-danger error-message" id="emailError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status <span class="text-danger ms-1">*</span></label>
                                        <select name="status" id="status" class="default-select form-control wide" required="">
                                            <option value="1" {{ $player->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $player->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        <div class="text-danger error-message" id="statusError"></div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="mb-3 col-md-6"></div>
                                    <div class="mb-3 col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="">Update Player Administrator</h3>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <a href="javascript:void;" class="btn btn-sm btn-primary" id="administratorBUtton">Add New</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="teams" class="form-label d-block">Select Teams <em class="text-dark ms-1">(Select Teams)</em></label>
                                        <select name="team[]" id="teams" class="wide w-75 rounded-0 border h-50" multiple>
                                            @foreach($teams as $team)
                                                <option value="{{ $team['id'] }}" {{ in_array($team['id'], $playerMetaTeam->toArray()) ? 'selected' : '' }}>{{$team['name']}} 
                                                <!-- ({{$team['age_group']}}) -->
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="text-danger error-message" id="teamError"></div>
                                    </div>
                                    <div class="mb-3 col-md-6 " >
                                        <div class="bg-light bg-opacity-25 rounded py-5 px-4" id="administratorForm" style="display: none;">
                                            <p class="alert alert-success" style="display: none;" id="success"></p>
                                            <input type="hidden" name="player_id" value="{{$player->id}}" id="player_id">
                                            <div class="mb-3 row">
                                                <label for="admin_name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_name" id="admin_name" class="form-control" value="" placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="admin_email" class="form-label col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="admin_email" id="admin_email" class="form-control" value="" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="admin_phone" class="form-label col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_phone" id="admin_phone" class="form-control" value="" placeholder="Phone" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="admin_password" class="form-label col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="admin_password" id="admin_password" class="form-control" value="" placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-sm btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2" id="saveAdminBtn">Save</button>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3">
                                            <table class="table table-responsive-md">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>phone</th>
                                                        <th>Password</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($playerMetaAdministrators as $playerMetaAdministrator)
                                                        @if($playerMetaAdministrator->user)
                                                        <tr>
                                                            <td>{{$playerMetaAdministrator->user['name']}}</td>
                                                            <td>{{$playerMetaAdministrator->user['email']}}</td>
                                                            <td>{{$playerMetaAdministrator->user['phone']}}</td>
                                                            <td>************</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Update</button>
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
     function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('picturePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImages(event, previewId) {
        var output = document.getElementById(previewId);
        var pdfIcon = document.getElementById('pdfIcon');

        if (!output) {
            console.error('Element with ID ' + previewId + ' not found.');
            return;
        }

        // Check if a file is selected
        if (!event.target.files || !event.target.files[0]) {
            console.error('No file selected.');
            return;
        }

        var file = event.target.files[0];
        var reader = new FileReader();

        // Reset display
        output.style.display = 'none';
        pdfIcon.style.display = 'none';

        // Check the file type
        if (file.type === 'application/pdf') {
            // Display the PDF icon
            pdfIcon.style.display = 'block';
        } else if (file.type.startsWith('image/')) {
            // Load the image
            reader.onload = function() {
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            console.error('Unsupported file type: ' + file.type);
        }
    }

</script>
<script>
    $(document).ready(function() {
        $('#saveAdminBtn').click(function() {
            // Collect form data
            let adminName = $('#admin_name').val();
            let adminEmail = $('#admin_email').val();
            let adminPhone = $('#admin_phone').val();
            let playerId = $('#player_id').val();
            let adminPassword = $('#admin_password').val();
            let club_id = $('#club_id').val();

            // Clear any previous error messages
            $('.error-message').remove();

            // Perform client-side validation (optional)
            let isValid = true;
            if (!adminName) {
                isValid = false;
                $('#admin_name').after('<div class="text-danger error-message">Name is required.</div>');
            }
            if (!adminEmail) {
                isValid = false;
                $('#admin_email').after('<div class="text-danger error-message">Email is required.</div>');
            }
            if (!adminPhone) {
                isValid = false;
                $('#admin_phone').after('<div class="text-danger error-message">Phone is required.</div>');
            }
            if (!playerId) {
                isValid = false;
                $('#playerId').after('<div class="text-danger error-message">Player Id is required.</div>');
            }
            if (!adminPassword) {
                isValid = false;
                $('#admin_password').after('<div class="text-danger error-message">Password is required.</div>');
            }

            if (!isValid) {
                return;
            }

            // Send AJAX POST request
            $.ajax({
                url: '/add-admin', // Replace with your route to add entry in user table
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    name: adminName,
                    email: adminEmail,
                    phone: adminPhone,
                    playerId: playerId,
                    club_id: club_id,
                    password: adminPassword,
                    role: 'club_administrator'
                },
                success: function(response) {
                    if (response.success) {
                        $('#success').show();
                        $('#success').text('Administrator added successfully');
                        // Optionally, reset the form
                        $('#admin_name').val('');
                        $('#admin_email').val('');
                        $('#admin_phone').val('');
                        $('#admin_password').val('');
                         setTimeout(function() {
                            
                            // location.reload();
                        }, 800);
                        $('#success').text('Administrator added successfully');
                    } else {
                        alert('Error adding admin: ' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('An error occurred while adding the admin.');
                }
            });
        });
    });
</script>
<script>
    $(document).on('click','#administratorBUtton',function(){
        $('#administratorForm').toggle();
    });
</script>
@endsection
