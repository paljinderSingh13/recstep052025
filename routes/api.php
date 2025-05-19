<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/messages/{receiverId}', [ChatController::class, 'getMessages']);
Route::post('/messages', [ChatController::class, 'store']);
Route::post('/store-message', [ChatController::class, 'store'])->name('store.message');
Route::get('/getteams', [ChatController::class, 'getTeams'])->middleware('web');
Route::get('/getadmins', [ChatController::class, 'getadmins'])->middleware('web');
Route::get('/getUnreadNotifications', [ChatController::class, 'getUnreadNotifications'])->middleware('web');

Route::get('/teams/{type}/{teamId}/messages', [ChatController::class, 'getTeamMessages'])->middleware('web');
Route::post('/teams/{type}/{teamId}/messages', [ChatController::class, 'storeTeamMessage'])->middleware('web');


