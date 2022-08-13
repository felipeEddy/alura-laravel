<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface EpisodesRepository
{
    public function updateWatched(array $watched, int $season_id);
}