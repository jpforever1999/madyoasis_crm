@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> 
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                <ol class="breadcrumb">                   
                    <li class="breadcrumb-link">
                        <a href="">Manager &nbsp; </a>
                    </li>
                    <li class="breadcrumb-current-item">&nbsp; Edit {{$emps->name}} </li>
                </ol>
            @else
                <ol class="breadcrumb">                                                
                    <li class="breadcrumb-link">
                        <a href="/emp-list"> Manager &nbsp;</a>
                    </li>
                    <li class="breadcrumb-current-item"> Add manager </li>
                </ol>
            @endif
        </div>
    </div>
    <!-- -------------- Content -------------- -->
    <section>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-12">
                    <div class="card p-4">

                    {!! Form::open(['class' => 'form-horizontal','files'=>true]) !!}
                    
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{Session::get('flash_message')}}
                            </div>
                    @endif

                    @if(Session::has('flash_message_error'))
                        <div class="alert alert-danger">
                            {{Session::get('flash_message_error')}}
                        </div>
                    @endif

                    <div class="card-body">
                            <div class="mb-3 zones-wrap">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_code" class="form-label">Employee ID / Aadhaar Number <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_code" maxlength="255" name="emp_code" value="@if(isset($emps))@if($emps && $emps->employee->emp_code){{$emps->employee->emp_code}}@endif @endif " required="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_email_address" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_email_address" maxlength="255"  name="emp_manager_email_address" value="@if($emps && $emps->email){{$emps->email}}@endif" required class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_email_address" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_email_address" maxlength="255"  name="emp_manager_email_address" value="" required class="form-control">
                                        </div>
                                    @endif

                                    </div>

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_first_name" class="form-label">First Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_first_name" maxlength="255"  name="emp_manager_first_name" value="@if($emps && $emps->employee->first_name){{$emps->employee->first_name}}@endif" required class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_first_name" class="form-label">First Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_first_name" maxlength="255"  name="emp_manager_first_name" value="" required class="form-control">
                                        </div>
                                    @endif
                                    </div>
                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_last_name" class="form-label">Last Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_last_name" maxlength="255"  name="emp_manager_last_name" value="@if($emps && $emps->employee->last_name){{$emps->employee->last_name}}@endif" required class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_last_name" class="form-label">Last Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_last_name" maxlength="255"  name="emp_manager_last_name" value="" required class="form-control">
                                        </div>
                                    @endif
                                    </div>
                                    
                                    
                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_mobile_number" class="form-label">Mobile Number <strong style="color: red;">*</strong></label>
                                            <input type="text" id="site_mobile_no" maxlength="10"  name="emp_manager_mobile_number" value="@if($emps && $emps->employee->number){{$emps->employee->number}}@endif" required class="form-control">
                                            <div id="phone-error" class="text-danger"></div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_mobile_number" class="form-label">Mobile Number <strong style="color: red;">*</strong></label>
                                            <input type="text" id="site_mobile_no" maxlength="10"  name="emp_manager_mobile_number" value="" class="form-control">
                                            <div id="phone-error" class="text-danger"></div>
                                        </div>
                                    @endif
                                    
                                    </div>   

                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}') 
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_password" class="form-label">Password</label>
                                            <input type="password" id="emp_manager_password" maxlength="50" name="emp_manager_password" value="" class="form-control">
                                        </div>
                                    </div>
                                    @else
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="emp_manager_password" class="form-label">Password  <strong style="color: red;">*</strong></label>
                                                <input type="password" id="emp_manager_password" maxlength="50" name="emp_manager_password" value="" class="form-control" required>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_zone_id" class="form-label">Select Zone<strong style="color: red;">*</strong></label>
                                            <select class="form-select" id="emp_manager_zone_id" name="emp_manager_zone_id" required="">
                                            
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')      
                                                <option value="">-- select Zone --</option>
                                                @if(isset($zone_list))        
                                                    @foreach($zone_list as $val)                                                           
                                                        <option value="{{$val->id}}" @if(isset($emps))@if($emps->employee->zone_id == $emps->employee->zone_id)selected @endif @endif>{{$val->zone_name}}</option>                                                                                                                   
                                                    @endforeach
                                                @endif
                                            @else
                                                <option value="">--select Zone--</option>
                                                @if(isset($zone_list))   
                                                    @foreach($zone_list as $val)
                                                        <option value="{{$val->id}}">{{$val->zone_name}}</option>
                                                    @endforeach
                                                @endif
                                            @endif

                                            </select>
                                        </div>                                        
                                    </div>

                                    <!--<div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_city_id" class="form-label">Select City <strong style="color: red;">*</strong></label>
                                            <select class="form-select" id="emp_manager_city_id" name="emp_manager_city_id" required="">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')  
                                                <option value="">Select City</option>
                                                @if(isset($city_list))        
                                                        @foreach($city_list as $val)
                                                            @if(isset($city_list))@if($val->id == $val->id)
                                                                <option value="{{$val->id}}" selected>{{$val->city_name}}</option>
                                                            @endif @endif
                                                            <option value="{{$val->id}}">{{$val->city_name}}</option>
                                                        @endforeach
                                                    @endif
                                            @else
                                                <option value="">Select City</option>
                                                @foreach($city_list as $val)
                                                    <option value="{{$val->id}}">{{$val->city_name}}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>                                        
                                    </div>-->


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_city_id" class="form-label">Select City <strong style="color: red;">*</strong></label>
                                            <select name="emp_manager_city_id" id="emp_manager_city_id" class="form-control" required>
                                                <option value="">Select city</option>
                                                @if(isset($city_list))        
                                                    @foreach($city_list as $val)                                                           
                                                        <option value="{{$val->id}}" @if(isset($emps))@if($val->id == $emps->employee->city_id)selected @endif @endif>{{$val->city_name}}</option>                                                                                                                   
                                                    @endforeach
                                                @endif
                                            </select>
                                         
                                        </div>                                        
                                    </div>
                                   

                                    <!--<div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <label for="emp_manager_status" class="form-label">Role <strong style="color: red;">*</strong></label>
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')

                                                <select class="select2-single form-control" name="role" id="role" readonly required>
                                                    <option value="">Select role</option>
                                                    @if(isset($roles))        
                                                    @foreach($roles as $role)
                                                        @if(isset($emps->role->role->id))@if($emps->role->role->id == $role->id)
                                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                        @endif @endif
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                @endif
                                                </select>
                                                @else
                                                <select class="select2-single form-control" name="role" id="role">
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div> 
                                    </div>

                                    @if(isset($unit_list))  
                                        <div class="col-lg-12">
                                            <div class="form-group">                                        
                                                <label for="zone" class="form-label">Choose Unit <strong style="color: red;">*</strong></label>
                                                <div class="all-unit_list">   
                                                    @foreach($unit_list as $val) 
                                                    <div class="form-check mb-2 form-check-success">
                                                        <input class="form-check-input" name="unit_name[]" type="checkbox" value="{{$val->unit_name}}" id="customckeck-{{$val->id}}">
                                                        <label class="form-check-label" for="customckeck-{{$val->id}}">{{$val->unit_name}}</label>
                                                    </div>
                                                    @endforeach                                                                                     
                                                </div>                                           
                                            </div>
                                        </div>
                                    @endif   -->

                                    <div class="col-lg-12">
                                        <div class="form-group">                                        
                                            <label for="zone" class="form-label">Choose Unit {{$emps->employee->unit_id}}<strong style="color: red;">*</strong></label>
                                            <div class="all-unit_list" id="unit_list"> 
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')   
                                                @if(isset($unit_list))        
                                                    @foreach($unit_list as $val)    
                                                    @if (strpos($val->unit_name,$emps->employee->unit_id))
                                                    @php $checkedM = "checked" @endphp
                                                    @endif                                                      
                                                        <input class="hobbies" name="unit_name[]" @if(strpos($val->unit_name,$emps->employee->unit_id)) checked @endif   type="checkbox" value="{{$val->id}}" id="customckeck-{{$val->id}}" @if(isset($emps))@if( $val->id == $emps->employee->unit_id)checked @endif @endif>
                                                        <label class="form-check-label" for="customckeck-{{$val->id}}">{{$val->unit_name}}</label>                                                                                                                 
                                                    @endforeach
                                                @endif
                                            @endif
                                            </div>  


                                            <div id="error_message" class="text-danger"></div>                                         
                                        </div>
                                        
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_status" class="form-label">Status <strong style="color: red;">*</strong></label>
                                            <select class="form-select" id="emp_manager_status" name="emp_manager_status" required>
                                                <option value="">Select</option>
                                                <option value="1" @if(isset($emps))@if($emps->employee->status == '1')selected @endif @endif>Active</option>
                                                <option value="0" @if(isset($emps))@if($emps->employee->status == '0')selected @endif @endif>Inactive</option>
                                                
                                            </select>
                                        </div>                                                    
                                    </div> 

                                </div>
                            </div>

                    </div>
                    <div class="card-footer">   
                         <input type="hidden" name="role" value="3" placeholder="manager">                                
                        <div class="col-md-2"> <input type="submit" class="btn btn-bordered btn-info btn-block" id="clickme" value="Submit"> </div>
                        <div class="col-md-2"><a href="/add-emp" > <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div> 
                    </div>

                    </div>  
                </div>

                {!! Form::close() !!}

            </div>
        </div>   
    </section>
</div>
@endsection