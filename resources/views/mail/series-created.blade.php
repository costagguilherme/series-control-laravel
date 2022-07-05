@component('mail::message')
# {{ $nameSerie }} criada com sucesso

A série {{ $nameSerie }} com {{ $qtdTemp }} temporadas e {{ $episodePerTemp }} episódios por temporada foi criada
Acesse aqui:
@component('mail::button', ['url' => route('seasons.index', $serieId), 'color' => 'success'])
Ver série
@endcomponent
@endcomponent

