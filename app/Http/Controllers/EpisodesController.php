<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\EpisodesRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        $mensagemSucesso = session('mensagem.sucesso');
        return view('episodes.index', compact([
            'season',
            'mensagemSucesso'
        ]));
    }

    public function update(Request $request, Season $season, EpisodesRepository $repository)
    {
        $repository->updateWatched($request->episodes, $season->id);

        return to_route('episodes.index', $season->id)
            ->with("mensagem.sucesso", "Lista de episódios assitidos atualizada com sucesso!");
    }
}
