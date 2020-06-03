<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'patient_id', 'date', 'name', 'status'
    ];
}
