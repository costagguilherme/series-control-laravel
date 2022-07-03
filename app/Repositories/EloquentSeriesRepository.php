<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Episode;
use App\Models\Series;

use App\Repositories\ISeriesRepository;

class EloquentSeriesRepository implements ISeriesRepository
{

    public function __construct(Series $series, Season $season, Episode $episode)
    {
        $this->series = $series;
        $this->season = $season;
        $this->episode = $episode;
    }

    public function add (SeriesFormRequest $request) {

        return DB::transaction(function () use ($request) {
            $serie = $this->series::create($request->all());
            $seasons = [];
            for ($i = 1; $i <= $request->seasons; $i++) {
                $seasons[] = [
                    'number' => $i,
                    'serie_id' => $serie->id
                ];
            }
    
            $this->season::insert($seasons);
    
            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($i = 1; $i <= $request->episodes; $i++) {
                    $episodes[] = [
                        'number' => $i,
                        'season_id' => $season->id
                    ];
                }
            }
            $this->episode::insert($episodes);

            return $serie;
        });

    }
}