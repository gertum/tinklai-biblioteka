<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zinute extends Model {
    protected $table = 'zinutes'; // Define the table name explicitly

    protected $fillable = [
        'tekstas',
        'siuncia_vartotojas_id',
        'gauna_vartotojas_id',
    ];
    public $timestamps = false;
    // Define the relationship between Zinute and Vartotojas (sender)
    public function siuncia() {
        return $this->belongsTo(Vartotojas::class, 'siuncia_vartotojas_id');
    }

    // Define the relationship between Zinute and Vartotojas (receiver)
    public function gauna() {
        return $this->belongsTo(Vartotojas::class, 'gauna_vartotojas_id');
    }
}
