<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cover'];
    protected $table = 'series';

    public function seasons () {
        return $this->hasMany(Season::class, 'serie_id');
    }
}
