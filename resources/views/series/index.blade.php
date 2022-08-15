<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <img src="{{ asset("storage/$serie->cover") }}" width="80" class="img-thumbnail me-3" alt="cover">
                    <a href="{{ route('seasons.index', $serie->id) }}">{{$serie->name}}</a>
                </div>
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi-pencil"></i>
                        </a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul> 
</x-layout>