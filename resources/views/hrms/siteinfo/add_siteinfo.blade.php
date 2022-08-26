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
                        <li class="breadcrumb-icon">
                            <a href="/dashboard">
                                <span class="fa fa-home"></span>
                            </a>
                        </li>
                        <li class="breadcrumb-active">
                            <a href="/dashboard"> Dashboard </a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href=""> Website Information </a>
                        </li>
                        <li class="breadcrumb-current-item"> Add Website Information </li>
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
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-siteinfo/{id}')
                                <span class="panel-title hidden-xs"> Edit Website Information </span>
                                @else
                                   <span class="panel-title hidden-xs"> Add Website Information </span>
                               @endif
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
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

                                        {!! Form::open(['class' => 'form-horizontal','files'=>true,'name'=>'siteinfo']) !!}
                                      
                                        <div class="mb-3 zones-wrap">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <?php $website_name = (isset($result) && !empty($result->website_name)) ? $result->website_name:''; ?>
                                                        <label for="site_name" class="form-label">Website Name <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_name" maxlength="255"  name="website_name" value="{{$website_name}}" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <?php $address = (isset($result) && !empty($result->address)) ? $result->address:''; ?>
                                                        <label for="site_address" class="form-label">Address <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_address" maxlength="255"  name="address" value="{{$address}}" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <?php $city = (isset($result) && !empty($result->city)) ? $result->city:''; ?>
                                                        <label for="site_city" class="form-label">City <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_city" maxlength="255"  name="city" value="{{$city}}" required  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_state" class="form-label">State <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_state" maxlength="255"  name="state" value="@if(isset($result))@if($result && $result->state){{$result->state}}@endif @endif" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="site_zip" class="form-label">Zip <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_zip" maxlength="50"  name="zip" value="@if(isset($result))@if($result && $result->zip){{$result->zip}}@endif @endif" required  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <?php $email_id = (isset($result) && !empty($result->email_id)) ? $result->email_id:''; ?>
                                                        <label for="site_email" class="form-label">Email Address <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_email" maxlength="255"  name="email_id" value="{{$email_id}}" required class="form-control">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <?php $mobile_n = (isset($result) && !empty($result->mobile_no)) ? $result->mobile_no:''; ?>
                                                        <label for="site_mobile_no" class="form-label">Mobile Number <strong style="color: red;">*</strong></label>
                                                        <input type="text" id="site_mobile_no" maxlength="10"  name="mobile_no" value="{{$mobile_n}}" class="form-control">
                                                        <div id="phone-error" class="text-danger"></div> 
                                                    </div>
                                                    
                                                </div>
                                            
                                                <div class="col-lg-6">
                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-siteinfo/{id}')
                                                    <div class="form-group">
                                                        <label for="site_logo" class="form-label">Upload Logo <strong style="color: red;">*</strong></label>
                                                        <input type="file" id="site_logo" name="logo"  value="@if(isset($result))@if($result && $result->logo){{$result->logo}}@endif @endif" class="form-control">
                                                    </div>
                                                @else  
                                                    <div class="form-group">
                                                        <label for="site_logo" class="form-label">Upload Logo <strong style="color: red;">*</strong></label>
                                                        <input type="file" id="site_logo" required  name="logo" required value="" class="form-control">
                                                    </div> 
                                                @endif 

                                                @if(isset($result))@if($result && $result->logo)
                                                    <img src="@if($result && $result->logo){{$result->logo}}@endif" width="180px" height="80px" />
                                                @endif @endif

                                                </div>
                                            <div class="col-lg-6">    
                                                <div class="form-group">
                                                <label for="site_logo" class="form-label">Status</label>
                                                <div class="status">
                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-siteinfo/{id}')
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" @if(isset($result))@if($result->status == '1')checked @endif @endif />
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>                                           
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" @if(isset($result))@if($result->status == '0')checked @endif @endif />
                                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                                    </div>
                                                @else
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" checked />
                                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                                    </div>                                           
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" />
                                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                                    </div>
                                                @endif

                                                </div>
                                            </div>
                                             
                                            </div>
                                            </div>   
                                        </div>   
                                        <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-2">
                                            <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit" onclick="phonenumber(document.siteinfo.mobile_no)">
                                        </div>
                                            
                                        </div>
                                        {!! Form::close() !!}

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