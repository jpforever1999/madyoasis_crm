@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">
        <div class="container-fluid">   
           
                <div class="page-title-box">
                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-zone/{id}')
                        <ol class="breadcrumb">                   
                            <li class="breadcrumb-link">
                                <a href="/zone-list"> Zone &nbsp;>></a>
                            </li>
                            <li class="breadcrumb-current-item"> Edit {{$result->zone_name}} </li>
                        </ol>
                    @else
                        <ol class="breadcrumb">                       
                            <li class="breadcrumb-link">
                                <a href="/zone-list"> Zone &nbsp; </a>
                            </li>
                            <li class="breadcrumb-current-item"> Add </li>
                        </ol>
                    @endif
                </div>
           
        </div>
    <!-- -------------- Content -------------- -->
    <section>
        <!-- -------------- Column Center -------------- -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel"><div class="card p-4">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-zone/{id}')
                                <span class="panel-title hidden-xs"> Edit Zone </span>
                                @else
                                   <span class="panel-title hidden-xs"> Add Zone </span>
                               @endif
                        </div>
                        
                            
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

                                        {!! Form::open(['class' => 'form-horizontal']) !!}
                                        <div class="row">                                            
                                            <label for="simpleinput" class="form-label">Zone Name <strong style="color: red;">*</strong></label>
                                                <div class="col-md-6 pb-2" >
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-zone/{id}')
                                                    <input type="text" name="zone_name" id="input002" class="select2-single form-control" value="@if($result && $result->zone_name){{$result->zone_name}}@endif" maxlength=20 required>
                                                    @else
                                                        <input type="text" name="zone_name" id="input002" class="select2-single form-control" placeholder="zone name" maxlength=20 required>
                                                    @endif
                                                </div>                                           
                                        </div>
                                        
                                        <div class="row">
                                            <label for="status" class="form-label"> Status </label>
                                            <div class="col-md-12">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-zone/{id}')
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
                                        <div class="row pt-5">                                         
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                            </div>
                                            <div class="col-md-2"><a href="/add-zone" >
                                                <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a>
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
    </section>

</div>
@endsection