<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Zone;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class ZoneController extends Controller
{
    public function addZone()
    {    
        if(Auth::user()->isAdm()){   
            return view('hrms.zone.add_zone');
        }else{
            return view('errors.404'); 
        }
    }

    Public function processZone(Request $request)
    {
        $result = Zone::where("zone_name",$request->zone_name)->first();  
        if($result){
            \Session::flash('flash_message_error', 'Zone already exists');
            return redirect()->back();
        }else{

            $zone = new Zone;
            $zone->zone_name = $request->zone_name;
            $zone->status = $request->status;
          
            $zone->save();
            \Session::flash('flash_message', 'Zone successfully added!');
            return redirect()->back();
        }      
       
    }

    public function showZone()
    {   
        if(Auth::user()->isAdm()){
            $zones = Zone::orderBy('id', 'desc')->paginate(10);   
            return view('hrms.zone.show_zone', compact('zones'));
        }else{
            return view('errors.404');
        }


       
    }

    public function showEdit($zone_id)
    {        
        $result = Zone::whereid($zone_id)->first();       
        return view('hrms.zone.add_zone', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {              
        $edit = Zone::findOrFail($id);
        $edit->zone_name = $request->zone_name;
        $edit->status = $request->status;
        $edit->save();
        \Session::flash('flash_message', 'Zone successfully updated!');
        return redirect('zone-list');
    }

    public function doDelete($id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        \Session::flash('flash_message', 'Zone successfully Deleted!');
        return redirect('zone-list');
    }

}
