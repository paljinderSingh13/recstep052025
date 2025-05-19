<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club\Team;
use App\Models\Club\Club;
use App\Models\Club\ClubAdministrator as CA;
use App\Models\Club\TeamsTeamAdministrator;
use App\Models\Club\Player;
use App\Models\User;
use App\Models\Club\PlayerMetaTeam;
use App\Models\Club\PlayerMetaAdministrator;
use App\Models\Club\ClubAnnouncement;
use App\Models\Club\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;
class ClubAnnouncementController extends Controller
{
    


    public function index() {
        $club_id = session('club_id');
        $announcements = ClubAnnouncement::where('user_id',Auth::id())->where('club_id',$club_id)->get();
        return view('club.announcement.list', compact('announcements'));
    }

    // Show form for creating a new announcement
    public function create() {
        return view('club.announcement.create');
    }

    // Store new announcement
    public function store(Request $request) {
        $request->validate([
            'announcement' => 'required|string|max:1000',
        ]);

        ClubAnnouncement::create([
            'announcements' => $request->announcement,
            'user_id' => Auth::id(),
            'club_id' => session('club_id'),
        ]);

        return redirect()->route('club.announcement.list')->with('success', 'Announcement created successfully!');
    }

    // Show edit form
    public function edit( $id) {
        $id = base64_decode($id);
        $announcement = ClubAnnouncement::where('id',$id)->first();
        return view('club.announcement.edit', compact('announcement'));
    }

    // Update announcement
    public function update(Request $request) {
        $request->validate([
            'announcement' => 'required|string|max:1000',
        ]);

        $announcement = ClubAnnouncement::where('id',$request->id)->update([
            'announcements' => $request->announcement,
        ]);

        return redirect()->route('club.announcement.list')->with('success', 'Announcement updated successfully!');
    }

    // Delete announcement
    public function destroy($id) {
        $id = base64_decode($id);
        $announcement = ClubAnnouncement::where('id',$id)->delete();
        return redirect()->route('club.announcement.list')->with('success', 'Announcement deleted successfully!');
    }
}
