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
                            <div class="col-md-12">
                                <form id="regForm">
                                    <div style="overflow:auto;" id="nextprevious">
                                        <div class="bg-success d-flex justify-content-between "> 
                                            <button class="btn btn-primary btn-lg rounded-0" type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button> 
                                            <button class="btn btn-primary btn-lg rounded-0" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>

                                    <div class="all-steps d-none" id="all-steps">
                                       <span class="step"></span> <span class="step"></span> <span class="step"></span> 
                                       <span class="step"></span><span class="step"></span> 
                                   </div>
                                   <div class="tab">
                                    <div class="bg-success pb-2 mb-2">
                                        <p class="text-white text-center mb-0 fs-4">Enter Code</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="text-dark text-center fs-4 mb-3">Enter the 9-Digit invite code you received from your team ot Club Admin</p>
                                        <div class="mb-3">

                                           <input type="text" class="fs-4 code form-control form-control-lg border-0 border-bottom text-center" id="code" placeholder="999 999 999">
                                       </div>
                                       <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">Countinue</button>
                                   </div>
                               </div>
                               <div class="tab">
                                <div class="bg-success pb-2 mb-2">
                                    <p class="text-white text-center mb-0 fs-4">Create Account</p>
                                </div>
                                <div class="px-3"> 
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
                                  <div class="mt-3">
                                      <a class="text-success" href="http://recstep.com/login">Already have an account? Login</a>
                                  </div>
                                  <div class="mt-3">
                                   <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">Countinue</button> 
                               </div>
                           </div>

                       </div>
                       <div class="tab">
                        <div class="bg-success pb-2 mb-2">
                            <p class="text-white text-center mb-0 fs-4">Create Account</p>
                        </div>
                        <div class="px-3">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control border-0 border-bottom" id="fisrtnamefloatingInput" placeholder="First Name">
                              <label for="fisrtnamefloatingInput">First Name</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control border-0 border-bottom" id="lastnamefloatingInput" placeholder="Last Name">
                              <label for="lastnamefloatingInput">Last Name</label>
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
                    <div class="">
                       <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">Create Account</button> 
                   </div>
               </div>
           </div>
           <div class="tab">
            <div class="bg-success pb-2 mb-2">
                <p class="text-white text-center mb-0 fs-4">Role</p>
            </div>
            <h4>Are you a staff member?</h4>
            <p>Select yes if you are a coach, manager, team admin, or other staff member.</p>
            <input type="hidden" id="yesInput" >
            <div class="mb-2">
                <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">Yes</button> 
            </div>
            <div class="mb-2">
               <!-- <button class="btn btn-light btn-lg w-100" type="button" >No</button>  -->
           </div>
       </div>
         <div class="tab">
            <div class="bg-success pb-2 mb-2">
                <p class="text-white text-center mb-0 fs-4">Role</p>
            </div>
            <h4>What's your  role?</h4>
            <p>Please specify if you are a guardian or a player joining the team with your own cell phone.</p>
            <div class="mb-2">
                <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">I am a Guardian/Parent</button> 
            </div>
            <div class="mb-2">
               <button class="btn btn-light btn-lg w-100" type="button" >I am a Player</button> 
           </div>
       </div>
       <div class="tab">
            <div class="bg-success pb-2 mb-2">
                <p class="text-white text-center mb-0 fs-4">Parent/Guardian</p>
            </div>
            <h4>who is your child?</h4>
            <div class="renderplayer player-list">
              
            </div>
            <div class="mb-2">
                <button class="btn btn-primary btn-lg w-100" type="button" id="nextBtn" onclick="nextPrev(1)">Continue</button> 
            </div>
            <div class="mb-2">
              <!--  <button class="btn btn-light btn-lg w-100" type="button" >I am a Player</button>  -->
           </div>
       </div>

       <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
        <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
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



