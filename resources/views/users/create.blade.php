<x-layout title="Novo Usuário">

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" autofocus>
        </div>
        <div class="form-group mt-2">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group mt-2">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="password" class="form-label">Confirme a senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Registrar</button>
    </form>
</x-layout>