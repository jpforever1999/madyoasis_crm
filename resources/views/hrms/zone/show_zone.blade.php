@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Zone <span class="page-title-right"><a href="/add-zone" class="btn btn-success rounded-pill waves-effect waves-light">Create new zone</a></span></h4>
                </div>
            </div>
        </div>
    </div>    
    <!-- -------------- Content -------------- -->
    <section>
        <!-- -------------- Column Center -------------- -->
        <div class="container-fluid">
            <!-- -------------- Products Status Table -------------- -->
            <div class="row">
                <div class="col-12">                    
                    <div class="card p-4">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Zone Lists </span>
                        </div>
                        <div class="card-body">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            {!! Form::open(['class' => 'form-horizontal']) !!}
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap " id="products-datatable">
                                        <thead>
                                            <tr class="bg-light">
                                            <th class="text-left">Id</th>
                                            <th class="text-left">zone name</th>
                                            <th class="text-left">status</th>
                                            <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php $i =0;?>
                                            @foreach($zones as $zone)
                                                <tr>
                                                    <td class="text-left">{{$i+=1}}</td>
                                                    <td class="text-left">{{$zone->zone_name}}</td>
                                                    <td class="text-left">     
                                                    @if(isset($zone))@if($zone->status == '1') active @endif @endif
                                                    @if(isset($zone))@if($zone->status == '0') Inactive @endif @endif                               
                                                
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> Action
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="/edit-zone/{{$zone->id}}">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/delete-zone/{{$zone->id}}">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    {!! $zones->render() !!}
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
    </section>

</div>
@endsection