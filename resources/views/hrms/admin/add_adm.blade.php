@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> 
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-admin/{id}')
                <ol class="breadcrumb">                   
                    <li class="breadcrumb-link">
                        <a href="">Admin &nbsp; </a>
                    </li>
                    <li class="breadcrumb-current-item">&nbsp; Edit {{$emps->name}} </li>
                </ol>
            @else
                <ol class="breadcrumb">                                                
                    <li class="breadcrumb-link">
                        <a href="/emp-list"> Admin &nbsp;</a>
                    </li>
                    <li class="breadcrumb-current-item"> Add user </li>
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
                                            <?php $emp_code = isset($emps) && !empty($emps->employee->emp_code) ? $emps->employee->emp_code : ''; ?>
                                            <label for="emp_code" class="form-label">Employee ID / Aadhaar Number <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_code" maxlength="255" name="emp_code" value="{{$emp_code}}" required="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">                                   
                                        <div class="form-group">
                                            <?php $email = isset($emps) && !empty($emps->email) ? $emps->email : ''; ?>
                                            <label for="emp_manager_email_address" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_email_address" maxlength="255"  name="emp_manager_email_address" value="{{$email}}" required class="form-control">
                                        </div>                                   
                                    </div>

                                    <div class="col-lg-6">                                   
                                        <div class="form-group">
                                            <?php $first_name = isset($emps) && !empty($emps->employee->first_name) ? $emps->employee->first_name : ''; ?>
                                            <label for="emp_manager_first_name" class="form-label">First Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_first_name" maxlength="255"  name="emp_manager_first_name" value="{{$first_name}}" required class="form-control">
                                        </div>                                   
                                    </div>
                                    <div class="col-lg-6">                                  
                                        <div class="form-group">
                                            <?php $last_name = isset($emps) && !empty($emps->employee->last_name) ? $emps->employee->last_name : ''; ?>
                                            <label for="emp_manager_last_name" class="form-label">Last Name <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_last_name" maxlength="255"  name="emp_manager_last_name" value="{{$last_name}}" required class="form-control">
                                        </div>                                  
                                    </div>
                                    
                                    
                                    <div class="col-lg-6">                                   
                                        <div class="form-group">
                                            <?php $number = isset($emps) && !empty($emps->employee->number) ? $emps->employee->number : ''; ?>
                                            <label for="emp_manager_mobile_number" class="form-label">Mobile Number <strong style="color: red;">*</strong></label>
                                            <input type="text" id="site_mobile_no" maxlength="10"  name="emp_manager_mobile_number" value="{{$number}}" class="form-control">
                                            <div id="phone-error" class="text-danger"></div>
                                        </div>   
                                    </div>                                      

                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-admin/{id}') 
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