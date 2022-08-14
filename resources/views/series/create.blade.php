<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="form-group col-8">
                <label for="name" class="form-label">Nome</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" autofocus>
            </div>
            <div class="form-group col-2">
                <label for="num_seasons" class="form-label">Nº Temporadas</label>
                <input type="text" id="num_seasons" name="num_seasons" class="form-control" value="{{ old('num_seasons') }}">
            </div>
            <div class="form-group col-2">
                <label for="num_episodes" class="form-label">Eps/Temporada</label>
                <input type="text" id="num_episodes" name="num_episodes" class="form-control" value="{{ old('num_episodes') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('series.index') }}" class="btn btn-danger mt-2 mb-2">Voltar</a>
    </form>
</x-layout>