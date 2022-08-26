<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Unit;
use App\Models\Zone;
use App\Models\City;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class UnitController extends Controller
{
    public function addUnit()
    {
        if(Auth::user()->isAdm()){   
            $zone = Zone::get();
            $city = city::get();
            return view('hrms.unit.add_unit',compact('zone','city'));
        }else{
            return view('errors.404'); 
        }
    
    }

    Public function processUnit(Request $request)
    {
        $result = Unit::where("unit_name",$request->unit_name)->where("city_id",$request->city_id)->first();  
        
        if($result){
            \Session::flash('flash_message_error', 'Unit already exists');
            return redirect()->back();
        }else{
        
            $unit = new Unit;
            $unit->unit_name = $request->unit_name;
            $unit->city_id = $request->city_id;
            $unit->zone_id = $request->zone_id;
            $unit->status = $request->status;
            $unit->save();
            \Session::flash('flash_message', 'Unit successfully added!');
            return redirect()->back();

        }

    }

    public function showUnit()
    {  
        if(Auth::user()->isAdm()){   
            $units = Unit::select('units.id','units.unit_name','units.status','cities.city_name','zones.zone_name')
            ->leftJoin('cities','cities.id','=', 'units.city_id')
            ->leftJoin('zones','zones.id','=', 'units.zone_id')
            ->orderby('units.id','desc')
            ->paginate(10);   
           // echo "<pre>"; print_r($units); echo "</pre>";  die;  
                return view('hrms.unit.show_unit', compact('units'));
        }else{
            return view('errors.404'); 
        }

    }

    public function showEdit($unit_id)
    {     
        $zone = Zone::get();
        $city = City::get();
        $result = Unit::whereid($unit_id)->first(); 
        //$result['zone_id'] = 3;        
        $city_filter = City::where('zone_id', '=', $result['zone_id'])->get();
        return view('hrms.unit.add_unit', compact('result','zone','city','city_filter'));
    }

    public function doEdit(Request $request, $id)
    {      
        $edit = Unit::findOrFail($id);
        $edit->zone_id = $request->zone_id;
        $edit->city_id = $request->city_id;
        $edit->unit_name = $request->unit_name;
        $edit->status = $request->status;       
        $edit->save();
        \Session::flash('flash_message', 'Unit successfully updated!');
        return redirect('unit-list');
    }

    public function doDelete($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        \Session::flash('flash_message', 'Unit successfully Deleted!');
        return redirect('unit-list');
    }

}
