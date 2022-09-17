<?php $__env->startSection('title', __('Add Goal')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php echo e(__(' Goal')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a href="<?php echo e(url('/goals')); ?>"><?php echo e(__('Goal')); ?></a></li>
            <li class="active"><?php echo e(__('Add Goal')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add Goal')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('/goals/store')); ?>" method="post" name="goal_add_form">
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <div class="row">
                        <!-- Notification Box -->
                        <div class="col-md-12">
                            <?php if(!empty(Session::get('message'))): ?>
                            <div class="alert alert-success alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-check"></i> <?php echo e(Session::get('message')); ?>

                            </div>
                            <?php elseif(!empty(Session::get('exception'))): ?>
                            <div class="alert alert-warning alert-dismissible" id="notification_box">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class="icon fa fa-warning"></i> <?php echo e(Session::get('exception')); ?>

                            </div>
                            <?php else: ?>
                           
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                     
                       
                            <!-- /.form-group -->

                            <label for="title"><?php echo e(__('Title')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title')); ?>" placeholder="<?php echo e(__('Enter title..')); ?>">
                                <?php if($errors->has('title')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="body"><?php echo e(__('Body')); ?></label>
                            <div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?> has-feedback">
                                <input type="text" name="body" id="father_name" class="form-control" value="<?php echo e(old('body')); ?>" placeholder="<?php echo e(__('Enter body ..')); ?>">
                                <?php if($errors->has('body')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('body')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                            <label for="time_bounding"><?php echo e(__('Time Bounding')); ?> </label>
                            <div class="form-group<?php echo e($errors->has('time_bounding') ? ' has-error' : ''); ?> has-feedback">
                                <input type="number" name="time_bounding" id="time_bounding" class="form-control" value="<?php echo e(old('time_bounding')); ?>" placeholder="<?php echo e(__('Enter Time Bounding..')); ?>">
                                <?php if($errors->has('time_bounding')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('time_bounding')); ?></strong>
                                </span>
                                <?php endif; ?>
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

                            <label for="joining_position"><?php echo e(__('Department')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('joining_position') ? ' has-error' : ''); ?> has-feedback">
                                <select name="joining_position" id="joining_position" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $departments= \App\Department::all();?>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($department['id']); ?>"><?php echo e($department['department']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('joining_position')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('joining_position')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->

                    <!-- /.form-group -->
                   
                    <!-- /.form-group -->

                           
                            <!-- /.form-group -->
                            

                            <label for="role"><?php echo e(__('Role')); ?><span class="text-danger">*</span></label>
                            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?> has-feedback">
                                <select name="role" id="role" class="form-control">
                                    <option value="" selected disabled><?php echo e(__('Select one')); ?></option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->name); ?>"><?php echo e($role->display_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('role')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('role')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div> 
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="<?php echo e(url('/goals')); ?>" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo e(__('Cancel')); ?> </a>
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Add')); ?></button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
   
    // document.forms['goal_add_form'].elements['id_name'].value = "<?php echo e(old('id_name')); ?>";
    document.forms['goal_add_form'].elements['designation_id'].value = "<?php echo e(old('designation_id')); ?>";
    document.forms['goal_add_form'].elements['role'].value = "<?php echo e(old('role')); ?>";
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\hrms_guriya\resources\views/administrator/goal/add_goal.blade.php ENDPATH**/ ?>