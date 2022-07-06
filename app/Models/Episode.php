<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Episode extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    protected $fillable = ['number'];
    public $timestamps = false;

    
    public function season() {
        return $this->belongsTo(Season::class);
    }
}
