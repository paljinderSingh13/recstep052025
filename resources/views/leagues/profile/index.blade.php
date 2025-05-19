@extends('leagues.layouts.master')
@section('content')

<div class="content-body" >

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class=" shadow-sm border rounded mb-3">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Welcome to League</h4>
                    </div>
                    <div class="card-body">
                        <p>Thank you for joining League. Now lets get you started. Complete the following steps below</p>
                    </div>
                </div>
                <div class="shadow-sm border rounded ">
                  <div class="card-header border-bottom">
                    <h4 class="card-title">League Activity</h4>

                </div>
                <div class="card-body p-0">
                @foreach($leagueLogs as $logs)
                <div class="row m-auto p-4 bg-primary-light">
                    <div class="col-12 col-lg-1 col-md-12 col-sm-12 px-0">
                        <div>
                            <img style="width: 80px;" src="{{asset($logs->user['profile_picture'])}}" class="img-fluid mt-1 rounded-circle" alt="Responsive image">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
                      <h3 class="text-primary mb-0">{{$logs->user['name']}}</h3>
                      <p class="small mb-0">{{$logs['type']}}</p>
                      <p class="mb-0">{{$logs['title']}}</p>
                      @if(!empty($logs['link']))
                          <a href="{{$logs['link']}}" class="btn btn-sm btn-primary">{{$logs['link_title']}}</a>
                          @endif
                    </div>
                    <div class="col-12 col-lg-3 col-md-12 col-sm-12">
                        <div class="text-end">
                            <p class="mb-0">{{ date('M d Y, h:i A', strtotime($logs['created_at'])) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

          <!-- <div class="row m-auto p-4 ">
              <div class="col-12 col-lg-1 col-md-12 col-sm-12 px-0">
                <div>
                    <img style="width: 80px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-1 rounded-circle" alt="Responsive image">
                </div>
            </div>
            <div class="col-12 col-lg-8 col-md-12 col-sm-12">
              <h3 class="text-primary mb-0">John Deo</h3>
              <p class="small mb-0">Commissioner</p>
              <p class="">National American was added as a new team.</p>
              <button class="btn btn-sm btn-primary">View Team</button>
          </div>
          <div class="col-12 col-lg-3 col-md-12 col-sm-12">
             <div class="text-end">
              <p class="mb-0">Apr 09 2025, 11:11 PM</p>
          </div>
      </div>
  </div> -->

 <!--  <div class="row m-auto p-4 bg-primary-light">
      <div class="col-12 col-lg-1 col-md-12 col-sm-12 px-0">
        <div>
            <img style="width: 80px;" src="https://recstep.com/profile_pictures/1742038516_player.jpg" class="img-fluid mt-1 rounded-circle" alt="Responsive image">
        </div>
    </div>
    <div class="col-12 col-lg-8 col-md-12 col-sm-12">
      <h3 class="text-primary mb-0">John Deo</h3>
      <p class="small mb-0">Commissioner</p>
      <p class="mb-0">A new season was created! Spring 2025</p>
  </div>
  <div class="col-12 col-lg-3 col-md-12 col-sm-12">
     <div class="text-end">
      <p class="mb-0">Apr 09 2025, 11:11 PM</p>
  </div>
</div>
</div> -->

</div>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
    <div class="right-sidebar">
        <div class="card shadow-sm">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">My Schedule</h4>
            </div>
            <div class="card-body p-0">
                <div class="row m-auto p-3 bg-primary-light">
                   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
                    <div class="text-center p-2 bg-white border rounded-1">
                        <img style="width: 40px;" src="https://recstep.com/pictures/leagimg.png" class="img-fluid " alt="Responsive image">
                    </div>
                </div>
                <div class="col-12 col-lg-10 col-md-12 col-sm-12">                    
                 <h4 class="text-primary mb-0">Black @ White</h4>
                 <p class="mb-0">Sep 28, 2025 07:00 PM Rink 1</p>                   
             </div>
         </div>
         <div class="row m-auto p-3">
           <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
            <div class="text-center p-2 bg-white border rounded-1">
                <img style="width: 40px;" src="https://recstep.com/pictures/leagimg.png" class="img-fluid " alt="Responsive image">
            </div>
        </div>
        <div class="col-12 col-lg-10 col-md-12 col-sm-12">                    
         <h4 class="text-primary mb-0">Black @ White</h4>
         <p class="mb-0">Sep 29, 2025 09:00 PM Rink 3</p>                   
     </div>
 </div>
 <div class="row m-auto p-3 bg-primary-light">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div class="text-center p-2 bg-white border rounded-1">
        <img style="width: 40px;" src="https://recstep.com/pictures/leagimg.png" class="img-fluid " alt="Responsive image">
    </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">                    
 <h4 class="text-primary mb-0">Black @ White</h4>
 <p class="mb-0">Sep 29, 2025 05:00 PM Rink 2</p>                   
</div>
</div>

</div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-primary">
        <h4 class="card-title text-white">My Leagues and Teams</h4>
    </div>
    <div class="card-body p-0">
        <p class="p-3">Commissioner in Leagues</p>
        <div class="row m-auto p-3 border-bottom">
           <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
            <div class="text-center p-2 bg-white border rounded-1">
                <img style="width: 40px;" src="https://recstep.com/pictures/leagimg.png" class="img-fluid " alt="Responsive image">
            </div>
        </div>
        <div class="col-12 col-lg-10 col-md-12 col-sm-12">                    
         <h4 class="text-primary mb-0">Football</h4>
         <p class="mb-0">Commissioner</p>
         <a href="#" class="text-primary">Commissioner Tools</a>                   
     </div>
 </div>
 <div class="row m-auto p-3">
   <div class="col-12 col-lg-2 col-md-12 col-sm-12 px-0">
    <div class="text-center p-2 bg-white border rounded-1">
        <img style="width: 40px;" src="https://recstep.com/pictures/leagimg.png" class="img-fluid " alt="Responsive image">
    </div>
</div>
<div class="col-12 col-lg-10 col-md-12 col-sm-12">                    
 <h4 class="text-primary mb-0">Basketball44</h4>
 <p class="mb-0">Commissioner</p>                   
 <a href="#" class="text-primary">Commissioner Tools</a>                   
</div>
</div>
<div class="row m-auto p-3 bg-primary-light">
   <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
        <button class="btn btn-primary w-100"><span><i class="las la-plus"></i></span> Create or Join a League</button>
   </div>
</div>



</div>
</div>

</div>


</div>

@endsection