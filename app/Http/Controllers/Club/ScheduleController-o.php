<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Schedule;
use App\Models\Club\Team;
use App\Models\Location;
use App\Models\Club\PlayerSchedule;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\Player;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        $id = base64_decode($id);
        $teams = Team::get();
        return view('team.schedule.create',compact('id','teams'));
    }

    public function add()
    {
        $title = "Create Schedule";
        $club_id = session('club_id');
        $teams = Team::where('club_id',$club_id)->get();
        $opTeams = Team::where('club_id',$club_id)->get();
        $locations = Location::where('status','1')->get();
        return view('team.schedule.add',compact('teams','opTeams','title','locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $validated = $request->validate([
            'type' => 'required|string|in:Tournaments,Game,Practice',
            
            'status' => 'required',
        ]);

        // Create a new schedule record
        $schedule = new Schedule();

            // Assign request data to the model fields
            $schedule->team_id = $request->input('team_id');
            $schedule->name = $request->input('name');
            $schedule->type = $request->input('type');
            $schedule->opposing_team_id = $request->input('opposing_team_id');
            $schedule->purpose_detail = $request->input('purpose_detail');
            $schedule->timing_from = $request->input('time_from');
            $schedule->timing_to = $request->input('time_to');
            $schedule->location = $request->input('location');
            $schedule->city = $request->input('city');
            $schedule->date = $request->input('date');
            $schedule->time = $request->input('time');
            $schedule->date_from = $request->input('date_from');
            $schedule->date_to = $request->input('date_to');
            $schedule->status = $request->input('status');
            // Save the data to the database
            $schedule->save();
        // Redirect to a route with a success message
        return redirect()->route('team.info',base64_encode($request->input('team_id')))->with('success', 'Schedule created successfully.');

   
    }

     public function ScheduleStore(Request $request)
    {
           $rules = [
            'team_id' => 'required',
                'type' => 'required|in:Tournaments,Game,Practice',
                'status' => 'required',
            ];

            // Add validation rules based on type
            switch ($request->input('type')) {
                case 'Tournaments':
                    $rules['opposing_team_id'] = 'required';
                    $rules['location'] = 'required|string|max:255';
                    $rules['city'] = 'required|string|max:255';
                    $rules['date'] = 'required';
                    $rules['time'] = 'required';
                    break;

                case 'Game':
                    $rules['opposing_team_id'] = 'required';
                    $rules['location'] = 'required|string|max:255';
                    $rules['city'] = 'required|string|max:255';
                    $rules['date'] = 'required';
                    $rules['time'] = 'required';
                    break;

                case 'Practice':
                    $rules['date_from'] = 'required';
                    $rules['date_to'] = 'required';
                    $rules['time_from'] = 'required';
                    $rules['time_to'] = 'required';
                    break;
            }
            // Validate the request data
            $validatedData = $request->validate($rules);

            // Create a new schedule record
            if($request->input('type') == 'Practice'){
                $dateFrom = Carbon::createFromFormat('m/d/Y', $request->input('date_from'));
                $dateTo = Carbon::createFromFormat('m/d/Y', $request->input('date_to'));

                // Loop through each day between date_from and date_to
                while ($dateFrom <= $dateTo) {
                    // Create a new schedule for each day in the range
                    $schedule = new Schedule();

                    // Assign the values to the schedule model
                    $schedule->team_id = $request->input('team_id');
                    $schedule->name = $request->input('name');
                    $schedule->type = $request->input('type');
                    $schedule->timing_from = $request->input('time_from');
                    $schedule->timing_to = $request->input('time_to');
                    $schedule->date = $dateFrom->format('m/d/Y');  // Set the date for the current loop iteration
                    $schedule->time = $request->input('time_from'); // Set the time (could be different for each day if needed)
                    $schedule->date_from = $dateFrom->format('m/d/Y');
                    // $schedule->date_from = $request->input('date_from');
                    $schedule->date_to = $request->input('date_to');
                    $schedule->status = $request->input('status');
                    
                    // Save the schedule to the database
                    $schedule->save();

                    // Move to the next day
                    $dateFrom->addDay();
                }
            }else{

               $schedule = new Schedule();

                // Assign request data to the model fields
                $schedule->team_id = $request->input('team_id');
                $schedule->name = $request->input('name');
                $schedule->type = $request->input('type');
                $schedule->opposing_team_id = $request->input('opposing_team_id');
                $schedule->purpose_detail = $request->input('purpose_detail');
                $schedule->timing_from = $request->input('time_from');
                $schedule->timing_to = $request->input('time_to');
                $schedule->location = $request->input('location');
                $schedule->city = $request->input('city');
                $schedule->date = $request->input('date');
                $schedule->time = $request->input('time');
                $schedule->date_from = $request->input('date_from');
                $schedule->date_to = $request->input('date_to');
                $schedule->status = $request->input('status');
                
                // Save the data to the database
                $schedule->save();
                if($request->input('opposing_team_id')){
                    $scheduleOp = new Schedule();

                    // Assign request data to the model fields
                    $scheduleOp->team_id = $request->input('opposing_team_id');
                    $scheduleOp->name = $request->input('name');
                    $scheduleOp->type = $request->input('type');
                    $scheduleOp->opposing_team_id = $request->input('team_id');
                    $scheduleOp->purpose_detail = $request->input('purpose_detail');
                    $scheduleOp->timing_from = $request->input('time_from');
                    $scheduleOp->timing_to = $request->input('time_to');
                    $scheduleOp->location = $request->input('location');
                    $scheduleOp->city = $request->input('city');
                    $scheduleOp->date = $request->input('date');
                    $scheduleOp->time = $request->input('time');
                    $scheduleOp->date_from = $request->input('date_from');
                    $scheduleOp->date_to = $request->input('date_to');
                    $scheduleOp->status = $request->input('status');
                    $scheduleOp->opposing_schedule_id = $schedule->id;
                    
                    // Save the data to the database
                    $scheduleOp->save();

                     $scheduleUpdate = Schedule::findOrFail($schedule->id);
                        $scheduleUpdate->update([
                            'opposing_schedule_id' => $scheduleOp->id,
                        ]);
                }
            }
        // Redirect to a route with a success message
        return redirect()->route('team.schedule')->with('success', 'Schedule created successfully.');

   
    }


    public function filterSchedules($request)
        {
            $teamId = $request->input('team_id');
                    $date = $request->input('date');
                    $locationId = $request->input('location_id');
                    $typeId = $request->input('type');

                    // Parse the given date in m/d/Y format or use the current date
                    if (!$date) {
                        $startOfWeek = Carbon::now(); // Start from the current date
$endOfWeek = Carbon::now()->addDays(5);
                    } else {
                        $givenDate = Carbon::createFromFormat('m/d/Y', $date);
                        $startOfWeek = $givenDate;

// Add 5 days to the start date
$endOfWeek = $givenDate->copy()->addDays(5);
                    }

                    $teams = Team::get();
                    $locations = Location::where('status', '1')->get();

                    // Format the dates to m/d/Y format for query and view
                    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
                    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

                    // Parse the formatted start and end of week dates into Carbon instances
                    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
                    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

                    // Fetch schedules from the database and ensure date is formatted correctly for comparison
                    if(auth()->user()->role == 'player'){
                        $player = Player::where('user_id',auth()->user()->id)->first();

                        $PlayerMetaTeam = PlayerMetaTeam::where('player_id',$player['id'])->pluck('team_id');

                        $schedules = Schedule::whereIn('team_id',$PlayerMetaTeam)->whereBetween(
                            DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"),
                            [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
                        );

                        $schedulesPractice = Schedule::whereIn('team_id',$PlayerMetaTeam)->whereBetween(
                            DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"),
                            [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
                        );
                    }else{
                       $schedules = Schedule::whereBetween(
                            DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"),
                            [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
                        );

                        $schedulesPractice = Schedule::whereBetween(
                            DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"),
                            [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
                        ); 
                    }

                    if ($teamId) {
                        $schedules->where('team_id', $teamId);
                        $schedulesPractice->where('team_id', $teamId);
                    }

                    if ($date) {
                        $parsedDate = Carbon::createFromFormat('m/d/Y', $date)->toDateString();
                        $schedules->whereDate(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), $parsedDate);
                        $schedulesPractice->whereDate(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), $parsedDate);
                    }

                    if ($locationId) {
                        $schedules->where('location', $locationId);
                        $schedulesPractice->where('location', $locationId);
                    }
                    if ($typeId) {
                        $schedules->where('type', $typeId);
                        $schedulesPractice->where('type', $typeId);
                    }

                    // Execute the queries
                    $schedules = $schedules->get()->filter(function ($schedule) {
                        return $schedule->date !== null && $schedule->team_id !== null; // Add more conditions as needed
                    });

                    $schedulesPractice = $schedulesPractice->get()->filter(function ($schedule) {
                        return $schedule->date_from !== null && $schedule->team_id !== null; // Add more conditions as needed
                    });

                    // Merge and filter the results to remove empty values
                    $mergedSchedules = $schedules->merge($schedulesPractice)->filter(function ($schedule) {
                        return !empty($schedule->date) || !empty($schedule->date_from); // Adjust filtering logic if needed
                    });

                    // Group merged schedules by team
                    $groupedSchedules = $mergedSchedules->groupBy('team');
                    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
                    if(auth()->user()->role == 'player'){
                        $player = Player::where('user_id',auth()->user()->id)->first();
                        $playerSchedules = PlayerSchedule::with('player')->where('player_id',$player['id'])->get()->groupBy('schedule_id');;

                    }
                    return view('team.schedule.show', compact('groupedSchedules', 'startOfWeek', 'teams', 'locations','teamId', 'date', 'locationId','typeId','playerSchedules'));

        }

       

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->isMethod('post')){
          return $this->filterSchedules($request);
        }

        $teamId = $request->input('team_id');
                    $date = $request->input('date');
                    $locationId = $request->input('location_id');
                    $typeId = $request->input('type');
        $startOfWeek = Carbon::now(); // Start from the current date
$endOfWeek = Carbon::now()->addDays(5);
        $teams = Team::get();
        $locations = Location::where('status','1')->get();
    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison
    if(auth()->user()->role == 'player'){
        $player = Player::where('user_id',auth()->user()->id)->first();

        $PlayerMetaTeam = PlayerMetaTeam::where('player_id',$player['id'])->pluck('team_id');
    $schedules = Schedule::whereIn('team_id',$PlayerMetaTeam)->whereBetween(
        DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"),
        [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
    )
    ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))->get();
    $schedulesPractice = Schedule::whereIn('team_id',$PlayerMetaTeam)->whereBetween(
        DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"),
        [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
    )
    ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
    ->get();
    }else{
        $schedules = Schedule::whereBetween(
        DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"),
        [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
    )
    ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))->get();
    $schedulesPractice = Schedule::whereBetween(
        DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"),
        [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()]
    )
    ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
    ->get();
    }

    // Group schedules by team
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by team
    $groupedSchedules = $mergedSchedules->groupBy('team');

    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if(auth()->user()->role == 'player'){
        $player = Player::where('user_id',auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id',$player['id'])->get()->groupBy('schedule_id');;

    }
        // Pass data to the view
        return view('team.schedule.show', compact('groupedSchedules', 'startOfWeek','teams','locations','teamId', 'date', 'locationId','typeId','playerSchedules'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Edit Schedule";
        $id = base64_decode($id);
        $club_id = session('club_id');
        $schedule = Schedule::find($id);
        // $teams = Team::get();
        $teams = Team::where('club_id',$club_id)->get();
        $locations = Location::where('status','1')->get();
        return view('team.schedule.edit',compact('id','schedule','teams', 'title','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $id = base64_decode($id);
        $rules = [
            'team_id' => 'required',
                'type' => 'required|in:Tournaments,Game,Practice',
                'status' => 'required',
            ];

            // Add validation rules based on type
            switch ($request->input('type')) {
                case 'Tournaments':
                    $rules['opposing_team_id'] = 'required';
                    $rules['location'] = 'required|string|max:255';
                    $rules['city'] = 'required|string|max:255';
                    $rules['date'] = 'required';
                    $rules['time'] = 'required';
                    break;

                case 'Game':
                    $rules['opposing_team_id'] = 'required';
                    $rules['location'] = 'required|string|max:255';
                    $rules['city'] = 'required|string|max:255';
                    $rules['date'] = 'required';
                    $rules['time'] = 'required';
                    break;

                case 'Practice':
                    $rules['date_from'] = 'required';
                    $rules['date_to'] = 'required';
                    $rules['time_from'] = 'required';
                    $rules['time_to'] = 'required';
                    break;
            }
            // Validate the request data
            $validatedData = $request->validate($rules);
         $schedule = Schedule::findOrFail($id);

        // Update the schedule with validated data
         if($request->input('type') == 'Practice'){
            $schedule->update([
                'type' => $request['type'],
                'status' => $request['status'],
                'opposing_team_id' => $request['opposing_team_id'] ?? null,
                'location' => $request['location'] ?? null,
                'city' => $request['city'] ?? null,
                'date' => $request['date_from'] ?? null,
                'time' => $request['time_from'] ?? null,
                'date_from' => $request['date_from'] ?? null,
                'date_to' => $request['date_to'] ?? null,
                'timing_from' => $request['time_from'] ?? null,
                'timing_to' => $request['time_to'] ?? null,
                'purpose_detail' => $request['purpose_detail'] ?? null,
            ]);
        }else{
            $schedule->update([
                'type' => $request['type'],
                'status' => $request['status'],
                'opposing_team_id' => $request['opposing_team_id'] ?? null,
                'location' => $request['location'] ?? null,
                'city' => $request['city'] ?? null,
                'date' => $request['date'] ?? null,
                'time' => $request['time'] ?? null,
                'purpose_detail' => $request['purpose_detail'] ?? null,
                'date_from' => $request['date_from'] ?? null,
                'date_to' => $request['date_to'] ?? null,
                'timing_from' => $request['time_from'] ?? null,
                'timing_to' => $request['time_to'] ?? null,
            ]);
        }

         $route = session('route');
        if($route){
            return redirect()->route($route)->with('success', 'Schedule updated successfully.');

        }else{
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Schedule updated successfully.');
    
         }
    }

     public function updateStatus(Request $request, $id)
    {
       $id = base64_decode($id);
        $schedule = Schedule::findOrFail($id);
        $schedule->status = !$schedule->status; // Toggle status
        $schedule->save();

        return back()->with('success', 'Schedule status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
       $id = base64_decode($id);
        $schedule = Schedule::find($id);
        $schedule->delete();

        // Redirect back with a success message
        return back()->with('success', 'Schedule deleted successfully.');
    }


     public function playeScheduleStore($type,$schedule_id)
    {
        
        $schedule = Schedule::find($schedule_id);
        $player = Player::where('user_id',auth()->user()->id)->first();
           PlayerSchedule::create(['player_id' => $player['id'],
                                    'type' => $type,
                                    'schedule_id' => $schedule_id,
                                    'team_id' => $schedule->team_id,
                                    ]);
        return back()->with('success', 'Schedule accepted successfully.');

   
    }

    public function getPlayerSchedules($OpScheduleId,$opposingId)
    {
        $schedule = Schedule::where('id',$OpScheduleId)->first();
        $playerSchedules = PlayerSchedule::where('schedule_id',$schedule->id)->where('team_id',$opposingId)
            ->with('player') // Load related player data
            ->get();

        $data = $playerSchedules->map(function ($schedule) {
            return [
                'name' => $schedule->player->name ?? 'Unknown Player',
                'status' => $schedule->type,
            ];
        });

        return response()->json($data);
    }

}
