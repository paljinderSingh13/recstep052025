@extends('layouts.front')
@section('content')
<div class="section-about-banner">
        <div class="about-banner contact-banner">
            <div class="container">
                <div class="text-center banner-txt">
                    <h1>Contact us</h1>
                </div>
            </div>
            
        </div>
          <div class="banner_mask">
            <img src="img/bottom_grey_image_01.png">
         </div>
       </div>

       

              <!-- Aboout  -->
                <div class="span_abt">
                     <div class="container">
                        <div class="row align-items-center">
                             <div class="col-12 col-md-6">
                                <div class="head_2">
                                    <h2>Contact Details</h2>
                                    <p>The feedback of our members and supporters is important to us and we are dedicated to maintaining the highest possible levels of customer service.</p>
                                </div>
                                <ul>
                                    <li><i class="fas fa-map-marker-alt"></i> 4005 Nicollet, Minneapolis, MN 55409</li>
                                    <li><i class="fas fa-envelope"></i> <a href="mailto:info@recstep.com">info@recstep.com</a></li>
                                    <li><i class="fas fa-phone-alt"></i> <a href="tel:1-800-1-900">1-800-1-900</a></li>
                                </ul>
                                <!-- <a href="#" class="btn_1 btn_2">Join Now</a> -->
                             </div>
                              
                              <div class="col-12 col-md-6">
                                  <div class="con_form">
                                     <form>
                            <div class="row g-4">
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
                                <div class="col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="project" placeholder="Project">
                                        <label for="project">Your Project</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                                  </div>
                              </div>

                        </div>
                     </div>
                </div>
@endsection