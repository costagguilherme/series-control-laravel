<x-layout title='Nova série'>
    <form action="/series" method="post">
        @csrf
        <div class="mb-5">
            <label class="form-label" for="name">Nome:</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
