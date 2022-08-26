@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-siteinfo/{id}')
               <ol class="breadcrumb">
                   <li class="breadcrumb-icon">
                    <a href="/dashboard">
                        <span class="fa fa-home"></span>
                    </a>
                   </li>
                  <li class="breadcrumb-active">
                    <a href="/dashboard"> Dashboard </a>
                  </li>
                  <li class="breadcrumb-link">
                    <a href="">Website name </a>
                  </li>
                  <li class="breadcrumb-current-item"> Edit {{$result->website_name}} </li>
               </ol>
                @else
                    <ol class="breadcrumb">
                        <li class="breadcrumb-link">
                            <a href="/edit-siteinfo/{{ request()->id }}"<?php echo request('view-siteinfo'); ?>> Website Information (Edit) </a>
                        </li>
                      
                    </ol>
                @endif
        </div>
    </header>
    <!-- -------------- Content -------------- -->
    <section id="content"><div class="container-fluid">
        <!-- -------------- Column Center -------------- -->
        
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'view-siteinfo/{id}')
                                <span class="panel-title hidden-xs"> Website Information </span>
                                @else
                                   <span class="panel-title hidden-xs"> Website Information </span>
                               @endif
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">                                                                         
                                        <div class="mb-3 zones-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_name" class="form-label">Website Name : </label> @if($result && $result->website_name){{$result->website_name}}@endif
                                                    </div>
                                                </div>
                                             
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_city" class="form-label">City : </label> @if($result && $result->city){{$result->city}}@endif
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_state" class="form-label">State : </label> @if($result && $result->state){{$result->state}}@endif
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_zip" class="form-label">Zip : </label> @if($result && $result->zip){{$result->zip}}@endif
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_email" class="form-label">Email Address</label> @if($result && $result->email_id){{$result->email_id}}@endif
                                                    
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_mobile_no" class="form-label">Mobile Number : </label> @if($result && $result->mobile_no){{$result->mobile_no}}@endif
                                                    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_address" class="form-label">Address : </label> @if($result && $result->address){{$result->address}}@endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">                                               
                                                <label for="site_logo" class="form-label">Upload Logo : </label>
                                                <div class="">
                                                @if($result && $result->logo)
                                                    <img src="@if($result && $result->logo){{$result->logo}}@endif" width="180px" height="80px" />
                                                @endif
                                                </div>  
                                                </div>                                                                                         
                                            </div>
                                            </div>   
                                        </div>                                           
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>              
            </div>
        </div>
      </div>
    </section>

</div>
@endsection