<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skolinimasis extends Model {
    protected $table = 'skolinimaisi'; // Define the table name explicitly

    // Define the relationship between Skolinimasis and Knyga
    public function knyga() {
        return $this->belongsTo(Knyga::class);
    }

    // Define the relationship between Skolinimasis and Vartotojas
    public function vartotojas() {
        return $this->belongsTo(Vartotojas::class);
    }
}
