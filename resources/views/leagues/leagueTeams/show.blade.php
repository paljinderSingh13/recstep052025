@extends('leagues.layouts.master')

@section('content')

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3 mb-lg-0">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">Teams</h4>                        
                    </div>
                    <div class="card-body">
                        <p>All teams for the league are listed below. Click on the team name to go to the corresponding team admin page.</p>
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead >
                                    <tr>
                                        <th>Team</th>
                                        <th>Division</th>
                                        <th>Players</th>
                                        <th>Home field</th>                                        
                                        <th>Date Added</th>                                        
                                        <th>Team Admin</th>                                        
                                        <th>Action</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>The Blue Tigers</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>King XI</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>National American</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>RJ Royal</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>Riders</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>Newyork</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>GT dimond</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr> <tr>
                                        <td>The Blue Tigers</td>
                                        <td>-</td>
                                        <td>1</td>
                                        <td>Boston Park</td>
                                        <td>4/14/2025</td>
                                        <td>Team Admin</td>                                    
                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <button type="button" class="btn btn-primary light sharp" data-bs-toggle="dropdown">
                                                    <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#activeModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Change Status</a>
                                                    <a class="dropdown-item" href="#">Team
                                                    Info</a>
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModalCenterTeam" data-team-id="7" data-team-name="Delhi Capitals">Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
</div>
@endsection