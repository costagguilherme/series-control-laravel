<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{

    public function __construct(Series $series)
    {
        $this->series = $series;
    }

    public function index () {
        $series = $this->series::query()->orderBy('name')->get();
        return view('series.index', ['series' => $series]);
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request) {
        $this->series::create($request->all());
        return redirect()->route('series.index');
    }

    public function destroy(Request $request) {
        $this->series::destroy($request->id);
        return redirect()->route('series.index');
    }
}
