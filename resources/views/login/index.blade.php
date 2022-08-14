<x-layout title="Login" loginPage="true">

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" autofocus>
        </div>
        <div class="form-group mt-2 mb-2">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-2 mb-2">Registrar</a>
    </form>
</x-layout>