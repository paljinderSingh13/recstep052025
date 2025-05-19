 <!-- Navbar & Hero Start -->
 <style>
    .player-item {
        padding: 10px;
        margin: 5px;
        background-color: white;
        border: 1px solid #ddd;
        cursor: pointer;
    }

/* Style for active item */
.player-item.active {
    border-color: #23b56f;
    color: white;
    background: #006395;
}
</style>


<style>
    .step {
        display: none;
        position: absolute;
        width: 100%;
        transition: transform 0.5s ease-in-out;
        opacity: 0;
    }

    .step.active {
        display: block;
        position: relative;
        opacity: 1;
        background-color: #ffffff;
    }

    .step.enter-from-right {
        animation: slide-in-right 0.5s forwards;
    }

    .step.enter-from-left {
        animation: slide-in-left 0.5s forwards;
    }

    .step.exit-to-right {
        animation: slide-out-right 0.5s forwards;
    }

    .step.exit-to-left {
        animation: slide-out-left 0.5s forwards;
    }

    @keyframes slide-in-right {
        0% {
            transform: translateX(100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slide-in-left {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slide-out-right {
        0% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    @keyframes slide-out-left {
        0% {
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateX(-100%);
            opacity: 0;
        }
    }

    .step-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .step-buttons button{
        background: #24b570;
        border-color: #24b570;
    }
    .step-buttons button:hover{
        background: #24b570;
        border-color: #24b570;
    }

    .step-indicators {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .step-indicators div {
        width: 25px;
        height: 25px;
        background-color: #cccccc;
        border-radius: 50%;
        margin: 0 5px;
        text-align: center;
        line-height: 25px;
        color: white;
    }

    .step-indicators div.active {
        background-color: #007bff;
    }

    .step-indicators div.completed {
        background-color: #28a745;
    }
    .text-success {
        color: #23b56f!important;
    }
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    ul.your-child li a {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #e8e8e8;
    }
    ul.your-child li a .img{
        background-color: #34aff5;
        border-radius: 50%;
        height: 45px;
        width: 45px;
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        line-height: 26px;
        font-weight: 600;
        margin-right: 10px;
    }

/*    --------------------------------------------*/

ul.yourrole li a ,
ul.yourchild li a ,
ul.yourname li a ,
ul.team li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    font-weight:600;
/*        border-bottom: 1px solid #e8e8e8;*/
}
ul.team li a .img{
    background-color: #fac44d;
    border-radius: 50%;
    height: 45px;
    width: 45px;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    line-height: 26px;
    font-weight: 600;
    margin-right: 10px;
}

ul.yourchild li a .img,
ul.yourrole li a .img,
ul.yourname li a .img{
    border-radius: 50%;
    height: 45px;
    width: 45px;
    color: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    line-height: 26px;
    font-weight: 600;
    margin-right: 10px;
}
#wizard-form button{
    padding: 15px;
}
</style>
<body>
    <div>
     <div class="header">
      <div class="container-fluid nav-bar p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5  py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="display-5 text-secondary m-0"><img src="front/img/logo.png" class="img-fluid" alt="" /></h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('front.index')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('front.about')}}" class="nav-item nav-link">About</a>
                    <a href="#" class="nav-item nav-link">Service</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown"><span class="dropdown-toggle">Pages</span></a>
                            <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Feature</a>
                                <a href="countries.html" class="dropdown-item">Countries</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="training.html" class="dropdown-item">Training</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> -->
                        <a href="{{route('front.contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="#" class="btn btn-primary border-secondary  join_now_btn" data-bs-toggle="modal" data-bs-target="#btnjoinother">Join Now</a>
                    <a href="" class="btn btn-primary border-secondary  blog_btn">Blog</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Button trigger modal -->

    

    <!-- btn join and other -->
    <div class="modal fade" id="btnjoinother">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 630px;" role="document">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                   <div class="row px-4">
                    <div class="col-12">
                        <div class="text-center mb-4">
                            <img class="img-fluid" width="200px" src="{{asset('front/img/logo.png')}}">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6 mb-3">
                       <button type="button" class="btn btn-success btn-lg w-100" data-bs-toggle="modal" data-bs-target="#joinwith_teamcode">Join With Team Code</button>
                   </div>
                   <div class="col-12 col-sm-12 col-lg-6 mb-3">
                       <button type="button" class="btn btn-secondary btn-lg w-100" data-bs-toggle="modal" data-bs-target="#other">Other</button>
                   </div>
               </div>
           </div>
           <div class="modal-footer border-0">
                    <!-- <button type="button" class="btn btn-danger light"
                    data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Join With Team Code -->

    <div class="modal fade" id="joinwith_teamcode">
        <div class="modal-dialog model-lg modal-dialog-centered" style="max-width: 650px;" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success border-0 d-none">
                    <p class="modal-title text-white text-center">Enter Code</p>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- ------------------------------------------------ -->

                    <div class="">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-12">               

                                <div class="step-indicators d-none">
                                    <div class="indicator active">1</div>
                                    <div class="indicator">2</div>
                                    <div class="indicator">3</div>
                                    <div class="indicator">4</div>
                                </div>

                                <form id="wizard-form">
                                    <!-- Step 1 -->
                                    <div class="step active" id="step-1">

                                        <div class="step-buttons bg-success py-2">
                                            <button type="button" class="btn btn-success">Cancel</button>
                                            <p class="text-white text-center mb-0 fs-5">Enter Code</p>
                                            <button type="button" class="btn btn-success next-btn">Countinue</button>
                                        </div>

                                        <div class="p-3">
                                            <p class="text-dark text-center fs-4 mb-3">Enter the 9-Digit invite code you received from your team or Club Admin</p>
                                            <div class="mb-3">

                                               <input type="text" class="fs-4 code form-control form-control-lg border-0 border-bottom text-center" id="code" placeholder="999 999 999" required>
                                           </div> 
                                           <button type="button" class="btn btn-success btn-lg next-btn w-100">Countinue</button>                
                                       </div>

                                   </div>

                                   <!-- Step 2 -->
                                   <div class="step" id="step-2">

                                    <div class="step-buttons bg-success py-2">
                                        <button type="button" class="btn btn-success prev-btn">Back</button>
                                        <p class="text-white text-center mb-0 fs-5">Create Account</p>
                                        <button type="button" class="btn btn-success next-btn">Next</button>
                                    </div>                    
                                    <div class="p-3"> 
                                        <div class="form-floating mb-3">
                                          <input type="email" class="form-control border-0 border-bottom" id="floatingInput" placeholder="name@example.com">
                                          <label for="floatingInput">Email</label>
                                      </div>
                                      <div class="form-floating mb-3">
                                          <input type=" email" class="form-control border-0 border-bottom" id="ConfirmfloatingInput" placeholder="name@example.com">
                                          <label for="ConfirmfloatingInput">Confirm Email </label>
                                      </div>
                                      <div class="form-floating">
                                          <input type="password" class="form-control border-0 border-bottom" id="floatingPassword" placeholder="Password">
                                          <label for="floatingPassword">Password</label>
                                      </div>   
                                      <div class="my-3">
                                          <a class="text-success mb-2 d-block" href="http://recstep.com/login">Already have an account? Login</a>
                                          <p class="text-dark fw-bold">This Should be your information. You will add your child/player later.</p>
                                      </div>
                                      <button type="button" class="btn btn-success w-100 btn-lg next-btn">Continue</button>

                                  </div>

                              </div>

                              <!-- Step 3 -->
                              <div class="step" id="step-3">
                                <div class="step-buttons bg-success py-2">
                                    <button type="button" class="btn btn-success prev-btn">Back</button>
                                    <p class="text-white text-center mb-0 fs-5">Create Account</p>
                                    <button type="button" class="btn btn-success next-btn">Create</button>
                                </div>
                                <div class="bg-success pb-2 mb-2">
                                </div>
                                <p class="text-dark bg-light p-3 mb-0">Personal Details</p>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-6 col-md-12">
                                           <div class="form-floating mb-3">
                                              <input type="text" class="form-control border-0 border-bottom" id="fisrtnamefloatingInput" placeholder="First Name" required>
                                              <label for="fisrtnamefloatingInput">First Name</label>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-12 col-lg-6 col-md-12">
                                        <div class="form-floating mb-3">
                                          <input type="text" class="form-control border-0 border-bottom" id="lastnamefloatingInput" placeholder="Last Name">
                                          <label for="lastnamefloatingInput">Last Name</label>
                                      </div>
                                  </div>
                              </div>


                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control border-0 border-bottom" id="phonefloatingInput" placeholder="(000) 000 0000">
                                  <label for="phonefloatingInput">Phone</label>
                                  <p class="small mt-3">Used for the team Directory</p>
                              </div>
                              <div class="form-check mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    I Certify that i am at least 13 years old  
                                </label>
                            </div>
                            <div class="form-check mb-3">
                              <input class="form-check-input" type="checkbox" value="" id="agreeCheckDefault">
                              <label class="form-check-label" for="agreeCheckDefault">
                                I agree to the <a class="text-success" href="#">Term and Conditions</a> 
                            </label>
                        </div>
                        <button type="button" class="btn btn-success w-100 btn-lg next-btn">Create Account</button>

                    </div>

                </div>

                <!-- Step 4 -->
                <div class="step" id="step-4">
                   <div class="step-buttons bg-success py-2">
                    <button type="button" class="btn btn-success prev-btn">Back</button>
                    <p class="text-white text-center mb-0 fs-5">Role</p>

                    <button type="button" class="btn btn-success next-btn" style="visibility: hidden;">Next</button>
                </div>
                <div class="p-3">
                    <p class="fs-4 fw-bold">Are you a Staff member?</p>
                    <p>Select yes if you are a coach, manager, team admin, or other staff member.</p>
                    <div class="mb-3">
                        <button class="btn btn-success btn-lg w-100 next-btn" type="button">Yes</button> 
                    </div>
                    <div class="">
                        <button class="btn btn-light btn-lg w-100 text-success" type="button" >No</button> 
                    </div>
                </div>

            </div>
            <!-- Step 5 -->
            <div class="step" id="step-5">
               <div class="step-buttons bg-success py-2">
                <button type="button" class="btn btn-success prev-btn">Back</button>
                <p class="text-white text-center mb-0 fs-5">Role</p>
                <button type="button" class="btn btn-success next-btn " style="visibility: hidden;">Next</button>
            </div>
            <div class="p-3">
                <p class="fs-4 fw-bold">What's your role?</p>
                <p>Please Specify if you are a Guardian or a player joining the team with your own cell phone.</p>
                <div class="mb-3">
                    <button class="btn btn-success btn-lg w-100 next-btn" type="button">I am a Guardian/Parent</button> 
                </div>
                <div class="">
                   <button class="btn btn-success btn-lg w-100" type="button" >I am a Player</button> 
               </div>     
           </div>     
       </div>
       <!-- Step 6 -->
       <div class="step" id="step-6">
        <div class="step-buttons bg-success py-2">
            <button type="button" class="btn btn-success prev-btn">Back</button>
            <p class="text-white  text-center mb-0 fs-5">Parent/Guardian</p>
            <button type="button" class="btn btn-success next-btn" style="visibility: hidden;">Next</button>
        </div>
        <p class="fs-4 fw-bold p-3 bg-light mb-0">Who is your child?</p>
        <div class="p-3">
            <ul class="your-child">
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">JA</span> Altizer, judy  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">LB</span> Boice, Laney  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Flores, Kai  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span><span class="img">KF</span> Hanna, Brooks  </span> <span><i class="fa fa-angle-right"></i></span> </a></li>
            </ul>
            <!-- ------------------ -->
            <!-- Request Access Model-->
            <div class="modal fade" id="requestaccess">
                <div class="modal-dialog modal-dialog-centered" style="max-width:650px;background: #00000070;"  role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header pb-0 border-0 d-none">
                            <!-- <h5 class="modal-title">Modal title</h5> -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-success fw-bold fs-5">Request Access?</p>
                            <p>This player is already linked to the following accounts:</p>
                            <p>Cody Altizer <br>
                                Leigh Altizer <br>
                            Cody Altizer </p>

                            <p>Do you want to send a notification to the above account(s) requesting access to this player?</p>
                            <p>NOTE: You will have the chance to confirm your selection on the next screen before the notification will be sent. </p>
                            <div class="d-flex">
                                <button type="button" class="btn btn-success w-100 btn-lg py-4 rounded-0 ">Cancel</button>
                                <button type="button" class="btn btn-success w-100 btn-lg py-4 border-start rounded-0 next-btn">Confirm</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ------------------ -->

            <div class="mt-3">   
                <button type="button" class="btn btn-success w-100 btn-lg next-btn">Countinue</button>
            </div>
        </div>
    </div>
    <!-- Step 7 -->
    <div class="step" id="step-7">
        <div class="step-buttons bg-success py-2">
            <button type="button" class="btn btn-success prev-btn">Back</button>
            <p class="text-white  text-center mb-0 fs-5">Everything Right?</p>
            <button type="button" class="btn btn-success next-btn" style="visibility: hidden;">Next</button>
        </div>
        <div class="p-3">
            <!-- Team -->
            <p class="fs-5 pb-1 border-bottom">Team</p>
            <ul class="team mb-4">
                <li><a href="#"><span><span class="img">UA</span class="team-name"> Utah United Academy Coed 2017/2018</span>  </a></li>                
            </ul>

            <!-- Your Name -->
            <p class="fs-5 pb-1 border-bottom">Your Name</p>
            <ul class="yourname mb-4">
                <li><a href="#"><span><span class="img bg-danger">CA</span class="team-name"> Cody A</span> </a></li>                
            </ul>

            <!-- Your Role -->
            <p class="fs-5 pb-1 border-bottom">Your Role</p>
            <ul class="yourrole mb-4">
                <li><a href="#"><span><span class="img bg-warning">PG</span class="rolename"> Parent/Guardian</span> </a></li>                
            </ul>

            <!-- Your Child -->
            <p class="fs-5 pb-1 border-bottom">Your Child</p>
            <ul class="yourchild mb-4">
                <li><a href="#"><span><span class="img bg-info">JA</span class="rolename"> Judy Altizer</span> </a></li>                
            </ul>


            <div class="mt-3">   
                <button type="submit" class="btn btn-success w-100 btn-lg">Submit</button>
            </div>
        </div>
    </div>



</form>
</div>
</div>
</div>


<!-- ------------------------------------------------ -->

</div>
<div class="modal-footer border-0">
                    <!-- <button type="button" class="btn btn-danger light"
                    data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!--Other Modal -->
    <div class="modal fade" id="other" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div> -->
    <div class="modal-body">
        <div class="con_form form_brd">

         <div class="text-center mb-4"><img src="{{asset('front/img/logo.png')}}"></div>
         <form action="#" method="post">
            <div class="">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentStep = 0;
        const steps = document.querySelectorAll(".step");
        const indicators = document.querySelectorAll(".indicator");
        const nextButtons = document.querySelectorAll(".next-btn");
        const prevButtons = document.querySelectorAll(".prev-btn");

        // Function to show the current step with animation
        function showStep(step) {
            steps.forEach((element, index) => {
                element.classList.remove("enter-from-left", "enter-from-right", "exit-to-left", "exit-to-right", "active");
                if (index === step) {
                    element.classList.add("active");
                }
            });

            steps[step].classList.add(step > currentStep ? 'enter-from-right' : 'enter-from-left');
            steps[currentStep].classList.add(step > currentStep ? 'exit-to-left' : 'exit-to-right');
            currentStep = step;

            indicators.forEach((indicator, idx) => {
                indicator.classList.toggle("active", idx === step);
                if (idx < step) {
                    indicator.classList.add("completed");
                } else {
                    indicator.classList.remove("completed");
                }
            });
        }

        // Next button functionality
        nextButtons.forEach(button => {
            button.addEventListener("click", function () {
                if (currentStep < steps.length - 1) {
                    showStep(currentStep + 1);
                    if (currentStep === steps.length - 1) {
                        populateConfirm();
                    }
                }
            });
        });

        // Previous button functionality
        prevButtons.forEach(button => {
            button.addEventListener("click", function () {
                if (currentStep > 0) {
                    showStep(currentStep - 1);
                }
            });
        });

        // Populate confirmation step with form data
        function populateConfirm() {
            document.getElementById("confirm-firstName").textContent = document.getElementById("firstName").value;
            document.getElementById("confirm-lastName").textContent = document.getElementById("lastName").value;
            document.getElementById("confirm-email").textContent = document.getElementById("email").value;
            document.getElementById("confirm-phone").textContent = document.getElementById("phone").value;
        }

        // Form submit event
        // document.getElementById("wizard-form").addEventListener("submit", function (event) {
        //     event.preventDefault();
        //     alert("Form submitted successfully!");
        // });
    });
</script>


