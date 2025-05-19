@extends('layouts.master')
@section('content')

<!-- Dashboard page -->
<div class="content-body" style="padding-top: 50px!important">

    <section class="section-one">
        <div class="container">            
            <div class="row">
                <!-- Profile Sidebar -->
                @include('leagues.sidebar')
                
                <!-- Create Team Form -->
                <div class="col-lg-9 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class="card">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Create New Team</h3>
                             
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

                            <form action="{{ route('league.teams.store') }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Team Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Manager Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}">
                                    <div class="form-text">Optional. Will send invitation to manage this team.</div>
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
                                    @error('home_field_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('league.teams.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Create Team
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