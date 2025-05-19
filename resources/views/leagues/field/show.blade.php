@extends('leagues.layouts.master')

@section('content')

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div>
                    <h4>testing</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
               <div class="right-sidebar">
                <div class="shadow-sm border rounded mb-3 ">
                    <div class="card-header bg-primary rounded-top">
                        <div class="card-title">
                            <h4 class="text-white mb-0">Recent/Upcoming Game</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-3 border-top text-center">
                            <button class="btn btn-sm btn-outline-primary">View Full Schedule</button>
                        </div>
                    </div>
                </div>
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
</div>
@endsection