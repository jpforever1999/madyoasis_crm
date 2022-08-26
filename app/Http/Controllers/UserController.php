<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;

use App\Models\Employee;
use App\Models\Emp;
use App\Models\City;
use App\Models\Zone;
use App\Models\Unit;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Fhir_observation_component_trackers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addUser(Request $request)
    {      
   
     
/*$date = \Carbon\Carbon::today()->subDays(3);
$users = Fhir_observation_component_trackers::where('created_at', '>=', $date)->get();


$arr = array();
if($users){
    foreach($users as $val){      
         $arr[$val->id] = $val->value;             
    }
}


$a=array("a"=>"red","b"=>"green","c"=>"red");

$users11 = Array
        (
            '0'=> '2022-05-30',
            '1' => '2022-05-29',
            '2' => '2022-05-28',
            '3' => '2022-05-27',
            '4' => '2022-05-26',
            '5' => '2022-05-25',
            '6' => '2022-05-24',
        );


echo "<pre>"; print_r($arr); echo "</pre>";
$pp = array_unique($arr);

echo "<pre>"; print_r($pp); echo "</pre>";

if(count($pp) == 1){
    //echo $ab[$pp];
    echo "ok";
}else{
    echo "exit";
}
die;
*/
       
       
       
        $user = Auth::user();
        $id = Auth::id();
        $roles = Role::get();     
        $employee_id = Employee::where('user_id',$id)->first();         
        $zone_list = Zone::where('id',$employee_id->zone_id)->first(); 
        $city_list = City::where('id',$employee_id->city_id)->first();      
        $units = explode(',',$employee_id->unit_id);
        //echo "<pre>"; print_r($employee_id); echo "</pre>";die;  

        $zone = Zone::get();
        $city = city::get();

        $unit_list = array();
        foreach($units as $val){            
            $unit_list[]= Unit::where('id',$val)->get();          
        }    
        
        return view('hrms.user.add_user', compact('roles','city_list','zone_list','unit_list','zone','city') );     
    }

    Public function processUser(Request $request)
    {                
        $user           = new User;
        $user->name     =   preg_replace('/\s+/', '_', $request->emp_manager_first_name);
        $result = User::where("email",$request->emp_manager_email_address)->first();  
        if($result){
            \Session::flash('flash_message_error', 'Email already exists');
            return redirect()->back();
        }else{
            $user->email    =   $request->emp_manager_email_address; 
            //$user->password = bcrypt($request->emp_manager_password);              
            $user->password = bcrypt(123456);    
            $user->save();
            
            $filename = '';
            if ($request->file('emp_manager_DOR_pdf')) {
                $file             = $request->file('emp_manager_DOR_pdf');
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
            if(Auth::user()->isAdm()){    
                if($request->unit_name){
                    $unit_id = implode(',',$request->unit_name); 
                }else{
                    $unit_id ='';
                }  
            }
            if(Auth::user()->isManager()){    
                if($request->unit_name){
                    $unit_id = $request->unit_name; 
                }else{
                    $unit_id ='';
                }  
            }
            $employee = new Employee;                  
            $employee->parent_id = Auth::user()->id; 
            $employee->user_id = $user->id;       
            $employee->first_name = $request->emp_manager_first_name;
            $employee->last_name = $request->emp_manager_last_name;    
            $employee->number = trim($request->emp_manager_mobile_number);       
            $employee->gender = $request->gender;
            $employee->current_address = $request->emp_manager_address;
            $employee->date_of_birth = $request->emp_manager_DOB;
            $employee->date_of_health = $request->emp_manager_DOH;
            $employee->date_of_report = $request->emp_manager_DOR;
            $employee->upload_pdf_report = $filename;
            $employee->status = $request->emp_manager_status;                   
            $employee->zone_id = $request->emp_manager_zone_id;    
            $employee->city_id = $request->emp_manager_city_id;
            $employee->unit_id = $unit_id;
            $employee->emp_code = $request->emp_code; 
            $employee->age = $request->age;  
            //echo  "<pre>"; print_r( $employee); echo "</pre>";die;           
            $employee->save();

            $userRole          = new UserRole();
            $userRole->role_id = $request->role;
            $userRole->user_id = $user->id;      
            $userRole->save();

            \Session::flash('flash_message', 'Successfully added!');
            return redirect()->back();
        }
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

    public function showUser()
    {   
        $current_id = Auth::id();

        if(Auth::user()->isAdm()){
           
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
          
            $emps = User::select(
                'users.id','users.email',
                'employees.status','employees.first_name','employees.last_name','employees.number','employees.report_status','employees.report_approve','employees.date_of_health','employees.date_of_report','employees.date_of_joining',
                'employees.emp_code','employees.user_id','employees.gender','employees.age','employees.current_address','employees.upload_pdf_report','employees.date_of_birth','employees.created_report_date',
                'zones.zone_name')
           ->leftJoin('employees','employees.user_id', '=', 'users.id')      
           ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
           ->leftJoin('zones','zones.id', '=', 'employees.zone_id')
           ->where('user_roles.role_id', '=', 2)          
           ->orderBy('users.id', 'desc')       
           ->paginate(10);  

        }elseif(Auth::user()->isManager()){
                  
            $pending_report = DB::table('employees')
            ->select('employees.*')       
            ->where('employees.report_status', '=', 0) 
            ->where('employees.parent_id', '=', $current_id)        
            ->get();  
            
            $completed_report = DB::table('employees')
            ->select('employees.*')       
            ->where('employees.report_status', '=', 1)
            ->where('employees.parent_id', '=', $current_id)            
            ->get();   

            $appointment_schedule = DB::table('employees')
            ->select('employees.*')       
            ->where('employees.report_status', '=', 2)
            ->where('employees.parent_id', '=', $current_id)             
            ->get();  

            $not_scheduled = DB::table('employees')
            ->select('employees.*')       
            ->where('employees.report_status', '=', 3) 
            ->where('employees.parent_id', '=', $current_id)            
            ->get(); 

            $medical_done = DB::table('employees')
            ->select('employees.*')       
            ->where('employees.report_status', '=', 4)
            ->where('employees.parent_id', '=', $current_id)             
            ->get(); 
        
            $emps = User::select(
                'users.id','users.email',
                'employees.status','employees.first_name','employees.last_name','employees.number','employees.report_status','employees.report_approve','employees.date_of_health','employees.date_of_report','employees.date_of_joining',
                'employees.emp_code','employees.user_id','employees.gender','employees.age','employees.current_address','employees.upload_pdf_report','employees.date_of_birth','employees.created_report_date',
                'zones.zone_name')
        ->leftJoin('employees','employees.user_id', '=', 'users.id')      
        ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
        ->leftJoin('zones','zones.id', '=', 'employees.zone_id')
        ->where('user_roles.role_id', '=', 2)
        ->where('employees.parent_id', '=', $current_id)
        ->orderBy('users.id', 'desc')       
        ->paginate(10);  
        
        }
        
        return view('hrms.user.show_user', compact('emps','pending_report','completed_report',
        'appointment_schedule','not_scheduled','medical_done'));

       
        
    }

    public function showEdit($emp_id)
    {        
        $emps = User::where('id', $emp_id)->with('employee', 'role.role')->first(); 
        $roles      = Role::get();
        if(Auth::user()->isAdm()){
            $current_id = $emps->employee->user_id;
        }else{
            $current_id = Auth::id();
        }

        $employee = Employee::where('user_id',$current_id)->first(); 
        $city_list = City::where('id',$employee->city_id)->first();  
        $zone_list = Zone::where('id',$employee->zone_id)->first(); 
        $zone = Zone::get();
        $city = city::get();
        $units = explode(',',$employee->unit_id);

        //is admin login
        if(Auth::user()->isAdm()){
            $unit_list  = Unit::where('zone_id',$emps->employee->zone_id)->where('city_id',$emps->employee->city_id)->get(); 
        }

        //is manager login
        if(Auth::user()->isManager()){            
            $unit_list = array();
            foreach($units as $val){            
                $unit_list[]= Unit::where('id',$val)->get();          
            }
        }
        return view('hrms.user.add_user', compact('emps', 'roles','city_list','zone_list','unit_list','zone','city','employee'));
    }

    public function doEdit(Request $request, $id)
    {                      
        $user = User::where('id', $id)->first();
        $user->name = $request->emp_manager_first_name;
        $user->email = $request->emp_manager_email_address;  
        $user->save();

        $employee = Employee::where('user_id', $id)->first();

        $filename = '';
        if ($request->file('emp_manager_DOR_pdf')) {
            $file             = $request->file('emp_manager_DOR_pdf');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['jpg', 'jpeg', 'png'];
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
        
        /**************is admin login */
        if(Auth::user()->isAdm()){
                
            if($request->unit_name){
                $unit_id = implode(',',$request->unit_name); 
            }else{
                $unit_id ='';
            }

        }
        //is manager login
        if(Auth::user()->isManager()){
            
            if($request->unit_name){
                $unit_id = $request->unit_name; 
            }else{
                $unit_id ='';
            }
            
        }
          
        $employee->first_name = $request->emp_manager_first_name;
        $employee->last_name = $request->emp_manager_last_name;    
        $employee->number = trim($request->emp_manager_mobile_number);
        $employee->gender = $request->gender;       
        $employee->current_address = $request->emp_manager_address;
        $employee->date_of_birth = $request->emp_manager_DOB;
        $employee->date_of_health = $request->emp_manager_DOH;
        $employee->date_of_report = $request->emp_manager_DOR;       
        $employee->status = $request->emp_manager_status; 
        $employee->emp_code = $request->emp_code; 
        $employee->zone_id = $request->emp_manager_zone_id;    
        $employee->city_id = $request->emp_manager_city_id;
        $employee->unit_id = $unit_id;
        $employee->age = $request->age;
        //echo "<pre>"; print_r($employee); echo "</pre>";die;
        $employee->save(); 
        
        $userRole = UserRole::where('user_id', $id)->first();
        $userRole->role_id = $request->role;  
        $userRole->save();

        \Session::flash('flash_message', 'User successfully updated!');
        return redirect('user-list');
    }

    public function showEditReport($emp_id)
    {   
        $emps = User::where('id', $emp_id)->with('employee', 'role.role')->first();
        $roles      = Role::get();
        $city_list  = City::where('zone_id',$emps->employee->zone_id)->get(); 
        $zone_list  = Zone::get();

        $unit_list  = Unit::where('zone_id',$emps->employee->zone_id)->where('city_id',$emps->employee->city_id)->get(); 
        
        return view('hrms.user.update_user_report', compact('emps', 'roles','city_list','zone_list','unit_list'));
    }

    public function doEditReport(Request $request, $id)
    {                      
       
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
       //echo "<pre>"; print_r($employee); echo "</pre>";die;

        $employee->save(); 
        
        \Session::flash('flash_message', 'User successfully updated!');
        return redirect('user-list');
    }

    public function doDelete($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        \Session::flash('flash_message', 'User successfully Deleted!');
        return redirect('user-list');
    }

}
