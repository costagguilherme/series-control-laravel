<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;

class EpisodesController extends Controller
{

    public function __construct(Season $season)
    {
        $this->season = $season;
    }

    public function index (Request $request) {
        $season = $this->season::find($request->id);
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function store (Request $request) {
        dd($request->all());
        return '';
    }
}
