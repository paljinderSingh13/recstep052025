<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\Sport;
use App\Models\LocationSport;

class LocationController extends Controller
{
    public function index()
    {

        $locations = Location::with('sports')->get(); 
        return view('location.list', compact('locations'));
    }

    public function create()
    {
        $sports = Sport::all();
        return view('location.create', compact('sports'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:locations|max:255',
            'address' => 'nullable|required',
            'google_map_link' => 'nullable|required',
            'sport_id' => 'nullable|required',
        ]);

        $location = Location::create($request->only(['name', 'address', 'google_map_link']));

    $location->sports()->sync($request->sport_id);

        return redirect()->route('sports_locations.index')->with('success', 'Location created successfully.');
    }

    public function show(Location $location)
    {
        return view('location.show', compact('location'));
    }

    public function edit($id)
    {
        $sports = Sport::all();
        $location = Location::where('id',$id)->first();
        $selectedSports = $location->sports->pluck('id')->toArray();
        return view('location.edit', compact('location','sports', 'selectedSports'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'google_map_link' => 'required|url',
            'sport_id' => 'array', // Ensure sport_id is an array
            'sport_id.*' => 'exists:sports,id',
            'status' => 'required',
        ]);
        $location = Location::where('id',$id)->first();
        $location->update($request->only(['name', 'address', 'google_map_link','status']));

        LocationSport::where('location_id',$location->id)->delete();
        
        foreach($request->sport_id as $key => $value) {
            LocationSport::create(['location_id' => $location->id,
                'sport_id'=>$value ]);
        }

        return redirect()->route('sports_locations.index')->with('success', 'Location updated successfully.');
    }


    public function destroy($id)
    {
        $location = Location::where('id',$id)->first();
        $location->delete();
        return redirect()->route('sports_locations.index')->with('success', 'Location deleted successfully.');
    }
}
