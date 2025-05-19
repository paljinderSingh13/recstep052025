@extends('layouts.master')
@section('content')



<div class="page-wrapper">

<!-- Page Content-->
<div class="page-content designtwo">
<div class="container-xxl"> 

<div class="row mt-3">
   
    <div class="col-md-6 col-lg-12">
        <div class="card rounded-5">
            <div class="card-header rounded-5">
                <div class="row align-items-center">
                    <div class="col">                      
                        <h3 class="card-title">Club Form</h3>                      
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
                    <div class="row mt-4">
                        <div class="col-sm-12 msx-auto text-center">
                            <button type="submit" class="btn btn-lg btn-primary fs-18 px-5 py-2 me-3">Submit</button>
                            <button type="button" class="btn btn-danger btn-lg fs-18 px-5 py-2">Cancel</button>
                        </div>
                    </div> 

                </form><!--end form-->            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                                                         <div class="col-md-6 col-lg-2">
    </div>                      
</div><!--end row-->

</div><!-- container -->
<div class="container-xxl">                    
<div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Textual Inputs</h4>                      
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3 row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label text-end">Text</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-email-input" class="col-sm-2 col-form-label text-end">Email</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="example-tel-input" class="col-sm-2 col-form-label text-end">Telephone</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label text-end">Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-number-input" class="col-sm-2 col-form-label text-end">Number</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="number" value="42" id="example-number-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-end">Date and time</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="exampleColorInput" class="col-sm-2 col-form-label text-end">Color</label>
                                                <div class="col-sm-10">
                                                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#0b51b7" title="Choose your color">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label text-end">Select</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                      </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input-lg" class="col-sm-2 col-form-label text-end">Large</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" id="example-text-input-lg">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-text-input-sm" class="col-sm-2 col-form-label text-end">Small</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" id="example-text-input-sm">
                                                </div>
                                            </div>                                  
                                        </div><!--end col-->
    
    
                                        <div class="col-lg-6">    
                                            <div class="mb-3 row">
                                                <label for="example-search-input" class="col-sm-2 col-form-label text-end">Search</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                                </div>
                                            </div>                                     
                                            <div class="mb-3 row">
                                                <label for="example-url-input" class="col-sm-2 col-form-label text-end">URL</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                                </div>
                                            </div> 
                                            <div class="mb-3 row">
                                                <label for="example-date-input" class="col-sm-2 col-form-label text-end">Date</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-month-input" class="col-sm-2 col-form-label text-end">Month</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-week-input" class="col-sm-2 col-form-label text-end">Week</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="example-time-input" class="col-sm-2 col-form-label text-end">Time</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                                </div>
                                            </div>
                                            <div class="mb-3 row has-warning">
                                                <label for="inputHorizontalWarning" class="col-sm-2 col-form-label text-end">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control form-control-warning" id="inputHorizontalWarning" placeholder="name@example.com">
                                                    <small class="form-text text-muted">Example help text that remains unchanged.</small>
                                                </div>
                                            </div>

                                            <div class="mb-3 row has-success">
                                                <label for="inputHorizontalSuccess" class="col-sm-2 col-form-label text-end">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control is-valid" id="inputHorizontalSuccess" placeholder="name@example.com">
                                                    <div class="valid-feedback">Success! You've done it.</div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row has-error">
                                                <label for="inputHorizontalDnger" class="col-sm-2 col-form-label text-end">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control is-invalid" id="inputHorizontalDnger" placeholder="name@example.com">
                                                    <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                                                </div>
                                            </div>                                           
                                        </div><!--end col-->
                                    </div> <!--end row-->              
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->                                                       
                    </div><!--end row-->
</div>

    
    <!--end Rightbar/offcanvas-->
    <!--end Rightbar-->
    <!--Start Footer-->
    
    <footer class="footer text-center text-sm-start d-print-none">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0 rounded-bottom-0">
                        <div class="card-body">
                            <!-- <p class="text-muted mb-0">
                                ©
                                <script> document.write(new Date().getFullYear()) </script>
                                Rizz
                                <span
                                    class="text-muted d-none d-sm-inline-block float-end">
                                    Crafted with
                                    <i class="iconoir-heart text-danger"></i>
                                    by Mannatthemes</span>
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!--end footer-->
</div>
<!-- end page content -->
</div>
@endsection