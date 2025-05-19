<?php

use App\Models\LeagueLog;

if (!function_exists('log_league_action')) {
    function log_league_action($leagueId, $title, $type, $link_title = null,$link = null)
    {
        LeagueLog::create([
            'league_id' => $leagueId,
            'user_id' => auth()->id() ?? 0,
            'title' => $title,
            'type' => $type,
            'link_title'=> $link_title,
            'link' => $link,
        ]);
    }
}
