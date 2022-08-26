@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> <div class="row"><div class="col-12">
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-user-report/{id}')
            
                <div class="page-title-right mt-4">
                    <a href="/user-list" class="btn btn-success rounded-pill waves-effect waves-light">Back to employees list</a>
                </div>
                <h4 class="page-title">Upload Employee Health Report - {{$emps->employee->first_name}} ({{$emps->employee->emp_code}})</h4>
           
            @else    
                 <div class="page-title-right mt-4">
                    <a href="/user-list" class="btn btn-success rounded-pill waves-effect waves-light">Back to employees list</a>
                </div>
                <h4 class="page-title">Upload Employee Health Report -  {{$emps->employee->first_name}} ({{$emps->employee->emp_code}}</h4>     

            @endif
        </div> </div></div>
    </div>
    <!-- -------------- Content -------------- -->
    <section>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-12">
                    <div class="card p-4 mb-140">

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

                    @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <div class="card-body">
                            <div class="mb-3 zones-wrap">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php $date_of_health = isset($emps) && !empty($emps->employee->date_of_health) ? $emps->employee->date_of_health : ''; ?>
                                            <label for="date_of_health" class="form-label">Date of health</label>
                                            <input type="text" id="emp_manager_DOH" name="emp_manager_DOH" value="{{$date_of_health}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">                                   
                                        <div class="form-group">
                                            <?php $date_of_report = isset($emps) && !empty($emps->employee->date_of_report) ? $emps->employee->date_of_report : ''; ?>
                                            <label for="emp_manager_DOR" class="form-label">Date of report</label>
                                            <input type="text" id="emp_manager_DOR" name="emp_manager_DOR" value="{{$date_of_report}}" class="form-control">
                                        </div>                                   
                                    </div>                                      
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
                                        
                                        @if(isset($emps))@if(empty($emps->employee->upload_pdf_report))
                                          <!--<img src="@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif" width="80px" height="80" />-->
                                        @else
                                        <a style="color:red" href="@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif" download>download pdf <i class="fe-database"></i></a>
                                        @endif  @endif

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="emp_manager_status" class="form-label">Report Status <strong style="color: red;">*</strong></label>

                                            <select class="form-select" id="report_status" name="report_status" required="">
                                                <option value="">Select</option>
                                                <option value="0" @if(isset($emps))@if($emps->employee->report_status == '0')selected @endif @endif>Pending</option>
                                                <option value="1" @if(isset($emps))@if($emps->employee->report_status == '1')selected @endif @endif>Completed</option>
                                                <option value="2" @if(isset($emps))@if($emps->employee->report_status == '2')selected @endif @endif>Appointment Schedule</option>
                                                <option value="3" @if(isset($emps))@if($emps->employee->report_status == '3')selected @endif @endif>Not Scheduled</option>  
                                                <option value="4" @if(isset($emps))@if($emps->employee->report_status == '4')selected @endif @endif>Medical Done</option>                                                       
                                            </select>

                                        </div>                                                    
                                    </div> 

                                </div>
                            </div>

                    </div>
                    <div class="card-footer">   
                        <input type="hidden" name="role" value="2" placeholder="employee">   
                        <input type="hidden" name="created_report_date" value="<?php echo date('Y-m-d') ?>" placeholder="employee">                             
                        <div class="col-md-2"> <input type="submit" class="btn btn-bordered btn-info btn-block" id="clickme" value="Submit"> </div>
                        <div class="col-md-2"><a href="/add-user" > <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div> 
                    </div>

                    </div>  
                </div>

                {!! Form::close() !!}

            </div>
        </div>   
    </section>
</div>
@endsection