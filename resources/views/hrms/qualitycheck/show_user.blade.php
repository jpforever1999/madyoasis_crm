@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid">       
        <div class="page-title-box">
            <h4 class="page-title">Employee <span class="page-title-right"><a href="#">CRM</a> > employee</span></h4>
        </div>       
   

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-users font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                    @if (count($emps) > 0)
                                        {{count($emps)}}
                                    @endif</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Employee</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="mdi mdi-account-alert font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">                                 
                                @if (count($emps) > 0)
                                    {{count($pending_report)}}
                                @endif     
                            </span></h3>
                                <p class="text-muted mb-1 text-truncate">Pending Report</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="mdi mdi-account-alert-outline font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"> 
                                @if (count($completed_report) > 0)
                                    {{count($completed_report)}}
                                @else
                                 0   
                                @endif</span></h3>
                                <p class="text-muted mb-1 text-truncate">Completed Report</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="mdi mdi-account-alert-outline font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                @if (count($appointment_schedule) > 0)
                                    {{count($appointment_schedule)}}
                                @else
                                0  
                                @endif
                                </span></h3>
                                <p class="text-muted mb-1 text-truncate">Appointment Schedule</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>


        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="mdi mdi-account-alert-outline font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                @if (count($not_scheduled) > 0)
                                    {{count($not_scheduled)}}
                                @else
                                 0  
                                @endif
                                </span></h3>
                                <p class="text-muted mb-1 text-truncate">Not Scheduled</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="mdi mdi-account-alert-outline font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                @if (count($medical_done) > 0)
                                    {{count($medical_done)}}
                                @else
                                 0  
                                @endif
                                </span></h3>
                                <p class="text-muted mb-1 text-truncate">Medical Done</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                </div>
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        <!-- end col-->
    </div>
</div>

<!-- -------------- Top box end  -------------- -->

    <section>
        <!-- -------------- Column Center -------------- -->
        <div class="container-fluid"> 

            <!-- -------------- Products Status Table -------------- -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="card p-4">    
                        <div class="card-body">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            {!! Form::open(['class' => 'form-horizontal']) !!}
                            <div class="table-responsive">
                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th>Id</th> 
                                        <th>Emp ID</th>  
                                        <th>Status</th>
                                        <th>Check Report</th>
                                        <th>Download Report</th>                                       
                                        <th>DOH</th>
                                        <th>DOR</th>
                                        <th>Created Date</th>
                                        <th>DOB</th>
                                                             
                                    </tr>
                                   </thead>

                                    <tbody>
                                    <?php $i =0;?>
                            <?php //echo "<pre"; print_r($emps); echo "</pre>";die; ?>  
                               
                            @foreach($emps as $val)
                            <?php                            
                         
                            if($val->gender == '0' && $val->gender!=NULL){
                                $gen = 'Male';
                            }elseif($val->gender=='1' && $val->gender!=NULL){
                                $gen = 'Female';
                            }elseif($val->gender==NULL){
                                $gen = '--';
                            }

                            if($val->report_status==0){
                                $report_status = 'Pending';
                            }elseif($val->report_status=='1' && $val->report_status!=NULL){
                                $report_status = 'Completed';
                            }elseif($val->report_status=='2' && $val->report_status!=NULL){
                                $report_status = 'Appointment Schedule';
                            }elseif($val->report_status=='3' && $val->report_status!=NULL){
                                $report_status = 'Not Scheduled';
                            }elseif($val->report_status=='4' && $val->report_status!=NULL){
                                    $report_status = 'Not Scheduled';                            
                            }elseif($val->report_status==NULL){
                                $report_status = '--';
                            }
                            
                            if($val->report_approve == 2 && $val->report_approve != NULL){
                                $report_approve = 'Unapproved';
                            }elseif($val->report_approve == 1 && $val->report_approve != NULL){
                                $report_approve = 'Approved';
                            }else{
                                $report_approve = 'Pending';
                            }
                            
                            ?>
                           
                                <tr>
                                    <td class="id-{{$val->user_id}}">{{$i+=1}}</td>                                   
                                    <td>{{$val->emp_code}} </td>                                                          
                                    <td>{{$report_approve}}</td>  
                                    <td><a href="edit-report/{{$val->user_id}}" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Check Report</a></td>  
                                    <td><a type="button" class="btn btn-danger waves-effect waves-light" href="<?php echo $upload_pdf_report = !empty($val->upload_pdf_report) ? $val->upload_pdf_report : '#'; ?>" target="_blank"><i class="mdi mdi-plus-circle me-1"></i> Download</a></td> 
                                    
                                    <td>{{$val->date_of_health}}</td>                                  
                                    <td>{{$val->date_of_report}}</td>
                                    <td>{{$val->created_report_date}}</td>
                                    <td>{{$val->date_of_birth}}</td>
                                    
                                </tr>
                            @endforeach                           
                            <tr>
                                {!! $emps->render() !!}
                            </tr>
                            </tbody>
                                </table>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
    </section>

</div>
@endsection