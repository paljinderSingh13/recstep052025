<?php

namespace App\Services;

use App\Interfaces\LeagueServiceInterface;
use App\Models\League;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class LeagueService implements LeagueServiceInterface
{
    public function getAllLeagues(int $perPage = 10): LengthAwarePaginator
    {
        return League::latest()->paginate($perPage);
    }

    public function getLeagueById(int $id): League
{
    return League::findOrFail($id);
}

    public function createLeague(array $data): League
    {
        $data['user_id'] = Auth::id();
        $data['slug'] = str_replace(' ', '_', $data['slug']);
        session(['slug' => $data['slug']]);
        return League::create($data);
    }

    public function updateLeague(int $id, array $data): League
    {
        $league = $this->getLeagueById($id);
        $league->update($data);
        return $league;
    }

    public function deleteLeague(int $id): void
    {
        $league = $this->getLeagueById($id);
        $league->delete();
    }
}