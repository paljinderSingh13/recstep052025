


<style>
    .hide {
        display: none;
    }
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
.invalid{
  background: #ffd6d6;
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
                       <button type="button" id="joinwithcode" class="btn btn-success btn-lg w-100" data-bs-toggle="modal" data-bs-target="#joinwith_teamcode">Join With Team Code</button>
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

                                        <div class="step-buttons bg-success py-2 ">
                                            <button type="button" class="btn btn-success btnclose">Cancel</button>
                                            <p class="text-white text-center mb-0 fs-5">Enter Code</p>
                                            <button type="button" class="btn btn-success next-btn">Continue</button>
                                        </div>

                                        <div class="p-3">
                                            <p class="text-dark text-center fs-4 mb-3">Enter the 9-Digit invite code you received from your team or Club Admin</p>
                                            <div class="mb-3">

                                               <input type="text" class="fs-4 code form-control form-control-lg border-0 border-bottom text-center" id="code" placeholder="999 999 999" maxlength="15" required>
                                           </div> 
                                           <button type="button" class="btn btn-success btn-lg next-btn w-100">Continue</button>                
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
                                          <input type="email" class="form-control border-0 border-bottom" id="floatingInput" placeholder="name@example.com" maxlength="30">
                                          <label for="floatingInput">Email</label>
                                      </div>
                                      <div class="form-floating mb-3">
                                          <input type=" email" class="form-control border-0 border-bottom" id="ConfirmfloatingInput" placeholder="name@example.com" maxlength="30">
                                          <label for="ConfirmfloatingInput">Confirm Email </label>
                                      </div>
                                      <div class="form-floating">
                                          <input type="password" class="form-control border-0 border-bottom" id="floatingPassword" placeholder="Password" maxlength="20">
                                          <label for="floatingPassword">Password</label>
                                      </div>   
                                      <div class="my-3">
                                          <a class="text-success mb-2 d-block" href="http://recstep.com/login">Already have an account? Login</a>
                                          <p class="text-dark fw-bold">This Should be your information. You will add your child/player later.</p>
                                      </div>
                                      <input type="hidden" id="uIdexist" value="">
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
                                              <input type="text" class="form-control border-0 border-bottom" id="fisrtnamefloatingInput" placeholder="First Name" required maxlength="20">
                                              <label for="fisrtnamefloatingInput">First Name</label>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-12 col-lg-6 col-md-12">
                                        <div class="form-floating mb-3">
                                          <input type="text" class="form-control border-0 border-bottom" id="lastnamefloatingInput" placeholder="Last Name" maxlength="20">
                                          <label for="lastnamefloatingInput">Last Name</label>
                                      </div>
                                  </div>
                              </div>


                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control border-0 border-bottom" id="phonefloatingInput" placeholder="(000) 000 0000" maxlength="11">
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
                                I agree to the <a class="text-success" id="termsAndConditions" href="">Term and Conditions</a> 

                            </label>
                        </div>

                        <button type="button" class="btn btn-success w-100 btn-lg next-btn">Create Account</button>

                    </div>
                    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header btn btn-success" >
                            <h5 class="modal-title " style="color: white!important" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="btn-close dummyContentclose"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Content will be inserted here dynamically -->
                            <div id="dummyContent" style="margin-top: 10px;">
                              <p>This is the dummy content for the Terms and Conditions.</p>
                              <p>More information about the terms and conditions can be added here.</p>
                          </div>
                      </div>
                  </div>
              </div>
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
    <input type="hidden" id="yesInput">
    <input type="hidden" id="checkInput">
    <div class="mb-3">
        <button class="btn btn-success btn-lg w-100 next-btn" type="button" id="checkyesButton">Yes</button>
    </div>
    <div>
        <button class="btn btn-light btn-lg w-100 next-btn" type="button" id="staffMember">No</button>
    </div>
</div>
</div>
<!-- Select your Role -->
<!-- Step 5A  for (YES)-->
<div class="step" id="step-5a ">
   <div class="step-buttons bg-success py-2">
    <button type="button" class="btn btn-success prev-btn">Back</button>
    <p class="text-white text-center mb-0 fs-5">Role</p>
    <button type="button" class="btn btn-success next-btn " style="visibility: hidden;">Next</button>
</div>
<div class="p-3">
    <p class="fs-4 fw-bold">Select your Role </p>
    <p>Select the role that best fits your position on the team.</p>
    <div class="select-role-list">
        <ul>
            <li>
                <a href="#" class="border-bottom d-block fs-5 mb-2 pb-2 next-btn">
                    <span class="me-3 text-success"><i class="fa fa-user-circle" aria-hidden="true"></i></span><span>Head Coach</span>
                </a>
            </li>
            <li>
                <a href="#" class="border-bottom d-block fs-5 mb-2 pb-2 next-btn">
                    <span class="me-3 text-success"><i class="fa fa-clock" aria-hidden="true"></i></span><span>Assistant Coach</span>
                </a>
            </li>
            <li>
                <a href="#" class="border-bottom d-block fs-5 mb-2 pb-2 next-btn">
                    <span class="me-3 text-success"><i class="fa fa-list-alt" aria-hidden="true"></i></span><span>Team Admin</span>
                </a>
            </li>
            <li>
                <a href="#" class="border-bottom d-block fs-5 mb-2 pb-2 next-btn">
                    <span class="me-3 text-success"><i class="fa fa-bullhorn" aria-hidden="true"></i></span><span>Staff Member</span>
                </a>
            </li>
        </ul>
    </div>    
</div>     
</div>

<!-- Are you also a guardian? -->
<!-- Step 5a1 -->
<div class="step" id="step-5a1">
       <div class="step-buttons bg-success py-2">
        <button type="button" class="btn btn-success prev-btn">Back</button>
        <p class="text-white text-center mb-0 fs-5">Role</p>

        <button type="button" class="btn btn-success next-btn" style="visibility: hidden;">Next</button>
    </div>
    <div class="p-3">
        <p class="fs-4 fw-bold">Are you also a guardian?</p>
        <p>Select yes if you have a child on the team.</p>
        <input type="hidden" id="yesInputGuardian">
        <div class="mb-3">
            <button class="btn btn-success btn-lg w-100 next-btn" type="button" id="yesButton">Yes</button>
        </div>
        <div class="">
            <button class="btn btn-success btn-lg w-100 " type="button" id="noButton">No</button>
        </div>
    </div>
</div>

<!-- Step 5B  for (NO)-->
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
<div class="step" id="step-6" style="min-height: 650px;">
    <div class="step-buttons bg-success py-2">
        <button type="button" class="btn btn-success prev-btn">Back</button>
        <p class="text-white  text-center mb-0 fs-5">Parent/Guardian</p>
        <button type="button" class="btn btn-success " id="isPlayerSkip" style="">Skip</button>
    </div>
    <p class="fs-4 fw-bold p-3 bg-light mb-0">Who is your child?</p>
    <div class="p-3">
        <ul class="your-child renderplayer">

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
                        <div id="listplayers">
                            No Player linked
                        </div>
                        <div id="noadminlinked">No admin Linked</div>
                        <p>Do you want to send a notification to the above account(s) requesting access to this player?</p>
                        <p>NOTE: You will have the chance to confirm your selection on the next screen before the notification will be sent. </p>
                        <div class="d-flex">
                            <button type="button" class="btn btn-success w-100 btn-lg py-4 rounded-0 btn-cancelreq">Cancel</button>
                            <button type="button" class="btn btn-success w-100 btn-lg py-4 border-start rounded-0 isConfirm" id="isConfirm" >Confirm</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ------------------ -->

        <div class="mt-3">   
            <button type="button" id="continueNext" class="btn btn-success w-100 btn-lg next-btn" disabled>Continue</button>
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
            <li id="teamname"></li>                
        </ul>

        <!-- Your Name -->
        <p class="fs-5 pb-1 border-bottom">Your Name</p>
        <ul class="yourname mb-4">
            <li id="username"></li>                
        </ul>

        <!-- Your Role -->
        <p class="fs-5 pb-1 border-bottom">Your Role</p>
        <ul class="yourrole mb-4">
            <li id="rolename"><a href="#"><span><span class="img bg-warning">PG</span class="rolename"> Parent/Guardian</span> </a></li>                
        </ul>

        <!-- Your Child -->
        <p class="fs-5 pb-1 border-bottom">Your Child</p>
        <ul class="yourchild mb-4">
            <li id="playername"><a href="#"><span><span class="img bg-info">NC</span class="playername">No Child Selected </span> </a></li>                
        </ul>


        <div class="mt-3">   
            <button type="button" id="finalSubmit" class="btn btn-success w-100 btn-lg next-btn">Submit</button>
        </div>
    </div>
</div>
<div class="step" id="step-8">
    <div class="step-buttons bg-success py-2">
        <button type="button" class="btn btn-success prev-btn">Back</button>
        <p class="text-white  text-center mb-0 fs-5">Everything Right?</p>
        <button type="button" class="btn btn-success next-btn" style="visibility: hidden;">Next</button>
    </div>
    <div class="p-3 text-center">
        <!-- Team -->
        <p class="fs-4 fw-bold">Successfully login</p>
        <p>Wait we will redirect to you dashboard.</p>
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
                        <input type="text" class="form-control" id="name" placeholder="Your Name" maxlength="20">
                        <label for="name">Your Name</label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" placeholder="Your Email" maxlength="30">
                        <label for="email">Your Email</label>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="form-floating">
                        <input type="phone" class="form-control" id="phone" placeholder="Phone" maxlength="10">
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
    let rolenameType = '';
   document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 0;
    const steps = document.querySelectorAll(".step");
    const indicators = document.querySelectorAll(".indicator");
    const nextButtons = document.querySelectorAll(".next-btn");
    const prevButtons = document.querySelectorAll(".prev-btn");
    let selectedPlayer_id = 0;
    let isPlayerSkipYes = 1;
    let Uid = ''; // Global variable to store Uid from Ajax response

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

    

    
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Function to validate phone number format
    function isValidPhone(phone) {
        const re = /^\d{10,15}$/;  // Adjust the length as per your requirement
        return re.test(phone);
    }

    // Next button functionality
    nextButtons.forEach(button => {
        button.addEventListener("click", function () {

            removeInvalidClass();
            if (checkInput === 'no') {
                const roleN = document.getElementById('rolename');
                if (roleN) {
                    roleN.innerHTML = '<a href="#"><span><span class="img bg-warning">PG</span> Parent/Guardian</span></a>';
                }
            }
            var matchId = document.getElementById("code").value;
            var email = document.getElementById("floatingInput").value;
            var cemail = document.getElementById("ConfirmfloatingInput").value;
            var password = document.getElementById("floatingPassword").value;
            var firstname = document.getElementById("fisrtnamefloatingInput").value;
            var lastname = document.getElementById("lastnamefloatingInput").value;
            var phone = document.getElementById("phonefloatingInput").value;
            var certifycheckbox = document.getElementById("flexCheckDefault").value;
            var checkagreeCheckDefault = document.getElementById("agreeCheckDefault").value;
            
            const isStaffMemberButton = button.id === 'staffMember';
            if (isStaffMemberButton) {
                // Skip directly to step 5 if button with ID 'staffMember' is clicked
                showStep(5);
            }

            

             var yesInputGuardian = document.getElementById("yesInputGuardian").value;
                                
            if (yesInputGuardian) {
                // Skip directly to step 5 if button with ID 'staffMember' is clicked
                console.log('check currentStep');
                console.log(currentStep);
                if(currentStep != 7){
                showStep(currentStep + 1);

                }
                console.log('after currentStep');
                console.log(currentStep);
            }
            const isPlayerSkip = button.id === 'isPlayerSkip';
            if (isPlayerSkip) {
                // Skip directly to step 5 if button with ID 'staffMember' is clicked
                selectedPlayer_id = 0;
                $('.player-item').removeClass('active');
                $('.player-item').css('background-color', '');
                $('.player-item a').css('color', '');
                const continueNextButtonT = document.getElementById('continueNext');
                continueNextButtonT.disabled = true;

                const playerListItemT = document.getElementById("playername");
                            if (playerListItemT) {
                                playerListItemT.innerHTML = `<a href="#"><span class="align-items-center d-flex"><span class="img bg-danger">NP</span class="playername"> No Player Selected</span> </a>`;
                            }

                isPlayerSkipYes = 'yes';
                let role = rolenameType;
                let roleWithUnderscores = role.replace(/\s+/g, "_");
                $.ajax({
                        url: '/globals-Team-Id/Details/Update/team/'+email+'/'+matchId+'/'+password+'/'+roleWithUnderscores+'/'+firstname + '/' + lastname + '/' + phone,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                // showStep(currentStep + 1); // Proceed to the next step or complete
                                if (response.team && response.team.name) {
                                    const teamListItem = document.getElementById("teamname");
                                    if (teamListItem) {
                                        const teamname = response.team.name.charAt(0).toUpperCase();
                                        teamListItem.innerHTML = `<a href="#"><span><span class="img bg-danger">${teamname}</span class="teamname"> ${response.team.name}</span> </a>`;
                                    }
                                }
                                

                                // Check if user name exists before assigning 
                                    const userListItem = document.getElementById("username");
                                    if (userListItem) {
                                       const userlastnames = lastname ? lastname.charAt(0).toUpperCase() : '';
                                       const usernames = firstname.charAt(0).toUpperCase();
                                       userListItem.innerHTML = `
                                       <a href="#">
                                        <span>
                                          <span class="img bg-danger">${usernames} ${userlastnames}</span>
                                          <span class="username">${firstname} ${lastname ? lastname : ''}</span>
                                      </span>
                                  </a>
                                  `;
                              }
                          

                    } else {
                        document.getElementById("code").classList.add("invalid");
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX error:', error);
                }
            });
            }
            if (button.id === 'finalSubmit') {
                let role = rolenameType;
                let roleWithUnderscores = role.replace(/\s+/g, "_");
                if(rolenameType){
                    var type = 'team';
                }else{
                    var type = 'admin';
                     roleWithUnderscores = 'admin';

                }
                $.ajax({
                        url: '/globals-Team-Id/Details/Update/team/store/'+type+'/'+email+'/'+matchId+'/'+selectedPlayer_id+'/'+password+'/'+roleWithUnderscores+'/'+firstname + '/' + lastname + '/' + phone,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                // showStep(currentStep + 1); // Proceed to the next step or complete
                              window.location.href = "http://recstep.com/club-management";

                    } else {
                        document.getElementById("code").classList.add("invalid");
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX error:', error);
                }
            });
            }

            if (currentStep === 0 && !matchId) {
                document.getElementById("code").classList.add("invalid");
                return;
            }
            if (currentStep === 0 && matchId) {

                var input = document.getElementById("code").value;
                    var maxLength = 16; // Set your character limit

                    if (input.length > maxLength) {
                        document.getElementById("code").classList.add("invalid");
                        alert("Character limit exceeded.");
                        this.value = input.substring(0, maxLength); // Truncate the input to the max length
                        return;
                    }
                }

            // Step 2: Email validation
                if (currentStep === 1 && (!email || !isValidEmail(email))) {
                    document.getElementById("floatingInput").classList.add("invalid");
                    return;
                }
                if (currentStep === 1 && (!cemail)) {
                    document.getElementById("ConfirmfloatingInput").classList.add("invalid");
                    return;
                }
                const parentElements = document.getElementById("ConfirmfloatingInput").parentNode;
                const existingErrorMessages = parentElements.querySelector('.text-danger');
                if (existingErrorMessages) {
                    parentElements.removeChild(existingErrorMessages);
                }
                if (currentStep === 1 && (email != cemail)) {
                    document.getElementById("floatingInput").classList.add("invalid");
                    document.getElementById("ConfirmfloatingInput").classList.add("invalid");
                    const parentElements = document.getElementById("ConfirmfloatingInput").parentNode;
                    const existingErrorMessages = parentElements.querySelector('.text-danger');
                    if (existingErrorMessages) {
                        parentElements.removeChild(existingErrorMessages);
                    }
                    let errorMessages = document.createElement("p");
                errorMessages.textContent = "Emails not matched"; // Set the error message text
                errorMessages.classList.add("text-danger"); // Add a class for styling

                // Append the <p> tag after the input field
                parentElements.appendChild(errorMessages);
                return;
            }

            if (currentStep === 1 && !password) {
                document.getElementById("floatingPassword").classList.add("invalid");
                return;
            }

            // Step 3: First name and Phone validation
            if (currentStep === 2 && (!firstname)) {
                document.getElementById("fisrtnamefloatingInput").classList.add("invalid");
                return;
            }
            if (currentStep === 2 && (!lastname)) {
                document.getElementById("lastnamefloatingInput").classList.add("invalid");
                return;
            }
            if (currentStep === 2 && (!phone || !isValidPhone(phone))) {
                document.getElementById("phonefloatingInput").classList.add("invalid");
                return;
            }
            if (currentStep === 2) {
                const certifycheckbox = document.getElementById("flexCheckDefault");
                const checkagreeCheckDefault = document.getElementById("agreeCheckDefault");

                // Certify Checkbox Validation
                if (!certifycheckbox.checked) {
                    certifycheckbox.classList.add("invalid");

                    // Clear any existing error message before adding a new one
                    const parentElement = certifycheckbox.parentNode;
                    let existingError = parentElement.querySelector('.text-danger');
                    if (existingError) {
                        parentElement.removeChild(existingError);
                    }

                    let errorMessage = document.createElement("p");
                    errorMessage.textContent = "You must certify before proceeding";
                    errorMessage.classList.add("text-danger");
                    parentElement.appendChild(errorMessage);

                    return; // Prevent further action if checkbox is not checked
                } else {
                    // If checked, remove the error class and message
                    certifycheckbox.classList.remove("invalid");
                    const parentElement = certifycheckbox.parentNode;
                    let existingError = parentElement.querySelector('.text-danger');
                    if (existingError) {
                        parentElement.removeChild(existingError);
                    }
                }

                // Agree Checkbox Validation
                if (!checkagreeCheckDefault.checked) {
                    checkagreeCheckDefault.classList.add("invalid");

                    // Clear any existing error message before adding a new one
                    const parentElement = checkagreeCheckDefault.parentNode;
                    let existingError = parentElement.querySelector('.text-danger');
                    if (existingError) {
                        parentElement.removeChild(existingError);
                    }

                    let errorMessage = document.createElement("p");
                    errorMessage.textContent = "You must read before proceeding";
                    errorMessage.classList.add("text-danger");
                    parentElement.appendChild(errorMessage);

                    return; // Prevent further action if checkbox is not checked
                } else {
                    // If checked, remove the error class and message
                    checkagreeCheckDefault.classList.remove("invalid");
                    const parentElement = checkagreeCheckDefault.parentNode;
                    let existingError = parentElement.querySelector('.text-danger');
                    if (existingError) {
                        parentElement.removeChild(existingError);
                    }
                }
            }
            if (currentStep < steps.length - 1) {
                if (matchId && !email && !firstname) {
                    // Ajax call to check team ID
                    $.ajax({
                        url: '/check-team-id/' + matchId,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                showStep(currentStep + 1); // Proceed to the next step
                                renderPlayers(response.players); // Render players based on response

                            } else {
                                var inputElement = document.getElementById("code");
                                inputElement.classList.add("invalid");
                                var errorMessage = document.getElementById("error-message");
                                if (errorMessage) {
                                    errorMessage.remove();
                                }
                                errorMessage = document.createElement("div");
                                errorMessage.id = "error-message";
                                errorMessage.className = "text-danger";
                                errorMessage.innerText = response.message;
                                inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
                                return false;
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                } else if (email && !firstname) {
                    // Ajax call to store user details
                    var pass = document.getElementById("floatingPassword").value;
                    $.ajax({
                        url: '/global-team-id/store/' + email + '/' + pass + '/' + matchId,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                showStep(currentStep + 1); // Proceed to the next step
                            } else {
                                document.getElementById("code").classList.add("invalid");
                                if(response.email){
                                    document.getElementById("floatingInput").classList.add("invalid");
                                    const parentElement = document.getElementById("floatingInput").parentNode;
                                    const existingErrorMessage = parentElement.querySelector('.text-danger');
                                    if (existingErrorMessage) {
                                        parentElement.removeChild(existingErrorMessage);
                                    }
                                    let errorMessage = document.createElement("p");
                                        errorMessage.textContent = "Email already exists"; // Set the error message text
                                        errorMessage.classList.add("text-danger"); // Add a class for styling

                                        // Append the <p> tag after the input field
                                        parentElement.appendChild(errorMessage);

                                    }
                                    return false;
                                }
                            },
                            error: function (xhr, status, error) {
                                console.log('AJAX error:', error);
                            }
                        });
                } else if (firstname && document.getElementById("yesInput").value !== 'yes') {
                    // Ajax call to update user details
                    var lastname = document.getElementById("lastnamefloatingInput").value;
                    var phone = document.getElementById("phonefloatingInput").value;
                    $.ajax({
                        url: '/global-Team-Id/Details/Update/' + firstname + '/' + lastname + '/' + phone + '/' + '121',
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                document.getElementById("yesInput").value = 'yes';
                                showStep(currentStep + 1); // Proceed to the next step
                            } else {
                                document.getElementById("code").classList.add("invalid");
                                return false;
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log('AJAX error:', error);
                        }
                    });
                } else if (document.getElementById("yesInput").value === 'yes' && selectedPlayer_id) {
                    // Ajax call to update player ID
                    $.ajax({
                        url: '/globals-Team-Id/Details/Update/player_id/'+email+'/'+matchId+'/'+selectedPlayer_id+'/'+password+'/'+firstname + '/' + lastname + '/' + phone,
                        type: 'GET',
                        success: function (response) {
                            if (response.status === 'success') {
                                showStep(currentStep + 1); // Proceed to the next step or complete
                                if (response.team && response.team.name) {
                                    const teamListItem = document.getElementById("teamname");
                                    if (teamListItem) {
                                        const teamname = response.team.name.charAt(0).toUpperCase();
                                        teamListItem.innerHTML = `<a href="#"><span><span class="img bg-danger">${teamname}</span class="teamname"> ${response.team.name}</span> </a>`;
                                    }
                                }
                                

                                // Check if user name exists before assigning and update span
                                 const userListItem = document.getElementById("username");
                                    if (userListItem) {
                                       const userlastnames = lastname ? lastname.charAt(0).toUpperCase() : '';
                                       const usernames = firstname.charAt(0).toUpperCase();
                                       userListItem.innerHTML = `
                                       <a href="#">
                                        <span>
                                          <span class="img bg-danger">${usernames} ${userlastnames}</span>
                                          <span class="username">${firstname} ${lastname ? lastname : ''}</span>
                                      </span>
                                  </a>
                                  `;
                              }

                                // Check if player name exists before assigning and update span
                          if (response.player && response.player.name) {
                            const playerListItem = document.getElementById("playername");
                            if (playerListItem) {
                                const playernames = response.player.name.charAt(0).toUpperCase();
                                playerListItem.innerHTML = `<a href="#"><span class="align-items-center d-flex"><span class="img bg-danger">${response.player.picture ? `<img src="${response.player.picture}" style="width: 100%;border-radius: 50%;" >` : `${playernames}`}</span class="playername"> ${response.player.name}</span> </a>`;
                            }
                        }

                    } else {
                        document.getElementById("code").classList.add("invalid");
                        return false;
                    }
                },
                error: function (xhr, status, error) {
                    console.log('AJAX error:', error);
                }
            });
                } else {
                    showStep(currentStep + 1); // Proceed without Ajax call
                }
            }
        });
});

    // Previous button functionality
