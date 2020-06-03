<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'name', 'result'
    ];
}
