<x-layout title='Login'>
    <form action="{{route('login.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary mt-4 mb-2">Entrar</button>
    </form>
</x-layout>
