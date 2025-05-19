@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Sport </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   <form action="{{ route('sports.store') }}" method="POST">
                                        @csrf

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