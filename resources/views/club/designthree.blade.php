@extends('layouts.master')
@section('content')

<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content designthree">
<div class="container-xxl"> 

<div class="row ">
   
    <div class="col-md-12 col-lg-12">
        <div class="card rounded-5 mt-3">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title text-center text-primary fs-1">Create a Club </h3>                      
                    </div><!--end col-->
                </div>  <!--end row-->                                  
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <form id="form-validation-2" class="form row">
                    
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="logo" class="form-label">Logo</label>
                        <input class="form-control form-control-lg" type="file" id="logo" placeholder="Logo">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Name" class="form-label">Name</label>
                        <input class="form-control form-control-lg" type="text" id="Name" placeholder="Name">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Address" class="form-label">Address</label>
                        <input class="form-control form-control-lg" type="text" id="Address" placeholder="Address">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="City" class="form-label">City</label>
                        <input class="form-control form-control-lg" type="text" id="City" placeholder="City">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label class="col-form-label">State</label>
                       
                            <select class="form-select form-select-lg" aria-label="Default select example">
                                <option selected>State</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                                <small>Error Message</small>
                        
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label class="col-form-label">Country</label>
                       
                            <select class="form-select form-select-lg" aria-label="Default select example">
                                <option selected>Country</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                        
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="PostalCode" class="form-label">Postal Code</label>
                        <input class="form-control form-control-lg" type="text" id="PostalCode" placeholder="Postal Code">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="ContactName" class="form-label">Contact Name</label>
                        <input class="form-control form-control-lg" type="text" id="ContactName" placeholder="Contact Name">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Phone" class="form-label">Phone</label>
                        <input class="form-control form-control-lg" type="text" id="Phone" placeholder="Phone">
                        <small>Error Message</small>
                    </div>
                    <div class="mb-2 col-lg-6 col-sm-12">
                        <label for="Email" class="form-label">Email</label>
                        <input class="form-control form-control-lg" type="email" id="Email" placeholder="Email">
                        <small>Error Message</small>
                    </div>
                    <div class="container">
                    <div class="row mt-3">
                        <div class="col-lg-6 col-sm-6 col-6 text-end mb-2">                            
                            <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2 ">Submit</button>
                        </div>
                        <div class="col-lg-6 col-6 col-sm-6 mb-2">
                        <button type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</button>
                        </div>
                    </div> 
                    </div>     
                </form><!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->
                       
</div><!--end row-->

</div><!-- container -->
@endsection