<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skolinimasis extends Model {
    protected $table = 'skolinimaisi'; // Define the table name explicitly

    public $timestamps = false;
    // Define the relationship between Skolinimasis and Knyga
    public function knyga()
    {
        return $this->belongsTo(Knyga::class, 'knyga_id');
    }

    // Define the relationship between Skolinimasis and Vartotojas
    public function vartotojas() {
        return $this->belongsTo(Vartotojas::class);
    }
}
