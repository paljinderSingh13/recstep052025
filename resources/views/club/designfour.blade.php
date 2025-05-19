@extends('layouts.master') @section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content designfour">
        <div class="container-xxl">
            <div class="row justify-content-center mt-3">
                <div class="col-12">
                    <div class="card rounded-5">
                        <div class="card-header rounded-5">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Club Form</h4>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="Logo" class="col-sm-2 col-form-label text-end">Logo</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="file" id="Logo" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Address" class="col-sm-2 col-form-label text-end">Address</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="text" id="Address" placeholder="Address" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label text-end">State</label>
                                        <div class="col-sm-10">
                                            <select class="form-select form-select-lg" aria-label="Default select example">
                                                <option selected>State</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="PostalCode" class="col-sm-2 col-form-label text-end">Postal Code</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="number" id="PostalCode" placeholder="Postal Code" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="Phone" class="col-sm-2 col-form-label text-end">Phone</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="number" id="Phone" placeholder="Phone" />
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3 row">
                                        <label for="Name" class="col-sm-2 col-form-label text-end">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="text" id="Name" placeholder="Name" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="City" class="col-sm-2 col-form-label text-end">City</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="text" id="City" placeholder="City" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label text-end">Country</label>
                                        <div class="col-sm-10">
                                            <select class="form-select form-select-lg" aria-label="Default select example">
                                                <option selected>Country</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="ContactName" class="col-sm-2 col-form-label text-end">Contact Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-control-lg" type="text" id="ContactName" placeholder="Contact Name" />
                                        </div>
                                    </div>
                                    <div class="mb-3 row has-warning">
                                        <label for="Email" class="col-sm-2 col-form-label text-end">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control form-control-warning" id="Email" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row mt-3">
                        <div class="col-lg-6 col-sm-12  text-lg-end mb-2">                            
                            <button type="submit" class="btn btn-lg btn-blue fs-18 px-5 py-2 ">Submit</button>
                        </div>
                        <div class="col-lg-6 col-sm-12 mb-2">
                        <button type="button" class="btn btn-light btn-lg fs-18 px-5 py-2">Cancel</button>
                        </div>
                    </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!-- container -->
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
