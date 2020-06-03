<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'reason', 'practitioner_id', 'practitioner_role'
    ];

    public function practitioner() {
        return $this->belongsTo('App\User', 'practitioner_id');
    }
}
