@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Administrator </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                            <form action="{{ route('administrator.update', $administrator->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                

                                <div class="row">
                                    <!-- Name Field -->
                                        
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">First Name<span class="text-danger ms-1">*</span> </label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="First Name" value="{{ old('name', $administrator->user->name) }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Last Name<span class="text-danger ms-1">*</span> </label>
                                        <input type="text" id="lastname" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" value="{{ old('last_name', $administrator->user->last_name) }}" required>
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
                                            <option value="Head Coach" {{ old('type', $administrator->type) == 'Head Coach' ? 'selected' : '' }}>Head Coach</option>
                                            <option value="Assistant Coach" {{ old('type', $administrator->type) == 'Assistant Coach' ? 'selected' : '' }}>Assistant Coach</option>
                                            <option value="Team Manager" {{ old('type', $administrator->type) == 'Team Manager' ? 'selected' : '' }}>Team Manager</option>
                                            <option value="Staff Member" {{ old('type', $administrator->type) == 'Staff Member' ? 'selected' : '' }}>Staff Member</option>
                                        </select>
                                        @error('type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone', $administrator->phone) }}" required>
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email<span class="text-danger ms-1">*</span> </label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email', $administrator->email) }}" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="teams" class="form-label d-block">Select Teams <em class="text-dark ms-1">(Select Teams)</em></label>
                                        <select name="team[]" id="teams" class="wide w-75 rounded-0 border h-50" multiple>
                                            @foreach($teams as $team)
                                                <option value="{{ $team['id'] }}" {{ in_array($team['id'], $teamsTeamAdministrators->toArray()) ? 'selected' : '' }}>{{$team['name']}}
                                                 <!-- ({{$team['age_group']}}) -->
                                             </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Email Field -->
                                   
                                </div>

                                <div class="row">
                                    <!-- Status Field -->
                                     
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                            <option value="1" {{ old('status', $administrator->status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $administrator->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
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
