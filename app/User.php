<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'patronymic', 'is_practitioner', 'is_patient', 'is_admin', 'active', 'serial', 'number', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'serial', 'number'
    // ];

    public function role() {
        return session('role');
    }

    public function patient() {
        return $this->hasOne('App\Patient');
    }
}
