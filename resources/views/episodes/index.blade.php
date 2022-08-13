<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">

    <form action="{{ route('episodes.update', $season->id) }}" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($season->episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{$episode->number}}

                    <div class="form-check form-switch">
                        <input type="checkbox"
                               name="episodes[]"
                               class="form-check-input"
                               value="{{ $episode->id }}"
                               @if ($episode->watched) checked @endif />
                    </div>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
        <a href="{{ route('seasons.index', $season->series_id) }}" class="btn btn-danger">Voltar</a>
    </form>

</x-layout>