@extends('layouts.master')
@section('content')


 <div class="content-body">
             <div class="container-fluid">


                <div class="row">           

                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Sport</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                            <form action="{{ route('sports.update', $sport->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                

                                <div class="row">
                                    <!-- Name Field -->   
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name<span class="text-danger ms-1">*</span> </label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="First Name" value="{{ old('name', $sport->name) }}" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="1" {{ old('status', $sport->status) == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $sport->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Type Field -->
                                    
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
