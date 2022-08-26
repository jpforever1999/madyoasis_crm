@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid"> 
        <div class="page-title-box">
            <h4 class="page-title">Units <span class="page-title-right"><a href="/add-unit" class="btn btn-success rounded-pill waves-effect waves-light">Create new unit </a></span></h4>
        </div>
    </div>


    <!-- -------------- Content -------------- -->
    <section>

        <!-- -------------- Column Center -------------- -->
        <div class="container-fluid"> 

            <!-- -------------- Products Status Table -------------- -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="card p-4">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Unit Lists </span>
                        </div>
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
                                    <th class="text-left">Id</th>
                                    <th class="text-left">unit name</th>
                                    <th class="text-left">City name</th>
                                    <th class="text-left">Zone name</th>
                                    <th class="text-left">status</th>
                                    <th class="text-right">Actions</th>
                                    </tr>
                                   </thead>

                                    <tbody>
                                    <?php $i =0;?>
                            @foreach($units as $unit)
                                <tr>
                                    <td class="text-left">{{$i+=1}}</td>
                                    <td class="text-left">{{$unit->unit_name}}</td>
                                    <td class="text-left">{{$unit->city_name}}</td>
                                    <td class="text-left">{{$unit->zone_name}}</td>
                                    <td class="text-left">     
                                    @if(isset($unit))@if($unit->status == '1') active @endif @endif
                                    @if(isset($unit))@if($unit->status == '0') Inactive @endif @endif                               
                                
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
                                                    <a href="/edit-unit/{{$unit->id}}">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="/delete-unit/{{$unit->id}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                {!! $units->render() !!}
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