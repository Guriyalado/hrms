@extends('administrator.master')
@section('title', __('Goal details'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          {{ __(' Goal') }} 
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a>{{ __('People') }}</a></li>
            <li><a href="{{ url('/people/goal') }}">{{ __('Goal') }}</a></li>
            <li class="active">{{ __('Details') }}</li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ __('Goal details') }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="{{ url('/people/goals') }}" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> {{ __('Back') }}</a>
            <hr>
            <div id="printable_area">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p>
                                {{ $goal->title }}
                                <br>
                                {{ $goal->body }}
                                <br>
                                {{ $goal->department }}
                            </p>
                        </td>
                        <td>
                            @if(!empty($goal->avatar))
                            <img src="{{ url('public/profile_picture/' . $goal->avatar) }}" class="img-responsive img-thumbnail">
                            @else
                            <img src="{{ url('public/profile_picture/blank_profile_picture.png') }}" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>{{ __('Title') }}</td>
                            <td>{{ $goal->title }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Body') }}</td>
                            <td>{{ $goal->body }}</td>
                        </tr>
                        <tr>
                            <td>{{ __('Time Bounding') }}</td>
                            <td>{{ $goal->time_bounding }}</td>
                        </tr>
                       
                        <tr>
                           <td>{{ __('Designation') }}</td>
                            <td>
                               {{ $employee->designation }}
                            </td>
                        </tr>
                        
                       
                        
                        <tr>
                             <td>{{ __('Department') }}</td>
                            <td>
                                @foreach($departments as $department)
                                @if($employee->joining_position == $department->id)
                                {{ $department->department }}
                                @endif
                                @endforeach
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- Start Button -->
            <div class="btn-group btn-group-justified">
                @if ($goal->activation_status == 1)
                <div class="btn-group">
                    <a href="{{ url('/people/goals/deactive/' . $goal->id)}}" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Click to deactive">
                        <i class="fa fa-arrow-down"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Active') }}</span>
                    </a>
                </div>
                @else
                <div class="btn-group">
                    <a href="{{ url('/people/goals/active/' . $goal->id)}}" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Click to active">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Deactive') }}</span>
                    </a>
                </div>
                @endif
                <div class="btn-group">
                    <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                        <i class="fa fa-print"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Print') }}</span>
                    </button>
                </div>
               
                <div class="btn-group">
                    <a href="{{ url('/people/goals/edit/' . $goal->id) }}" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Edit') }}</span>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('/people/goals/delete/' . $goal->id) }}" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Click to delete" onclick="return confirm('Are you sure to delete this ?');">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> {{ __('Delete') }}</span>
                    </a>
                </div>
            </div>
            <!-- /.End Button -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
</div>
@endsection