<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;

class SeasonsController extends Controller
{
    
    public function __construct(Series $series, Season $season, Episode $episode)
    {
        $this->series = $series;
        $this->season = $season;
        $this->episode = $episode;
    }


    public function index (Request $request) {
        $serie = $this->series::find($request->id);
        $seasons = $serie->seasons()->with('episodes')->get();
        return view('seasons.index')->with('seasons', $seasons)->with('serie', $serie);

    }
}
