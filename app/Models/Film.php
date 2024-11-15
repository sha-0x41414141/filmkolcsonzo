<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['film_title', 'film_director', 'genre_id', 'film_year'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
