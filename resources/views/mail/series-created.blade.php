@component('mail::message')

# {{ $nomeSerie }} criada

A série {{$nomeSerie }} com {{ $qtdTemporadas }} e {{ $qtdEpisodiosTemp }} episódios por temporada foi criada.

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
Ver Série
@endcomponent

@endcomponent