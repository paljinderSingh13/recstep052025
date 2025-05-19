<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\LeagueSchedule;
use App\Models\LeagueDivision;
use App\Models\LeagueField;
use App\Models\Location;
use App\Models\PlayerLeagueSchedule;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\PlayerMetaLeagueTeam;
use Carbon\Carbon;
use DB;

// temprary

// use App\Models\Club\Team;
// use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\Player;

class LeagueScheduleController extends Controller
{

    /**
     * Show the form for creating a new league team
     */
    public function list(Request $request)
    {
        $id =  session('club_id');
       //echo session('club_id');
       //dump($id);
        session()->put('route','team.schedule');
       $club_administrator = CA::get();
       $teams = LeagueTeam::get();
       // dd($teams);
       $pluck_teams = LeagueTeam::pluck('id');
    //    dd($pluck_teams->all());
       
        $players = Player::with(['teamMeta.team','administrator.user'])->where('club_id', $id)->get();

         //dd($players);

        $scheduleGame = LeagueSchedule::where('league_id',session('league_id'))->get();
        $title = "Schedules";



        // if(auth()->user()->role == 'player' || auth()->user()->role == 'player_administrator'){
        //     $playerMetaTeam = PlayerMetaLeagueTeam::where('user_id',auth()->user()->id)->pluck('team_id');
        //     $teams = LeagueTeam::withCount('players')->whereIn('id',$playerMetaTeam)->get();
        //     $pluck_teams = LeagueTeam::whereIn('id',$playerMetaTeam)->pluck('id');
        //     $teamPlayersGet = PlayerMetaLeagueTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
        //     $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
        //     $scheduleTournaments = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
        //     $scheduleGame = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        //     $schedulePractice = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        //     // $title = "Player Management";
        //     $title = "League Schedule";
        // }
        // if(auth()->user()->role == 'player_administrator'){
        //     $playerMetaAdministrators = PlayerMetaAdministrator::where('user_id',auth()->user()->id)->first();
        //     $pUser = Player::where('id',$playerMetaAdministrators['player_id'])->first();
        //     $playerMetaTeam = PlayerMetaLeagueTeam::where('user_id',$pUser['user_id'])->pluck('team_id');
        //     $teams = LeagueTeam::withCount('players')->whereIn('id',$playerMetaTeam)->get();
        //     $pluck_teams = LeagueTeam::whereIn('id',$playerMetaTeam)->pluck('id');
        //     $teamPlayersGet = PlayerMetaLeagueTeam::whereIn('team_id',$pluck_teams)->pluck('player_id');
        //     $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
        //     $scheduleTournaments = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Tournaments')->get();
        //     $scheduleGame = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Game')->get();
        //     $schedulePractice = LeagueSchedule::with('team','OpTeam')->whereIn('team_id',$pluck_teams)->where('type','Practice')->get();
        //     $title = "League Schedule";
        // }

        return view('leagues/schedule.list', compact('id','title','teams','club_administrator' , 'players', 'scheduleGame'));
    }