prevButtons.forEach(button => {
    button.addEventListener("click", function () {
        if (currentStep > 0) {
             var yesInputGuardian = document.getElementById("yesInputGuardian").value;
                   if (checkInput === 'no') {
                        const roleN = document.getElementById('rolename');
                        if (roleN) {
                            roleN.innerHTML = '<a href="#"><span><span class="img bg-warning">PG</span> Parent/Guardian</span></a>';
                        }
                    }   

                console.log(currentStep);
            if (yesInputGuardian == 'yes') {
                // Skip directly to step 5 if button with ID 'staffMember' is clicked
                if(currentStep == 8){
                    showStep(currentStep - 1);

                }else{
                    showStep(currentStep - 2);

                }
             var yesInputGuardian = document.getElementById("yesInputGuardian").value = '';
            }else{
             var checkInput = document.getElementById("checkInput").value;
             if(checkInput == 'no'){
                if(currentStep == 6){
                    showStep(currentStep - 3);

                }else{
                    showStep(currentStep - 1);

                }
             }else{

                showStep(currentStep - 1);
             }

            }
             var checkInputs = document.getElementById("checkInput").value;
             if(checkInputs == 'yes'){
                if(currentStep == 6){
                showStep(currentStep - 1);

                }
                console.log('this');
                console.log(currentStep);
             }
        }
    });
});

    // Render players function (based on Ajax response)
