<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeController extends Controller
{
    public function addemp()
    {
       
        return view('hrms.employee.add_employee');
    }

    Public function processZone(Request $request)
    {
        
        $filename = public_path('photos/a.png');
        if ($request->file('photo')) {
            $file             = $request->file('photo');
            $filename         = str_random(12);
            $fileExt          = $file->getClientOriginalExtension();
            $allowedExtension = ['jpg', 'jpeg', 'png'];
            $destinationPath  = public_path('photos');
            if (!in_array($fileExt, $allowedExtension)) {
                return redirect()->back()->with('message', 'Extension not allowed');
            }
            $filename = $filename . '.' . $fileExt;
            $file->move($destinationPath, $filename);

        }

        $user           = new User;
        $user->name     = $request->emp_name;
        $user->email    = str_replace(' ', '_', $request->emp_name) . '@sipi-ip.sg';
        $user->password = bcrypt('123456');
        $user->save();

        $emp                       = new Employee;
        $emp->photo                = $filename;
        $emp->name                 = $request->emp_name;
        $emp->code                 = $request->emp_code;
        $emp->status               = $request->emp_status;
        $emp->gender               = $request->gender;
        $emp->date_of_birth        = date_format(date_create($request->dob), 'Y-m-d');
        $emp->date_of_joining      = date_format(date_create($request->doj), 'Y-m-d');
        $emp->number               = $request->number;
        $emp->qualification        = $request->qualification;
        $emp->emergency_number     = $request->emergency_number;
        $emp->pan_number           = $request->pan_number;
        $emp->father_name          = $request->father_name;
        $emp->current_address      = $request->current_address;
        $emp->permanent_address    = $request->permanent_address;
        $emp->formalities          = $request->formalities;
        $emp->offer_acceptance     = $request->offer_acceptance;
        $emp->probation_period     = $request->probation_period;
        $emp->date_of_confirmation = date_format(date_create($request->date_of_confirmation), 'Y-m-d');
        $emp->department           = $request->department;
        $emp->salary               = $request->salary;
        $emp->account_number       = $request->account_number;
        $emp->bank_name            = $request->bank_name;
        $emp->ifsc_code            = $request->ifsc_code;
        $emp->pf_account_number    = $request->pf_account_number;
        $emp->un_number            = $request->un_number;
        $emp->pf_status            = $request->pf_status;
        $emp->date_of_resignation  = date_format(date_create($request->date_of_resignation), 'Y-m-d');
        $emp->notice_period        = $request->notice_period;
        $emp->last_working_day     = date_format(date_create($request->last_working_day), 'Y-m-d');
        $emp->full_final           = $request->full_final;
        $emp->user_id              = $user->id;
        $emp->save();

        $userRole          = new UserRole();
        $userRole->role_id = $request->role;
        $userRole->user_id = $user->id;
        $userRole->save();

        //$emp->userrole()->create(['role_id' => $request->role]);

        return json_encode(['title' => 'Success', 'message' => 'Employee added successfully', 'class' => 'modal-header-success']);

    }

    public function showEmployeeList()
    {       
        $employees = Employee::orderBy('id', 'desc')->paginate(10);   
        //$zones = Zone::with(['zones', 'id', 'zone_name'])->paginate(5);  
        return view('hrms.zone.show_zone', compact('employees'));
    }

    public function showEdit($emp_id)
    {        
        $result = Zone::whereid($emp_id)->first();       
        return view('hrms.employee.add_employee', compact('result'));
    }

    public function doEdit(Request $request, $id)
    {              
        $edit = Employee::findOrFail($id);
        $edit->employee_name = $request->employee_name;
        $edit->status = $request->status;
        $edit->save();
        \Session::flash('flash_message', 'Employee successfully updated!');
        return redirect('zone-list');
    }

    public function doDelete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        \Session::flash('flash_message', 'Employee successfully Deleted!');
        return redirect('employee-list');
    }

}
