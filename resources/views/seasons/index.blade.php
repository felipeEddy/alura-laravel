<x-layout title="Temporadas de {!! $series->name !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">Temporada {{$season->number}}</a>
                <span class="badge @if ($season->numberOfWatchedEpisodes() == $season->episodes->count()) bg-success @else bg-secondary @endif">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('series.index') }}" class="btn btn-danger mt-2 mb-2">Voltar</a>
</x-layout>