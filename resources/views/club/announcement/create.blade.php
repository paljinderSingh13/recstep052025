@extends('layouts.master')
@section('content')
    <div class="content-body">
        <div class="container-fluid">


            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Club Announcement</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" enctype="multipart/form-data" action="{{ route('club.announcement.store') }}">
                                    @csrf
                                    <div class="row">

                                        

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Announcement <span class="text-danger ms-1">*</span></label>
                                            <textarea class="form-control @error('announcement') is-invalid @enderror"
                                                name="announcement" placeholder="Announcement" value="{{ old('announcement') }}" required></textarea>
                                            @error('announcement')
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