<x-layout title="Editar Série {{ $series->name }}">
    <form action="{{ route('series.update', $series->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control"
                    value="{{ $series->name }}" autofocus onfocus="this.select()">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('series.index') }}" class="btn btn-danger mt-2 mb-2">Voltar</a>
    </form>
</x-layout>