<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'address', 'birth_date', 'citizenship', 'phone', 'enp', 'snils'
    ];

    public function encounters() {
        return $this->hasMany('App\Encounter');
    }

    public function researches() {
        return $this->hasMany('App\Research');
    }

    public function tests() {
        return $this->hasMany('App\Test');
    }
}
