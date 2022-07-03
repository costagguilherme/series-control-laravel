<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;

use App\Repositories\EloquenteSeriesRepository;
use App\Repositories\ISeriesRepository;


class SeriesController extends Controller
{

    public function __construct(Series $series, Season $season, Episode $episode, ISeriesRepository $seriesRepository)
    {
        $this->series = $series;
        $this->season = $season;
        $this->episode = $episode;
        $this->seriesRepository = $seriesRepository;
    }

    public function index (Request $request) {
        $series = $this->series::query()->orderBy('name')->with(['seasons'])->get();
        $messageDeleted = $request->session()->get('message.deleted');
        $messageCreated = $request->session()->get('message.created');
        $messageUpdated = $request->session()->get('message.updated');
        return view('series.index', ['series' => $series, 'messageDeleted' => $messageDeleted, 'messageCreated' => $messageCreated, 'messageUpdated' => $messageUpdated]);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {
        $serie = $this->seriesRepository->add($request);
        return redirect()->route('series.index')->with('message.created', "Série {$serie->name} criada com sucesso");
    }

    public function destroy(Request $request) {
        $serie = $this->series::find($request->id);
        $serie->delete();
        return redirect()->route('series.index')->with('message.deleted', "Série {$serie->name} deletada com sucesso");
    }

    public function edit(Request $request) {
        $serie = $this->series::find($request->id);
        dd($serie->seasons());

        return view('series.edit', ['serie' => $serie]);
    }

    public function update(SeriesFormRequest $request) {
        $serie = $this->series->where('id', $request->id)->update(['name' => $request->name]);
        return redirect()->route('series.index')->with('message.updated', "Série atualizada com sucesso");
    }
}
