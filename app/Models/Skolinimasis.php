<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skolinimasis extends Model {
    protected $table = 'skolinimaisi'; // Define the table name explicitly

    protected $fillable = [
        'pradzios_data',
        'pabaigos_data',
        'vartotojas_id',
        'knyga_id',
        'grazinimo_data',
        // Add other fields here as needed
    ];

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
