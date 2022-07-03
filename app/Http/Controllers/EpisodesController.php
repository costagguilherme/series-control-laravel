<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Episode;

class EpisodesController extends Controller
{

    public function __construct(Season $season)
    {
        $this->season = $season;
    }

    public function index (Request $request) {
        $season = $this->season::find($request->id);
        return view('episodes.index', ['episodes' => $season->episodes, 'season' => $season]);
    }

    public function update(Request $request) {

        $id = (int)$request->season;
        $episodesWatched = $request->episodes;

        $season = $this->season::find($id);

        $season->episodes->each(function(Episode $episode) use ($episodesWatched) {
            $episode->watched = in_array($episode->id, $episodesWatched);
            // $episode->save();
        });

        $season->push();
        return redirect()->route('episodes.index', $season->id);
    }
}
