@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <!-- Page Head -->
            <!-- <div class="page-head">
                        <div class="row">
                            <div class="col-sm-6 mb-sm-4 mb-3">
                                <h3 class="mb-0">List of team</h3>
                                
                            </div>
                            <div class="col-sm-6 mb-4 text-sm-end">
                                 <a href="javascript:voit(0);" class="btn btn-outline-secondary">Add Task</a>
                                <a href="javascript:voit(0);" class="btn btn-primary ms-2 cbtn">Create a Project</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Schedule</h4>
                                    <!-- <a href="#" class="btn btn-primary ms-2 cbtn">Schedule</a> -->
                                </div>
                                <div class="card-body">
                                   <form>
                                    <div class="row align-items-center mb-4">
                                        <div class="col-auto my-1">
                                            <div>
                                                <h4>Filter:</h4>
                                            </div>
                                        </div>
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2 form-label">Team Wise</label>
                                            <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2 form-label">Plan Wise</label>
                                            <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2 form-label">Date Wise</label>
                                            <input type="date" class="form-control" name="date" placeholder="date">
                                        </div>
                                        <div class="col-auto my-1">
                                            <label class="me-sm-2 form-label">Location Wise</label>
                                            <select class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <!-- -------------------------------------- -->

                                <div class="d-lg-flex justify-content-between">
                                    <div>
                                        <nav aria-label="Page navigation example" class="d-inline-block">
                                          <ul class="pagination">
                                            <li class="page-item">
                                              <a class="page-link" href="#" aria-label="Previous">
                                                <i class="las la-angle-left"></i>
                                            </a>
                                        </li>

                                        <li class="page-item">
                                          <a class="page-link" href="#" aria-label="Next">
                                             <i class="las la-angle-right"></i>
                                         </a>
                                     </li>
                                 </ul>
                             </nav>
                             <a href="#" class="btn btn-primary ms-2 ">Today</a>
                         </div>
                         <div>
                            <h2>December 2024</h2>
                        </div>
                        <div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                              <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                              <label class="btn btn-outline-primary rounded-start-1" for="btnradio1">Month</label>

                              <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btnradio2">Week</label>

                              <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btnradio3">Day</label>
                          </div>
                      </div>
                  </div>

                  
                  <!-- ----------------------------------------------------------- -->
                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th style="width:80px;">Teams</th>
                                <th>18 Mon</th>
                                <th>19 Tue</th>
                                <th>20 Wed</th>
                                <th>21 Thu</th>
                                <th>22 Fri</th>
                                <th>23 Sat</th>
                                <th>24 Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-black">Team A</th>
                                <td>Practice 9:00AM to 11:00AM, xyz 
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-link btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">View</button>
                                </td>
                                <td>Game vs Team C 12:45PM to 1:45PM</td>
                                <td>Practice 12:45PM to 1:45PM</td>
                                <td>Practice 12:45PM to 1:45PM</td>
                                <td>Practice 12:45PM to 1:45PM</td>
                                <td>Practice 12:45PM to 1:45PM</td>
                                <td>Practice 12:45PM to 1:45PM</td>

                            </tr>
                            <tr>
                               <th class="text-black">Team B</th>
                               <td>Practice 9:00AM to 11:00AM, xyz </td>
                               <td>Game vs Team C 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                           </tr> 
                           <tr>
                               <th class="text-black">Team C</th>
                               <td>Practice 9:00AM to 11:00AM, xyz </td>
                               <td>Game vs Team C 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                               <td>Practice 12:45PM to 1:45PM</td>
                           </tr>

                       </tbody>
                   </table>
               </div>



           </div>
       </div>
   </div>
</div>



</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Player Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
               <div class="card">
                <div class="card-header d-none">
                    <h4 class="card-title">Table Striped</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr>

                                    <th>Player Name</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>John</td>
                                    <td> <span class=""><span class="text-success"><i class="fa fa-check"></i></span> Confirmed</span>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Alex Morgan</td>
                                    <td>
                                      <span class=""><span class="text-danger"><i class="fa fa-close"></i></span> Not Coming</span>
                                  </td>

                              </tr>
                              <tr>

                                <td>Shivam</td>
                                <td>
                                 <span class=""><span class="text-danger"><i class="fa fa-close"></i></span> Not Coming</span>
                             </td>

                         </tr>
                         <tr>

                            <td>Mannu</td>
                            <td>
                                <span class=""><span class="text-danger"><i class="fa fa-close"></i></span> Not Coming</span>
                            </td>

                        </tr>
                        <tr>

                            <td>Prince</td>
                            <td>
                             <span class=""><span class="text-danger"><i class="fa fa-close"></i></span> Not Coming</span>
                         </td>

                     </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </div>
</div>
                   <!--  <div class="modal-footer">
                        <button type="button" class="btn btn-danger light"
                        data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>


        <style type="text/css">
            .table thead th:last-child,
            .table tbody tr td:last-child{
                text-align: left!important;
            }
        </style>
        @endsection