<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $table = 'seasons';
    protected $fillable = ['number'];


    public function serie () {
        return $this->belongsTo(Series::class);
    }

    public function episodes () {
        return $this->hasMany(Episode::class);
    }

    public function numberWatchedEpisodes(): int {
        return $this->episodes->filter(fn ($episode) => $episode->watched)->count();
    }
}
