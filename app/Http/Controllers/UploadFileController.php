<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;

use App\Models\Emp;
use App\Models\City;
use App\Models\Zone;
use App\Models\Unit;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;



class UploadFileController extends Controller
{
    public function index() {

        if(Auth::user()->isManager()){   
            return view('hrms.uploadfile.uploadcsv');
        }else{
            return view('errors.404'); 
        }

    }

    public function showUploadFile(Request $request) {
        $file = $request->file('image');
     
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
     
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
     
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
     
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
     
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
     
        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
    }

    public function import(Request $request)
    {
            $path = $request->file('file')->getRealPath();
            $records = array_map('str_getcsv', file($path));

            if (! count($records) > 0) {
            return 'Error...';
            }

            // Get field names from header column
            $fields = array_map('strtolower', $records[0]);

            // Remove the header column
            array_shift($records);

            foreach ($records as $record) {
                if (count($fields) != count($record)) {
                    return 'csv_upload_invalid_data';
                }

                // Decode unwanted html entities
                $record =  array_map("html_entity_decode", $record);

                // Set the field name as key
                $record = array_combine($fields, $record);

                // Get the clean data
                $this->rows[] = $this->clear_encoding_str($record);
            }
                       
            foreach ($this->rows as $data) {
                /*User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
                ]);*/


            $user           = new User;
            $user->name     =   111;
            $result = User::where("email",$data['email'])->first();  
            if($result){
                \Session::flash('flash_message_error', 'Email already exists');
                return redirect()->back();
            }else{
                $user->email    =   $data['email']; 
                //$user->password = bcrypt($request->emp_manager_password);              
                $user->password = bcrypt(123456);    
                $user->save();
                
                
                $employee = new Employee;                  
                $employee->parent_id = Auth::user()->id; 
                $employee->user_id = $user->id;       
                $employee->first_name = $data['first_name'];
                $employee->last_name = $data['last_name'];    
                $employee->number = $data['number'];       
            
                $employee->current_address = 11;
                $employee->date_of_birth = $data['date_of_birth'];   
                $employee->status = 1;                  
                $employee->unit_id =$data['unit_id'];
                $employee->emp_code = $data['emp_code']; 
                $employee->age = 11;  
                //echo  "<pre>"; print_r( $employee); echo "</pre>";die;           
                $employee->save();

                $userRole          = new UserRole();
                $userRole->role_id = 2;
                $userRole->user_id = $user->id;      
                $userRole->save();            
            }

            \Session::flash('flash_message', 'successfully added!');
            return redirect()->back();

        }
    }
    
    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
   public function export_vvv($tasks, $columns) {
    
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);
    
        foreach ($tasks as $task) {
            $row['first_name']      = $task->first_name;
            $row['last_name']       = $task->last_name;
            $row['email']           = $task->email;
            $row['age']           = $task->age;
            $row['number']           = $task->number;                    
            $row['emp_code']        = $task->emp_code;
            $row['unit_id']        = $task->unit_id;
            $row['current_address']    = $task->current_address;
            $row['created_at']      = $task->created_at;
            

            fputcsv($file, array($row['first_name'],$row['last_name'], $row['email'], $row['age'], $row['number'],  $row['emp_code'],$row['unit_id'], $row['current_address'], $row['created_at']));
        }
        

        fclose($file);
    }

    public function exportCsv(Request $request)
    {
    $current_id = Auth::id();
    $fileName = 'tasks.csv';

    //$tasks = DB::table('users')->where('role', '=', 1);
   // $tasks = User::all();

    $tasks = DB::table('users')
        ->join('employees', 'users.id', '=', 'employees.user_id')
        ->select('users.*', 'employees.first_name','employees.last_name','age','employees.emp_code','employees.number','employees.current_address','employees.unit_id')
        ->get();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('first_name','last_name', 'email ','age','number','emp_code','unit_id','current_address', 'created_at');

           //$callback = $this->export_vvv($tasks,$columns);
           
            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($tasks as $task) {
                    $row['first_name']      = $task->first_name;
                    $row['last_name']       = $task->last_name;
                    $row['email']           = $task->email;
                    $row['age']           = $task->age;
                    $row['number']           = $task->number;                    
                    $row['emp_code']        = $task->emp_code;
                    $row['unit_id']        = $task->unit_id;
                    $row['current_address']    = $task->current_address;
                    $row['created_at']      = $task->created_at;
                    
                    fputcsv($file, array($row['first_name'],$row['last_name'], $row['email'], $row['age'], $row['number'],  $row['emp_code'],$row['unit_id'], $row['current_address'], $row['created_at']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }

}
