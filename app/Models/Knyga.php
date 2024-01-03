<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knyga extends Model {
    protected $table = 'knygos'; // Define the table name explicitly

    // Define the relationship between Knyga and Skolinimasis
    public function skolinimases() {
        return $this->hasMany(Skolinimasis::class, 'knyga_id'); // Assuming the foreign key in Skolinimasis is knyga_id
    }
}
