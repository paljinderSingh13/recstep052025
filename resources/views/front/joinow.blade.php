@extends('layouts.front')
@section('content')
<!-- Carousel Start -->
<div class="section-about-banner">
        <div class="join-banner">
            <div class="container">
                <div class="text-center banner-txt">
                    <h1>Join Now</h1>
                </div>
            </div>
            
        </div>
          
       </div>

       

              <!-- Aboout  -->
                <div class="span_abt span_join">
                     <div class="container">
                        <div class="row align-items-center justify-content-center">
                             
                              
                              <div class="col-12 col-md-6">
                                  <div class="con_form">
                                     <form action="#" method="post">
                                        <div class="form_brd">
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <select class="form-control" id="account_type" placeholder="Account Type" name="account_type">
                                             <option value="" selected disabled hidden>Account Type</option>
                                            <option value="Club">Club</option>
                                            <option value="Personal">Personal</option>
                                        </select>
                                        <!-- <label for="account_type">Account Type</label> -->
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control" id="phone" placeholder="Phone">
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Join Now</button>
                                </div>
                            </div>
                         </div>
                        </form>
                                  </div>
                              </div>

                        </div>
                     </div>
                </div>


@endsection