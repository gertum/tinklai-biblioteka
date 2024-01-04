<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vartotojas extends Model {
    protected $table = 'vartotojai'; // Define the table name explicitly

    public $timestamps = false;
    // Define the relationship between Vartotojas and Skolinimasis
    public function skolinimasis() {
        return $this->hasMany(Skolinimasis::class);
    }

    // Define the relationship between Vartotojas and Zinute (sent messages)
    public function siuncia() {
        return $this->hasMany(Zinute::class, 'siuntejo_id');
    }

    // Define the relationship between Vartotojas and Zinute (received messages)
    public function gauna() {
        return $this->hasMany(Zinute::class, 'gavejo_id');
    }

    // Define the relationship between Vartotojas and Role
    public function role() {
        return $this->belongsTo(Role::class);
    }
    // Add a unique validation rule for 'vardas' in the model
    public static $rules = [
        'vardas' => 'unique:vartotojai,vardas',
    ];

    use HasFactory;
}
