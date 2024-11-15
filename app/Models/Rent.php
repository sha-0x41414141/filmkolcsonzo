<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['renter', 'film_id', 'rent_start', 'rent_end'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
