<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\DB;

class Vartotojas extends Model implements Authenticatable{
    protected $table = 'vartotojai'; // Define the table name explicitly

    protected $fillable = [
        'vardas', 'slaptazodis', 'role_id',
        // Add any other fields you have in your user table
    ];

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

    /**
     * this is here for authentication purposes
     * @return string vardas
     */
    public function username()
    {
        return $this->getAttribute('vardas' );
    }

    /** this is here for authentication purposes
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->slaptazodis;
    }
    use HasFactory, AuthenticatableTrait;

    public function getHasLateSkolinimaisiAttribute()
    {
//        DB::enableQueryLog();
        $test = $this->skolinimaisi()
            ->whereNull('grazinimo_data')
            ->where('pabaigos_data', '<', now())
            ->exists();

//        dd(DB::getQueryLog());
        return $test;
    }
}
