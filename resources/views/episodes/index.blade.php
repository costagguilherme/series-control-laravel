<x-layout title='Episódios'>
    <form action="{{route('episodes.update', $season->id)}}" method="post">
        @csrf
        @method('PUT')
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center"> 
                    Episódio: {{ $episode->number }} 
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" @if ($episode->watched) checked @endif>
                    <input type="hidden" name="season" value="{{ $season->id }}">

                </li>  
            @endforeach
        </ul>
        <button class="btn btn-primary mt-4 mb-2">Salvar</button>
    </form>
</x-layout>
