@extends('layouts.front2')
@section('content')
<!-- Carousel Start -->
<div class="carousel-header">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{asset('front/img/carousel-1.jpg')}}" class="img-fluid" alt="Image" />
                        <div class="carousel-caption">
                            
                            <div class="text-center px-4 head_1" style="max-width:900px;">
                                <!-- <h4 class="text-white text-uppercase fw-bold mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.1s">Solution For All Type Of Visas</h4> -->
                                <h1 class="text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">All-In-One Sports & Recreation Platform </h1>
                                <!-- <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                </p> -->
                                <a class="btn_1 wow fadeInUp" data-wow-delay="0.7s" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('front/img/carousel-2.jpg')}}" class="img-fluid" alt="Image" />
                        <div class="carousel-caption">
                            <div class="text-center px-4 head_1" style="max-width: 900px;">
                    
                                <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">Pick-Up Games On Call</h1>
                                <!-- <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                </p> -->
                                <a class="btn_1 wow fadeInUp" data-wow-delay="0.7s" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join Now</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="carousel-item">
                        <img src="{{asset('front/img/carousel-3.jpg')}}" class="img-fluid" alt="Image" />
                        <div class="carousel-caption">
                            <div class="text-center px-4 head_1" style="max-width: 900px;">
                    
                                <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">Join The Game Anywhere</h1>
                                <!-- <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                </p> -->
                                <a class="btn_1 wow fadeInUp" data-wow-delay="0.7s" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join Now</a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="carousel-item">
                        <img src="{{asset('front/img/carousel-4.jpg')}}" class="img-fluid" alt="Image" />
                        <div class="carousel-caption">
                            <div class="text-center px-4 head_1" style="max-width: 900px;">
                    
                                <h1 class="display-1 text-capitalize text-white mb-3 mb-md-4 wow fadeInUp" data-wow-delay="0.3s">Find Your Next Champion</h1>
                                <!-- <p class="text-white mb-4 mb-md-5 fs-5 wow fadeInUp" data-wow-delay="0.5s">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                </p> -->
                                <a class="btn_1 wow fadeInUp" data-wow-delay="0.7s" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join Now</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-secondary wow fadeInLeft" data-wow-delay="0.2s" aria-hidden="false"></span>
                    <span class="visually-hidden-focusable">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-secondary wow fadeInRight" data-wow-delay="0.2s" aria-hidden="false"></span>
                    <span class="visually-hidden-focusable">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title text-secondary mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1" />
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

              <!-- Section 4 -->

              <div class="span4">
                <div class="container">
                    <div class="head_2 text-center">
                        <h2>Explore Your Community Today</h2>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 col-sm-6">
                            <div class="text-sm-end text-center">
                                <div class="form-check form-check-current">
                                    <input class="form-check-input" type="radio" name="c_location" id="c_location" />
                                    <label class="form-check-label" for="c_location">
                                      Use Current Location
                                    </label>
                                  </div>
                            </div>
                            
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="text-sm-start text-center">
                                <div class="add_zip">
                                    <input type="text" name="zip_code" placeholder="Enter Zip Code" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row justify-content-center span4_tabs">
                        <div class="col-12 col-lg-10">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="places-tab" data-bs-toggle="pill" data-bs-target="#games" type="button" role="tab" aria-controls="games" aria-selected="true"><i class="fas fa-golf-ball"></i> Games</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="events-tab" data-bs-toggle="pill" data-bs-target="#events" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="far fa-calendar-alt"></i> Events</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="places-tab" data-bs-toggle="pill" data-bs-target="#places" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-map-marker-alt"></i> Locations</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="teams-tab" data-bs-toggle="pill" data-bs-target="#teams" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-football-ball"></i> Programs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="professional-tab" data-bs-toggle="pill" data-bs-target="#professional" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-user-tie"></i> Professionals</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                 
                                 <div class="tab-pane fade show active" id="games" role="tabpanel" aria-labelledby="games-tab">
                                    <div class="row">
                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_05.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>
                          
                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_06.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_07.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_08.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_07.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_05.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="places" role="tabpanel" aria-labelledby="places-tab">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.860512519623!2d-122.47096561790035!3d37.76986874022927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858743acfb4421%3A0x1b8487cfc077cab9!2sCalifornia%20Academy%20of%20Sciences!5e0!3m2!1sen!2sin!4v1723110327498!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">
                                    <div class="row">
                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_05.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>
                          
                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_06.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_07.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_08.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_07.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>


                                     <div class="col-12 col-md-6 col-lg-6 col-xxl-4">
                                        <a href="#" class="event_sec">
                                            <div class="event_sec_date">11 Dec</div>
                                            <div class="event_img"><img src="{{asset('front/img/team_logo_05.png')}}" /></div>
                                            <div class="event_txt">
                                                <h3>WASHINGTON WOLVES</h3>
                                                <span>Sport Arean / 7:45PM</span>
                                            </div>
                                         
                                        </a>
                                     </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="teams" role="tabpanel" aria-labelledby="teams-tab">
                                    <div class="teams_tab">
                                        <div class="row">
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"><img src="{{asset('front/img/logos/1.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"><img src="{{asset('front/img/logos/2.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"><img src="{{asset('front/img/logos/3.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"><img src="{{asset('front/img/logos/4.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                               <a href="#"> <img src="{{asset('front/img/logos/5.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/6.png')}}" /></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="professional" role="tabpanel" aria-labelledby="professional-tab">
                                    <div class="team_tabs">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-xl-3">
                                                <div class="team_mem text-center">
                                                    <img src="{{asset('front/img/team/1.jpg')}}" />
                                                    <h4>George</h4>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-xl-3">
                                                <div class="team_mem text-center">
                                                    <img src="{{asset('front/img/team/2.jpg')}}" />
                                                    <h4>David</h4>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-xl-3">
                                                <div class="team_mem text-center">
                                                    <img src="{{asset('front/img/team/3.jpg')}}" />
                                                    <h4>Honge</h4>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-xl-3">
                                                <div class="team_mem text-center">
                                                    <img src="{{asset('front/img/team/4.jpg')}}" />
                                                    <h4>Stenis</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="mt-4"></div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <div class="first_row">
                                <div class="row">
                                    <div class="col">
                                        <h5>Distance</h5>
                                    </div>
                                    <div class="col">
                                        <h5>Type</h5>
                                    </div>
                                    <div class="col">
                                        <h5>Address</h5>
                                    </div>
                                    <div class="col">
                                        <h5>Rating</h5>
                                    </div>
                                    <div class="col">
                                        <h5>Popularity</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="data_row">
                                <div class="row">
                                    <div class="col">
                                        <p>5 Miles</p>
                                    </div>
                                    <div class="col">
                                        <p>Soccor Match</p>
                                    </div>
                                    <div class="col">
                                        <p>San Paolo Stadium</p>
                                    </div>
                                    <div class="col">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Most Popular</p>
                                    </div>
                                </div>
                            </div>


                            <div class="data_row">
                                <div class="row">
                                    <div class="col">
                                        <p>2.5 Miles</p>
                                    </div>
                                    <div class="col">
                                        <p>Golf Match</p>
                                    </div>
                                    <div class="col">
                                        <p>60 East 65th Street, Minneapolis</p>
                                    </div>
                                    <div class="col">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Most Popular</p>
                                    </div>
                                </div>
                            </div>


                            <div class="data_row">
                                <div class="row">
                                    <div class="col">
                                        <p>2.5 Miles</p>
                                    </div>
                                    <div class="col">
                                        <p>Golf Match</p>
                                    </div>
                                    <div class="col">
                                        <p>60 East 65th Street, Minneapolis</p>
                                    </div>
                                    <div class="col">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Most Popular</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
              </div>

              <!-- Section 4 end -->

        <!-- About Start -->
        <div class="span1">

            <div class="container">
                <div class="row gx-3">
                    <div class="col-6 col-md-4 col-lg-20">
                        <div class="box1">
                            <div class="box1_1">
                                <img src="{{asset('front/img/icon/001-basket-ball.png')}}" />
                                <div class="box1_11">
                                    <h2>Pick-up <br />Games</h2>
                                    <!-- <span>Football Leage</span> -->
                                </div>
                            </div>
                            <div class="box1_2">
                                <!-- <h4>International Games</h4> -->
                                <img src="{{asset('front/img/icon/002-basketball.png')}}" />
                                <!-- <h3>Wow-Games</h3> -->
                                <a href="#">Search Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-20">
                        <div class="box1">
                            <div class="box1_1">
                                <img src="{{asset('front/img/icon/calendar2.png')}}" />
                                <div class="box1_11">
                                    <h2>Events</h2>
                                    
                                </div>
                            </div>
                            <div class="box1_2">
                                <!-- <h4>International Games</h4> -->
                                <img src="{{asset('front/img/icon/002-olympics.png')}}" />
                                <!-- <h3>Wow-Games</h3> -->
                                <a href="#">Search Now</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-20">
                        <div class="box1">
                            <div class="box1_1">
                                <img src="{{asset('front/img/icon/location-pin.png')}}" />
                                <div class="box1_11">
                                    <h2>Locations</h2>
                                    <!-- <span>Rubgy Leage</span> -->
                                </div>
                            </div>
                            <div class="box1_2">
                                <!-- <h4>International Games</h4> -->
                                <img src="{{asset('front/img/icon/003-event.png')}}" />
                                <!-- <h3>Wow-Games</h3> -->
                                <a href="#">Search Now</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-20">
                        <div class="box1">
                            <div class="box1_1">
                                <img src="{{asset('front/img/icon/classes.png')}}" />
                                <div class="box1_11">
                                    <h2>Classes</h2>
                                    <!-- <span>Tennis Leage</span> -->
                                </div>
                            </div>
                            <div class="box1_2 box1_2_class">
                                <!-- <h4>International Games</h4> -->
                                <img src="{{asset('front/img/icon/classes-1.png')}}" />
                                <!-- <h3>Wow-Games</h3> -->
                                <a href="#">Search  Now</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-20">
                        <div class="box1">
                            <div class="box1_1">
                                <img src="{{asset('front/img/icon/professional.png')}}" />
                                <div class="box1_11">
                                    <h2>Professionals</h2>
                                    <!-- <span>Golf Leage</span> -->
                                </div>
                            </div>
                            <div class="box1_2">
                                <!-- <h4>International Games</h4> -->
                                <img src="{{asset('front/img/icon/005-coach.png')}}" />
                                <!-- <h3>Wow-Games</h3> -->
                                <a href="#">Search Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div></div>
        <!-- About End -->

        <!-- Section 2 -->
              <div class="span2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-11">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-5">
                            <div class="box2">
                                <!-- <h5>Ready for every sports challenge</h5>
                                <img src="{{asset('front/img/logo_new.png')}}">
                                <p>Fully compatible with SportsPress, the all-encompassing 
                                    sports club and league management plugin.</p>
                                <div class="my-5"></div> -->
                                <h4>All-In-One Recreation Management Platform</h4>
                                <h5>Use RecStep to power your business and instantly get all of the perks for none of the cost.</h5>
                                <p>Instantly manage and accelerate your private training, club, team, studio or recreation facility 
                                    with RecStep's next generation recreation platform.</p>
                               <p>RecStep just doesn't build team management software. A bunch of companies do that. RecStep will
                                 automatically grow and operate your business while you focus on what is important.</p>
                                 <div class="mt-5"><a href="#" class="btn_1">Find Out How</a></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                           <div class="span2_img"></div> <img src="{{asset('front/img/graph.png')}}" /></div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            
        <!-- Section 2 end -->
        

           <!-- Section 3 -->
       
             <div class="span3">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="head_2 text-center">
                                <h2>Upcoming Match</h2>
                                <h3>Confederation of European Baseball</h3>
                            </div>
                            <div class="event_date">
                                <div class="event_date_inner"> December 02, 2024 | 10:20 am</div>
                            </div>
                            <div class="row g-0 mt-5">
                                <div class="col-5">
                                   <div class="box3">
                                      <div class="box3_img"><img src="{{asset('front/img/team_logo.png')}}" /></div>
                                       <div class="text-md-end box3_txt">
                                             <span>California</span>
                                             <a href="#">Splashes</a>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-1">
                                    <div class="box3_div">
                                        :
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="box3 box3_res">
                                       <div class="box3_img"><img src="{{asset('front/img/logo4.png')}}" /></div>
                                        <div class="text-end text-md-start box3_txt">
                                              <span>California</span>
                                              <a href="#">Splashes</a>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>

@endsection