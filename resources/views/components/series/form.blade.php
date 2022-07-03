<form action="{{ $action }}" method="post">
    @csrf
    @isset($update)
        @method('PUT')
    @endisset
    <div class="mb-5">
        <label class="form-label" for="name">Nome:</label>
        <input class="form-control" type="text" id="name" name="name" @isset($name) value="{{ $name }}" @endisset>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
