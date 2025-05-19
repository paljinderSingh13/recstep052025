@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Team Administrator </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="{{ route('administrator.save') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <!-- Name Field -->
                                           
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">First Name <span class="text-danger ms-1">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Last Name <span class="text-danger ms-1">*</span></label>
                                                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Type Field -->
                                            
                                        </div>

                                        <div class="row">
                                            <!-- Phone Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Type</label>
                                                <select id="inputState" name="type" class="default-select form-control wide @error('type') is-invalid @enderror">
                                                    <option value="Head Coach" {{ old('type') == 'Head Coach' ? 'selected' : '' }}>Head Coach</option>
                                                    <option value="Assistant Coach" {{ old('type') == 'Assistant Coach' ? 'selected' : '' }}>Assistant Coach</option>
                                                    <option value="Team Manager" {{ old('type') == 'Team Manager' ? 'selected' : '' }}>Team Manager</option>
                                                    <option value="Staff Member" {{ old('type') == 'Staff Member' ? 'selected' : '' }}>Staff Member</option>
                                                </select>
                                                @error('type')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6 " >
                                                <label for="status" class="form-label d-block">Select Teams <em class="text-dark ms-1">(Select Teams)</em></label>
                                                <select class=" wide w-75 rounded-0 border h-50" id="team_id" name="team[]" required multiple>
                                                    <option value="">Select Team</option>
                                                    @foreach($teams as $team)
                                                    <option value="{{$team->id}}" {{ old('team') == $team->id ? 'selected' : '' }}>
                                                        {{$team->name}} ({{$team['age_group']}})</option>
                                                    @endforeach
                                                </select>
                                                @error('team')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Email Field -->
                                            
                                        </div>

                                        <div class="row">
                                            <!-- Status Field -->
                                            
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                                    
                                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Password Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password <span class="text-danger ms-1">*</span></label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
            title="Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long." required>
                                                @error('password')
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