<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = array('unit_name');

    public function getCity()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_name');
    }
   

}
