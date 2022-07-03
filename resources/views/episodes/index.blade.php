<x-layout title='Episódios'>
    <form action="{{route('episodes.store')}}" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center"> 
                    Episódio: {{ $episode->number }} 
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}">
                </li>  
            @endforeach
        </ul>
        <button class="btn btn-primary mt-4 mb-2">Salvar</button>
    </form>
</x-layout>
