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
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Add New Referee</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Once you complete the form below, an email will be sent to the referee with instructions on how to join Leageez and set up their referee account.</p>
                            </div>
                           <form method="POST" action="{{ route('referees.store',$slug) }}">
                        @csrf

                        <div class="basic-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number (Optional)</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone number" value="{{ old('phone') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Badge/ID Number (optional)</label>
                                    <input type="text" name="badge_id" class="form-control" placeholder="Badge/ID Number" value="{{ old('badge_id') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Region/Area (optional)</label>
                                    <input type="text" name="region" class="form-control" placeholder="Region/Area" value="{{ old('region') }}">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add Referee</button>
                                    <a href="{{ route('referees.index',$slug) }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

</div>

@endsection