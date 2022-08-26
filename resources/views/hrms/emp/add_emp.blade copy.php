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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender <strong style="color: red;">*</strong></label>
                                            <select class="form-select" id="gender" name="gender" required>
                                                <option value="">Select</option>
                                                <option value="1" @if(isset($emps))@if($emps->employee->gender == '1')selected @endif @endif>Male</option>
                                                <option value="2" @if(isset($emps))@if($emps->employee->gender == '2')selected @endif @endif>Female</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_address" class="form-label">Address <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_address" maxlength="400"  name="emp_manager_address" value="@if($emps && $emps->employee->current_address){{$emps->employee->current_address}}@endif"  class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_address" class="form-label">Address <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_address" maxlength="400"  name="emp_manager_address" value=""  class="form-control">
                                        </div>
                                    @endif

                                    </div>

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_DOB" class="form-label">Date of birth <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_DOB"  name="emp_manager_DOB" value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif" required class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_DOB" class="form-label">Date of birth <strong style="color: red;">*</strong></label>
                                            <input type="text" id="emp_manager_DOB"  name="emp_manager_DOB" value="" required class="form-control">
                                        </div>
                                    @endif
                                    </div>

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_DOH" class="form-label">Date of health <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_DOH"  name="emp_manager_DOH" value="@if($emps && $emps->employee->date_of_health){{$emps->employee->date_of_health}}@endif"  class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_DOH" class="form-label">Date of health <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_DOH"  name="emp_manager_DOH" value=""  class="form-control">
                                        </div>
                                    @endif                                                        
                                    </div>

                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_DOR" class="form-label">Date of report <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_DOR"  name="emp_manager_DOR" value="@if($emps && $emps->employee->date_of_report){{$emps->employee->date_of_report}}@endif"  class="form-control">
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_DOR" class="form-label">Date of report <strong style="color: red;"></strong></label>
                                            <input type="text" id="emp_manager_DOR"  name="emp_manager_DOR" value=""  class="form-control">
                                        </div>
                                    </div>
                                    @endif 

                                    <div class="col-lg-6">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                        <div class="form-group">
                                            <label for="emp_manager_DOR_pdf" class="form-label">Upload PDF Report <strong style="color: red;"></strong></label>
                                            <input type="file" id="emp_manager_DOR_pdf"  name="emp_manager_DOR_pdf" value="@if($emps)@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif @endif" class="form-control">
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="emp_manager_DOR_pdf" class="form-label">Upload PDF Report <strong style="color: red;"></strong></label>
                                            <input type="file" id="emp_manager_DOR_pdf"  name="emp_manager_DOR_pdf" value=""  class="form-control">
                                        </div>
                                    @endif 
                                    
                                    @if(isset($emps))@if(isset($emps->employee->upload_pdf_report))
                                        <img src="@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif" width="80px" height="80" />
                                    @endif @endif
                                    </div>

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
                        <div class="col-md-2"> <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit"> </div>
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