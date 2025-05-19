    @extends('leagues.layouts.master')
    @section('content')


    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Add New Player</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Complete the form below, and the player will be sent an email with instructions to sign up.</p>
                            </div>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                     <label class="form-label">Team</label>
                                     <select class="default-select  form-control wide" >
                                        <option>King XI</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="First Name" value="">
                             </div>
                              <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Last Name" value="">
                             </div>
                              <div class="col-md-6 mb-3">
                                     <label class="form-label">Gender</label>
                                     <select class="default-select  form-control wide" >
                                        <option>Male</option>
                                        <option>Female</option>                                      
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                 <input type="email" name="name" class="form-control" placeholder="Enter email address" value="">
                             </div>
                             <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number (Optional)</label>
                                 <input type="text" name="name" class="form-control" placeholder="Phone number" value="">
                             </div>
                             <div class="col-md-6 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                 <input type="date" name="name" class="form-control" placeholder="" value="">
                             </div>
                             <div class="col-md-6 mb-3">
                                    <label class="form-label">Home Address</label>
                                 <input type="text" name="name" class="form-control" placeholder="Address" value="">
                             </div>
                             <div class="col-md-12">
                                 <button class="btn btn-primary">Add Player</button>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

</div>

@endsection