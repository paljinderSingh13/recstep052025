@extends('layouts.master')
@section('content')
    <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                   <!--  <div class="page-titles">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profile</a></li>
                        </ol>
                    </div> -->
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-3 col-lg-4">
                            <div class="clearfix">
                                <div class="card  profile-card author-profile m-b30">
                                    <div class="card-body">
                                        <div class="p-5">
                                                <div class="author-profile">
                                                    <div class="author-media">
                                                        <form action="{{ route('user.update.Profile.img') }}" method="POST" enctype="multipart/form-data" id="profile-picture-form">
                                                            @csrf
                                                            @method('PUT')
                                                                @if($user)
                                                                    @if($user->profile_picture)

                                                                            <img src="{{ $user->profile_picture ? asset($user->profile_picture) : 'http://recstep.com/pictures/1729763582_admin2.jpg' }}" alt="Profile Picture">
                                                                        @else

                                                                            <img src="http://recstep.com/pictures/1729763582_admin2.jpg" alt="Profile Picture">
                                                                    @endif
                                                                @else

                                                                        <img src="http://recstep.com/pictures/1729763582_admin2.jpg" alt="Profile Picture">
                                                                @endif

                                                                    <div class="upload-link" title="Update Profile Picture" data-toggle="tooltip" data-placement="right">
                                                                        <label>
                                                                         @if(auth()->user()->name == $user->name)   
                                                                        <input type="file" class="  update-file" name="profile_picture" style="display: none;" onchange="document.getElementById('profile-picture-form').submit()">
                                                                        @endif
                                                                        <i class="fa fa-camera"></i>
                                                                        </label>
                                                                    </div>
                                                        </form>
                                                    </div>
                                                   <div class="author-info">
                                                        <h6 class="title">{{auth()->user()->name}} {{auth()->user()->last_name}}</h6>
                                                        <span>@php

                                                        $role = auth()->user()->role;
                                                        $formattedRole = ucwords(str_replace('_', ' ', $role));
                                                        @endphp
                                                        {{$formattedRole }}</span>
                                                    </div>
                                                </div>
                                    </div>
<!--                                     <div class="info-list">
                                        <ul>
                                            <li><a href="app-profile.html">Models</a><span>36</span></li>
                                            <li><a href="uc-lightgallery.html">Gallery</a><span>3</span></li>
                                            <li><a href="app-profile.html">Lessons</a><span>1</span></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="card-footer">
                                    <!-- <div class="input-group mb-3">
                                        <div class="form-control rounded text-center">Portfolio</div>
                                    </div>
                                    <div class="input-group">
                                        <a href="https://www.dexignlab.com/" target="_blank"
                                        class="form-control text-hover rounded ">www.dexignlab.com</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="card profile-card m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Account setup</h4>
                            </div>
                           <form class="profile-form" action="{{ route('user.update') }}" enctype='multipart/form-data' method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Name">First Name</label>
                                            <input type="text" class="form-control" name="name" id="Name" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Surname">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="Surname" value="{{ old('last_name', $user->last_name) }}">
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="Email">Email Address</label>
                                            <input type="text" class="form-control" id="Email" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 mb-0">
                                            <label class="form-label d-block">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" id="malecheck" 
                                                    {{ old('gender', $user->gender) == 'Male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="malecheck">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" id="femalecheck" 
                                                    {{ old('gender', $user->gender) == 'Female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="femalecheck">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Other" id="othercheck" 
                                                    {{ old('gender', $user->gender) == 'Other' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="othercheck">Other</label>
                                            </div>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="datepicker">DOB</label>
                                            <input type="text" name="dob" id="dateInput"  class="dateInput form-control" value="{{ old('dob', $user->dob) }}" required placeholder="mm/dd/yyyy" />
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" placeholder="phone" value="{{ old('phone', $user->phone) }}" maxlength="10" pattern="\d{10}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="picture" class="form-label">Dashboard Banner 1</label>
                                            <input type="file" name="dashboard_banner_1" id="picture" class="form-control" accept="image/*"
                                                onchange="previewImage(event, 'picturePreview')"  />
                                            <img id="picturePreview" src="{{ $user->dashboard_banner_1 ? asset($user->dashboard_banner_1) : '#' }}" 
                                                 alt="Picture Preview" style="display: {{ $user->dashboard_banner_1 ? 'block' : 'none' }}; max-width: 200px; margin-top: 10px;">
                                            <div class="text-danger error-message" id="pictureError"></div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jersey No</label>
                                            <input type="text" class="form-control" name="jersey_no" placeholder="Jersey no" value="{{ old('jersey_no', $user->jersey_no) }}" >
                                            @error('jersey_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                                <label for="proof_id" class="form-label">Dashboard Banner 2</label>
                                                <input type="file" name="dashboard_banner_2" id="proof_id" class="form-control" accept="image/*"
                                                    onchange="previewImages(event, 'proofPreview')" />
                                               <img id="proofPreview" src="{{ $user->dashboard_banner_2 ? asset($user->dashboard_banner_2) : '#' }}" 
                                                 alt="Picture Preview" style="display: {{ $user->dashboard_banner_2 ? 'block' : 'none' }}; max-width: 200px; margin-top: 10px;">
                                                <div class="text-danger error-message" id="proofIdError"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(auth()->user()->id == $user->id)
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                <a href="{{route('user.reset.password')}}" class="text-hover float-end">Reset password</a>
                            </div>
                            @endif
                        </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
            @endsection
            @section('js')
            <script src="{{asset('assets/js/own.js')}}"></script>
            @endsection