@extends('hrms.layouts.base')

@section('content')

<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <form class="d-flex align-items-center mb-3">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control border" id="dash-daterange">
                                            <span class="input-group-text bg-blue border-blue text-white">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                        </div>
                                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>

                                    </form>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                             <i class="font-22 avatar-title text-info">Z</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($zone_list) > 0)
                                                        {{count($zone_list)}}
                                                    @else 0         
                                                    @endif</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Zone</p>
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
                                            <i class="font-22 avatar-title text-info">C</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                @if (count($city_list) > 0)
                                                        {{count($city_list)}}
                                                @else 0         
                                                @endif
                                                </span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Cities</p>
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
                                            <i class="font-22 avatar-title text-info">S</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($unit_list) > 0)
                                                        {{count($unit_list)}}
                                                    @else 0         
                                                    @endif</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Store/Unit</p>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">M</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($manager) > 0)
                                                        {{count($manager)}}
                                                    @else 0         
                                                    @endif</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Managers</p>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">E</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"> 
                                                    @if (count($emps) > 0)
                                                        {{count($emps)}}
                                                    @endif
                                                </span></h3>
                                                <p class="text-muted mb-1 text-truncate">Total Employees</p>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">PR</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup"> 
                                                    @if (count($pending_report) > 0)
                                                        {{count($pending_report)}}
                                                    @else 0                                                     
                                                    @endif</span></h3>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">CR</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($completed_report) > 0)
                                                        {{count($completed_report)}}
                                                    @else 0  
                                                    @endif
                                                </span></h3>
                                                <p class="text-muted mb-1 text-truncate">Completed Report</p>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">AS</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($appointment_schedule) > 0)
                                                        {{count($appointment_schedule)}}
                                                    @else 0 
                                                    @endif
                                                </span></h3>
                                                <p class="text-muted mb-1 text-truncate">Appointment Schedule..</p>
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
                                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                            <i class="font-22 avatar-title text-info">NS</i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-end">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">
                                                    @if (count($not_scheduled) > 0)
                                                        {{count($not_scheduled)}}
                                                    @else 0         
                                                    @endif</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Not Schedule</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row-->
                                </div>
                            </div>
                            <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->

                    </div>
                    <!-- end row-->

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <!-- Portlet card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Health Checkup Status Report</h4>

                                    <div id="cardCollpase1" class="collapse show">
                                        <div class="text-center pt-3">
                                            <div class="row mt-2">
                                                <div class="col-3">
                                                    <h3 data-plugin="counterup"> 
                                                    @if (count($pending_report) > 0)
                                                        {{count($pending_report)}}
                                                    @else 0                                                     
                                                    @endif</h3>
                                                    <p class="text-muted font-13 mb-0 text-truncate">Pending Report</p>
                                                </div>
                                                <div class="col-3">
                                                    <h3 data-plugin="counterup">
                                                    @if (count($completed_report) > 0)
                                                        {{count($completed_report)}}
                                                    @else 0                                                     
                                                    @endif
                                                    </h3>
                                                    <p class="text-muted font-13 mb-0 text-truncate">Completed Report</p>
                                                </div>
                                                <div class="col-3">
                                                    <h3 data-plugin="counterup"> 
                                                    @if (count($not_scheduled) > 0)
                                                        {{count($not_scheduled)}}
                                                    @else 0                                                     
                                                    @endif</h3>
                                                    <p class="text-muted font-13 mb-0 text-truncate">Not Schedule</p>
                                                </div>
                                                <div class="col-3">
                                                    <h3 data-plugin="counterup">
                                                    @if (count($appointment_schedule) > 0)
                                                        {{count($appointment_schedule)}}
                                                    @else 0                                                     
                                                    @endif</h3>
                                                    <p class="text-muted font-13 mb-0 text-truncate">Appoitment Scheduled</p>
                                                </div>
                                            </div> <!-- end row -->

                                            <div  dir="ltr">
                                                <div id="lifetime-sales" data-colors="#008000,#00008B,#808080,#FF0000" style="height: 270px;" class="morris-chart mt-3"></div>                
                                            </div>
                                        </div>
                                    </div> <!-- end collapse-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Medical Checkup/Certificate Expiry</h4>

                                    <div id="cardCollpase3" class="collapse show">
                                        <div class="text-center pt-3">

                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <h3 data-plugin="counterup">20</h3>
                                                    <p class="text-muted font-13 mb-0 text-truncate">Medical Checkup/Certificate Expiry</p>
                                                </div>
                                                
                                            </div> <!-- end row -->

                                            <div  dir="ltr">
                                                <div id="statistics-chart" data-colors="#02c0ce" style="height: 270px;" class="morris-chart mt-3"></div>
                                            </div>

                                        </div>
                                    </div> <!-- end collapse-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

                        <div class="col-xl-4 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-widgets">
                                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                        <a data-bs-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                    </div>
                                    <h4 class="header-title mb-0">Quick Access</h4>

                                    <div id="cardCollpase2" class="collapse show">
                                        <div class="text-center pt-3">
                                            <div class="row mt-2">
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                    </div>
                                                <div class="col-12">
                                               <p> <a href="" class="btn btn-success" style="width: 90%;padding: 10px;text-align: left;    background-color: #9f9f9f;border-color: #9f9f9f; font-size: 17px;">Order Pharmacy <span style="float:right;">&#8594;</span></a></p>
                                                </div>
                                                <div class="col-12">
                                                    <p>  <a href="" class="btn btn-danger" style="width: 90%;padding: 10px;text-align: left;background-color: #9f9f9f;border-color: #9f9f9f; font-size: 17px;">Order Medical Equipments  <span style="float:right;">&#8594;</span></a></p>
                                                </div>
                                                <div class="col-12">
                                                    <p><a href="" class="btn btn-warning" style="width: 90%;padding: 10px;text-align: left;background-color: #9f9f9f;border-color: #9f9f9f; font-size: 17px; color: #fff;">Book Appoitment  <span style="float:right;">&#8594;</span></a></p>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                                <div class="col-12"><br>
                                                </div>
                                            </div> <!-- end row -->

                                            

                                        </div>
                                    </div> <!-- end collapse-->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->
                    <!-- end row -->


                </div>
                <!-- container -->

            </div>
            <!-- content -->      

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
   
</section>
@endsection


 