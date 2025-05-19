@extends('layouts.master') @section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Player Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" enctype="multipart/form-data" action="">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="picture" class="form-label">Picture</label>
                                        <input type="file" name="picture" id="picture" class="form-control"   />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="name" class="form-label">Name <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Name"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type <span class="text-danger ms-1">*</span></label>
                                        <select name="type" id="type" class="default-select form-control wide " required="">
                                            <option value="permanent">Permanent </option>
                                            <option value="substitute">Substitute </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority </label>
                                        <select name="priority" id="permanent" class="default-select form-control wide" required="">
                                            <option value="Na">NA</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="dob" class="form-label">Date of Birth <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="dob" id="dob" class="form-control" value=""  required="" placeholder="Date of Birth"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="proof_id" class="form-label">Proof ID </label>
                                        <input type="file" name="proof_id" id="proof_id" class="form-control"  />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="phone" class="form-label">Phone <span class="text-danger ms-1">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="" required="" placeholder="Phone"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">Email <span class="text-danger ms-1">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="" required="" placeholder="Email"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="type" class="form-label">Type <span class="text-danger ms-1">*</span></label>
                                        <select name="type" id="type" class="default-select form-control wide " required="">
                                            <option value="permanent">Active </option>
                                            <option value="substitute">Deactive </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="password" class="form-label">Password <span class="text-danger ms-1">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" value="" required="" />
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="mb-3 col-md-6">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <h3 class="">Create Player Aminitrator</h3>
                                            </div>
                                            <div class="mb-3 col-md-6 text-end">
                                                <button class="btn btn-sm btn-primary">Add New</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label" >Select Teams <em class="text-dark ms-1">(Select Teams)</em></label>
                                        <select name="steam" id="teams" class="form-control default-select wide" >
                                            <option value="1">El Mellindo U7 </option>
                                            <option value="1">El Mellindo U8 </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name </label>
                                            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Name"/>                                       
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Email </label>
                                            <input type="email" name="name" id="name" class="form-control" value="" placeholder="Email"/>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="name" class="form-label">Phone </label>
                                            <input type="text" name="name" id="name" class="form-control" value="" placeholder="Phone"/>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="name" class="form-label">Password </label>
                                            <input type="password" name="name" id="name" class="form-control" value="" placeholder="Password"/>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary fs-18 px-md-5 px-4 px-lg-5 py-2">Submit</button>
                                        <a href="#" type="button" class="btn btn-danger btn-lg fs-18 px-md-5 px-4 px-lg-5 py-2">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</div>