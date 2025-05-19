<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\GroupMessage;
use App\Models\Club\Team;
use App\Models\Location;
use App\Models\Club\Schedule;
use App\Models\Club\ClubAnnouncement;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\Club\PlayerSchedule;
use App\Models\Club\Club;
use App\Models\Club\ClubAdministrator;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\Player;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\League;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Display the password reset form
    public function index()
    {

        //dd(123);
        log_league_action(5, 'League updated', 'update', '/leagues/5');

        $user = User::find(Auth::id());
        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();
        $title = $name."'s Dashboard";
        return view('dashboard.index',compact('title','user','todayMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule'));
    }


    public function player(Request $request)
    {
       if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = Team::get();
    $locations = Location::where('status', '1')->get();

    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $PlayerMetaTeam = PlayerMetaTeam::where('player_id', $player['id'])->pluck('team_id');

        $schedules = Schedule::whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = Schedule::whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        } elseif (!empty($schedule->date_from)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('Y-m-d');
        }
        return null;
    });

    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $searchDate = Carbon::now()->format('m/d/Y');
    $user = User::where('id',Auth::id())->first();

        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        $chatMessages = Message::where('receiver_id',Auth::id())->orWhere('sender_id',Auth::id())->where('user_type','team')->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();

                $lastWeekSchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
                    now()->subDays(7)->format('Y-m-d'), 
                    now()->format('Y-m-d')
                ])
                ->get();

        $announcements = ClubAnnouncement::where('club_id',$club_id)->orderBy('id','DESC')->get();
       $upcomingPractice = Schedule::with('PlayersSchedule')->where('type', 'practice')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
            ->first();
            $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->first();
             $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->latest()->get()->take(4);
        $title = "Player's Dashboard";
        return view('dashboard.player', compact('user','groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','todayMessages','chatMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule','lastWeekSchedule','announcements','upcomingPractice','lastgame'));
    }

    public function player5(Request $request)
    {
         if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = Team::get();
    $locations = Location::where('status', '1')->get();

    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $PlayerMetaTeam = PlayerMetaTeam::where('player_id', $player['id'])->pluck('team_id');

        $schedules = Schedule::whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = Schedule::whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        } elseif (!empty($schedule->date_from)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('Y-m-d');
        }
        return null;
    });

    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $searchDate = Carbon::now()->format('m/d/Y');
    $user = User::where('id',Auth::id())->first();

        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        $chatMessages = Message::where('receiver_id',Auth::id())->orWhere('sender_id',Auth::id())->where('user_type','team')->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();

                $lastWeekSchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
                    now()->subDays(7)->format('Y-m-d'), 
                    now()->format('Y-m-d')
                ])
                ->get();

        $announcements = ClubAnnouncement::where('club_id',$club_id)->orderBy('id','DESC')->get();
       $upcomingPractice = Schedule::with('PlayersSchedule')->where('type', 'practice')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
            ->first();
            $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->first();
             $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->latest()->get()->take(4);
        $title = "Player's Dashboard";
        return view('dashboard.player5', compact('user','groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','todayMessages','chatMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule','lastWeekSchedule','announcements','upcomingPractice','lastgame'));
    }

    public function player4(Request $request)
    {
       if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = Team::get();
    $locations = Location::where('status', '1')->get();

    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $PlayerMetaTeam = PlayerMetaTeam::where('player_id', $player['id'])->pluck('team_id');

        $schedules = Schedule::whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = Schedule::whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        } elseif (!empty($schedule->date_from)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('Y-m-d');
        }
        return null;
    });

    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $searchDate = Carbon::now()->format('m/d/Y');
    $user = User::where('id',Auth::id())->first();

        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        $chatMessages = Message::where('receiver_id',Auth::id())->orWhere('sender_id',Auth::id())->where('user_type','team')->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();

                $lastWeekSchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
                    now()->subDays(7)->format('Y-m-d'), 
                    now()->format('Y-m-d')
                ])
                ->get();

        $announcements = ClubAnnouncement::where('club_id',$club_id)->orderBy('id','DESC')->get();
       $upcomingPractice = Schedule::with('PlayersSchedule')->where('type', 'practice')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
            ->first();
            $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->first();
             $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->latest()->get()->take(4);
        $title = "Player's Dashboard";
        return view('dashboard.player4', compact('user','groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','todayMessages','chatMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule','lastWeekSchedule','announcements','upcomingPractice','lastgame'));
    } 

     public function player3(Request $request)
    {
       if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = Team::get();
    $locations = Location::where('status', '1')->get();

    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $PlayerMetaTeam = PlayerMetaTeam::where('player_id', $player['id'])->pluck('team_id');

        $schedules = Schedule::whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = Schedule::whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        } elseif (!empty($schedule->date_from)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('Y-m-d');
        }
        return null;
    });

    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $searchDate = Carbon::now()->format('m/d/Y');
    $user = User::where('id',Auth::id())->first();

        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        $chatMessages = Message::where('receiver_id',Auth::id())->orWhere('sender_id',Auth::id())->where('user_type','team')->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();

                $lastWeekSchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
                    now()->subDays(7)->format('Y-m-d'), 
                    now()->format('Y-m-d')
                ])
                ->get();

        $announcements = ClubAnnouncement::where('club_id',$club_id)->orderBy('id','DESC')->get();
       $upcomingPractice = Schedule::with('PlayersSchedule')->where('type', 'practice')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
            ->first();
            $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->first();
             $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->latest()->get()->take(4);
        $title = "Player's Dashboard";
        return view('dashboard.player3', compact('user','groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','todayMessages','chatMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule','lastWeekSchedule','announcements','upcomingPractice','lastgame'));
    }

    public function player2(Request $request)
    {
       if ($request->isMethod('post')) {
        return $this->CalanderFilterSchedules2($request);
    }

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month'); // Default to 'month'


    $startOfWeek = Carbon::now()->startOfMonth(Carbon::SUNDAY); // Start from the current date
    $endOfWeek = Carbon::now()->endOfMonth(Carbon::SATURDAY);
    $teams = Team::get();
    $locations = Location::where('status', '1')->get();

    // Format the dates to dd/mm/yyyy format for use in query and view
    $startOfWeekFormatted = $startOfWeek->format('m/d/Y');
    $endOfWeekFormatted = $endOfWeek->format('m/d/Y');

    // Parse the formatted start and end of week dates into Carbon instances
    $startOfWeekParsed = Carbon::createFromFormat('m/d/Y', $startOfWeekFormatted);
    $endOfWeekParsed = Carbon::createFromFormat('m/d/Y', $endOfWeekFormatted);

    // Fetch schedules from the database and ensure date is formatted correctly for comparison

    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $PlayerMetaTeam = PlayerMetaTeam::where('player_id', $player['id'])->pluck('team_id');

        $schedules = Schedule::whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereIn('team_id', $PlayerMetaTeam)->orWhereIn('opposing_team_id', $PlayerMetaTeam)->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    } else {
        $schedules = Schedule::whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
            ->get();

        $schedulesPractice = Schedule::with('team')
            ->whereBetween(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"), [$startOfWeekParsed->toDateString(), $endOfWeekParsed->toDateString()])
            ->orderBy(DB::raw("STR_TO_DATE(date_from, '%m/%d/%Y')"))
            ->get();
    }
    // Merge schedules and group by date
    $mergedSchedules = $schedules->merge($schedulesPractice);

    // Group merged schedules by date
    $groupedSchedules = $mergedSchedules->groupBy(function ($schedule) {
        if (!empty($schedule->date)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
        } elseif (!empty($schedule->date_from)) {
            return Carbon::createFromFormat('m/d/Y', $schedule->date_from)->format('Y-m-d');
        }
        return null;
    });

    $today = Carbon::today();
    $groupedSchedules = $groupedSchedules->filter(function ($value, $key) use ($today) {
        return Carbon::parse($key)->between($today, $today->copy()->addDays(6));
    });
    
    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $searchDate = Carbon::now()->format('m/d/Y');
    $user = User::where('id',Auth::id())->first();

        $name = $user->name . ($user->last_name ? ' ' . $user->last_name : '');
        $club_id = session('club_id');

        $todayDate = Carbon::today();
        $yesterdayDate = Carbon::yesterday();

        $todayMessages = Message::whereDate('created_at', $todayDate)->where('receiver_id',Auth::id())->get();
        $yesterdayMessages = Message::whereDate('created_at', $yesterdayDate)->where('receiver_id',Auth::id())->get();
        if (auth()->user()->role == 'administrator') {
            $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
            $admins = User::whereIn('id', $teamAdmins)->get();

        } elseif (auth()->user()->role == 'player') {
            $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
            $teams = Team::whereIn('id', $teamsArray)->get();

            $players = Player::where('user_id', auth()->id())->pluck('id');
            $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
            $admins = User::whereIn('id', $playerAdminArray)->get();

        }elseif (auth()->user()->role == 'club') {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
            $admins = User::whereIn('id', $teamsUserArray)->get();

        } else {
            $teamsArray = Team::where('club_id', $club_id)->pluck('id');
            $teams = Team::where('club_id', $club_id)->get();

            $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
            $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

            $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
            $admins = User::whereIn('id', $userArray)->get();
        }
        $now = Carbon::now()->format('Y-m-d'); // Format current date
        $upcomingSchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [$now])
            ->get();

            $todaySchedule = Schedule::where(function($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
            ->get();
            // Get yesterday's schedules (less than today's date)
            $yesterdaySchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
                ->get();

                $lastWeekSchedule = Schedule::where(function($query) use ($teamsArray) {
                    $query->whereIn('team_id', $teamsArray)
                          ->orWhereIn('opposing_team_id', $teamsArray);
                })
                ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
                    now()->subDays(7)->format('Y-m-d'), 
                    now()->format('Y-m-d')
                ])
                ->get();

        $announcements = ClubAnnouncement::where('club_id',$club_id)->orderBy('id','DESC')->get();
       $upcomingGame = Schedule::with('PlayersSchedule')->where('type', 'game')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
            ->first();
            $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->first();
             $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
            ->where(function ($query) use ($teamsArray) {
                $query->whereIn('team_id', $teamsArray)
                      ->orWhereIn('opposing_team_id', $teamsArray);
            })
            ->where(function ($query) {
                $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                      ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
            })
            ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
            ->latest()->get()->take(4);

            $chatMessages = Message::where('receiver_id',Auth::id())->orWhere('sender_id',Auth::id())->where('user_type','team')->get();
             $discoversSchedules = Schedule::where('type', '!=', 'Practice')
        ->where(function ($query) use ($teamsArray) {
            $query->whereIn('team_id', $teamsArray)
                  ->orWhereIn('opposing_team_id', $teamsArray);
        })
        ->whereBetween(
            DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), 
            [$startOfWeekParsed, $endOfWeekParsed]
        )
        ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
        ->orderBy('time') // Optional: Order by time as well
        ->get();
        $chatTeam = $teams->whereIn('id',$teamsArray);
        $title = "Player's Dashboard";
        return view('dashboard.player2', compact('user','groupedSchedules', 'startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth','teams', 'locations','searchDate','title', 'teamId', 'date', 'locationId', 'typeId', 'playerSchedules','viewType','todayMessages','yesterdayMessages','upcomingSchedule','teams','admins','todaySchedule','yesterdaySchedule','chatMessages','lastWeekSchedule','announcements','upcomingGame','lastgame','discoversSchedules','chatTeam'));
    }

