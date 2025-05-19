@extends('leagues.layouts.master')

@section('content')
@php
      $slug = session('slug');
      if (!$slug) {
          $slug = 'url';
      }
  @endphp
<!-- Dashboard page -->
<div class="content-body ">
    <section class="pb-4">
        <div class="container">
            <div class="row">
                <div class=" col-lg-8 col-md-12 col-sm-12 col-12 mb-4 mb-lg-0">
                    
                    <div class="shadow-sm border rounded mb-4">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">News/Announcements</h4>

                        </div>
                        <div class="card-body">
                           <div class="">
                            <h3>Welcome to your new league!!</h3>
                            <p>You've made it through the sign up process and now you're ready to get going. Leageez is a powerful system that should handle all the needs of your league. As a commissioner you have full power to manage divisions, teams, rosters, schedules and more.</p>
                            <p>You've made it through the sign up process and now you're ready to get going. Leageez is a powerful system that should handle all the needs of your league. As a commissioner you have full power to manage divisions, teams, rosters, schedules and more.</p>
                            <a href="{{route('commissioner.index',$slug)}}" class="btn btn-primary"> View Commissioner Tools</a>
                        </div>
                    </div>
                </div>
                <div class="shadow-sm border rounded ">
                  <div class="card-header border-bottom">
                    <h4 class="card-title">League Activity</h4>

                </div>
               @foreach($leagueLogs as $logs)
                <div class="card-body p-0">
                 
                          <div class="row m-auto p-4 bg-primary-light">
                              <div class="col-12 col-lg-1 col-md-12 col-sm-12">
                                <div>
                                 <img style="width: 80px;" src="{{asset($logs->user['profile_picture'])}}" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
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
          </div>
          @endforeach
</div>

</div>
<div class="col-12 col-lg-4 col-md-12 col-sm-12 mb-4 mb-lg-0">
    <div class="right-sidebar">
        <div class="shadow-sm border rounded mb-3 ">
            <div class="card-header bg-primary rounded-top">
                <div class="card-title">
                    <h4 class="text-white mb-0">Apr 23, 2025 08:00 AM</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="p-3">
                    <p class="mb-0">The Blue Tigers</p>
                </div>
                <div class="p-3 bg-primary-light">
                    <p class="mb-0">Mumbai Indian</p>
                </div>
                <div class="p-3">
                    <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Boston Park</button>
                    <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> Regular Season</button>
                    <button class="btn btn-sm btn-light mb-2"><i class="las la-map-marker"></i> First Division</button>
                </div>
                <div class="p-3 border-top text-center">
                    <button class="btn btn-sm btn-outline-primary">View Game Info</button>
                </div>
            </div>
        </div>
     
    </div>
    
</div>

</div>
</div>
</section>


@endsection