<?php $__env->startSection('title', __('Goal details')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php echo e(__(' Goal')); ?> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i><?php echo e(__('Dashboard')); ?> </a></li>
            <li><a><?php echo e(__('People')); ?></a></li>
            <li><a href="<?php echo e(url('/people/goal')); ?>"><?php echo e(__('Goal')); ?></a></li>
            <li class="active"><?php echo e(__('Details')); ?></li>
        </ol>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(__('Goal details')); ?></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <a href="<?php echo e(url('/people/goals')); ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> <?php echo e(__('Back')); ?></a>
            <hr>
            <div id="printable_area">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <p>
                                <?php echo e($goal->title); ?>

                                <br>
                                <?php echo e($goal->body); ?>

                                <br>
                                <?php echo e($goal->department); ?>

                            </p>
                        </td>
                        <td>
                            <?php if(!empty($goal->avatar)): ?>
                            <img src="<?php echo e(url('public/profile_picture/' . $goal->avatar)); ?>" class="img-responsive img-thumbnail">
                            <?php else: ?>
                            <img src="<?php echo e(url('public/profile_picture/blank_profile_picture.png')); ?>" alt="blank_profile_picture" class="img-responsive img-thumbnail">
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td><?php echo e(__('Title')); ?></td>
                            <td><?php echo e($goal->title); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Body')); ?></td>
                            <td><?php echo e($goal->body); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Time Bounding')); ?></td>
                            <td><?php echo e($goal->time_bounding); ?></td>
                        </tr>
                       
                        <tr>
                           <td><?php echo e(__('Designation')); ?></td>
                            <td>
                               <?php echo e($employee->designation); ?>

                            </td>
                        </tr>
                        
                       
                        
                        <tr>
                             <td><?php echo e(__('Department')); ?></td>
                            <td>
                                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($employee->joining_position == $department->id): ?>
                                <?php echo e($department->department); ?>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- Start Button -->
            <div class="btn-group btn-group-justified">
                <?php if($goal->activation_status == 1): ?>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/goals/deactive/' . $goal->id)); ?>" class="tip btn btn-success btn-flat" data-toggle="tooltip" data-original-title="Click to deactive">
                        <i class="fa fa-arrow-down"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Active')); ?></span>
                    </a>
                </div>
                <?php else: ?>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/goals/active/' . $goal->id)); ?>" class="tip btn btn-warning btn-flat" data-toggle="tooltip" data-original-title="Click to active">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Deactive')); ?></span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="btn-group">
                    <button type="button" class="tip btn btn-primary btn-flat" title="Print" data-original-title="Label Printer" onclick="printDiv('printable_area')">
                        <i class="fa fa-print"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Print')); ?></span>
                    </button>
                </div>
               
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/goals/edit/' . $goal->id)); ?>" class="tip btn btn-warning tip btn-flat" title="" data-original-title="Edit Product">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Edit')); ?></span>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="<?php echo e(url('/people/goals/delete/' . $goal->id)); ?>" class="tip btn btn-danger btn-flat" data-toggle="tooltip" data-original-title="Click to delete" onclick="return confirm('Are you sure to delete this ?');">
                        <i class="fa fa-arrow-up"></i>
                        <span class="hidden-sm hidden-xs"> <?php echo e(__('Delete')); ?></span>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp1\htdocs\hrms_guriya\resources\views/administrator/goal/show_goal.blade.php ENDPATH**/ ?>