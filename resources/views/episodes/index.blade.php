<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">

    <form action="{{ route('episodes.update', $season->id) }}" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($season->episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{$episode->number}}

                    @auth
                        <div class="form-check form-switch">
                            <input type="checkbox"
                                name="episodes[]"
                                class="form-check-input"
                                value="{{ $episode->id }}"
                                @checked($episode->watched) />
                        </div>
                    @endauth
                </li>
            @endforeach
        </ul>

        <div class="mt-2">
            @auth
                <button class="btn btn-primary">Salvar</button>
            @endauth
            <a href="{{ route('seasons.index', $season->series_id) }}" class="btn btn-danger">Voltar</a>
        </div>
    </form>

</x-layout>