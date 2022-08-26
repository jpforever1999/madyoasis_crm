<?php

    namespace App\Http\Controllers;

    use App\Models\Event;
    use App\Models\Meeting;
    use App\Models\Role;
    use App\Models\City;
    use App\Models\Zone;
    use App\Models\Unit;
    use App\User;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Contracts\Mail\Mailer;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;
   

    class AuthController extends Controller
    {
        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }

        public function showLogin()
        {
            return view('hrms.auth.login');
        }

        public function doLogin(Request $request)
        {
            $email    = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->first();
            if ($user) {

                if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                    //return redirect()->to('welcome');
                    return redirect()->to('dashboard');
                } else {
                    \Session::flash('class', 'alert-danger');
                    \Session::flash('message', 'User id or password does not match!');
                }
            } else {
                \Session::flash('class', 'alert-danger');
                \Session::flash('message', 'User id or password does not match!');
            }

            return redirect()->to('/');
        }

        public function doLogout()
        {
            \Auth::logout();

            return redirect()->to('/');
        }

        public function dashboard()
        {
            //$events   = $this->convertToArray(Event::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
           // $meetings = $this->convertToArray(Meeting::where('date', '>', Carbon::now())->orderBy('date', 'desc')->take(3)->get());
            $emps = User::select(
            'users.id','users.email',
            'employees.status','employees.first_name','employees.last_name','employees.number','employees.report_status','employees.date_of_health','employees.date_of_report','employees.date_of_joining',
            'employees.emp_code','employees.user_id','employees.gender','employees.age','employees.current_address','employees.upload_pdf_report','employees.date_of_birth','employees.created_report_date',
            'zones.zone_name')
            ->leftJoin('employees','employees.user_id', '=', 'users.id')      
            ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
            ->leftJoin('zones','zones.id', '=', 'employees.zone_id')
            ->where('user_roles.role_id', '=', 2)
            ->get(); 

            $manager = User::select(
                'users.id','users.email',
                'employees.status','employees.first_name','employees.last_name','employees.number','employees.report_status','employees.date_of_health','employees.date_of_report','employees.date_of_joining',
                'employees.emp_code','employees.user_id','employees.gender','employees.age','employees.current_address','employees.upload_pdf_report','employees.date_of_birth','employees.created_report_date',
                'zones.zone_name')
                ->leftJoin('employees','employees.user_id', '=', 'users.id')      
                ->leftJoin('user_roles','user_roles.user_id', '=', 'users.id')
                ->leftJoin('zones','zones.id', '=', 'employees.zone_id')
                ->where('user_roles.role_id', '=', 3)
                ->get(); 

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

            $city_list  = City::get(); 
            $zone_list  = Zone::get();
            $unit_list  = Unit::get();

            return view('hrms.dashboard', compact('emps','pending_report','completed_report',
            'appointment_schedule','not_scheduled','medical_done','city_list','zone_list','unit_list','manager'));
        }

        public function welcome()
        {
            return view('hrms.auth.welcome');
        }

        public function notFound()
        {
            return view('hrms.auth.not_found');
        }

        public function showRegister()
        {
            return view('hrms.auth.register');
        }

        public function doRegister(Request $request)
        {
            return view('hrms.auth.register');
        }

        public function calendar()
        {
            return view('hrms.auth.calendar');
        }

        public function changePassword()
        {
            return view('hrms.auth.change');
        }

        public function processPasswordChange(Request $request)
        {
            $password = $request->old;
            $user     = User::where('id', \Auth::user()->id)->first();


            if (Hash::check($password, $user->password)) {
                $user->password = bcrypt($request->new);
                $user->save();
                \Auth::logout();

                return redirect()->to('/')->with('message', 'Password updated! LOGIN again with updated password.');
            } else {
                \Session::flash('flash_message', 'The supplied password does not matches with the one we have in records');

                return redirect()->back();
            }
        }

        public function resetPassword()
        {
            return view('hrms.auth.reset');
        }

        public function processPasswordReset(Request $request)
        {
            $email = $request->email;
            $user  = User::where('email', $email)->first();

            if ($user) {
                $string = strtolower(str_random(6));


                $this->mailer->send('hrms.auth.reset_password', ['user' => $user, 'string' => $string], function ($message) use ($user) {
                    $message->from('no-reply@madyoasis.com', 'Madyoasis Pvt. Ltd.');
                    $message->to($user->email, $user->name)->subject('Your new password');
                });

                \DB::table('users')->where('email', $email)->update(['password' => bcrypt($string)]);

                return redirect()->to('/')->with('message', 'Login with your new password received on your email');
            } else {
                return redirect()->to('/')->with('message', 'Your email is not registered');
            }

        }

        public function convertToArray($values)
        {
            $result = [];
            foreach ($values as $key => $value) {
                $result[$key] = $value;
            }

            return $result;
        }

    }
