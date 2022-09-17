@extends('administrator.master')
@section('title', __('Edit Goal'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __('Goal') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>    {{ __('Dashboard') }}</a></li>
            <li><a href="{{ url('/people/goals') }}">   {{ __('Goal') }}</a></li>
            <li class="active">   {{ __('Edit Goal details') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">   {{ __('Edit Goal details') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('people/goals/update/'.$goal['id']) }}" method="post" name="goal_edit_form">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        <div class="col-md-12">
                            @if (!empty(Session::get('message')))
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                            </div>
                            @elseif (!empty(Session::get('exception')))
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                            </div>
                            @else
                            <p class="text-yellow">{{ __(' Enter goal details. All (*)field are required. (Default password for added user is 12345678)') }}</p>
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                      
                            <!-- /.form-group -->

                            <label for="title">{{ __(' Title') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $goal['title'] }}">
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="body">{{ __('Body') }}</label>
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="body" id="body" class="form-control" value="{{ $goal['body'] }}">
                                @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="time_bounding">{{ __('Time bounding') }} </label>
                            <div class="form-group{{ $errors->has('time_bounding') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="time_bounding" id="time_bounding" class="form-control" value="{{ $goal['time_bounding'] }}">
                                @if ($errors->has('time_bounding'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time_bounding') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                           
                            <!-- /.form-group -->

                            <!-- /.form-group -->

                           
                            <!-- /.form-group -->

                            <label for="designation_id">{{ __(' Designation') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }} has-feedback">
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    @foreach($designations as $designation)
                                    <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('designation_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="joining_position">{{ __(' Department') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_position') ? ' has-error' : '' }} has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                <?php $departments= \App\Department::all();?>
                                     <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    
                                    @foreach($departments as $department)
                                    <option value="{{ $department['id'] }}">{{ $department['department'] }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('joining_position'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('joining_position') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            
                            <!-- /.form-group -->

                            <label for="role">{{ __(' Role') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled>{{ __(' Select one') }}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                       
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ url('/people/goals') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i> {{ __(' Cancel') }}</a>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __(' Update') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        document.forms['employee_edit_form'].elements['gender'].value = "{{ $employee['gender'] }}";
        document.forms['employee_edit_form'].elements['id_name'].value = "{{ $employee['id_name'] }}";
        document.forms['employee_edit_form'].elements['marital_status'].value = "{{ $employee['marital_status'] }}";
        document.forms['employee_edit_form'].elements['designation_id'].value = "{{ $employee['designation_id'] }}";
        document.forms['employee_edit_form'].elements['role'].value = "{{ $employee['role'] }}";
        document.forms['employee_edit_form'].elements['joining_position'].value = "{{ $employee['joining_position'] }}";
    </script>
    @endsection
