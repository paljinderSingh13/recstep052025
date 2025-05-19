<?php

namespace App\Interfaces;

use App\Models\League;
use Illuminate\Pagination\LengthAwarePaginator;

interface LeagueServiceInterface
{
    public function getAllLeagues(int $perPage = 10): LengthAwarePaginator;
    public function getLeagueById(int $id): League;
    public function createLeague(array $data): League;
    public function updateLeague(int $id, array $data): League;
    public function deleteLeague(int $id): void;
}