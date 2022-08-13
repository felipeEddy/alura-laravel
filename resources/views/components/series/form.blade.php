<form action="{{ $action }}" method="post">
    @csrf
    @if(!empty($update))
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control"
               @isset($nome) value="{{ $nome }}" @endisset
               onfocus="this.select()">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>