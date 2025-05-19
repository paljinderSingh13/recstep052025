    @extends('leagues.layouts.master')
    @section('content')


    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                    <div class=" shadow-sm border rounded">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Add New Player</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <p>Complete the form below, and the player will be sent an email with instructions to sign up.</p>
                            </div>
                           <div class="basic-form">
    <form method="POST" action="{{ route('league.players.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Team</label>
                <select name="team_id" class="default-select form-control wide" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="default-select form-control wide" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Phone Number (Optional)</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone number">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Home Address</label>
                <input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Add Player</button>
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

</div>

@endsection