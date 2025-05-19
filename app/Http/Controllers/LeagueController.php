<?php

namespace App\Http\Controllers;

use App\Interfaces\LeagueServiceInterface;
use App\Http\Requests\StoreLeagueRequest;
use Illuminate\Http\Request;
use App\Models\League;
use App\Models\LeagueLog;
use App\Models\Location;
use Illuminate\Support\Str;

class LeagueController extends Controller
{
    private LeagueServiceInterface $leagueService;

    public function __construct(LeagueServiceInterface $leagueService)
    {
        $this->leagueService = $leagueService;
    }

    public function index()
    {
        $title = 'League';
        return view('leagues.index', [
        'leagues' => $this->leagueService->getAllLeagues(),
        'title' => $title,
        'user' => auth()->user()
        ]);
    }

    public function create()
    {
        $user = auth()->user();
        $title = 'Create New League';
        $locations = Location::where('status','1')->get();
        return view('leagues.create',compact('user','title','locations'));
    }

    public function store(StoreLeagueRequest $request)
    {
        $league = $this->leagueService->createLeague($request->validated());
        session(['league_id' => $league->id]);
        session(['current_league' => $league]);
        $league_id = $league['id'];
        $title = $league['name'].' league created';
        $type = 'League';
        $link = route('league.setup',$league->id);
        $linkTitle = 'View League';
        log_league_action($league_id, $title, $type,$linkTitle,$link);
        return redirect()->route('commissioner.index',$league->slug)
            ->with('success', 'League created successfully.');
    }

       public function show($id)
    {
        $league = League::where('slug',$id)->first();
        session(['slug' => $league['slug']]);
        session(['league_id' => $league->id]);
        session(['current_league' => $league]);
        $title = 'League';
        $leagueLogs = LeagueLog::where('user_id',auth()->user()->id)->where('league_id',session('league_id'))->get();
        return view('leagues.show', compact('league','title','leagueLogs'));
    }

    public function edit(int $id)
    {
        $league = $this->leagueService->getLeagueById($id);
        session(['league_id' => $league->id]);
        session(['current_league' => $league]);
        $cleague = session('current_league');
        $title = 'League Settings';
        return view('leagues.edit', ['league'=>$league,'user' =>auth()->user(),'title' => $title]);
    }

   public function update(Request $request)
    {
        // Get the league from session
        $league = League::find(session('league_id'));
        
        if (!$league) {
            return redirect()->back()->with('error', 'League not found');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:leagues,slug,' . $league->id,
            'sport' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'timezone' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle logo upload only if new logo is provided
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($league->logo) {
                $oldLogoPath = public_path($league->logo);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }
            
            // Store new logo in public directory
            $logoFile = $request->file('logo');
            $logoName = time().'_'.Str::slug($logoFile->getClientOriginalName());
            $path = 'images/leagues/';
            
            // Create directory if it doesn't exist
            if (!file_exists(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }
            
            // Move to public directory
            $logoFile->move(public_path($path), $logoName);
            $validated['logo'] = $path.$logoName;
        } else {
            // Keep existing logo if no new logo is uploaded
            unset($validated['logo']);
        }

        // Update the league
        $updated = $league->update($validated);

        if (!$updated) {
            return redirect()->back()->with('error', 'Failed to update league');
        }

        return redirect()->route('leagues.index')
            ->with('success', 'League updated successfully');
    }

    public function destroy(int $id)
    {
        $league = $this->leagueService->getLeagueById($id);
        // $this->authorize('delete', $league);
        
        $this->leagueService->deleteLeague($id);
        return redirect()->route('leagues.index')
            ->with('success', 'League deleted successfully');
    }
    

    public function home()
    {
        
        return view('leagues.home');
    }
    public function view($league_id)
    {
        $league = League::where('id',$league_id)->first();
            session(['slug' => $league['slug']]);
            session(['league_id' => $league->id]);
            session(['current_league' => $league]);
            $slug = session('slug');
        return redirect()->route('league.profile.index',$slug);
    }
    public function setup($id)
        {
            $id = $id;
            $league = League::where('id',$id)->first();
            $title = 'League Setup';
            return view('leagues.leagueSetup',compact('title','id','league'));
        }
}