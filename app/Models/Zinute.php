<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zinute extends Model {
    protected $table = 'zinutes'; // Define the table name explicitly

    public $timestamps = false;
    // Define the relationship between Zinute and Vartotojas (sender)
    public function siuncia() {
        return $this->belongsTo(Vartotojas::class, 'siuntejo_id')->optional();
    }

    // Define the relationship between Zinute and Vartotojas (receiver)
    public function gauna() {
        return $this->belongsTo(Vartotojas::class, 'gavejo_id');
    }
}
