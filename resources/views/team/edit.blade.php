@extends('layouts.master')
@section('content')


 <div class="content-body">
               <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Team</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form enctype="multipart/form-data" action="{{ route('team.update', base64_encode($team->id)) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Include PUT method for updates -->
                                        <input type="hidden" class="form-control form-control-lg" id="club_id" value="{{ $team->club_id }}" name="club_id" required>

                                        <div class="row">
                                            <!-- Team Name Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Team Name <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Team Name" value="{{ old('name', $team->name) }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Age Group Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Age Group <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('age_group') is-invalid @enderror" placeholder="Age Group" id="age_group" name="age_group" value="{{ old('age_group', $team->age_group) }}" required>
                                                @error('age_group')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Season Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Season <span class="text-danger ms-1">*</span></label>
                                                <input type="text" class="form-control @error('season') is-invalid @enderror" id="season" name="season" placeholder="Season" value="{{ old('season', $team->season) }}" required>
                                                @error('season')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Status Field -->
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status</label>
                                                <select id="inputState" name="status" class="default-select form-control wide @error('status') is-invalid @enderror">
                                                    <option value="" disabled>Choose...</option>
                                                    <option value="1" {{ old('status', $team->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $team->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Team Logo</label>
                                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="name" name="logo" placeholder="Team Logo" >
                                                @error('logo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Current Logo</label><br>
                                                @if(!empty($team->logo) && file_exists(public_path($team->logo)))
                                                    <img src="{{ asset($team->logo) }}" alt="Team Logo" class="img-thumbnail" width="50" height="50" style="width: 150px;height:150px;">
                                                @else
                                                    <p>No logo uploaded</p>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Team flag</label>
                                                <input type="file" class="form-control @error('flag') is-invalid @enderror" id="name" name="flag" placeholder="Team flag" >
                                                @error('flag')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Current flag</label><br>
                                                @if(!empty($team->flag) && file_exists(public_path($team->flag)))
                                                    <img src="{{ asset($team->flag) }}" alt="Team flag" class="img-thumbnail" width="50" height="50" style="width: 150px;height:150px;">
                                                @else
                                                    <p>No flag uploaded</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Update</button>
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