public function CalanderFilterSchedules2(Request $request)
{
    // Initialize $viewType with a default value
    $viewType = $request->input('view_type', 'month'); // Default to 'month' if not provided

    // Initialize $upcomingSchedule as an empty collection
    $upcomingSchedule = collect();

    $user = User::where('id', Auth::id())->first();
    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $direction = $request->input('btnNxtPrv'); // 'next' or 'previous'
    $searchDate = $request->input('searchDate');

    // Define the date range for filtering
    if ($direction) {
        try {
            // Parse the input date with 'm/d/y' format
            $sDate = $searchDate;
            $sDate = Carbon::createFromFormat('m/d/Y', trim($sDate));

            // Apply the month adjustment based on direction
            if ($direction === 'Next') {
                $sDate->addMonth();
            } elseif ($direction === 'Previous') {
                $sDate->subMonth();
            }

            // Assign the modified date
            $date = $sDate->format('m/d/Y'); // Optionally, format it back to 'm/d/Y' if you need to return the formatted date
            $searchDate = $date;
        } catch (\Exception $e) {
            // Handle any errors if the date format is invalid
            return response()->json(['error' => 'Invalid date format. Please use m/d/Y.'], 400);
        }
    }

    // Define the date range for filtering
    $currentDate = $date ? Carbon::createFromFormat('m/d/Y', $date) : Carbon::now();
    $startOfMonth = $currentDate->copy()->startOfMonth(Carbon::SUNDAY);
    $endOfMonth = $currentDate->copy()->endOfMonth(Carbon::SATURDAY);

    // Start and end of the calendar view (week adjusted)
    $startOfWeek = $startOfMonth->copy()->startOfWeek(Carbon::SUNDAY); // Adjusted to Sunday as the first day of the week
    $endOfWeek = $endOfMonth->copy()->endOfWeek(Carbon::SATURDAY);

    // Base query for schedules
    $query = Schedule::query();

    // Apply filters
    if ($teamId) {
        $query->where('team_id', $teamId);
    }
    if ($date) {
        if ($direction === 'Next' || $direction === 'Previous') {
            // Query for the full month's data
            $query->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfMonth->toDateString(), $endOfMonth->toDateString()]);
        } else {
            $formattedDate = Carbon::createFromFormat('m/d/Y', $date)->toDateString();
            $query->where(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), $formattedDate);
        }
    } else {
        $query->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeek->toDateString(), $endOfWeek->toDateString()]);
    }
    if ($locationId) {
        $query->where('location', $locationId);
    }
    if ($typeId) {
        $query->where('type', $typeId);
    }

    // Fetch and group schedules by date
    $schedules = $query->get();
    $groupedSchedules = $schedules->groupBy(function ($schedule) {
        return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
    });

    // Fetch additional data
    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }

    // Fetch teams and locations
    $teams = Team::all();
    $locations = Location::where('status', '1')->get();

    // Fetch today's schedules
    $todaySchedule = Schedule::where(function ($query) use ($teams) {
        $query->whereIn('team_id', $teams->pluck('id'))
            ->orWhereIn('opposing_team_id', $teams->pluck('id'));
    })
    ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')])
    ->get();

    // Fetch yesterday's schedules
    $yesterdaySchedule = Schedule::where(function ($query) use ($teams) {
        $query->whereIn('team_id', $teams->pluck('id'))
            ->orWhereIn('opposing_team_id', $teams->pluck('id'));
    })
    ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->subDay()->format('Y-m-d')])
    ->get();

    // Fetch last week's schedules
    $lastWeekSchedule = Schedule::where(function ($query) use ($teams) {
        $query->whereIn('team_id', $teams->pluck('id'))
            ->orWhereIn('opposing_team_id', $teams->pluck('id'));
    })
    ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') BETWEEN ? AND ?", [
        now()->subDays(7)->format('Y-m-d'),
        now()->format('Y-m-d')
    ])
    ->get();

    // Fetch upcoming schedules
    $upcomingSchedule = Schedule::where(function ($query) use ($teams) {
        $query->whereIn('team_id', $teams->pluck('id'))
            ->orWhereIn('opposing_team_id', $teams->pluck('id'));
    })
    ->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')])
    ->get();

    // Fetch announcements
    $club_id = session('club_id');
    $announcements = ClubAnnouncement::where('club_id', $club_id)->orderBy('id', 'DESC')->get();

    // Fetch chat messages
    $chatMessages = Message::where('receiver_id', Auth::id())->orWhere('sender_id', Auth::id())->where('user_type', 'team')->get();

    // Fetch upcoming game
    $upcomingGame = Schedule::with('PlayersSchedule')->where('type', 'game')
        ->where(function ($query) use ($teams) {
            $query->whereIn('team_id', $teams->pluck('id'))
                ->orWhereIn('opposing_team_id', $teams->pluck('id'));
        })
        ->where(function ($query) {
            $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') > ?", [now()->format('Y-m-d')]); // If not today, get the next available
        })
        ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') ASC") // Order by upcoming date
        ->first();

    // Fetch last game
    $lastgame = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
        ->where(function ($query) use ($teams) {
            $query->whereIn('team_id', $teams->pluck('id'))
                ->orWhereIn('opposing_team_id', $teams->pluck('id'));
        })
        ->where(function ($query) {
            $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
        })
        ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
        ->first();

    // Fetch matches
    $matches = Schedule::with('PlayersSchedule')->where('type', 'game')->orWhere('type', 'tournament')
        ->where(function ($query) use ($teams) {
            $query->whereIn('team_id', $teams->pluck('id'))
                ->orWhereIn('opposing_team_id', $teams->pluck('id'));
        })
        ->where(function ($query) {
            $query->whereRaw("STR_TO_DATE(date, '%m/%d/%Y') = ?", [now()->format('Y-m-d')]) // First check today's date
                ->orWhereRaw("STR_TO_DATE(date, '%m/%d/%Y') < ?", [now()->format('Y-m-d')]); // If not today, get the next available
        })
        ->orderByRaw("STR_TO_DATE(date, '%m/%d/%Y') DESC") // Order by upcoming date
        ->latest()->get()->take(4);

    // Fetch discover schedules
    $discoversSchedules = Schedule::where('type', '!=', 'Practice')
        ->where(function ($query) use ($teams) {
            $query->whereIn('team_id', $teams->pluck('id'))
                ->orWhereIn('opposing_team_id', $teams->pluck('id'));
        })
        ->whereBetween(
            DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"),
            [$startOfWeek, $endOfWeek]
        )
        ->orderBy(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"))
        ->orderBy('time') // Optional: Order by time as well
        ->get();

    // Fetch today's and yesterday's messages
    $todayMessages = Message::whereDate('created_at', now()->format('Y-m-d'))->where('receiver_id', Auth::id())->get();
    $yesterdayMessages = Message::whereDate('created_at', now()->subDay()->format('Y-m-d'))->where('receiver_id', Auth::id())->get();

    // Fetch admins based on user role
    $admins = collect();
    if (auth()->user()->role == 'administrator') {
        $teamsArray = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_id');
        $teams = Team::whereIn('id', $teamsArray)->get();

        $teamAdmins = TeamsTeamAdministrator::where('user_id', auth()->id())->pluck('team_administrator_id');
        $admins = User::whereIn('id', $teamAdmins)->get();
    } elseif (auth()->user()->role == 'player') {
        $teamsArray = PlayerMetaTeam::where('user_id', auth()->id())->pluck('team_id');
        $teams = Team::whereIn('id', $teamsArray)->get();

        $players = Player::where('user_id', auth()->id())->pluck('id');
        $playerAdminArray = PlayerMetaAdministrator::whereIn('player_id', $players)->pluck('user_id');
        $admins = User::whereIn('id', $playerAdminArray)->get();
    } elseif (auth()->user()->role == 'club') {
        $teamsArray = Team::where('club_id', $club_id)->pluck('id');
        $teams = Team::where('club_id', $club_id)->get();

        $teamsUserArray = ClubAdministrator::where('club_id', $club_id)->pluck('user_id');
        $admins = User::whereIn('id', $teamsUserArray)->get();
    } else {
        $teamsArray = Team::where('club_id', $club_id)->pluck('id');
        $teams = Team::where('club_id', $club_id)->get();

        $teamsUserArray = TeamsTeamAdministrator::whereIn('team_id', $teamsArray)->pluck('team_administrator_id');
        $playerUserArray = Player::where('club_id', $club_id)->pluck('user_id');

        $userArray = $teamsUserArray->merge($playerUserArray);  // Use merge to combine collections
        $admins = User::whereIn('id', $userArray)->get();
    }
$chatTeam = $teams->whereIn('id',$teamsArray);
    // Title for the view
    $title = "Player's Dashboard";

    // Return the view with all necessary data
    return view('dashboard.player2', compact(
        'user','chatTeam',
        'groupedSchedules',
        'playerSchedules',
        'startOfWeek',
        'endOfWeek',
        'startOfMonth',
        'endOfMonth',
        'teams',
        'locations',
        'searchDate',
        'title',
        'teamId',
        'date',
        'locationId',
        'typeId',
        'viewType', // Ensure $viewType is included
        'todaySchedule',
        'yesterdaySchedule',
        'lastWeekSchedule',
        'upcomingSchedule',
        'announcements',
        'chatMessages',
        'upcomingGame',
        'lastgame',
        'matches',
        'discoversSchedules',
        'todayMessages',
        'yesterdayMessages',
        'admins'
    ));
}

    public function CalanderFilterSchedules(Request $request)
{
    $user = User::where('id',Auth::id())->first();
    $teamId = $request->input('team_id');
    $date = $request->input('date');
    $locationId = $request->input('location_id');
    $typeId = $request->input('type');
    $viewType = $request->input('view_type', 'month');
    $direction = $request->input('btnNxtPrv'); // 'next' or 'previous'
    $searchDate = $request->input('searchDate');
    // Define the date range for filtering
        // dd($sDate);
    if ($direction) {
        try {
            // Parse the input date with 'm/d/y' format
            $sDate = $searchDate;
            $sDate = Carbon::createFromFormat('m/d/Y', trim($sDate));
            
            // Apply the month adjustment based on direction
            if ($direction === 'Next') {
                $sDate->addMonth();
            } elseif ($direction === 'Previous') {
                $sDate->subMonth();
            }

            // Assign the modified date
            $date = $sDate->format('m/d/Y'); // Optionally, format it back to 'm/d/Y' if you need to return the formatted date
            $searchDate = $date;
        } catch (\Exception $e) {
            // Handle any errors if the date format is invalid
            return response()->json(['error' => 'Invalid date format. Please use m/d/Y.'], 400);
        }
    }
    // Define the date range for filtering
    $currentDate = $date ? Carbon::createFromFormat('m/d/Y', $date) : Carbon::now();
    $startOfMonth = $currentDate->copy()->startOfMonth(Carbon::SUNDAY);
    $endOfMonth = $currentDate->copy()->endOfMonth(Carbon::SATURDAY);

    // Start and end of the calendar view (week adjusted)
    $startOfWeek = $startOfMonth->copy()->startOfWeek(Carbon::SUNDAY); // Adjusted to Sunday as the first day of the week
    $endOfWeek = $endOfMonth->copy()->endOfWeek(Carbon::SATURDAY);

    // Base query for schedules
    $query = Schedule::query();

    // Apply filters
    if ($teamId) {
        $query->where('team_id', $teamId);
    }
    if ($date) {
            if ($direction === 'Next'  || $direction === 'Previous') {

                // Query for the full month's data
                $query->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfMonth->toDateString(), $endOfMonth->toDateString()]);
            }else{

                $formattedDate = Carbon::createFromFormat('m/d/Y', $date)->toDateString();
                $query->where(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), $formattedDate);
            }
    } else {
        $query->whereBetween(DB::raw("STR_TO_DATE(date, '%m/%d/%Y')"), [$startOfWeek->toDateString(), $endOfWeek->toDateString()]);
    }
    if ($locationId) {
        $query->where('location', $locationId);
    }
    if ($typeId) {
        $query->where('type', $typeId);
    }

    // Fetch and group schedules by date
    $schedules = $query->get();
    $groupedSchedules = $schedules->groupBy(function ($schedule) {
        return Carbon::createFromFormat('m/d/Y', $schedule->date)->format('Y-m-d');
    });

    // Fetch additional data
    $playerSchedules = PlayerSchedule::with('player')->get()->groupBy('schedule_id');
    if (auth()->user()->role == 'player') {
        $player = Player::where('user_id', auth()->user()->id)->first();
        $playerSchedules = PlayerSchedule::with('player')->where('player_id', $player['id'])->get()->groupBy('schedule_id');
    }
    $teams = Team::all();
    $locations = Location::where('status', '1')->get();
    $title = "Player's Dashboard";
    return view('dashboard.player', compact('user','groupedSchedules','playerSchedules','startOfWeek', 'endOfWeek', 'startOfMonth','endOfMonth', 'teams','searchDate','title', 'locations','viewType', 'teamId', 'date', 'locationId', 'typeId'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
