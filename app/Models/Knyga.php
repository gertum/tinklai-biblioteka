<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knyga extends Model {
    protected $table = 'knygos'; // Define the table name explicitly

    public $timestamps = false;
    // Define the relationship between Knyga and Skolinimasis
    public function skolinimaisi() {
        return $this->hasMany(Skolinimasis::class, 'knyga_id'); // Assuming the foreign key in Skolinimasis is knyga_id
    }
    public function scopeAtrinktiNepaimtas($query)
    {
        return $query->where(function ($query) {
            $query->whereHas('skolinimaisi', function ($query) {
                $query->whereNull('grazinimo_data');
            })->orWhereDoesntHave('skolinimaisi');
        })->where(function ($query) {
            $query->whereRaw('egzemplioriu_skaicius - (
                SELECT COUNT(*) FROM skolinimaisi
                WHERE skolinimaisi.knyga_id = knygos.id AND skolinimaisi.grazinimo_data IS NULL
            ) > 0');
        });
    }
    public function getLaisviEgzemplioriaiAttribute()
    {
        $borrowedBooks = $this->skolinimaisi()->whereNull('grazinimo_data')->count();
        return $this->egzemplioriu_skaicius - $borrowedBooks;
    }

    use HasFactory;
}
