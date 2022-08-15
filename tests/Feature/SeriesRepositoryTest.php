<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
        // Arrange
        $repository = $this->app->make(SeriesRepository::class);

        $request = new SeriesFormRequest();
        $request->name = 'nome_da_serie_teste';
        $request->num_seasons = 3;
        $request->num_episodes = 6;

        // Act
        $repository->add($request);

        // Assert
        $this->assertDatabaseHas('series', ['name' => 'nome_da_serie_teste']);
        $this->assertDatabaseHas('seasons', ['number' => 3]);
        $this->assertDatabaseHas('episodes', ['number' => 6]);
    }
}
