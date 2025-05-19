<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Models\Club\TeamsTeamAdministrator;
use Illuminate\Support\Facades\Log;
use App\Models\Club\Club;
use App\Models\User;
use App\Models\Club\Team;
use App\Models\Club\Player;
use App\Models\Club\Administrator;
use App\Models\Club\PlayerMetaAdministrator;
use Carbon\Carbon;
use App\Models\Club\ClubAdministrator as CA;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
    $user->is_online = 0;
    $user->save();
        Auth::logout(); // Log out the user

        // Optionally, invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page after logout
        return redirect('/login');
    }
    public function logoutGet()
    {
        $user = Auth::user();
    $user->is_online = 0;
    $user->save();
        Auth::logout();

        // Redirect to the homepage or login page after logout
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        Auth::logout();
         Artisan::call('cache:clear');

        // Optionally, clear other caches if needed
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return view('auth.login');
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
    public function show(string $id)
    {
        //
    }

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

     public function login(Request $request)
    {
        // $pass = Hash::make('12345678');
        // Custom validation
        Log::info('Remember Token Set:', ['remember' => $request->remember]);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)
                        ->where('status', 1) // Check if status is 1
                        ->first();

        if (!$user) {
            // If the user doesn't exist, return a custom error message
            return back()->withErrors([
                'email' => 'User not found.',
            ]);
        }

        // Attempt login
        if ($user && Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user->is_online = 1;
            $user->login_time = Carbon::now();
            $user->save();
            $request->session()->regenerate();
            if(auth()->user()->role == 'administrator'){
                $adminstId = Administrator::where('user_id',auth()->user()->id)->first();
                $adminsId = base64_encode($adminstId->team_id);
                $teamMAdmin = TeamsTeamAdministrator::where('user_id',auth()->user()->id)->first();
                $team = Team::where('id',$teamMAdmin['team_id'])->first();

                session(['club_id' => $team->club_id]);

                session(['user_roles' => ['team', 'player']]);
                return redirect()->route('dashboard',$adminsId);
            }elseif(auth()->user()->role == 'club'){
                $clubid = CA::where('user_id',auth()->user()->id)->first();
              //  dd( $clubid);
                session(['club_id' => $clubid->club_id]);
                $cId = base64_encode($clubid->id);
                session(['user_roles' => ['team', 'player']]);
                return redirect()->route('dashboard');

            }elseif(in_array(auth()->user()->role, ["player","player_administrator"])){
                if(auth()->user()->role == 'player_administrator'){
                    $player = PlayerMetaAdministrator::with('player')->where('user_id',auth()->user()->id)->first();
                    // dd( $player->player->club_id );
                    session(['club_id' => $player->player->club_id]);

                }else{

                    $player = Player::where('user_id',auth()->user()->id)->first();
                    session(['club_id' => $player->club_id]);
                }

                return redirect()->route('dashboard3');

            }elseif(auth()->user()->role == 'master'){
                session(['user_roles' => ['master', 'club', 'team', 'player']]);
                return redirect()->intended('/club-list');

            }else{
                return redirect()->intended('/club-list');

            }
        }

        // If login fails
        return back()->withErrors([
            'password' => 'Password does not match.',
           // 'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
}
