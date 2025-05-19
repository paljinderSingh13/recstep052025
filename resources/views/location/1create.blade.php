@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Administrator Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="{{ route('administrator.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="team_id" value="{{ $id }}" required>

                                        <div class="row">
                                            <!-- Name Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name <span class="text-danger ms-1">*</span></label>
                                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Type Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Type</label>
                                                <select id="inputState" name="type" class="default-select form-control wide @error('type') is-invalid @enderror">
                                                    <option value="Head Coach" {{ old('type') == 'Head Coach' ? 'selected' : '' }}>Head Coach</option>
                                                    <option value="Assistant Coach" {{ old('type') == 'Assistant Coach' ? 'selected' : '' }}>Assistant Coach</option>
                                                    <option value="Team Manager" {{ old('type') == 'Team Manager' ? 'selected' : '' }}>Team Manager</option>
                                                </select>
                                                @error('type')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Phone Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Email Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Status Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                                    <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Choose...</option>
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
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                                @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a href="{{ route('team.info', base64_encode($id)) }}" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    
    
@endsection