    public function create(){
    
    $club_id = session('club_id');
    $teams = LeagueTeam::get();
    $opTeams = LeagueTeam::get();
    $divisions = LeagueDivision::where('league_id',session('league_id'))->get();
    $locations = LeagueField::where('league_id',session('league_id'))->get();
    $title = 'League Schedule';
    return view('leagues/schedule.create',compact('teams','opTeams','title','locations','divisions'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'location_id' => 'required|exists:league_fields,id',
        'date' => 'required|date|after_or_equal:today',
        'start_time' => 'required',
        'duration' => 'required|numeric|min:30|max:180',
        'game_type' => 'required|in:regular,playoff,friendly,tournament',
        'division_id' => 'required',
        'home_team_id' => 'required',
        'away_team_id' => 'required',
    ]);

    // Since you're using route model binding, you don't need to look up the league
    // $league is already injected and available
    $slug = session('slug');
    $league_id = session('league_id');
    $schedule = new LeagueSchedule();
    $schedule->league_id = $league_id;
    $schedule->location_id = $validated['location_id'];
    $schedule->date = $validated['date'];
    $schedule->start_time = $validated['start_time'];
    $schedule->duration = $validated['duration'];
    $schedule->game_type = $validated['game_type'];
    $schedule->division_id = $validated['division_id'];
    $schedule->home_team_id = $validated['home_team_id'];
    $schedule->away_team_id = $validated['away_team_id'];
    $schedule->save();

        $league_id = session('league_id');
        $title = 'New game created';
        $type = 'Game';
        $linkTitle = 'View Game';
        $link = route('league.schedule.index',$slug);
        log_league_action($league_id, $title, $type,$linkTitle,$link);

        // Send SMS confirmations
    try {
        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = '+18383848869';
        $twilio = new Client($twilioSid, $twilioToken);
      

        // Get home team players with phone numbers
       $schedules = LeagueSchedule::with(['homeTeam.players', 'awayTeam.players'])->where('league_id', session('league_id'))->get();

            // Step 2: Collect all players from home and away teams
            $homePlayers = collect();
            $awayPlayers = collect();

            foreach ($schedules as $schedule) {
                if ($schedule->homeTeam) {
                    $homePlayers = $homePlayers->merge($schedule->homeTeam->players);
                }

                if ($schedule->awayTeam) {
                    $awayPlayers = $awayPlayers->merge($schedule->awayTeam->players);
                }
            }

        $allPlayers = $homePlayers->merge($awayPlayers)->unique('id')->values();
        
        // Format game details
        $gameDate = \Carbon\Carbon::parse($validated['date'])->format('F j, Y');
        $gameTime = \Carbon\Carbon::parse($validated['start_time'])->format('g:i A');
        $location = LeagueField::find($validated['location_id'])->name;

        foreach ($allPlayers as $player) {
            $message = "New game scheduled!\n\n" .
                       "📅 Date: {$gameDate}\n" .
                       "⏰ Time: {$gameTime}\n" .
                       "📍 Location: {$location}\n\n" .
                       "Can you attend?\n" .
                       "[YES] [NO]\n\n" .
                       "Reply with YES or NO to confirm.";


            $twilio->messages->create(
                '+919915034645', // to
                [
                    'from' => $twilioNumber,
                    'body' => $message
                ]
            );
        }

    } catch (\Exception $e) {
        \Log::error("Twilio SMS Error: " . $e->getMessage());
        // You might want to notify admin but continue with the redirect
        dd($e->getMessage());
    }

    return redirect()->route('league.schedule.index', $slug)
        ->with('success', 'Game scheduled successfully!');
}

     public function getOpposingTeams(Request $request)
    {
        $search = $request->input('search');
        $teamId = $request->input('team_id');
        // Fetch opposing teams based on the selected team ID
        $query = LeagueTeam::query();
        if ($teamId) {
            $query->where('id', '!=', $teamId); // Exclude the selected team
        }
        // $opposingTeams = Team::where('id', '!=', $teamId)->get(); // Example logic

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $teams = $query->select('id', 'name')->limit(10)->get();

        return response()->json($teams);
    }

    /**
     * Show the form for editing a league team
     */
    public function edit(League $league, LeagueTeam $leagueTeam)
    {
        $team = LeagueLeagueTeam::where('user_id',auth()->user()->id)->first();
        $user  = auth()->user();
        return view('leagues/player.edit', compact('team', 'user'));
    }

