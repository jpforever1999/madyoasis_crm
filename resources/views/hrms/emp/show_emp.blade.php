@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <div class="container-fluid">       
        <div class="page-title-box">
            <h4 class="page-title">Managers <span class="page-title-right"><a href="/add-emp" class="btn btn-success rounded-pill waves-effect waves-light">Create manager </a></span></h4>
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
                            <span class="panel-title hidden-xs"> Manager Lists </span>
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
                                    <th class="text-left">First Name</th>
                                    <th class="text-left">Last Name</th>
                                    <th class="text-left">Email</th>
                                    <th class="text-left">Mobile</th>
                                    <th class="text-left">Role</th>
                                    <th class="text-left">status</th>
                                    <th class="text-right">Actions</th>
                                    </tr>
                                   </thead>

                                    <tbody>
                                    <?php $i =0;?>
                            <?php //echo "<pre"; print_r($emps); echo "</pre>";die; ?>  
                               
                            @foreach($emps as $val)
                            <?php //print_r($val->employee['first_name']);die; ?>
                                <tr>
                                    <td class="text-left">{{$i+=1}}</td>                                   
                                    <td class="text-left">{{$val->first_name}}</td>
                                    <td class="text-left">{{$val->last_name}}</td>
                                    <td class="text-left">{{$val->email}}</td>
                                    <td class="text-left">{{$val->number}}</td>                                   
                                    <td class="text-left">{{isset($val->role->role->name)?$val->role->role->name:''}}</td>
                                    <td class="text-left">     
                                    @if($val->status == '1') active @endif
                                    @if($val->status == '0') Inactive @endif                           
                                
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
                                                    <a href="/edit-emp/{{$val->id}}">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
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