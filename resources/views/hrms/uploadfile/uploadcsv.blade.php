@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> 
        <div class="page-title-box">          
                            
                <ol class="breadcrumb">                       
                    <li class="breadcrumb-link">
                        <a href=""> File &nbsp;</a>
                    </li>
                    <li class="breadcrumb-current-item"> upload (csv)</li>
                </ol>
           
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
                                    <span class="panel-title hidden-xs"> Upload csv file </span>
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

                                        {!! Form::open([ 'url' => '/import', 'class' => 'form-horizontal','files' =>true ]) !!}
                                    <div class="form-group zones-wrap">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                <input name="file" type="file" class="form-label">
                                                </div>
                                            </div>                                            
                                        </div>                                    
                                                                               
                                        <div class="form-group">                                          
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                            </div>   
                                            <div class="col-md-2"><a href="/add-unit" >
                                                <a href="/assets/img/sample.csv" class="" value="Sample download">Sample download</a>
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