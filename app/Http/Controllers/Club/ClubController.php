<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Club\ClubAdministrator as CA;
use Illuminate\Support\Facades\Validator;
use App\Models\Club\Player;
use Hash;

class ClubController extends Controller
{
    public function listtwo()
    {
        //
        return view('club.listtwo');
    }
    public function login()
    {
        //
        return view('club.login');
    }
    public function designfour()
    {
        //
        return view('club.designfour');
    }
    public function designthree()
    {
        //
        return view('club.designthree');
    }
    public function designtwo()
    {
        //
        return view('club.designtwo');
    }
    public function design()
    {
        //
        return view('club.design');
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $clubs = Club::get();
        
        return view('club.list',compact('clubs'));
    }
     public function editprofile($id)
    {
        //
        $id = base64_decode($id);
        $user = User::where('id',$id)->first();
        $title = $user['name'].' '.$user['last_name'];
        return view('user.editprofile',compact(['user','title']));
    }

    // UserController.php

    public function profileupdate(Request $request)
    {
        $user = auth()->user();
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date|before:today',
            'phone' => 'required|digits_between:10,15',
        ]);

        if ($request->hasFile('dashboard_banner_1')) {
            $banner1 = $request->file('dashboard_banner_1');
            $banner1Name = 'banner1_' . time() . '.' . $banner1->getClientOriginalExtension();
            $banner1->move(public_path('assets'), $banner1Name);
            $user->dashboard_banner_1 = 'assets/' . $banner1Name;
        }

        // Handle Banner 2 Upload
        if ($request->hasFile('dashboard_banner_2')) {
            $banner2 = $request->file('dashboard_banner_2');
            $banner2Name = 'banner2_' . time() . '.' . $banner2->getClientOriginalExtension();
            $banner2->move(public_path('assets'), $banner2Name);
            $user->dashboard_banner_2 = 'assets/' . $banner2Name;
        }

        // Update user details
        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
        
            'gender' => $request->gender,
            'jersey_no' => $request->jersey_no,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);
        if(auth()->user()->role == 'player'){
            $player = Player::where('user_id',auth()->user()->id)->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);

        }
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updateProfileImg(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }
            $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
            $filePath = 'profile_pictures/' . $fileName;
            $request->file('profile_picture')->move(public_path('profile_pictures'), $fileName);
            $validated['profile_picture'] = $filePath;
            if(auth()->user()->role == 'player'){
                $player = Player::where('user_id',auth()->user()->id)->update(['picture' => $validated['profile_picture'] ]);

            }
        }

        // Update user details
        $user->update($validated);
        if($user->role == 'club'){
            $ca = CA::where('user_id',auth()->user()->id)->update(['image'=> auth()->user()->profile_picture]);
           
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('club.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'required|regex:/^[A-Za-z0-9]{3,10}$/',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:13',
            'email' => 'required|email|max:255|unique:clubs,email',
        ]);
          $validator->sometimes('postal_code', 'regex:/^\d{5}(-\d{4})?$/', function ($input) {
        return strtolower($input->country) == 'usa';
        });

        $validator->sometimes('postal_code', 'regex:/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/', function ($input) {
            return strtolower($input->country) == 'canada';
        });
        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
             $targetPath = public_path('logos');
             if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move($targetPath, $fileName);
            $logoPath = 'logos/' . $fileName;
        }
        $pass = Hash::make($request->password);
        $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 'club',
                'status' => $request->status,
                'password' => $pass,

        ]);
        // Create a new club record
        $club = new Club();
        $club->logo = $logoPath;
        $club->user_id = $user->id;
        $club->name = $request->input('name');
        $club->address = $request->input('address');
        $club->city = $request->input('city');
        $club->state = $request->input('state');
        $club->country = $request->input('country');
        $club->postal_code = $request->input('postal_code');
        $club->contact_name = $request->input('contact_name');
        $club->phone = $request->input('phone');
        $club->email = $request->input('email');
        $club->save();

        // Redirect with success message
        return redirect()->route('club.list')->with('success', 'Club created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $club_id = base64_decode($id);
        $club = Club::where('id',$club_id)->first();
        $title = "Edit Club";
        return view('club.edit',compact('club_id','club','title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $club_id = base64_decode($id);
        $club = Club::where('id',$club_id)->first();
        // Validate the incoming request data
        $validatedData = $request->validate([
            'logo' => 'nullable|image|max:2048', // Optional but must be an image and max size of 2MB
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255'
        ]);
        // Handle file upload for the logo if a new one is uploaded
        if ($request->hasFile('logo')) {
            if ($club->logo) {
                 File::delete('public',$club->logo);
            }
           
           $logo = $request->file('logo');
             $targetPath = public_path('logos');
             if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $fileName = time() . '_' . $logo->getClientOriginalName();
            $logo->move($targetPath, $fileName);
            $logoPath = 'logos/' . $fileName;
            $validatedData['logo'] = $logoPath;
        }

        // Update the club data
        $club->update($validatedData);
        $user = User::findOrFail($club->user_id);
        $user->status = !$user->status; // Toggle status
        $user->save();
        // Redirect back with a success message
        return redirect()->route('club.list')->with('success', 'Club details updated successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $club = Club::findOrFail($id);
        $club->status = !$club->status; // Toggle status
        $club->save();

        $user = User::findOrFail($club->user_id);
        $user->status = !$user->status; // Toggle status
        $user->save();
        return redirect()->route('club.list')->with('success', 'Club status updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       
        $id = base64_decode($id);
        $club = Club::find($id);
        $club->delete();

        // Redirect back with a success message
        return redirect()->route('club.list')->with('success', 'Club deleted successfully.');
    }

     public function getCitySuggestions(Request $request)
    {
        $query = $request->input('city');

        // Replace with your actual logic to get state and country based on city.
        // You can fetch from your database or create an array of mappings.
        $cities = [
            'New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Mumbai', 'Delhi', 'Bangalore'
        ];

        // Filter cities based on query, case-insensitive
        $suggestions = array_filter($cities, function ($city) use ($query) {
            return stripos($city, $query) !== false;
        });

        return response()->json(array_values($suggestions));
    }
     public function getLocation(Request $request)
    {
       $city = $request->input('city');

        // Sample data mapping cities to states and countries
        $locationData = [
            'New York' => ['state' => 'New York', 'country' => 'USA'],
            'Los Angeles' => ['state' => 'California', 'country' => 'USA'],
            'Chicago' => ['state' => 'Illinois', 'country' => 'USA'],
            'Houston' => ['state' => 'Texas', 'country' => 'USA'],
            'Phoenix' => ['state' => 'Arizona', 'country' => 'USA'],
            'Mumbai' => ['state' => 'Maharashtra', 'country' => 'India'],
            'Delhi' => ['state' => 'Delhi', 'country' => 'India'],
            'Bangalore' => ['state' => 'Karnataka', 'country' => 'India'],
            // Add more city mappings as needed
        ];

        // Fetch state and country from the mapping, or set defaults if not found
        $state = $locationData[$city]['state'] ?? 'Unknown State';
        $country = $locationData[$city]['country'] ?? 'Unknown Country';

        return response()->json(['state' => $state, 'country' => $country]);
    }
}
