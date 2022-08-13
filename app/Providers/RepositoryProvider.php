<?php

namespace App\Providers;

use App\Repositories\SeriesRepository;
use App\Repositories\EloquentSeriesRepository;
use App\Repositories\EpisodesRepository;
use App\Repositories\EloquentEpisodesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class,
        EpisodesRepository::class => EloquentEpisodesRepository::class,
    ];
}
