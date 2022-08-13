<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
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

    public function store(SeriesFormRequest $request, SeriesRepository $repository)
    {
        $series = $repository->add($request);

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
        return to_route('series.index')
            ->with("mensagem.sucesso", "Série '$series->name' removida com sucesso");
    }
}
