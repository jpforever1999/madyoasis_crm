<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Emp;
use App\Models\City;
use App\Models\Zone;
use App\Models\Unit;
use App\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class QualityCheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_city($zone_id){	      
       	      
        $city = City::where("zone_id",$zone_id)->get();         				
		echo json_encode($city);		
	}
    public function get_unit($city_id,$zone_id){	      
        $zone_id=$zone_id;    
        $unit = Unit::where("city_id",$city_id)->where("zone_id",$zone_id)->get();         				
		echo json_encode($unit);		
	}

    public function showReport()
    {    
        $current_id = Auth::id();
        $pending_report = DB::table('employees')
        ->select('employees.*')       
        ->where('employees.report_status', '=', 0)             
        ->get();  
        
        $completed_report = DB::table('employees')
        ->select('employees.*')       
        ->where('employees.report_status', '=', 1)                  
        ->get();   

        $appointment_schedule = DB::table('employees')
        ->select('employees.*')       
        ->where('employees.report_status', '=', 2)                
        ->get();  

        $not_scheduled = DB::table('employees')
        ->select('employees.*')       
        ->where('employees.report_status', '=', 3)                 
        ->get(); 

        $medical_done = DB::table('employees')
        ->select('employees.*')       
        ->where('employees.report_status', '=', 4)                 
        ->get(); 

        //$created_by = User::where('id',30)->first();

        $emps = User::select(
            'users.id','users.email','users.name',
            'employees.status','employees.first_name','employees.last_name','employees.number','employees.report_status','employees.date_of_health','employees.date_of_report','employees.date_of_joining',
            'employees.emp_code','employees.user_id','employees.gender','employees.age','employees.current_address','employees.upload_pdf_report','employees.date_of_birth','employees.created_report_date','employees.report_created_by',
            'zones.zone_name')
       ->leftJoin('employees','employees.user_id', '=', 'users.id')      
       ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
       ->leftJoin('zones','zones.id', '=', 'employees.zone_id')
       ->where('user_roles.role_id', '=', 2)       
       ->orderBy('users.id', 'desc')       
       ->paginate(10);  

        return view('hrms.qualitycheck.show_user', compact('emps','pending_report','completed_report','appointment_schedule','not_scheduled','medical_done'));

       
        
    }

    public function get_user($emp_id)
    {          
        $created_by = User::where('id',30)->first();
        return view('hrms.qualitycheck.show_user', compact('created_by'));
    }

    public function showEditReport($emp_id)
    {   
        $current_id = Auth::id();
        $emps = User::where('id', $emp_id)->with('employee', 'role.role')->first();
        $roles      = Role::get();
        $city_list  = City::where('zone_id',$emps->employee->zone_id)->get(); 
        $zone_list  = Zone::get();
        $unit_list  = Unit::where('zone_id',$emps->employee->zone_id)->where('city_id',$emps->employee->city_id)->get(); 
        
        return view('hrms.qualitycheck.update_report_status', compact('emps', 'roles','city_list','zone_list','unit_list'));
    }

    public function doEditReport(Request $request, $id)
    {                      
        $current_id = Auth::id();
        $employee = Employee::where('user_id', $id)->first();
        $filename = '';
        if ($request->file('emp_manager_DOR_pdf')) {
            $file             = $request->file('emp_manager_DOR_pdf');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['pdf'];
            $destinationPath  = public_path('photos');
            if (!in_array($fileExt, $allowedExtension)) {
                return redirect()->back()->with('message', 'Extension not allowed');
            }
            $filename = url('photos/'.$filename . '.' . $fileExt);                
            $file->move($destinationPath, $filename);
            
            $employee->upload_pdf_report = $filename;

        }else{
            $employee->upload_pdf_report = $employee->upload_pdf_report;
        }
       
        $employee->date_of_health = $request->emp_manager_DOH;
        $employee->date_of_report = $request->emp_manager_DOR;       
        $employee->report_status = $request->report_status;
        $employee->created_report_date = $request->created_report_date;
        $employee->report_created_by = $current_id;
       //echo "<pre>"; print_r($employee); echo "</pre>";die;

        $employee->save(); 
        
        \Session::flash('flash_message', 'Successfully updated!');
        return redirect('report-listing');
    }

    public function doDelete($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        \Session::flash('flash_message', 'User successfully Deleted!');
        return redirect('user-list');
    }

}
