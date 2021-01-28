<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthWorker extends Model
{
    use HasFactory;

    public function hospital () {
        return $this->belongsTo('App\Models\Hospital');
    }

    public function patients () {
        return $this->hasMany('App\Models\Patient');
    }
}
