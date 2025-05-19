<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3 mb-lg-0 d-flex">
    <div class="player-wrapper w-100">                        
        <div class="card shadow border-0 h-100">
            <div class="card-header bg-primary">
                <div class="card-title d-flex align-items-center">
                    <div class="player-image">
                        <img class="img-fluid" src="{{ asset($user['profile_picture']) }}">
                    </div>
                    <h4 class="player-name">{{ $user['name'] }}</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="#">
                            <i class="fas fa-history"></i> Payment History
                        </a>
                    </li>
                     @php
                        $slug = session('slug');
                        if (!$slug) {
                            $slug = 'url';
                        }
                    @endphp
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="{{route('league.teams.index',$slug)}}">
                            <i class="fas fa-users"></i> My Teams
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>