<?php

namespace App\Repositories;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request)
    {
        return DB::transaction(function() use($request) {
            $series = Series::create([
                'name' => $request->name,
                'cover' => $request->coverPath,
            ]);
            $seasons = [];
    
            for ($i = 1; $i <= $request->num_seasons ; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);
    
            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($i = 1; $i <= $request->num_episodes ; $i++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $i,
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });
    }

}