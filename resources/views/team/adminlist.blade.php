@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-xxl">
            <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card rounded-5 mt-3">
                                    <div class="card-header rounded-5">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0">                      
                                                <h3 class="card-title fs-1 text-primary text-uppercase">Administrator List</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <button class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create Administrator</button>                      
                                            </div><!--end col-->

                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    
                                                    <th>Name</th>
                                                    <th>Type</th>                                                  
                                                    <th>Phone</th>                                                  
                                                    <th>Email</th>                                                  
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>                                                   
                                                    <tr>                                                   
                                                        <td>Sahil </td>
                                                        <td>AA</td> 
                                                        <td>123456987</td> 
                                                        <td>abc@gmail.com</td> 
                                                        <td> 
                                                            <span >Inactive</span> 
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary" onclick="executeExample('clubstatus')">Active</button>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button onclick="executeExample('warningConfirm')" class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                        <td>Kushik </td>
                                                        <td>BB</td> 
                                                        <td>9874558525</td> 
                                                        <td>kkabc@gmail.com</td> 
                                                        <td> 
                                                            <span >Active</span>                                                                
                                                        </td>
                                                        <td>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger" onclick="executeExample('clubstatus')"> Inactive</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button onclick="executeExample('warningConfirm')" class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                        <td>Oleg </td>
                                                        <td>CC</td> 
                                                        <td>8899556688</td> 
                                                        <td>olehremf@gmail.com</td> 
                                                        <td>
                                                            <span>Active</span>         
                                                        </td>
                                                        <td>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger" onclick="executeExample('clubstatus')"> Inactive</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button onclick="executeExample('warningConfirm')" class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                        <td>John </td>
                                                        <td>DD</td> 
                                                        <td>66969633655</td> 
                                                        <td>johnmiali@gmail.com</td> 
                                                        <td> 
                                                            <span >Inactive</span>        
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary" onclick="executeExample('clubstatus')"> Active</button>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button onclick="executeExample('warningConfirm')" class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                 
                                                </tbody>
                                            </table>
                                        </div>   
                                    </div><!--end card-body--> 
                                </div><!--end card--> 
                            </div> <!--end col-->                                                        
                        </div><!--end row-->

                                                        
                    </div><!-- container -->
        


@endsection