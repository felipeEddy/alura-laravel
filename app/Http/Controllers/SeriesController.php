<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Events\SeriesCreated;
use App\Events\SeriesDeleted;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware('custom.auth')->except('index');
    }

    public function index()
    {
        $series = Series::query()->orderBy('name')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index', compact([
            'series',
            'mensagemSucesso'
        ]));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $request->coverPath = $request->file('cover')?->store('series_cover', 'public');
        $series = $this->repository->add($request);

        SeriesCreated::dispatch(
            $series->name,
            $series->id,
            $request->num_seasons,
            $request->num_episodes,
            Auth::user()->email,
        );

        return to_route('series.index')
            ->with("mensagem.sucesso", "Série '$series->name' adicionada com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with("mensagem.sucesso", "Série '$series->name' atualizada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        
        SeriesDeleted::dispatch(
            $series->id,
            $series->name,
            $series->cover,
            Auth::user()->email,
        );

        return to_route('series.index')
            ->with("mensagem.sucesso", "Série '$series->name' removida com sucesso");
    }
}
