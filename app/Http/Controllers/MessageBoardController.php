<?php

// app/Http/Controllers/LeagueTeamController.php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\LeagueTeam;
use App\Models\LeagueMessage;
use App\Models\User;
use Illuminate\Http\Request;

class MessageBoardController extends Controller
{
     public function index()
    {
        $teams = LeagueTeam::where('user_id',auth()->user()->id)->paginate(20);
        $user  = auth()->user();
        $title = 'Message Board';
        return view('leagues/messagesBoard', compact('teams','user','title'));
    }

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = 'Standing';
        return view('leagues/standings.create',compact('user','title'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request, League $league)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:league_teams,name,NULL,id,league_id,'.$league->id,
            'email' => 'nullable|email',
            'home_field_id' => 'nullable'
        ]);

        $leagueTeam = LeagueTeam::create([
            'name' => $validated['name'],
            'home_field' => $validated['home_field_id'],
            'user_id' => auth()->user()->id,
            'email' => $request->email,
            'status' => true
        ]);

        return redirect()->back()->with('success', 'Team created successfully!');
    }

    /**
     * Show the form for editing a league team
     */
    public function edit(League $league, LeagueTeam $leagueTeam)
    {
        $team = LeagueTeam::where('user_id',auth()->user()->id)->first();
        $user  = auth()->user();
        return view('leagues/standings.edit', compact('team', 'user'));
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
    public function show()
    {

        return view('leagues/standings.show');
    }

    public function messageindex()
    {
        $messages = LeagueMessage::with('user')
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function($message) {
               return [
                    'id' => $message->id,
                    'content' => $message->content,
                    'created_at' => $message->created_at,
                    'user_avatar' => $message->user->profile_picture 
                        ? asset('public/' . $message->user->profile_picture) 
                        : asset('images/default-avatar.png'),
                    'is_current_user' => $message->user_id === auth()->id(),
                    'user_name' => $message->user->name // Optional: include user name
                ];
            });

        return response()->json([
            'success' => true,
            'messages' => $messages
        ]);
    }

    public function messagestore(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500'
        ]);

        $message = LeagueMessage::create([
            'user_id' => auth()->id(),
            'content' => $request->message
        ]);

        return response()->json([
            'success' => true,
            'message' => $message->load('user')
        ]);
    }
}