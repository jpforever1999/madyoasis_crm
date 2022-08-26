@extends('hrms.layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

    <header id="topbar" class="alt">
        <div class="topbar-left">
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
                    <a href=""> Siteinfo </a>
                </li>
                <li class="breadcrumb-current-item">Siteinfo Listings </li>
            </ol>
        </div>
    </header>


    <!-- -------------- Content -------------- -->
    <section id="content">

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">

            <!-- -------------- Products Status Table -------------- -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Siteinfo Lists </span>
                        </div>
                        <div class="panel-body pn">
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
                                    <th class="text-left">Website name</th>
                                    <th class="text-left">status</th>
                                    <th class="text-right">Actions</th>
                                    </tr>
                                   </thead>

                                    <tbody>
                                    <?php $i =0;?>
                            @foreach($siteinfo as $val)
                                <tr>
                                    <td class="text-left">{{$i+=1}}</td>
                                    <td class="text-left">{{$val->website_name}}</td>
                                    <td class="text-left">     
                                    @if(isset($val))@if($val->status == '1') active @endif @endif
                                    @if(isset($val))@if($val->status == '0') Inactive @endif @endif                               
                                
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
                                                    <a href="/edit-siteinfo/{{$val->id}}">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="/delete-siteinfo/{{$val->id}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                {!! $siteinfo->render() !!}
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