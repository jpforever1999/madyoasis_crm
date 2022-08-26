<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Siteinfo;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteInfoController extends Controller
{
    public function addsiteinfo()
    {
       
        return view('hrms.siteinfo.add_siteinfo');
    }

    Public function processSiteinfo(Request $request)
    {
        $siteinfo = new Siteinfo;
        $filename = '';
            if ($request->file('logo')) {
                $file             = $request->file('logo');
                $filename         = str_random(12);
                $fileExt          = $file->getClientOriginalExtension();
                $allowedExtension = ['jpg', 'jpeg', 'png'];
                $destinationPath  = public_path('photos');
                if (!in_array($fileExt, $allowedExtension)) {
                    return redirect()->back()->with('message', 'Extension not allowed');
                }
                $filename = url('photos/'.$filename . '.' . $fileExt);                
                $file->move($destinationPath, $filename);

            }

        $siteinfo->website_name = $request->website_name;
        $siteinfo->address = $request->address;
        $siteinfo->city = $request->city;
        $siteinfo->state = $request->state;
        $siteinfo->zip = $request->zip;
        $siteinfo->email_id = $request->email_id;
        $siteinfo->logo = $filename;  
        $siteinfo->mobile_no = $request->mobile_no;      
        $siteinfo->status = $request->status;       
        $siteinfo->save();
        \Session::flash('flash_message', 'Siteinfo successfully added!');
        //return redirect()->back();       
        $id = $siteinfo->id;     
        return redirect('view-siteinfo/'.$id);       
       
    }

    public function showSiteinfo()
    {       
        $siteinfo = Siteinfo::orderBy('id', 'desc')->paginate(10);   
        //$zones = Zone::with(['zones', 'id', 'zone_name'])->paginate(5);  
        return view('hrms.siteinfo.show_siteinfo', compact('siteinfo'));
    }
    
    public function viewSiteinfo($id)
    {        
        $result = Siteinfo::whereid($id)->first();       
        return view('hrms.siteinfo.view_siteinfo', compact('result'));
    }

    public function showEdit($id)
    {        
        $result = Siteinfo::whereid($id)->first();       
        return view('hrms.siteinfo.add_siteinfo', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {              
        $siteinfo = Siteinfo::where('id', $id)->first();

        $filename = '';
        if ($request->file('logo')) {
            $file             = $request->file('logo');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $destinationPath  = public_path('photos');
            if (!in_array($fileExt, $allowedExtension)) {
                return redirect()->back()->with('message', 'Extension not allowed');
            }
            $filename = url('photos/'.$filename . '.' . $fileExt);                
            $file->move($destinationPath, $filename);
            $siteinfo->logo = $filename;  
        }else{           
            $siteinfo->logo = $siteinfo->logo;
        }        

        $siteinfo->website_name = $request->website_name;
        $siteinfo->address = $request->address;
        $siteinfo->city = $request->city;
        $siteinfo->state = $request->state;
        $siteinfo->zip = $request->zip;
        $siteinfo->email_id = $request->email_id;
       
        $siteinfo->mobile_no = $request->mobile_no;      
        $siteinfo->status = $request->status;
        $siteinfo->save();
        \Session::flash('flash_message', 'Siteinfo successfully updated!');
        $id = $siteinfo->id;     
        return redirect('view-siteinfo/'.$id);
    }

    public function doDelete($id)
    {
        $siteinfo = Siteinfo::find($id);
        $siteinfo->delete();
        \Session::flash('flash_message', 'Siteinfo successfully Deleted!');
        return redirect('zone-list');
    }

}
