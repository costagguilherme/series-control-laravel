<x-layout title='Séries'>
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @if($messageDeleted != null)
        <div class="alert-success">
            {{ $messageDeleted }}
        </div>
    @endif
    @if($messageCreated != null)
        <div class="alert-success">
            {{ $messageCreated }}
        </div>
    @endif
    @if($messageUpdated != null)
        <div class="alert-success">
            {{ $messageUpdated }}
        </div>
    @endif
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                {{ $serie['name'] }}
                <span class="d-flex">
                    <a href="{{route('series.edit', $serie->id)}}" class="btn btn-primary btn-sm">E</a>
                    <form action="{{ route('series.destroy', $serie->id )}}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </span>
                
            </li>  
        @endforeach
    </ul>
</x-layout>