<script type="text/javascript">
    //your javascript goes here
    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function(event) {


        showTab(currentTab);

    });

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        fixStepIndicator(n)
    }

        var Uid = '';
        var currentTab = 0;
        var selectedPlayer_id = 0;
    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        var matchId = document.getElementById("code").value;
        var email = document.getElementById("floatingInput").value;
        var fisrtname = document.getElementById("fisrtnamefloatingInput").value;
        
        if(matchId && !email && !fisrtname){

          $.ajax({
              url: '/check-team-id/' + matchId,
              type: 'GET',
              success: function(response) {
                      console.log(response);
                  if (response.status === 'success') {
                      var match = true;
                      if (n == 1 && !validateForm()) return false;
                          x[currentTab].style.display = "none";

                          currentTab = currentTab + n;
                          
                          showTab(currentTab);
                           var players = response.players;  // Assuming response contains 'players'
                          var playerContainer = document.querySelector('.renderplayer'); // Assuming class 'renderplayer'
                          
                          // Clear the container first
                          playerContainer.innerHTML = '';

                          // Loop through each player and render
                          players.forEach(function(player) {
                              var playerDiv = document.createElement('ul');
                              playerDiv.classList.add('player-info');
                              playerDiv.innerHTML = `<li class="player-item" id="selectedPId${player.id}"  onclick="selectedPlayer(${player.id},selectedPId${player.id})">${player.name} - ${player.type}</li>`; // Modify according to your player data structure
                              playerContainer.appendChild(playerDiv);
                          });
                      // Perform actions based on match data
                  } else {
                      var match = false;
                      var inputElement = document.getElementById("code");
                      inputElement.classList.add("invalid");
                    return false
                      console.log('Error:', response.message);
                  }
              },
              error: function(xhr, status, error) {
                  console.log('AJAX error:', error);
              }
          });

        }
        if(email && !fisrtname){

            var email = document.getElementById("floatingInput").value;
            var confirmEmail = document.getElementById("ConfirmfloatingInput").value;
            var pass = document.getElementById("floatingPassword").value;
            var fisrtname = document.getElementById("fisrtnamefloatingInput").value;
            if(email != confirmEmail){
              var errEmail = document.getElementById("floatingInput");
                  errEmail.classList.add("invalid");
              var errCEmail = document.getElementById("ConfirmfloatingInput");
                  errCEmail.classList.add("invalid");
              return false;
            }
          $.ajax({
              url: '/global-team-id/store/'+email+'/'+pass+'/'+matchId,
              type: 'GET',
              success: function(response) {
                      console.log(response);
                  if (response.status === 'success') {
                      Uid = response.uId;
                      var match = true;
                      if (n == 1 && !validateForm()) return false;
                          x[currentTab].style.display = "none";

                          currentTab = currentTab + n;
                         
                          showTab(currentTab);
                      // Perform actions based on match data
                  } else {
                      var match = false;
                      var inputElement = document.getElementById("code");
                      inputElement.classList.add("invalid");
                    return false
                      console.log('Error:', response.message);
                  }
              },
              error: function(xhr, status, error) {
                  console.log('AJAX error:', error);
              }
          });
        }
           var yesInputCheck =  document.getElementById("yesInput").value;
        if(fisrtname && yesInputCheck != 'yes'){
            var firstname = document.getElementById("fisrtnamefloatingInput").value;
            var lastname = document.getElementById("lastnamefloatingInput").value;
            var phone = document.getElementById("phonefloatingInput").value;
          $.ajax({
              url: '/global-Team-Id/Details/Update/'+firstname+'/'+lastname+'/'+phone+'/'+Uid,
              type: 'GET',
              success: function(response) {
                      console.log(response);
                  if (response.status === 'success') {
                          x[currentTab].style.display = "none";
                          currentTab = currentTab + n;
            document.getElementById("yesInput").value = 'yes';
                          
                          showTab(currentTab);
                      // Perform actions based on match data
                  } else {
                      var match = false;
                      var inputElement = document.getElementById("code");
                      inputElement.classList.add("invalid");
                    return false
                      console.log('Error:', response.message);
                  }
              },
              error: function(xhr, status, error) {
                  console.log('AJAX error:', error);
              }
          });
        }
        if(yesInputCheck == 'yes' && selectedPlayer_id){
            var firstname = document.getElementById("fisrtnamefloatingInput").value;
            var lastname = document.getElementById("lastnamefloatingInput").value;
            var phone = document.getElementById("phonefloatingInput").value;
          $.ajax({
              url: '/global-Team-Id/Details/Update/player_id/'+Uid+'/'+selectedPlayer_id,
              type: 'GET',
              success: function(response) {
                      console.log(response);
                  if (response.status === 'success') {
                          x[currentTab].style.display = "none";
                          currentTab = currentTab + n;
                          if (currentTab >= x.length) {
                          // document.getElementById("regForm").submit();
                          // return false;
                          //alert("sdf");
                              document.getElementById("nextprevious").style.display = "none";
                              document.getElementById("all-steps").style.display = "none";
                              document.getElementById("register").style.display = "none";
                              document.getElementById("text-message").style.display = "block";

                          }
                          showTab(currentTab);
                      // Perform actions based on match data
                  } else {
                      var match = false;
                      var inputElement = document.getElementById("code");
                      inputElement.classList.add("invalid");
                    return false
                      console.log('Error:', response.message);
                  }
              },
              error: function(xhr, status, error) {
                  console.log('AJAX error:', error);
              }
          });
        }
           var yesInputCheck =  document.getElementById("yesInput").value;
        if(yesInputCheck == 'yes'){
          
                          x[currentTab].style.display = "none";
                          currentTab = currentTab + n;
                          if (currentTab >= x.length) {
                          // document.getElementById("regForm").submit();
                          // return false;
                          //alert("sdf");
                              document.getElementById("nextprevious").style.display = "none";
                              document.getElementById("all-steps").style.display = "none";
                              document.getElementById("text-message").style.display = "block";

                          }
                          showTab(currentTab);
                      // Perform actions based on match data
                  }
        
    }

    function selectedPlayer(playerId,sId) {
      selectedPlayer_id = playerId;
      $('.player-item').removeClass('active');
      $('#selectedPId'+playerId).addClass('active');
    }

     function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += " invalid";
                valid = false;
            }
        }
        if (valid) { document.getElementsByClassName("step")[currentTab].className += " finish"; }
        return valid;
    }

    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
            x[n].className += " active";
    }
</script>

