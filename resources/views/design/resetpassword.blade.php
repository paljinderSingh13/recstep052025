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
                    <div class="row d-flex justify-content-center">
                        
                    <div class="col-xl-7 col-lg-7 col-12 col-sm-12 col-md-12">
                        <div class="card profile-card m-b30">
                            <div class="card-header">
                                <h4 class="card-title">Reset password</h4>
                            </div>
                            <form class="profile-form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="oldpassword">Old password</label>
                                                <input type="password" class="form-control" value="oldpassword" id="oldpassword">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                 <label class="form-label" for="newpassword">New password</label>
                                                <input type="password" class="form-control" value="newpassword" id="newpassword">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                 <label class="form-label" for="confirmpassword">Confirm password</label>
                                                <input type="password" class="form-control" value="confirmpassword" id="confirmpassword">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">UPDATE</button>
                                    <!-- <a href="#" class="text-hover float-end">Reset password</a> -->
                                </div>
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