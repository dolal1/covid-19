<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    public function district () {
        return $this->belongsTo('App\Models\District');
    }

    public function healthWorkers () {
        return $this->hasMany('App\Models\HealthWorker');
    }

    public function patients () {
        return $this->hasMany('App\Models\Patient');
    }
}
