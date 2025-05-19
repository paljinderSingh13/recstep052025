<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LeagueTeam;
use App\Models\LeagueField;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
class FieldsController extends Controller {
    public function index()
    {
        $fields = LeagueField::where('league_id',session('league_id'))->latest()->paginate(10);
        $user  = auth()->user();
        $title = 'Field';
        return view('leagues/field.index', compact('fields','user','title'));
    }

    /**
     * Show the form for creating a new league team
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $title = 'Field';
        return view('leagues/field.create',compact('user','title'));
    }

    /**
     * Store a newly created league team
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'google_maps_embed' => 'nullable|string'
        ]);

        // Extract latitude and longitude from address (you might want to use Google Maps API for this)
        // This is a simplified version - in production you'd use geocoding
        $latitude = null;
        $longitude = null;

        LeagueField::create([
            'name' => $request->name,
            'league_id' => session('league_id'),
            'address' => $request->address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'google_maps_embed' => $request->google_maps_embed
        ]);

        return redirect()->route('league.fields.index',session('slug'))
            ->with('success', 'Field created successfully.');
    }

    /**
     * Show the form for editing a league team
     */
    public function edit(League $league, LeagueTeam $leagueTeam)
    {
        $team = LeagueTeam::where('user_id',auth()->user()->id)->first();
        $user  = auth()->user();
        return view('leagues/field.edit', compact('team', 'user'));
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
        $title = 'Standing';
        return view('leagues/field.show',compact('title'));
    }
}
