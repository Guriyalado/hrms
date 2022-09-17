
<?php $__env->startSection('title', __('Add File')); ?>
<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo e(__('Attendance Setting')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?> </a></li>
            <li><a href=""> <?php echo e(__('Attendance')); ?></a></li>
            <li class="active"> <?php echo e(__('Attendance System')); ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                <?php $machines=\App\Machine::all();?>
                <?php $__currentLoopData = $machines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($act->activation==1): ?>
                <b class="text-green"><?php echo e(__('Finger Print Attendance Machine Currently Activated')); ?> </b>
                <?php else: ?>
                <b class="text-green"><?php echo e(__('Whithout Finger Print Attendance Machine Currently Activated ')); ?> </b>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                
                <form method="post" action="<?php echo e(url('machine/activation/update')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="radio">
                                    <label class="Radio_label"><input class="Sourov_bhai" type="radio" name="activation" value="0"> <?php echo e(__('Whithout Finger Print Attendance Machine ')); ?><span class="Looking"></span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label class="Radio_label"><input class="Sourov_bhai" type="radio" name="activation" value="1"> <?php echo e(__(' Finger Print Attendance Machine ')); ?><span class="Looking"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                        <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Active')); ?></button>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u885534217/domains/pyzenlabs.com/public_html/subdomain/hrms/resources/views/administrator/myattendance/machineActivation.blade.php ENDPATH**/ ?>