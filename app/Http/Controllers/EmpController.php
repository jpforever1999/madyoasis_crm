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

use App\Http\Requests;

class EmpController extends Controller
{
    public function addEmp()
    {   
        $roles = Role::get(); 
        $city_list = City::get(); 
        $zone_list = Zone::get();  
        $unit_list = Unit::get();     

        return view('hrms.emp.add_emp', compact('roles','city_list','zone_list','unit_list') );
    }

    Public function processEmp(Request $request)
    {                
        $user           = new User;
        $user->name     =   preg_replace('/\s+/', '_', $request->emp_manager_first_name);       
        $result = User::where("email",$request->emp_manager_email_address)->first();  
        if($result){
            \Session::flash('flash_message_error', 'Email already exists');
            return redirect()->back();
        }else{
            $user->email    =   $request->emp_manager_email_address;
            //$user->password = bcrypt('123456'); 
            $user->password = bcrypt($request->emp_manager_password);    
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

            $employee = new Employee;
            if($request->unit_name){
                $unit_id = implode(',',$request->unit_name); 
            }else{
                $unit_id ='';
            }          
                    
            $employee->first_name = $request->emp_manager_first_name;
            $employee->last_name = $request->emp_manager_last_name;    
            $employee->number = $request->emp_manager_mobile_number;        
            $employee->gender = $request->gender;
            $employee->current_address = $request->emp_manager_address;
            $employee->date_of_birth = $request->emp_manager_DOB;
            $employee->date_of_health = $request->emp_manager_DOH;
            $employee->date_of_report = $request->emp_manager_DOR;
            $employee->upload_pdf_report = $filename;
            $employee->status = $request->emp_manager_status;        
            $employee->user_id = $user->id; 
            $employee->zone_id = $request->emp_manager_zone_id;    
            $employee->city_id = $request->emp_manager_city_id;
            $employee->unit_id = $unit_id;
            $employee->emp_code = $request->emp_code;            
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

    public function showEmp()
    {     
        $emps = User::select('users.id','users.email','employees.status','employees.first_name','employees.last_name','employees.number','employees.emp_code')
       ->leftJoin('employees','employees.user_id', '=', 'users.id')
       ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
       ->where('user_roles.role_id', '=', 3)
       ->orderBy('users.id', 'desc')       
       ->paginate(10);   
       
        return view('hrms.emp.show_emp', compact('emps'));
    }

    public function showEdit($emp_id)
    {   
        $emps = User::where('id', $emp_id)->with('employee', 'role.role')->first();
        $roles      = Role::get();
        $city_list  = City::where('zone_id',$emps->employee->zone_id)->get(); 
        $zone_list  = Zone::get();
        $unit_list  = Unit::where('zone_id',$emps->employee->zone_id)->where('city_id',$emps->employee->city_id)->get(); 
        
        return view('hrms.emp.add_emp', compact('emps', 'roles','city_list','zone_list','unit_list'));
    }

    public function doEdit(Request $request, $id)
    {                      
        $user = User::where('id', $id)->first();
        $user->name = $request->emp_manager_first_name;
        $user->email = $request->emp_manager_email_address;
        if($request->emp_manager_password){
            $user->password = bcrypt($request->emp_manager_password);
        }        

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

        if($request->unit_name){
            $unit_id = implode(',',$request->unit_name); 
        }else{
            $unit_id ='';
        }  
        $employee->first_name = $request->emp_manager_first_name;
        $employee->last_name = $request->emp_manager_last_name;    
        $employee->number = $request->emp_manager_mobile_number;
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
       //echo "<pre>"; print_r($employee); echo "</pre>";die;

        $employee->save(); 
        
        $userRole = UserRole::where('user_id', $id)->first();
        $userRole->role_id = $request->role;  
        $userRole->save();

        \Session::flash('flash_message', 'Employee successfully updated!');
        return redirect('emp-list');
    }

    public function doDelete($id)
    {
        $emp = Emp::find($id);
        $emp->delete();
        \Session::flash('flash_message', 'Emp successfully Deleted!');
        return redirect('emp-list');
    }

}
