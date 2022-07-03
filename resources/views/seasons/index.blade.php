<x-layout title='Temporadas de {!! $serie->name !!}'>

    
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                Temporada: {{ $season->number }} 
                <span class="badge bg-secondary">
                    Episódios: {{ $season->episodes->count() }} 
                </span>
                
            </li>  
        @endforeach
    </ul>
</x-layout>
