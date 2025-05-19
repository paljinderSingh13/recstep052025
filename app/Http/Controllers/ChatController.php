<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\GroupMessage;
use App\Models\Club\Team;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\Club;
use App\Models\Club\ClubAdministrator;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\Player;
use App\Models\User;
use App\Events\MessageSent;
use Auth;
use Carbon\Carbon;
use DB;
class ChatController extends Controller {
    public function index() {
        return view('chat');
    }
    public function sendMessage(Request $request) {
        event(new MessageSent($message));
    }
    public function fetchMessages(Request $request) {
        $messages = Message::where('sender_id', Auth::id())->where('receiver_id', $request->receiver_id)->orWhere('sender_id', $request->receiver_id)->where('receiver_id', Auth::id())->orderBy('created_at', 'asc')->get();
        return response()->json($messages);
    }
    public function getMessages($receiverId) {
        // Get the authenticated user's ID
        $authUserId = Auth::id();
        // Fetch messages where the authenticated user is the sender and the receiver is the recipient
        // OR where the authenticated user is the receiver and the sender is the recipient
        $messages = Message::where(function ($query) use ($authUserId, $receiverId) {
            $query->where('sender_id', $authUserId)->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($authUserId, $receiverId) {
            $query->where('sender_id', $receiverId)->where('receiver_id', $authUserId);
        })->orderBy('created_at', 'asc') // Order messages by creation date (ascending)
        ->get();
        // Return the messages as a JSON response
        return response()->json($messages);
    }
    // Store a new message
    public function store(Request $request) {
        $message = Message::create(['sender_id' => $request->sender_id, 'receiver_id' => $request->receiver_id, 'message' => $request->message, ]);
        return response()->json($message);
    }
    public function getTeamMessages($type, $teamId) {
        // Fetch messages for the team
        $authId = Auth::id();
        if ($type == 'team') {
            $messages = Message::with(['user', 'sender', 'receiver'])->where('user_id', $teamId)->where('user_type', 'team')->get()->map(function ($message) {
        if ($message->sender) {
            $message->sender->profile_picture = $message->sender->profile_picture 
                ? asset($message->sender->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        if ($message->receiver) {
            $message->receiver->profile_picture = $message->receiver->profile_picture 
                ? asset($message->receiver->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        return $message;
    });
            $name = Team::where('id', $teamId)->pluck('name');
            $imgUser = User::where('id', $teamId)->first();
            $img = $imgUser && $imgUser->profile_picture
    ? asset($imgUser->profile_picture)
    : asset('assets/images/dummyUser.jpg');
            $userMesg = GroupMessage::where('receiver_id', Auth::id())->where('team_id', $teamId)->update(['is_read' => 'yes']);
            // $userModel = User::where('id', Auth::id())->update(['unread_count' => 0]);
        } else {
            $messages = Message::with(['user', 'sender', 'receiver'])->where(function ($query) use ($teamId) {
                $query->where('sender_id', $teamId)->orWhere('receiver_id', $teamId);
            })->where('user_type', '!=', 'team') // Exclude rows where user_type is 'team'
            ->get()->map(function ($message) {
        if ($message->sender) {
            $message->sender->profile_picture = $message->sender->profile_picture 
                ? asset($message->sender->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        if ($message->receiver) {
            $message->receiver->profile_picture = $message->receiver->profile_picture 
                ? asset($message->receiver->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        return $message;
    });;
            $name = User::where('id', $teamId)->pluck('name');
            $imgUser = User::where('id', $teamId)->first();
            $img = $imgUser && $imgUser->profile_picture
    ? asset($imgUser->profile_picture)
    : asset('assets/images/dummyUser.jpg');
            $userMesg = Message::where('receiver_id', Auth::id())->where('sender_id', $teamId)->update(['is_read' => 'yes']);
            // $userModel = User::where('id', $teamId)->update(['unread_count' => 0]);
        }
        return response()->json(['messages' => $messages, 'name' => $name, 'img' => $img]);
    }
    public function storeTeamMessage(Request $request, $type, $teamId) {
        // Store a new message
        $message = new Message();
        $message->sender_id = Auth::id();
        $message->receiver_id = $teamId;
        $message->user_id = $teamId;
        $message->message = $request->message;
        $message->type = "outgoing"; // Customize as needed
        $message->user_type = $type; // Customize as needed
        $message->save();
        if ($type == "team") {
            $team = Team::find($teamId);
            if (!$team) {
                // Handle the case where the team does not exist
                throw new \Exception("Team not found");
            }
            // Get associated users
            $club = Club::where('id', $team->club_id)->pluck('user_id')->toArray();
            $clubAdmins = ClubAdministrator::where('club_id', $team->club_id)->pluck('user_id')->toArray();
            $teamUsers = TeamsTeamAdministrator::where('team_id', $teamId)->pluck('user_id')->toArray();
            // Get player IDs associated with the team
            $playersArray = PlayerMetaTeam::where('team_id', $team->id)->pluck('player_id')->toArray();
            $players = Player::whereIn('id', $playersArray)->pluck('user_id')->toArray();
            // Merge all user IDs into a single array
            $mergeArray = array_merge($club, $clubAdmins, $teamUsers, $players);
            $uniqueUserIds = array_unique($mergeArray); // Ensure no duplicates
            // Retrieve users from the database
            $megaUsersArray = User::whereIn('id', $uniqueUserIds)->get();
            // Process each user
            foreach ($megaUsersArray as $user) {
                if($user->id != Auth::id()){

                    GroupMessage::create(['sender_id' => Auth::id(), 'receiver_id' => $user->id, 'team_id' => $teamId, 'message_id' => $message->id, ]);
                    // Update unread_count for the user
                    User::where('id', $user->id)->increment('unread_count');
                }
            }
        } else {
            $user = User::where('id', $teamId)->first();
            $count = (int)$user['unread_count'] + 1;
            $userModel = User::where('id', $teamId)->update(['unread_count' => $count]);
        }
        return response()->json(['success' => true]);
    }
    public function getTeams() {
        // Fetch all teams from the database
        $club_id = session('club_id');
        if (auth()->user()->role == 'player') {
            $players = PlayerMetaTeam::where('user_id', auth()->user()->id)->first();
            $teams = Team::where('club_id', $club_id)->where('id', $players['team_id'])->get();
        } else {
            $teams = Team::where('club_id', $club_id)->get();
        }

        $gMessages = GroupMessage::where('receiver_id', Auth::id())->where('is_read', 'no')->pluck('message_id');
        $teamMessages = Message::with('sender')->where('user_type', 'team')->whereIn('id', $gMessages)->latest()->take(20)->get();

        
        $latesUsersIds = [];
        foreach ($teamMessages as $key => $value) {
                
            $latesUsersIds[] = $value['receiver_id'];


            // if($value['sender_id'] == Auth::id()){
            //     if(!in_array($value['receiver_id'],$latesUsersIds)){
            //         $latesUsersIds[] = $value['receiver_id'];
            //     }
            // }else if($value['receiver_id'] == Auth::id()){
            //     if(!in_array($value['sender_id'],$latesUsersIds)){
            //     $latesUsersIds[] = $value['sender_id'];                
            //     }

            // }
        }
        return response()->json(['success' => true, 'teams' => $teams,'hasTeamMessage' =>$latesUsersIds ]);
    }
    public function getadmins() {
        
        $activeUsers = User::where('is_online', 1)->get();

        foreach ($activeUsers as $user) {
            $loginTime = Carbon::parse($user->login_time);
            $loginTimeAfter4Hours = $loginTime->addHours(6);
            if ($loginTimeAfter4Hours < Carbon::now()) {
                $getUser = User::find($user->id);
                $getUser->is_online = 0;
                $getUser->save();
                
            }
        }
        $club_id = session('club_id');
        if (auth()->user()->role == 'player') {
            $Teamsplayer = PlayerMetaTeam::where('user_id', auth()->user()->id)->pluck('team_id')->toArray();
            $teams = Team::whereIn('id', $Teamsplayer)->pluck('id')->toArray();
            $playersArray = PlayerMetaTeam::whereIn('team_id', $teams)->pluck('player_id')->toArray();
            $players = Player::whereIn('id', $playersArray)->pluck('user_id')->toArray();
            $teamUsers = TeamsTeamAdministrator::whereIn('team_id', $teams)->pluck('user_id')->toArray();
            $mergedUsers = array_merge($teamUsers, $players);
            $mergedUsers = array_filter($mergedUsers, function ($userId) {
                return $userId !== Auth::id();
            });
        } else {
            $teams = Team::where('club_id', $club_id)->pluck('id');
            $teamUsers = TeamsTeamAdministrator::whereIn('team_id', $teams)->pluck('user_id')->toArray();
            $ClubUsers = ClubAdministrator::where('club_id', $club_id)->pluck('user_id')->toArray();
            $players = PlayerMetaTeam::whereIn('team_id', $teams)->pluck('user_id')->toArray();
            $mergedUsers = array_merge($teamUsers, $ClubUsers, $players);
            $mergedUsers = array_filter($mergedUsers, function ($userId) {
                return $userId !== Auth::id();
            });
        }

        $latestusers = Message::select('sender_id','receiver_id')->where('user_type','admin')->where('receiver_id', Auth::id())->orWhere('sender_id', Auth::id())->latest()->get() // Fetch sender and receiver IDs
        ->flatten() // Combine all IDs into a single collection
        ->unique() // Get unique user IDs
        ->take(20) // Limit to 20 most recent
        ->toArray();
        $latesUsersIds = [];
        foreach ($latestusers as $key => $value) {
            if($value['sender_id'] == Auth::id()){
                if(!in_array($value['receiver_id'],$latesUsersIds)){
                    $latesUsersIds[] = $value['receiver_id'];
                }
            }else if($value['receiver_id'] == Auth::id()){
                if(!in_array($value['sender_id'],$latesUsersIds)){
                $latesUsersIds[] = $value['sender_id'];                
                }

            }
        }
        // $latestusers = Message::where('user_type','admin')->where(function ($query) {
        //     $query->where('receiver_id', Auth::id())->orWhere('sender_id', Auth::id());
        // })->latest()->pluck('sender_id', 'receiver_id') // Fetch sender and receiver IDs
        // ->flatten() // Combine all IDs into a single collection
        // ->unique() // Get unique user IDs
        // ->take(20) // Limit to 20 most recent
        // ->toArray();
        // Fetch all users, with unread message counts
        // dd($latestusers);
        $users = User::withCount([
        'messagesCount as unread_messages_count',
        'messagesTeamCount as unread_team_messages_count'
    ])
    ->whereIn('id', $mergedUsers)
    ->get()
    ->map(function ($user) {
        $user->profile_picture = $user->profile_picture 
            ? asset($user->profile_picture) 
            : asset('assets/images/dummyUser.jpg'); // Default profile picture
        return $user;
    });
        // Prioritize latest users at the top
           $latestUsersSet = collect(); // Use a collection for easier merging

            foreach ($latesUsersIds as $luser) {
                if ($luser != auth()->id()) { // Exclude authenticated user
                    $getuser = User::where('id', $luser)->first();
                    if ($getuser) {
                        $latestUsersSet->push($getuser);
                    }
                }
            }

            // Filter users that are not in $latestUsersSet
            $otherUsersSet = collect($users)->reject(function ($user) use ($latestUsersSet) {
                return $latestUsersSet->contains('id', $user->id); // Properly compare IDs
            });

            // Merge collections
            $users = $latestUsersSet->merge($otherUsersSet);

        $adminMessages = Message::with('sender')->where('user_type', 'admin')->where('receiver_id', Auth::id())->where('is_read', 'no')->latest()->take(20)->get();
        
        $gMessages = GroupMessage::where('receiver_id', Auth::id())->where('is_read', 'no')->pluck('message_id');
        $teamMessages = Message::with('sender')->where('user_type', 'team')->whereIn('id', $gMessages)->latest()->take(20)->get();
        $mergedMessages = $adminMessages->merge($teamMessages);
        $messages = $mergedMessages->sortByDesc('created_at')->values();
        return response()->json(['success' => true, 'admins' => $users, 'messages' => $messages, ]);
    }
    public function getUnreadNotifications() {
        $adminMessages = Message::with('sender')->where('user_type', 'admin')->where('receiver_id', Auth::id())->where('is_read', 'no')->latest()->take(20)->get()->map(function ($message) {
        if ($message->sender) {
            $message->sender->profile_picture = $message->sender->profile_picture 
                ? asset($message->sender->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        return $message;
    });
        
        $gMessages = GroupMessage::where('receiver_id', Auth::id())->where('is_read', 'no')->pluck('message_id');
        $teamMessages = Message::with('sender')->where('user_type', 'team')->whereIn('id', $gMessages)->latest()->take(20)->get()->map(function ($message) {
        if ($message->sender) {
            $message->sender->profile_picture = $message->sender->profile_picture 
                ? asset($message->sender->profile_picture) 
                : asset('assets/images/dummyUser.jpg'); // Default profile picture
        }
        return $message;
    });
        $mergedMessages = $adminMessages->merge($teamMessages);
        $messages = $mergedMessages->sortByDesc('created_at')->values();
        return response()->json(['success' => true, 'messages' => $messages, ]);
    }
    public function getUserprofile($id) {
        $user = User::find($id);
        return response()->json([
            'profile_picture' => $user && $user->profile_picture
                ? asset($user->profile_picture)
                : asset('assets/images/dummyUser.jpg'), // Default profile picture
        ]);
    }
}
