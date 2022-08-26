@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> <div class="row"><div class="col-12">
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-report/{id}')
            
                <div class="page-title-right mt-4">
                    <a href="/report-listing" class="btn btn-success rounded-pill waves-effect waves-light">Back to employees list</a>
                </div>
                <h4 class="page-title">Upload status- {{$emps->employee->first_name}} ({{$emps->employee->emp_code}})</h4>
           
            @else    
                 <div class="page-title-right mt-4">
                    <a href="/report-listing" class="btn btn-success rounded-pill waves-effect waves-light">Back to employees list</a>
                </div>
                <h4 class="page-title">Upload status -  {{$emps->employee->first_name}} ({{$emps->employee->emp_code}})</h4>     

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
                                <div class="col-lg-4">
                                        <div class="form-group">
                                            <?php $date_of_health = isset($emps) && !empty($emps->employee->date_of_health) ? $emps->employee->date_of_health : ''; ?>
                                            <label for="date_of_health" class="form-label">Date of health : </label> {{$date_of_health}}
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-4">                                   
                                        <div class="form-group">
                                            <?php $date_of_report = isset($emps) && !empty($emps->employee->date_of_report) ? $emps->employee->date_of_report : ''; ?>
                                            <label for="emp_manager_DOR" class="form-label">Date of report : </label> {{$date_of_report}}
                                            
                                        </div>                                   
                                    </div>                                      
                                    <div class="col-lg-4"><div class="form-group">
                                        <label for="emp_manager_DOR_pdf" class="form-label">PDF Report :  <strong style="color: red;"></strong></label>
                                        @if(isset($emps))@if(empty($emps->employee->upload_pdf_report))
                                            <!--<img src="@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif" width="80px" height="80" />-->
                                            : Not available
                                        
                                            @else
                                        <a style="color:red" href="@if($emps && $emps->employee->upload_pdf_report){{$emps->employee->upload_pdf_report}}@endif" download>download pdf <i class="fe-database"></i></a>
                                        @endif  @endif
                                        </div>
                                    </div>
                                    
                                    
                                <div class="col-12 pt-3"><div class="form-group">
                                    <label> Report Status </label>                                    
                                    <div class="status">                                    
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="report_approve" id="report_approve1" value="1" @if(isset($emps))@if($emps->employee->report_approve == 1)checked @endif @endif />
                                            <label class="form-check-label" for="report_approve1">Approved</label>
                                        </div>                                           
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="report_approve" id="report_approve2" value="2" @if(isset($emps))@if($emps->employee->report_approve == 2)checked @endif @endif />
                                            <label class="form-check-label" for="report_approve2">Unapproved</label>
                                        </div>  
                                    </div></div> 
                                </div>   
                                </div>
                            </div>

                    </div>
                    <div class="card-footer">    
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