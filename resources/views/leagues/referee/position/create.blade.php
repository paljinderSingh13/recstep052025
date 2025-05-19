    @extends('leagues.layouts.master')
    @section('content')
@php
    $slug = session('slug');
    $current_league = session('current_league');
    
    if (!$slug) {
        $slug = 'url';
    }
@endphp

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Create New Referee Positions</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Create a referee position you'd like to track or assign—for example, Center Referee, Assistant Ref 1, Assistant Ref 2, etc. Each game will include a slot for every position you set up.</p>
                            </div>
                            <div class="basic-form">
                                <form method="POST" action="{{route('referee.position.store',$slug)}}">
                                    @csrf
                                    
                                <div class="row">
                                   
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Position Name</label>
                                 <input type="text" name="name" class="form-control" placeholder="Position Name">
                             </div>
                              
                             <div class="col-md-12">
                                 <button class="btn btn-primary">Create Position</button>
                             </div>
                                </form>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

</div>

@endsection