<x-layout title='Temporadas de {!! $serie->name !!}'>
    <div class="text-center">
        <img src="{{ asset('storage/'.$serie->cover) }}" style="height: 200px" alt="Capa da série" class="img-fluid">

    </div>
    
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{ $season->number }} 
                </a>
                <span class="badge bg-secondary">
                    Episódios: {{ $season->numberWatchedEpisodes() }}/{{ $season->episodes->count() }} 
                </span>
                
            </li>  
        @endforeach
    </ul>
</x-layout>