function renderPlayers(players) {
    var playerContainer = document.querySelector('.renderplayer');
        playerContainer.innerHTML = ''; // Clear existing players
        const playersListContainer = document.getElementById('listplayers');
        playersListContainer.innerHTML = '';
        if (players.length === 0) {
            let noPlayerMessage = document.createElement('p');
            noPlayerMessage.textContent = "No players linked";
            playerContainer.appendChild(noPlayerMessage);
        } else {
            players.forEach(function (player) {
                const firstLetter = player.name.charAt(0).toUpperCase();
                const secondLetter = player.name.split(' ')[1]?.charAt(0).toUpperCase() || '';
                var playerDiv = document.createElement('li');
                playerDiv.classList.add('player-item');
                playerDiv.setAttribute('id', `selectedPId${player.id}`);
                playerDiv.setAttribute('onclick', `selectedPlayer(${player.id}, selectedPId${player.id})`);
                playerDiv.innerHTML = `<a href="#" data-bs-toggle="modal" data-bs-target="#requestaccess"><span class="align-items-center d-flex"><span class="img">${player.picture ? `<img src="${player.picture}" style="width: 100%;border-radius: 50%;">` : `${firstLetter}${secondLetter}`}</span> ${player.name.charAt(0).toUpperCase() + player.name.slice(1).toLowerCase()} </span> <span><i class="fa fa-angle-right"></i></span> </a>`;
                playerContainer.appendChild(playerDiv);
                if (player.administrator.length > 0) {
                    const divContainer = document.createElement('div');
                    divContainer.classList.add('hide');
                    divContainer.classList.add(`listplayer${player.id}`);

                    player.administrator.forEach(function (admin) {
                        if (admin.user) {
                            const playerParagraph = document.createElement('p');
                            playerParagraph.classList.add('border-bottom');
                            playerParagraph.classList.add('fw-bold');
                            playerParagraph.classList.add('mb-2');
                            playerParagraph.classList.add('p-2');
                            playerParagraph.textContent = `${admin.user.name.toUpperCase()}`; // Capitalize admin name
                            divContainer.appendChild(playerParagraph);
                        }
                    });

                    playersListContainer.appendChild(divContainer);
                    $('#noadminlinked').hide();
                }else {
                 const divContainer = document.createElement('div');
                 divContainer.classList.add('hide');
                 divContainer.classList.add(`listplayer${player.id}`);


                 const playerParagraph = document.createElement('p');
                 playerParagraph.classList.add('border-bottom');
                 playerParagraph.classList.add('fw-bold');
                 playerParagraph.classList.add('mb-2');
                 playerParagraph.classList.add('p-2');
                                playerParagraph.textContent = `No admin linked`; // Capitalize admin name
                                divContainer.appendChild(playerParagraph);


                                playersListContainer.appendChild(divContainer);
                    // If no admins are linked, show a message

                            }
                        });
        }
    }

    function removeInvalidClass() {
        const invalidFields = document.querySelectorAll(".invalid");
        invalidFields.forEach((field) => {
            field.classList.remove("invalid");
        });
    }

    // Function to select player and update global variable
    window.selectedPlayer = function (playerId) {
        selectedPlayer_id = playerId;
        $('.player-item').removeClass('active');
        $('.player-item').css('background-color', '');
        $('.player-item a').css('color', '');
        $('#selectedPId' + playerId).addClass('active');
        $('#listplayers div').hide();
        $('.listplayer' + playerId).show();
        $('.listplayer' + playerId+' p').css({'border-bottom':'1px solid #24b570'});
        $('#selectedPId' + playerId).css({'background-color': '#23b56f', 'color': 'white'});
        $('#selectedPId' + playerId+' a').css({'color': 'white'});
    }

    // Function to populate confirmation step with form data
    function populateConfirm() {
        document.getElementById("confirm-firstName").textContent = document.getElementById("firstName").value;
        document.getElementById("confirm-lastName").textContent = document.getElementById("lastName").value;
        document.getElementById("confirm-email").textContent = document.getElementById("email").value;
        document.getElementById("confirm-phone").textContent = document.getElementById("phone").value;
    }

    // document.getElementById("finalSubmit").addEventListener("click", function() {
    //     window.location.href = "http://recstep.com/club-management";
    // });

});