    /**
     * Update the specified league team
     */
    public function update(Request $request, League $league, LeagueTeam $leagueTeam)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email',
            'home_field_id' => 'nullable'
        ]);

        $leagueTeam->update([
            'name' => $validated['name'],
            'home_field' => $validated['home_field_id'],
            'email' => $validated['email'],
            'status' => $request->status
        ]);

        return redirect()->back()
            ->with('success', 'Team updated successfully!');
    }

    /**
     * Remove the specified league team
     */
    public function destroy(League $league, LeagueTeam $leagueTeam)
    {

        $leagueTeam->delete();

        return redirect()->back()
            ->with('success', 'Team deleted successfully!');
    }
    public function teamsByDivision($division)
    {
        $league_id = session('league_id');
        $teams = LeagueTeam::with('team')->where('division',$division)->where('league_id',$league_id)->get();

        return response()->json($teams);
    }

    public function index(Request $request)
    {

       if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $divisionId = $request->input('division_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = LeagueTeam::where('league_id',session('league_id'))->get();
    $locations = LeagueField::where('league_id',session('league_id'))->get();
    $divisions = LeagueDivision::where('league_id',session('league_id'))->get();
    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        
            $schedules = LeagueSchedule::where('league_id',session('league_id'))->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = LeagueSchedule::where('league_id',session('league_id'))->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules;

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        }
        return null;
    });
    $searchDate = Carbon::now()->format('m/d/Y');
    $title = 'League Schedule';

    $playerSchedules = [];

    $games = LeagueSchedule::where('league_id',session('league_id'))->get();

    // Pass data to the view
    return view('leagues.schedule.index', compact('groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','divisionId','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','divisions','games'));
}

       public function CalanderFilterSchedules(Request $request)
{
    $teamId = $request->input('team_id');
    $divisionId = $request->input('division_id');
    $locationId = $request->input('location_id');
    $searchDate = $request->input('searchDate');
    $date = $request->input('date');
    $viewType = $request->input('view_type', 'month');
    $btnNxtPrv = $request->input('btnNxtPrv');

    // Parse the current search date
    if($date){
    $currentDate = $date ? Carbon::createFromFormat('m/d/Y', $date) : Carbon::now();

    }else{
    $currentDate = $searchDate ? Carbon::createFromFormat('m/d/Y', $searchDate) : Carbon::now();

    }

    // Adjust currentDate based on Next/Previous button
    if ($btnNxtPrv == 'next') {
        if ($viewType == 'month') {
            $currentDate->addMonth();
        } elseif ($viewType == 'week') {
            $currentDate->addWeek();
        } elseif ($viewType == 'day') {
            $currentDate->addDay();
        }
    } elseif ($btnNxtPrv == 'previous') {
        if ($viewType == 'month') {
            $currentDate->subMonth();
        } elseif ($viewType == 'week') {
            $currentDate->subWeek();
        } elseif ($viewType == 'day') {
            $currentDate->subDay();
        }
    }

    // Set view ranges
    if ($viewType === 'week') {
        $startOfWeek = $currentDate->copy()->startOfWeek();
        $endOfWeek = $currentDate->copy()->endOfWeek();
    } elseif ($viewType === 'day') {
        $startOfWeek = $currentDate->copy();
        $endOfWeek = $currentDate->copy();
    } else {
        $startOfWeek = $currentDate->copy()->startOfMonth()->startOfWeek();
        $endOfWeek = $currentDate->copy()->endOfMonth()->endOfWeek();
    }

    $searchDate = $currentDate->format('m/d/Y');
    $startOfMonth = $currentDate->copy()->startOfMonth();
    $endOfMonth = $currentDate->copy()->endOfMonth();

    // Query the schedules
    $schedulesQuery = LeagueSchedule::where('league_id', session('league_id'));

    // Apply date range filter (only if specific date isn't selected)
    if (!empty($date)) {
        $schedulesQuery->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [
            $startOfWeek->toDateString(),
            $endOfWeek->toDateString()
        ]);
    } else {
        // If specific date is selected, filter by that date only
        $schedulesQuery->where('date', Carbon::createFromFormat('m/d/Y', $date)->format('m/d/Y'));
    }

    // Apply other filters
    if ($teamId) {
        $schedulesQuery->where(function($q) use ($teamId) {
            $q->where('home_team_id', $teamId)
              ->orWhere('away_team_id', $teamId);
        });
    }

    if ($divisionId) {
        $schedulesQuery->where('division_id', $divisionId);
    }

    if ($locationId) {
        $schedulesQuery->where('location_id', $locationId);
    }

    $schedules = $schedulesQuery->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))->get();

    // Group by formatted date
    $groupedSchedules = $schedules->groupBy(function ($schedule) {
        return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
    });

    // Other required data
    $teams = LeagueTeam::where('league_id', session('league_id'))->get();
    $locations = LeagueField::where('league_id', session('league_id'))->get();
    $divisions = LeagueDivision::where('league_id', session('league_id'))->get();

    $title = 'League Schedule';
    $playerSchedules = [];
    $games = LeagueSchedule::where('league_id',session('league_id'))->get();

    return view('leagues.schedule.index', compact(
        'groupedSchedules', 'startOfWeek', 'endOfWeek',
        'startOfMonth', 'endOfMonth',
        'teams', 'locations', 'divisions',
        'searchDate', 'date', 'divisionId', 'title', 'teamId', 'locationId',
        'playerSchedules','games' ,'viewType'
    ));
}

}