<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fhir_observation_component_trackers extends Model
{
    protected $fillable = array('id','fhir_observation_trackers_id','value','created_at'); 

}
