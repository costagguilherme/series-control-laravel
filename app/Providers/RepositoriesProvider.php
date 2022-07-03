<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ISeriesRepository;
use App\Repositories\EloquentSeriesRepository;


class RepositoriesProvider extends ServiceProvider
{

    public array $bindings = [
        ISeriesRepository::class => EloquentSeriesRepository::class
    ];

}
