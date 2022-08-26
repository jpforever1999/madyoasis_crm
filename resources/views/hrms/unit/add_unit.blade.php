@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> 
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-unit/{id}')
               <ol class="breadcrumb">                   
                  <li class="breadcrumb-link">
                    <a href=""> Unit &nbsp;</a>
                  </li>
                  <li class="breadcrumb-current-item"> Edit @if($result && $result->unit_name){{$result->unit_name}}@endif </li>
               </ol>
                @else
                    <ol class="breadcrumb">                       
                        <li class="breadcrumb-link">
                            <a href=""> Unit &nbsp;</a>
                        </li>
                        <li class="breadcrumb-current-item"> Add unit </li>
                    </ol>
                @endif
        </div>
    </div>
    <!-- -------------- Content -------------- -->
    <section>   
    <div class="container-fluid">     
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel"> <div class="card p-4">       
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-unit/{id}')
                                <span class="panel-title hidden-xs"> Edit Unit </span>
                                @else
                                   <span class="panel-title hidden-xs"> Add Unit </span>
                               @endif
                        </div>

                                           
                                <div class="card-body unityform">
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

                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="form-group zones-wrap">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group city-select">
                                                    <label for="zone" class="form-label">Select Zone <strong style="color: red;">*</strong></label>
                                                    <select class="form-select" name="zone_id" id="emp_manager_zone_id" required>                                                                                              
                                                    <option value=""> --select--</option>
                                                    <?php $zone_id = isset($result) && $result->zone_id ? $result->zone_id :''; ?>
                                                    @foreach($zone as $val)
                                                        <option value="{{$val->id}}" @if($val->id == $zone_id )selected @endif > {{$val->zone_name}} </option>
                                                    @endforeach    

                                                    </select>
                                                </div>
                                            </div>  
                                            
                                            
                                            <!--<div class="col-md-6">
                                                <div class="form-group city-select">
                                                    <label for="city" class="form-label">Select City <strong style="color: red;">*</strong></label>
                                                    <select class="form-select" name="city_id" id="example-select" required>                                                                                              
                                                    <option value=""> --select--</option>
                                                    @foreach($city as $val)
                                                        <option value="{{$val->id}}" @if($val->id == request()->route('id'))selected @endif > {{$val->city_name}} </option>
                                                    @endforeach    

                                                    </select>
                                                </div>
                                            </div>-->

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <?php $city_id = isset($result) && $result->city_id ? $result->city_id :''; ?>
                                                    <label for="emp_manager_city_id" class="form-label">Select City <strong style="color: red;">*</strong></label>
                                                    <select name="city_id" id="emp_manager_city_id" class="form-control" required>
                                                        <option value="">Select city</option>
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-unit/{id}')   
                                                        @foreach($city_filter as $val)
                                                        <option value="{{$val->id}}" @if($val->id == $city_id)selected @endif > {{$val->city_name}} </option>
                                                        @endforeach  
                                                    @else
                                                        @foreach($city as $val)
                                                        <option value="{{$val->id}}" @if($val->id == $city_id)selected @endif > {{$val->city_name}} </option>
                                                        @endforeach  

                                                    @endif
                                                    </select>
                                                
                                                </div>                                        
                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emp_manager_first_name" class="form-label">Unit <strong style="color: red;">*</strong></label>
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-unit/{id}')
                                                <input type="text" name="unit_name" id="input002" class="select2-single form-control" value="@if($result && $result->unit_name){{$result->unit_name}}@endif" required>
                                                @else
                                                    <input type="text" name="unit_name" id="input002" class="select2-single form-control" placeholder="unit name" required>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Status" class="form-label"> Status </label>
                                                    <div >
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-unit/{id}')
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

                                       
                                        <div class="form-group">
                                          
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                           </div>
                                            <div class="col-md-2"><a href="/add-unit" >
                                                <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
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