document.querySelector('.btn-cancelreq').addEventListener('click', function() {
    const modal = document.getElementById('requestaccess');  // Replace 'yourModalId' with the actual modal's ID
    modal.style.display = 'none';  // Hide the modal
});

document.querySelector('.isConfirm').addEventListener('click', function() {
    const modal = document.getElementById('requestaccess');
    modal.style.display = 'none';  

    const continueNextButton = document.getElementById('continueNext');
    continueNextButton.disabled = false;
});
document.querySelector('.dummyContentclose').addEventListener('click', function() {
    const modal = document.getElementById('termsModal');
    modal.style.display = 'none'; 
});

document.querySelector('.btnclose').addEventListener('click', function() {

    document.getElementById('joinwithcode').click(); 
});


document.getElementById('termsAndConditions').addEventListener('click', function (e) {
    e.preventDefault();  // Prevent the default anchor behavior

    // Show the modal (Bootstrap modal functionality)
    var myModal = new bootstrap.Modal(document.getElementById('termsModal'), {
        keyboard: true
    });
    myModal.show();

    // Optionally, you can dynamically load content if needed, but here we just display the hidden content
    document.getElementById('dummyContent').style.display = 'block';  // Make sure the content is visible
});

</script>

<script>
    let selectedRole = '';

// Add an event listener to all list items
document.querySelectorAll('ul li a').forEach(function (item) {
    item.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Get the text of the clicked item and trim any extra whitespace
        selectedRole = this.querySelector('span:nth-of-type(2)').textContent.trim();

        // For debugging purposes, you can log the selected role
        console.log('Selected Role:', selectedRole);

        // Optionally, add a visual indicator for the selected item
        document.querySelectorAll('ul li a').forEach(function (link) {
            link.classList.remove('active'); // Remove 'active' class from all items
        });
        this.classList.add('active'); // Add 'active' class to the clicked item

        // Append the selected role to the element with id "rolename"
        const roleElement = document.getElementById('rolename');
        if (roleElement) {
            const first = selectedRole.charAt(0).toUpperCase();
                const second = selectedRole.split(' ')[1]?.charAt(0).toUpperCase() || '';
            roleElement.innerHTML = '<a href="#"><span><span class="img bg-warning">'+first+''+second+'</span> ' + selectedRole + '</span></a>';
        }
        rolenameType = selectedRole;
    });
});
</script>
<script>
    document.getElementById("yesButton").addEventListener("click", function() {
        document.getElementById("yesInputGuardian").value = "yes";
    });

    document.getElementById("noButton").addEventListener("click", function() {
        document.getElementById("yesInputGuardian").value = "no";
    });

    if (checkInput === 'no') {
        const roleN = document.getElementById('rolename');
        if (roleN) {
            roleN.innerHTML = '<a href="#"><span><span class="img bg-warning">PG</span> Parent/Guardian</span></a>';
        }
    }
</script>
<script>
    // Event listener for the "Yes" button
    document.getElementById('checkyesButton').addEventListener('click', function() {
        document.getElementById('checkInput').value = 'yes';
        document.getElementById('isPlayerSkip').innerText = 'Skip';
    });

    // Event listener for the "No" button
    document.getElementById('staffMember').addEventListener('click', function() {
        document.getElementById('checkInput').value = 'no';
        document.getElementById('isPlayerSkip').innerText = '';
        const roleN = document.getElementById('rolename');
        if (roleN) {
            roleN.innerHTML = '<a href="#"><span><span class="img bg-warning">PG</span> Parent/Guardian</span></a>';
        }
    });

    if (checkInput === 'no') {
        const roleN = document.getElementById('rolename');
        if (roleN) {
            roleN.innerHTML = '<a href="#"><span><span class="img bg-warning">PG</span> Parent/Guardian</span></a>';
        }
    }
</script>



