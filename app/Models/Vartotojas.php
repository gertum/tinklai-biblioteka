<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vartotojas extends Model  implements Authenticatable{
    protected $table = 'vartotojai'; // Define the table name explicitly

    public $timestamps = false;
    // Define the relationship between Vartotojas and Skolinimasis
    public function skolinimaisi() {
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

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
