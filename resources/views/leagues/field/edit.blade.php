@extends('leagues.layouts.master')
@section('content')

<!-- Dashboard page -->
<div class="content-body" style="padding-top: 50px!important">

    <section class="section-one">
        <div class="container">            
            <div class="row">
                <!-- Profile Sidebar -->
                @include('leagues.sidebar')
                
                <!-- Edit Team Form -->
                <div class="col-lg-9 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Edit Team: {{ $team->name }}</h3>
                              
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('league.teams.update', [$team->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Team Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $team->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Manager Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $team->email ?? '') }}">
                                    <div class="form-text">Update to change team manager. Leave blank to remove current manager.</div>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-4">
                                    <label for="home_field_id" class="form-label">Home Field</label>
                                    <select class="form-select @error('home_field_id') is-invalid @enderror" 
                                            id="home_field_id" name="home_field_id">
                                        <option value="">-- Select Home Field --</option>
                                        <option value="No Home Field">No Home Field</option>
                                       
                                    </select>
                                    @error('home_field')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('Status') is-invalid @enderror" 
                                            id="status" name="status">
                                        <option value="">-- Select Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                       
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('league.teams.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update Team
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection