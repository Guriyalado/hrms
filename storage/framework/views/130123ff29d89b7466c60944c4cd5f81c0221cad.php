
<?php $__env->startSection('title', __('NOC/Certificate Add')); ?>

<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e(__('NOC/Certificate Add')); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
            <li><a><?php echo e(__('HRM')); ?></a></li>
            <li><a href="<?php echo e(url('/setting/leave_categories')); ?>"><?php echo e(__('NOC')); ?></a></li>
            <li class="active"><?php echo e(__('Add NOC/Certificate Add')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Add NOC/Certificate')); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo e(url('/hrm/noc/store')); ?>" method="post" name="leave_category_add_form">
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
                                <p class="text-yellow"><?php echo e(__('Enter the All field are required.')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <!-- /.Notification Box -->

                        <div class="col-md-6">

                             <!-- /.form-group -->
                            <label for="publication_status"><?php echo e(__('Employee')); ?><span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="empid" class="form-control">
                                    <?php $employees=\App\User::all()->where('access_label',2);?>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($emp->id); ?>">[<?php echo e($emp->employee_id); ?>] <?php echo e($emp->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                           
                            <!-- /.form-group -->
                            <label for="publication_status"><?php echo e(__('Type')); ?><span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="1"><?php echo e(__('NOC')); ?></option>
                                    <option value="2"><?php echo e(__('Experience Certificate')); ?></option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <label><?php echo e(__('Description')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="textarea text-description" name="details" placeholder="<?php echo e(__('Enter description..')); ?>"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                         <div class="col-md-12">
                            <label><?php echo e(__('Bottom')); ?> <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="textarea text-description" name="bottom" placeholder="<?php echo e(__('Enter bottom description')); ?>"></textarea>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->


                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="icon fa fa-plus"></i> <?php echo e(__('Save')); ?> </button>

                    <button type="button" class="btn btn-danger btn-flat"><i class="icon fa fa-close"></i><?php echo e(__('Cancel')); ?> </button>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
    document.forms['leave_category_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u885534217/domains/pyzenlabs.com/public_html/subdomain/hrms/resources/views/administrator/hrm/noc/nocAdd.blade.php ENDPATH**/ ?>