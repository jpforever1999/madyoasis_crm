@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid">
        <div class="page-title-box">
            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-city/{id}')
                <ol class="breadcrumb">                                      
                    <li class="breadcrumb-link">
                        <a href=""> City &nbsp;</a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit {{$result->city_name}} </li>
                </ol>
            @else
                <ol class="breadcrumb">                            
                    <li class="breadcrumb-link">
                        <a href="city-list"> City &nbsp;</a>
                    </li>
                    <li class="breadcrumb-current-item text-align-right"> Add City </li>
                    
                </ol>
            @endif
        </div>
    </div>
    
    <!-- -------------- Content -------------- -->
    <section>
        <!-- -------------- Column Center -------------- -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="box box-success">

                    <div class="panel"><div class="card  p-4">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-city/{id}')
                                <span class="panel-title hidden-xs"> Edit City </span>
                                @else
                                   <span class="panel-title hidden-xs"> Add City </span>
                               @endif
                        </div>

                        
                            <div class="card-body cityform">
                                
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

                                   {!! Form::open(['class' => 'form-horizontal','files'=>true]) !!}
                                    <div class="form-group zones-wrap">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group city-select">                                                    
                                                    <label for="zone" class="form-label">Select Zone <strong style="color: red;">*</strong></label>
                                                    <select class="form-select" name="zone_id" id="example-select" required>                                                                                              
                                                    <option value=""> --select--</option>
                                                    @foreach($zone_all as $val)
                                                        <option value="{{$val->id}}" @if(isset($result))@if($val->id == $result['zone_id'])selected @endif @endif > {{$val->zone_name}} </option>
                                                    @endforeach    

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="input-field">
                                                    <label for="simpleinput" class="form-label">City Name <strong style="color: red;">*</strong></label>
                                                    
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-city/{id}')                                                                                                   
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <input type="text" id="city_name" name="city_name" value="{{$result->city_name}}" required class="form-control">
                                                            </div>                                                            
                                                        </div>  
                                                    @else
                                                        <div id="newlink">                                                   
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <input type="text" id="city_name[]" name="city_name[]" value="" required class="form-control">
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    <div class="add-zones">
                                                                        <a type="button" href="javascript:new_link()" class="btn btn-success waves-effect waves-light" style="margin-top: 0px;"><i class="mdi mdi-plus"></i> Add more</a>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>

                                                        <div id="newlinktpl" style="display:none;">
                                                            <div class="row" style="margin-top: 10px;">
                                                                <div class="col-lg-5">
                                                                    <input type="text" id="city_name[]" name="city_name[]" value=""  class="form-control">
                                                                </div>
                                                                <div class="">
                                                                    
                                                                </div>
                                                            </div>

                                                        </div>
                                                    @endif

                                                </div>


                                            </div>    
                                        </div>                                    
                                        <div class="row">
                                            <div class="col-12 pt-3">
                                                <label> Status </label>
                                                <div class="">
                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-city/{id}')
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

                                      
                                        
                                        <div class="form-group pt-3">
                                           
                                        <div class="col-md-2"> <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit"> </div>
                                        <div class="col-md-2"><a href="/add-city" >
                                            <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
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

<script type="text/javascript">
        var ct = 1;
        function new_link()
        {
            ct++;
            var div1 = document.createElement('div');
            div1.id = ct;
            // link to delete extended form elements
            var delLink = '<a href="javascript:delIt('+ ct +')" class="btn btn-danger" style="float: right;margin-top: -39px;margin-right: 52%;"><i class="mdi mdi-remove"></i>  Delete</a>';
            div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
            document.getElementById('newlink').appendChild(div1);
        
        }
        // function to delete the newly added set of elements
        function delIt(eleId)
        {
            d = document;
            var ele = d.getElementById(eleId);
            var parentEle = d.getElementById('newlink');
            parentEle.removeChild(ele);
        }
</script>


</div>
@endsection