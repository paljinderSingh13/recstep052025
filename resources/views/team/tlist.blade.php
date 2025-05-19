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
                                                <h3 class="card-title fs-1 text-primary text-uppercase">List of Team</h4>                      
                                            </div><!--end col-->
                                            <div class="col-12 col-md-6 mb-3 mb-lg-0 text-end">                      
                                                <button class="mb-1 mb-md-0 btn btn-lg btn-blue fs-4"><i class="far fa-plus-square"></i> Create a Team</button>                      
                                            </div><!--end col-->

                                        </div>  <!--end row-->                                  
                                    </div><!--end card-header-->
                                    <div class="card-body pt-0">
                                        <div class="table-responsive">
                                            <table class="table datatable" id="datatable_1">
                                                <thead class="table-light">
                                                <tr>
                                                    
                                                    <th>Team Name</th>
                                                    <th>Age Group</th>                                                  
                                                    <th>Season</th>                                                 
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>                                                   
                                                    <tr>                                                   
                                                        <td>YZ Mahi </td>
                                                        <td>U16-17</td> 
                                                        <td>abcd</td>  
                                                        <td> 
                                                            <span class="badge fs-14 bg-primary">Active</span> 
                                                            <span class="badge fs-14 bg-danger">Inactive</span> 
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                    <td>GA Sahi </td>
                                                        <td>U19-20</td> 
                                                        <td>xyz</td>  
                                                        <td> 
                                                            <span class="badge fs-14 bg-primary">Active</span> 
                                                            <span class="badge fs-14 bg-danger">Inactive</span>    
                                                        </td>
                                                        <td>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                    <td>KL Well </td>
                                                        <td>U20-21</td> 
                                                        <td>GHI</td>  
                                                        <td>
                                                            <span class="badge fs-14 bg-primary">Active</span> 
                                                            <span class="badge fs-14 bg-danger">Inactive</span>        
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                   
                                                    <td>SS John </td>
                                                        <td>U22-23</td> 
                                                        <td>klpo</td>  
                                                        <td> 
                                                            <span class="badge fs-14 bg-primary">Active</span> 
                                                            <span class="badge fs-14 bg-danger">Inactive</span>        
                                                        </td>
                                                        <td>
                                                        <button class="mb-1 mb-md-0 btn btn-sm btn-primary"><i class="fas fa-users"></i> Team</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-blue"><i class="far fa-edit"></i> Edit</button>
                                                            <button class="mb-1 mb-md-0 btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
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