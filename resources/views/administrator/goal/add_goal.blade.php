@extends('administrator.master')
@section('title', __('Add Goal'))

@section('main_content')
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           {{ __(' Goal') }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }} </a></li>
            <li><a href="{{ url('/goals') }}">{{ __('Goal') }}</a></li>
            <li class="active">{{ __('Add Goal') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Add Goal') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="{{ url('/goals/store') }}" method="post" name="goal_add_form">
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
                           
                            @endif
                        </div>
                        <!-- /.Notification Box -->

                     
                       
                            <!-- /.form-group -->

                            <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="{{ __('Enter title..') }}">
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="body">{{ __('Body') }}</label>
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }} has-feedback">
                                <input type="text" name="body" id="father_name" class="form-control" value="{{ old('body') }}" placeholder="{{ __('Enter body ..') }}">
                                @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <label for="time_bounding">{{ __('Time Bounding') }} </label>
                            <div class="form-group{{ $errors->has('time_bounding') ? ' has-error' : '' }} has-feedback">
                                <input type="number" name="time_bounding" id="time_bounding" class="form-control" value="{{ old('time_bounding') }}" placeholder="{{ __('Enter Time Bounding..') }}">
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

                           
                            <!-- /.form-group -->

                           
                            <!-- /.form-group -->

                            
                            <!-- /.form-group -->

                          
                            <!-- /.form-group -->
                        
                        <!-- /.col -->

                       
                            <!-- /.form-group -->

                            
                            <!-- /.form-group -->

                           
       
                            <!-- /.form-group -->

                           
                            <!-- /.form-group -->

                            
                            <!-- /.form-group -->

                          
                            <!-- /.form-group -->

                            <label for="joining_position">{{ __('Department') }} <span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('joining_position') ? ' has-error' : '' }} has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    <?php $departments= \App\Department::all();?>
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
                   
                    <!-- /.form-group -->

                           
                            <!-- /.form-group -->
                            

                            <label for="role">{{ __('Role') }}<span class="text-danger">*</span></label>
                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled>{{ __('Select one') }}</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->display_name }}</option>
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
                      </div> 
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ url('/goals') }}" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i>{{ __('Cancel') }} </a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> {{ __('Add') }}</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
   
    // document.forms['goal_add_form'].elements['id_name'].value = "{{ old('id_name') }}";
    document.forms['goal_add_form'].elements['designation_id'].value = "{{ old('designation_id') }}";
    document.forms['goal_add_form'].elements['role'].value = "{{ old('role') }}";
    
</script>
@endsection
