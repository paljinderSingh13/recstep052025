@extends('layouts.front')
@section('content')


      <div class="section_banner classes-banner">
        
            <div class="container">
                <div class="text-center banner-txt">
                    <h1>Find Classes</h1>
                </div>
            </div>
            
       
          
       </div>

       

              <!-- Aboout  -->
                <div class="span_abt span_game">
                     <div class="container">
                        <div class="row align-items-center justify-content-center">
                           <div class="col-12">  
                             <form>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-9">
                                 <div class="row gx-3 gy-3">
                                     <div class="col-6 col-md-3">
                                        <label class="form-label">Location</label>
                                        <input type="text" name="event_name" class="form-control">
                                     </div>
                                     <div class="col-6 col-md-3">
                                        <label class="form-label">Sport Type</label>
                                        <select name="game" class="form-select">
                                            <option>--</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Soccer">Soccer</option>
                                            <option value="Football">Football</option>
                                            <option value="Baseball">Baseball</option>
                                            <option value="Hockey">Hockey</option>
                                            
                                        </select>
                                     </div>

                                     <div class="col-6 col-md-3">
                                        <label class="form-label">Age Group</label>
                                        <select name="game" class="form-select">
                                            <option>--</option>
                                            <option value="adults">Adults</option>
                                            <option value="teens">Teens</option>
                                            <option value="kids">Kids</option>
                                            <option value="open to all ages">Open to all ages</option>
                                        </select>
                                     </div>
                                     <div class="col-6 col-md-3">
                                        <label class="form-label">Gender</label>
                                        <select name="game" class="form-select">
                                            <option>--</option>
                                            <option value="male">Male</option>
                                            <option value="teens">Female</option>
                                            
                                        </select>
                                     </div>
                                 </div>
                                 </div>
                                 <div class="col-12 col-md-12 col-lg-3">
                                     <button type="submit" class="btn btn-2 mt-10">Search</button>
                                 </div>
                             </div>
                            
                             </form>
                             
                             
                       </div>
                       </div>

                         <div class="row gx-3 my-4">
                         <div class="col-12">
                            <div class="map-border">
                             <div class="ratio ratio-16x9">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.860512519623!2d-122.47096561790035!3d37.76986874022927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858743acfb4421%3A0x1b8487cfc077cab9!2sCalifornia%20Academy%20of%20Sciences!5e0!3m2!1sen!2sin!4v1723110327498!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                         </div>
                       </div>

                        </div>
                     
                        

                        <div class="mt-3"></div>
                          
                          <div class="teams_tab">
                                        <div class="row gy-3">
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
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/6.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/5.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/4.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/3.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/2.png')}}" /></a>
                                            </div>
                                            <div class="col-6 col-md-3 col-xxl-2">
                                                <a href="#"> <img src="{{asset('front/img/logos/1.png')}}" /></a>
                                            </div>
                                        </div>
                                    </div>
                      
                    </div>

                     </div>
                </div>

                
              
           

          @endsection

 