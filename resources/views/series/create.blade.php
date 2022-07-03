<x-layout title='Nova série'>
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Nome:</label>
                <input autofocus class="form-control" type="text" id="name" name="name" @isset($name) value="{{ $name }}" @endisset>
            </div>

            <div class="col-2">
                <label class="form-label" for="seasons">N° Temporadas:</label>
                <input class="form-control" type="text" id="seasons" name="seasons" @isset($seasons) value="{{ $seasons }}" @endisset>
            </div>

            <div class="col-2">
                <label class="form-label" for="episodes">N° Episódios:</label>
                <input class="form-control" type="text" id="episodes" name="episodes" @isset($episodes) value="{{ $episodes}}" @endisset>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    
</x-layout>
