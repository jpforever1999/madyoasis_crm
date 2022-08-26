<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\City;
use App\Models\Zone;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class CityController extends Controller
{
    public function addCity()
    {       
        if(Auth::user()->isAdm()){   
            return view('hrms.city.add_city');
        }else{
            return view('errors.404'); 
        }
    }

    Public function processCity(Request $request)
    {              
        $result = City::whereIn("city_name",$request->city_name)->first();          
        if($result){
            \Session::flash('flash_message_error', 'City already exists');
            return redirect()->back();
        }else{
            $getCities = implode(',',$request->city_name);
            $getcitiesExplode = explode(',',$getCities);

            foreach($getcitiesExplode as $getcitiesExplodeVal){
                if($getcitiesExplodeVal!=''){
                    $cities = new City;
                    $cities->city_name = $getcitiesExplodeVal;
                    $cities->status = $request->status; 
                    $cities->zone_id = $request->zone_id;   
                    $cities->save();
                }
            }

            \Session::flash('flash_message', 'City successfully added!');
            return redirect()->back();
    
        }
    }

    public function showCity()
    {   
        if(Auth::user()->isAdm()){             
            $cities = City::orderBy('id', 'desc')->paginate(10);         
            return view('hrms.city.show_city', compact('cities'));
        }else{
            return view('errors.404');
        }
    }
        
    public function showEdit($city_id)
    {   

        $cities_all = City::get();
        $zone_all = Zone::get();
        $result = City::whereid($city_id)->first();
       //echo "<pre>"; print_r($result['zone_id']); echo "</pre>";  die;
        return view('hrms.city.add_city', compact('result','cities_all','zone_all'));


    } 
    
    public function showZoneAll()
    {       
        $zone_all = Zone::get();       
        return view('hrms.city.add_city', compact('zone_all'));
    }
   
    public function doEdit(Request $request, $id)
    {              
        $edit = City::findOrFail($id);
        $edit->city_name = $request->city_name;
        $edit->zone_id = $request->zone_id;
        $edit->status = $request->status;
        $edit->save();
        \Session::flash('flash_message', 'City successfully updated!');
        return redirect('city-list');
    }

    public function doDelete($id)
    {
        $city = City::find($id);
        $city->delete();
        \Session::flash('flash_message', 'City successfully Deleted!');
        return redirect('city-list');
    }

}
