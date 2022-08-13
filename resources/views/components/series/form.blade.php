<form action="{{ $action }}" method="post">
    @csrf
    @if(!empty($update))
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control"
               @isset($name) value="{{ $name }}" @endisset
               onfocus="this.select()">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>