<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\Club\Player;
use App\Models\Club\Schedule;
use App\Models\Club\InvitedEvent;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    /**
     * Display the event creation form.
     */
    public function create()
    {
        $locations = Location::where('status','1')->get();
        $players = Player::all();
        
        return view('events.create',compact('locations','players')); // Blade view for the form
    }

    /**
     * Store the event data in the database.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'event_name' => 'required|string|max:255',
            'event_description' => 'required|string',
            'status' => 'required|in:public,private',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new event record
    $schedule = Schedule::create([
            'name' => $request->event_name,
            'description' => $request->event_description,
            'event_status' => $request->status,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'type' => $request->type,
            'schedule_type' => 'event',
            'city' => $request->city,
            'cost' => $request->cost,
        ]);

        foreach ($request->players as $key => $value) {
             InvitedEvent::create([
                'schedule_id' => $schedule->id,
                'player_id' => $value,
                                    ]);
         } 
        // Redirect to a success page or back with a success message
        return redirect()->route('event.create')->with('success', 'Event created successfully!');
    }

     public function show()
    {
        
    $events = Schedule::where('schedule_type','event')->orderBy('id','desc')->get();
        return view('events.list',compact('events')); // Blade view for the form
    }
}
