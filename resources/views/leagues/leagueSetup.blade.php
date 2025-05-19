@extends('leagues.layouts.master')

@section('content')
<div class="content-body">

    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">League Setup</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h2>Congratulations! Your league has been created!</h2>
                            <h4>What do I do next?</h4>
                            <p>You have been designated as the league commissioner and can now start filling out your league. <br>To get started, view your new league by clicking on the button below, and thanks again for joining Leageez!</p>
                            <a href="{{route('leagues.show.url',$league->slug)}}" class="btn btn-primary">View Your League</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection