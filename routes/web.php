<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Club\ClubAdministrator;
use App\Http\Controllers\Club\ClubAnnouncementController;
use App\Http\Controllers\Club\TeamController;
use App\Http\Controllers\Club\PlayerController;
use App\Http\Controllers\Club\AdministratorController;
use App\Http\Controllers\Club\PlayerAdministratorController;
use App\Http\Controllers\Club\ScheduleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\CommissionerController;
use App\Http\Controllers\CommissionerSettingsController;
use App\Http\Controllers\LeagueTeamController;
use App\Http\Controllers\StandingsController;
use App\Http\Controllers\MessageBoardController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\LeagueGameController;
use App\Http\Controllers\LeaguePlayerController;
use App\Http\Controllers\LeagueProfileController;
use App\Http\Controllers\LeagueDivisionController;
use App\Http\Controllers\LeagueScheduleController;
use App\Http\Controllers\LeaguePlayerPaymentController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\RefereeAssignmentController;
use App\Http\Controllers\LeagueScoreController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/api/messages', [ChatController::class, 'store']);
// Route::get('/api/messages/{receiverId}', [ChatController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::resource('leagues', LeagueController::class);
    Route::get('league/view/{id}', [LeagueController::class,'view'])->name('league.view');
    Route::get('leagues/{url}', [LeagueController::class,'show'])->name('leagues.show.url');
    
        Route::get('leagues/show', [LeagueController::class, 'show'])->name('league.show');
        Route::get('leagues/home', [LeagueController::class, 'home'])->name('league.home');
        Route::get('league/setup/{id}', [LeagueController::class, 'setup'])->name('league.setup');
});
Route::get('/player/payments/{id}/{team_id}', [LeaguePlayerPaymentController::class, 'store'])->name('league.player.payment.confirm');

Route::get('/player/payments/is_verified/{id}/{team_id}', [LeaguePlayerPaymentController::class, 'updateVerify'])->name('league.payment.is_verified');
// routes/web.php
 Route::get('/teamsByDivision/{id}', [LeagueScheduleController::class, 'teamsByDivision'])->name('league.teamsByDivision');

Route::prefix('league/{slug}')->middleware(['auth'])->group(function () {
        Route::get('/profile', [LeagueProfileController::class, 'index'])->name('league.profile.index');
        // Division
        Route::get('/division', [LeagueDivisionController::class, 'index'])->name('league.division.index');
        Route::get('/division/create', [LeagueDivisionController::class, 'create'])->name('league.division.create');
        Route::post('/division/store', [LeagueDivisionController::class, 'store'])->name('league.division.store');
        Route::get('/division/show', [LeagueDivisionController::class, 'show'])->name('league.division.show');
        // Schedule
        Route::any('/schedule', [LeagueScheduleController::class, 'index'])->name('league.schedule.index');
        Route::get('/schedule/create', [LeagueScheduleController::class, 'create'])->name('league.schedule.create');
        Route::get('/schedule/list', [LeagueScheduleController::class, 'list'])->name('schedule.list');
		Route::get('schedule/add', [LeagueScheduleController::class, 'add'])->name('league.schedule.add');
		Route::post('schedule/Store', [LeagueScheduleController::class, 'Store'])->name('league.schedule.Store');
		Route::get('schedule/get-opposing-teams', [LeagueScheduleController::class, 'getOpposingTeams'])->name('league.get-opposing-teams');
		

		Route::get('score/{id}', [LeagueScoreController::class, 'index'])->name('league.games.index');
		Route::get('score/create/{id}', [LeagueScoreController::class, 'create'])->name('league.score.create');
		Route::post('/EnterScore/{gameId}/store-score', [LeagueScoreController::class, 'store'])->name('league.games.store-score');

		Route::post('/EnterScore/{gameId}/store-stat', [LeagueScoreController::class, 'storestatScore'])->name('league.games.store-stat');



Route::get('/clubs/{club}/teams',[LeagueTeamController::class, 'getClubTeams'])->name('league.teams.getClubTeams');
        Route::get('/teams', [LeagueTeamController::class, 'index'])->name('league.teams.index');
 Route::get('/teams/show', [LeagueTeamController::class, 'show'])->name('league.teams.show');
 Route::get('/fieldsdirections', [FieldsController::class, 'index'])->name('league.fields.index');
 Route::get('/fieldsdirections/create', [FieldsController::class, 'create'])->name('league.fields.create');
 Route::POST('/fieldsdirections/store', [FieldsController::class, 'store'])->name('league.fields.store');

 Route::get('/games', [LeagueGameController::class, 'index'])->name('league.game.index');
 Route::get('/game/create', [LeagueGameController::class, 'create'])->name('league.game.create');
 Route::post('/games/store', [LeagueGameController::class, 'store'])->name('league.games.store');

  Route::get('/players', [LeaguePlayerController::class, 'index'])->name('league.player.index');
 Route::get('/player/create', [LeaguePlayerController::class, 'create'])->name('league.player.create');
 Route::post('/players/store', [LeaguePlayerController::class, 'store'])->name('league.players.store');
 Route::post('/players/show', [LeaguePlayerController::class, 'show'])->name('league.players.show');

        Route::get('/teams/create', [LeagueTeamController::class, 'create'])->name('league.teams.create');
        Route::post('/teams', [LeagueTeamController::class, 'store'])->name('league.teams.store');
        Route::get('/teams/{leagueTeam}/edit', [LeagueTeamController::class, 'edit'])->name('league.teams.edit');
        Route::put('/teams/{leagueTeam}', [LeagueTeamController::class, 'update'])->name('league.teams.update');
        Route::delete('/teams/{leagueTeam}', [LeagueTeamController::class, 'destroy'])->name('league.teams.destroy');
        Route::middleware(['auth'])->group(function () {
        Route::resource('commissioner', CommissionerController::class);
    	Route::resource('standing', StandingsController::class);
    	Route::resource('referees', RefereeController::class);
        Route::get('commissioners/settings', [CommissionerController::class,'settings'])->name('commissioners.setting');
    	Route::get('league_referee/position', [RefereeController::class,'positionIndex'])->name('referee.position');
    	Route::get('league_referee/position/create', [RefereeController::class,'positionCreate'])->name('referee.position.create');
    	Route::post('league_referee/position/store', [RefereeController::class,'positionStore'])->name('referee.position.store');
    	Route::get('league_referee/position/assign', [RefereeController::class,'positionAssign'])->name('referee.position.assign');


    	Route::get('/referees/assignments', [RefereeAssignmentController::class, 'index'])
        ->name('leagues.referees.assignments');
	    Route::get('/referees/get-assignments', [RefereeAssignmentController::class, 'getAssignments'])
	        ->name('leagues.referees.get-assignments');
	    Route::post('/referees/assign', [RefereeAssignmentController::class, 'assignReferees'])
	        ->name('leagues.referees.assign');
    	Route::get('message/board', [MessageBoardController::class,'index'])->name('message.board');
    	Route::get('/leagueMessages', [MessageBoardController::class, 'messageindex'])->name('league.message.index');
    	Route::post('/leagueMessages', [MessageBoardController::class, 'messagestore'])->name('league.message.store');
    });

});
Route::get('/schedule/{scheduleId}/players/{opposingId}', [ScheduleController::class, 'getPlayerSchedules']);
Route::get('/team-player/{id}', [TeamController::class, 'mainTeamList'])->name('team-player-id');
Route::get('/get-opposing-teams', [FrontController::class, 'getOpposingTeams']);
Route::get('/check-team-id/{id}', [FrontController::class, 'checkTeamId'])->name('check-team-id');
Route::get('/global-team-id/store/{email}/{pass}/{id}', [FrontController::class, 'globalTeamIdStore'])->name('globalteamid.store');
Route::get('/global-Team-Id/Details/Update/{first}/{last}/{phone}/{id}', [FrontController::class, 'globalTeamIdDetailsUpdate'])->name('globalTeamIdDetails.update');

Route::get('/globals-Team-Id/Details/Update/player_id/{email}/{match_id}/{player_id}/{pass}/{first}/{last}/{phone}', [FrontController::class, 'globalTeamIdDetailsUpdatePlayer_id'])->name('globalTeamIdDetails.update.player_id');


Route::get('/globals-Team-Id/Details/Update/team/{email}/{match_id}/{pass}/{type}/{first}/{last}/{phone}', [FrontController::class, 'globalTeamIdDetailsUpdateTeamAdmin'])->name('globalTeamIdDetails.update.team');
Route::get('/globals-Team-Id/Details/Update/team/store/{utype}/{email}/{match_id}/{player_id}/{pass}/{type}/{first}/{last}/{phone}', [FrontController::class, 'globalTeamIdDetailsUpdateTeamAdminStore'])->name('globalTeamIdDetails.update.team.store');


Route::get('/user/reset/password', [UserController::class, 'resetpassword'])->name('user.reset.password');
Route::get('/user/success', [UserController::class, 'success'])->name('user.success');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('password.update.user');



Route::get('/user/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
Route::post('/user/password/email', [ForgotPasswordController::class, 'sendResetLink'])->name('user.password.email');
Route::get('/user/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/user/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/index2', [FrontController::class, 'index2'])->name('front.index2');
Route::get('/index3', [FrontController::class, 'index3'])->name('front.index3');
Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/join-now', [FrontController::class, 'join'])->name('front.join');
Route::get('/pickup', [FrontController::class, 'pickup'])->name('front.pickup');
Route::get('/events', [FrontController::class, 'events'])->name('front.events');
Route::get('/locations', [FrontController::class, 'locations'])->name('front.locations');
Route::get('/classes', [FrontController::class, 'classes'])->name('front.classes');
Route::get('/professionals', [FrontController::class, 'professionals'])->name('front.professionals');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');




Route::get('login', [LoginController::class, 'create'])->name('login');
Route::get('password/request', [LoginController::class, 'passwordRequest'])->name('password.request');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('logout', [LoginController::class, 'logoutGet'])->name('logout');
Route::middleware('auth')->group(function () {

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');
Route::get('/fetch-messages', [ChatController::class, 'fetchMessages'])->name('fetch.messages');
Route::get('/getUserprofile/{id}', [ChatController::class, 'getUserprofile'])->name('getUserprofile');
    
	Route::resource('sports_locations', LocationController::class);
Route::resource('sports', SportController::class);
	Route::middleware(['role:master'])->group(function () {
		Route::get('/club', [ClubController::class, 'create'])->name('club.create');
		Route::post('/club', [ClubController::class, 'store'])->name('club.store');
		Route::get('/club/edit/{id}', [ClubController::class, 'edit'])->name('club.edit');
		Route::put('/club/update/{id}', [ClubController::class, 'update'])->name('club.update');
		Route::delete('/club/destroy/{id}', [ClubController::class, 'destroy'])->name('club.destroy');
		Route::post('/club/{id}/status', [ClubController::class, 'updateStatus'])->name('club.updateStatus');
		Route::get('/club-list', [ClubController::class, 'index'])->name('club.list');
		Route::get('/club-listtwo', [ClubController::class, 'listtwo'])->name('club.listtwo');
		Route::get('/club-design', [ClubController::class, 'design'])->name('club.design');
		Route::get('/club-designtwo', [ClubController::class, 'designtwo'])->name('club.designtwo');
		Route::get('/club-designthree', [ClubController::class, 'designthree'])->name('club.designthree');
		Route::get('/club-designfour', [ClubController::class, 'designfour'])->name('club.designfour');
		Route::get('/club-login', [ClubController::class, 'login'])->name('club.login');
		Route::post('club/get-city-suggestions', [ClubController::class, 'getCitySuggestions'])->name('club.get.city.suggestions');
		Route::post('club/get-location', [ClubController::class, 'getLocation'])->name('club.get.location');
	});

	Route::middleware(['role:administrator,player,player_administrator,club,master'])->group(function () {
		Route::get('/event/create', [EventController::class, 'create'])->name('event.create');

// Route to handle form submission
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/list', [EventController::class, 'show'])->name('event.list');

		Route::get('/player/dashboard2', [DashboardController::class, 'player2'])->name('player.dashboard2');

		Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::get('/dashboard3', [DashboardController::class, 'player3'])->name('dashboard3');
		Route::get('/dashboard4', [DashboardController::class, 'player4'])->name('dashboard4');
		Route::get('/dashboard5', [DashboardController::class, 'player5'])->name('dashboard5');
		Route::get('/player/dashboard', [DashboardController::class, 'player'])->name('player.dashboard');
		Route::any('player/dashboard/filter/calander', [DashboardController::class, 'CalanderFilterSchedules'])->name('player.dashboard.filter');

		Route::any('player/dashboard2/filter/calander', [DashboardController::class, 'CalanderFilterSchedules2'])->name('player.dashboard2.filter');
		Route::get('/club-management', [ClubAdministrator::class, 'clubDashboard'])->name('club.dashboard');
Route::get('/create-club-administrator', [ClubAdministrator::class, 'create'])->name('club.admform');
Route::post('/club-administrator-store', [ClubAdministrator::class, 'store'])->name('club.admstore');
Route::get('/club-administrator', [ClubAdministrator::class, 'index'])->name('club.adm');
Route::get('/club-administrator/{id}', [ClubAdministrator::class, 'edit'])->name('club.adm.edit');

		Route::post('/club-admin/{id}/status', [ClubAdministrator::class, 'updateStatus'])->name('clubadm.updateStatus');
		Route::put('/club-admin/update', [ClubAdministrator::class, 'update'])->name('clubadm.update');
		Route::get('/club-admin/edit/{id}', [ClubAdministrator::class, 'edit'])->name('clubadm.edit');
		Route::delete('/club-admin/destroy/{id}', [ClubAdministrator::class, 'destroy'])->name('clubadm.destroy');
//announcement

		Route::get('/create-club-announcement', [ClubAnnouncementController::class, 'create'])->name('club.announcement.create');
		Route::post('/club-announcement-store', [ClubAnnouncementController::class, 'store'])->name('club.announcement.store');
		Route::put('/club-announcement/update', [ClubAnnouncementController::class, 'update'])->name('club.announcement.update');
		Route::get('/club-announcement/list', [ClubAnnouncementController::class, 'index'])->name('club.announcement.list');
		Route::get('/club-announcement/{id}', [ClubAnnouncementController::class, 'edit'])->name('club.announcement.edit');
		Route::delete('/club-announcement/destroy/{id}', [ClubAnnouncementController::class, 'destroy'])->name('club.announcement.destroy');


		Route::get('/club-administrator-form', [ClubAdministrator::class, 'create'])->name('club.admform');

		Route::get('/team-management', [TeamController::class, 'allTeamDashboard'])->name('team.allTeamDashboard');
		Route::get('/team-management/team_administrator', [TeamController::class, 'teamAdministrator'])->name('team.team_administrator');
		Route::get('/team-management/schedule', [TeamController::class, 'teamDashboardSchedule'])->name('team.schedule');

		Route::get('/administrator/add/', [AdministratorController::class, 'add'])->name('administrator.add');
		Route::post('/administrator/save', [AdministratorController::class, 'save'])->name('administrator.save');

		Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
		Route::post('/team/store/', [TeamController::class, 'store'])->name('team.store');
		Route::get('/team-list/{id}', [TeamController::class, 'index'])->name('team.list');
		Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
		Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
		Route::delete('/team/destroy/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
		Route::get('/team-info/{id}', [TeamController::class, 'info'])->name('team.info');
		Route::get('/team-tform', [TeamController::class, 'tform'])->name('team.tform');
		Route::get('/team-tlist', [TeamController::class, 'tlist'])->name('team.tlist');
		Route::post('/team/{id}/status', [TeamController::class, 'updateStatus'])->name('team.updateStatus');

	 });

	Route::middleware(['role:player,player_administrator,administrator,club,master'])->group(function () {
		Route::get('/players', [PlayerController::class, 'index'])->name('player.index');
		Route::get('/players/create/{id}', [PlayerController::class, 'create'])->name('player.create');
		Route::get('/players/new', [PlayerController::class, 'add'])->name('player.add');
		Route::post('/players/store', [PlayerController::class, 'store'])->name('player.store');
		Route::post('/players/save', [PlayerController::class, 'save'])->name('player.save');
		Route::get('/players/edit/{id}', [PlayerController::class, 'edit'])->name('player.edit');
		Route::put('/players/update/{id}', [PlayerController::class, 'update'])->name('player.update');

		Route::get('/players/editplayer/{id}', [PlayerController::class, 'editPlayer'])->name('player.editPlayer');
		Route::put('/players/updateplayer/{id}', [PlayerController::class, 'updatePlayer'])->name('player.updatePlayer');
		Route::post('/add-admin', [PlayerController::class, 'storeAdmin'])->name('player.add.admin');
		
		Route::get('/players/administrator/list/', [PlayerAdministratorController::class, 'index'])->name('player.administrator.list');
		Route::get('/players/administrator/edit/{id}', [PlayerAdministratorController::class, 'edit'])->name('player.administrator.edit');
		Route::PUT('/players/administrator/update/{id}', [PlayerAdministratorController::class, 'update'])->name('player.administrator.update');
		Route::delete('/players/administrator/destroy/{id}', [PlayerAdministratorController::class, 'destroy'])->name('player.administrator.destroy');
		Route::get('/players/administrator/create', [PlayerAdministratorController::class, 'create'])->name('player.administrator.create');
		Route::post('/players/administrator/store', [PlayerAdministratorController::class, 'store'])->name('player.administrator.store');

		Route::delete('/players/destroy/{id}', [PlayerController::class, 'destroy'])->name('player.destroy');
		Route::post('/player/{id}/status', [PlayerController::class, 'updateStatus'])->name('player.updateStatus');
		Route::any('schedule/show', [ScheduleController::class, 'show'])->name('schedule.show');

		Route::any('team/schedule/show', [ScheduleController::class, 'CalanderShow'])->name('team.schedule.show.calander');
		Route::get('player/schedule/store/{type}/{schedule_id}', [ScheduleController::class, 'playeScheduleStore'])->name('player.schedule.store');
		Route::post('player/schedule/store/{type}/{schedule_id}', [ScheduleController::class, 'playeScheduleStore'])->name('player.schedule.store');
		
	 });

	Route::middleware(['role:administrator,club,master'])->group(function () {
		Route::get('/administrator/create/{id}', [AdministratorController::class, 'create'])->name('administrator.create');
		Route::post('/administrator/store', [AdministratorController::class, 'store'])->name('administrator.store');
		Route::get('/administrator/edit/{id}', [AdministratorController::class, 'edit'])->name('administrator.edit');
		Route::put('/administrator/update/{id}', [AdministratorController::class, 'update'])->name('administrator.update');
		Route::delete('/administrator/destroy/{id}', [AdministratorController::class, 'destroy'])->name('administrator.destroy');
		Route::post('/administrator/{id}/status', [AdministratorController::class, 'updateStatus'])->name('administrator.updateStatus');
		Route::get('/team-adminlist', [TeamController::class, 'adminlist'])->name('team.adminlist');

		Route::get('schedule/create/{id}', [ScheduleController::class, 'create'])->name('schedule.create');
		Route::post('schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
		Route::get('schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
		Route::put('schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
		Route::delete('schedule/destroy/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
		Route::post('schedule/{id}/status', [ScheduleController::class, 'updateStatus'])->name('schedule.updateStatus');
		
Route::get('/schedule/filter', [ScheduleController::class, 'filterSchedules'])->name('schedule.filter');
Route::any('team/schedule/filter/calander', [ScheduleController::class, 'CalanderFilterSchedules'])->name('team.schedule.filter');

		Route::get('schedule/add', [ScheduleController::class, 'add'])->name('schedule.add');
		Route::post('schedule/ScheduleStore', [ScheduleController::class, 'ScheduleStore'])->name('schedule.ScheduleStore');
	});
	Route::get('/design-players', [DesignController::class, 'players'])->name('design.players');
	Route::get('/design-playerform', [DesignController::class, 'playerform'])->name('design.playerform');
	Route::get('/editprofile/{id}', [ClubController::class, 'editprofile'])->name('edit.profile');
	Route::put('/profile/update', [ClubController::class, 'profileupdate'])->name('user.update');
	Route::put('/profile/update/img', [ClubController::class, 'updateProfileImg'])->name('user.update.Profile.img');
	Route::get('/design-forgotpassword', [DesignController::class, 'forgotpassword'])->name('design.forgotpassword');
	Route::get('/design-resetpassword', [DesignController::class, 'resetpassword'])->name('design.resetpassword');
	Route::get('/design-forgotemaildesign', [DesignController::class, 'forgotemaildesign'])->name('design.forgotemaildesign');
	Route::get('/design-resetlink', [DesignController::class, 'resetlink'])->name('design.resetlink');
	Route::get('/design-schedule', [DesignController::class, 'schedule'])->name('design.schedule');
});


