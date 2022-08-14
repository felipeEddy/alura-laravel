<?php

namespace App\Repositories;

use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
    public function updateWatched(array $watched, int $season_id)
    {
        return DB::transaction(function() use($watched, $season_id) {
            Episode::whereSeasonId($season_id)->update(['watched' => 0]);
            Episode::whereIn('id', $watched)->update(['watched' => 1]);
        });
    }

}