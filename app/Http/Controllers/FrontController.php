<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club\Team;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\Administrator;
use App\Models\Club\Player;

class FrontController extends Controller
{
    public function index3(){

        return view('front.index3');
    }
    public function index2(){

        return view('front.index2');
    }
    public function index(){

        return view('front.index');
    }

    public function about(){

        return view('front.about');
    }

    public function join(){

        return view('front.joinow');
    }
    public function pickup(){

        return view('front.pickup');
    }
    public function events(){

        return view('front.events');
    }
    public function locations(){

        return view('front.locations');
    }
    public function classes(){

        return view('front.classes');
    }
    public function professionals(){

        return view('front.professionals');
    }
    public function contact(){

        return view('front.contact');
    }
    public function getOpposingTeams(Request $request)
    {
        $search = $request->input('search');
        $teamId = $request->input('team_id');
        // Fetch opposing teams based on the selected team ID
        $query = Team::query();
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


    public function checkTeamId($id){
         $match = Team::where('team_unique_id',$id)->first();

        if ($match) {
         $teamPlayersGet = PlayerMetaTeam::where('team_id',$match['id'])->pluck('player_id');
        $players = Player::with(['teamMeta.team','administrator.user'])->whereIn('id',$teamPlayersGet)->get();
            return response()->json(['status' => 'success', 'match' => $match,'players'=> $players]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Team ID not exist']);
        }
    }
    public function globalTeamIdStore($email,$pass,$id){
         $team = Team::where('team_unique_id',$id)->first();
        $usr = User::where('email',$email)->first();
        if($usr){
            return response()->json(['status' => 'error', 'message' => 'Email already exist','email'=>'Email already exist']);
        }else{
            return response()->json(['status' => 'success']);
        }
         // $admin = new User();
         //    $admin->email = $email;
         //    $admin->role = 'player_administrator';
         //    $admin->password = Hash::make($pass);
         //    $admin->save();
         //    session()->put('globalUserId',$admin->id);
         //    PlayerMetaAdministrator::create([
         //                    'user_id' => $admin->id,
         //                    'player_id' => 0000,
         //                    'club_id' => $team['club_id'],
         //        ]);
        // if ($admin) {
        //     return response()->json(['status' => 'success', 'user' => $admin, 'uId' => $admin->id ]);
        // } else {
        //     return response()->json(['status' => 'error', 'message' => 'User not found']);
        // }
    }

    public function globalTeamIdDetailsUpdate($first,$last,$phone,$id){
         // $admin = User::where('id',$id)->update([
         //                                           'name' =>$first, 
         //                                           'last_name' =>$last, 
         //                                           'phone' =>$phone, 
         //                                        ]);
        
            return response()->json(['status' => 'success']);
    }
    public function globalTeamIdDetailsUpdatePlayer_id($email,$matchId,$player_id,$pass,$first,$last,$phone){

        $team = Team::where('team_unique_id',$matchId)->first();
        // $newadmin = new User();
        //     $newadmin->email = $email;
        //     $newadmin->role = 'player_administrator';
        //     $newadmin->name = $first;
        //    $newadmin->last_name = $last; 
        //    $newadmin->phone = $phone;
        //     $newadmin->password = Hash::make($pass);
        //     $newadmin->save();
        //     PlayerMetaAdministrator::create([
        //                     'user_id' => $newadmin->id,
        //                     'player_id' => $player_id,
        //                     'club_id' => $team['club_id'],
        //         ]);
            $player = Player::with(['teamMeta.team','administrator.user'])->where('id',$player_id)->first();
       // $pAdmin = PlayerMetaAdministrator::with('player')->where('user_id',$newadmin->id)->first();
       // $credentials = [
       //      'email' => $newadmin['email'],
       //      'password' => $pass
       //  ];
       //  $remember = filter_var($newadmin['remember'], FILTER_VALIDATE_BOOLEAN);

        if ($player) {
            // $playerd = PlayerMetaAdministrator::with('player')->where('user_id',$newadmin['id'])->first();
            // session(['club_id' => $playerd->player->club_id]);
            return response()->json(['status' => 'success','player' => $player,'team' =>$team]);
        }else {
            return response()->json(['status' => 'error','message' => 'not login']);
        }
    }
    // public function globalTeamIdDetailsUpdatePlayer_idStore($email,$matchId,$player_id,$pass,$first,$last,$phone){

        
    // }

    public function globalTeamIdDetailsUpdateTeamAdmin($email,$matchId,$pass,$type,$first,$last,$phone){
            
        $team = Team::where('team_unique_id',$matchId)->first();
        // PlayerMetaAdministrator::where('user_id',$admin->id)->delete();

        if ($team) {
            return response()->json(['status' => 'success','team' =>$team]);
        }else {
            return response()->json(['status' => 'error','message' => 'not login']);
        }
    }   

    public function globalTeamIdDetailsUpdateTeamAdminStore($usertype,$email,$matchId,$player_id,$pass,$type,$first,$last,$phone){
        if($usertype == 'team'){

            $newadmin = new User();
            $newadmin->email = $email;
            $newadmin->role = 'administrator';
            $newadmin->name = $first;
           $newadmin->last_name = $last; 
           $newadmin->phone = $phone;
            $newadmin->password = Hash::make($pass);
            $newadmin->save();
        $team = Team::where('team_unique_id',$matchId)->first();

    $roleWithSpaces = str_replace('_', ' ', $type);
        $administrator = Administrator::create([
                                                'user_id' => $newadmin->id,
                                                'team' => $team['id'],
                                                'name' => $newadmin->name,
                                                'type' => $roleWithSpaces,
                                                'phone' => $newadmin->phone,
                                                'email' => $newadmin->email,
                                                'status' => 1,
                                            ]);

        TeamsTeamAdministrator::create([
                                'user_id' => $newadmin->id,
                                'team_administrator_id' => $administrator->id,
                                'team_id' => $team['id'],
                    ]);
            

       $credentials = [
            'email' => $newadmin['email'],
            'password' => $pass
        ];
        $remember = filter_var($newadmin['remember'], FILTER_VALIDATE_BOOLEAN);
        // PlayerMetaAdministrator::where('user_id',$admin->id)->delete();
        }
        if($usertype == 'admin'){
            $team = Team::where('team_unique_id',$matchId)->first();
        $newadmin = new User();
            $newadmin->email = $email;
            $newadmin->role = 'player_administrator';
            $newadmin->name = $first;
           $newadmin->last_name = $last; 
           $newadmin->phone = $phone;
            $newadmin->password = Hash::make($pass);
            $newadmin->save();
            PlayerMetaAdministrator::create([
                            'user_id' => $newadmin->id,
                            'player_id' => $player_id,
                            'club_id' => $team['club_id'],
                ]);
            $player = Player::with(['teamMeta.team','administrator.user'])->where('id',$player_id)->first();
       $pAdmin = PlayerMetaAdministrator::with('player')->where('user_id',$newadmin->id)->first();
       $credentials = [
            'email' => $newadmin['email'],
            'password' => $pass
        ];
        $remember = filter_var($newadmin['remember'], FILTER_VALIDATE_BOOLEAN);

        if (Auth::attempt($credentials, true)) {
            $playerd = PlayerMetaAdministrator::with('player')->where('user_id',$newadmin['id'])->first();
            session(['club_id' => $playerd->player->club_id]);
            return response()->json(['status' => 'success', 'user' => $newadmin,'player' => $player,'team' =>$team]);
        }else {
            return response()->json(['status' => 'error','message' => 'not login']);
        }
        }

        if (Auth::attempt($credentials, true)) {
            session(['club_id' => $team['club_id']]);
            return response()->json(['status' => 'success', 'user' => $newadmin,'team' =>$team]);
        }else {
            return response()->json(['status' => 'error','message' => 'not login']);
        }
    }

}
