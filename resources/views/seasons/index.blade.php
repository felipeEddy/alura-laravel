<x-layout title="Temporadas de {!! $series->name !!}">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">Temporada {{$season->number}}</a>

                @auth
                    @php
                        $class = $season->numberOfWatchedEpisodes() == $season->episodes->count() ?
                            'success' : 'secondary';
                    @endphp
                    <span class="badge bg-{{ $class }}">
                        {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                    </span>
                @endauth

                @guest
                    <span class="badge bg-secondary">
                        {{ $season->episodes->count() }}
                    </span>
                @endguest
            </li>
        @endforeach
    </ul>
    <a href="{{ route('series.index') }}" class="btn btn-danger mt-2 mb-2">Voltar</a>
</x-layout>