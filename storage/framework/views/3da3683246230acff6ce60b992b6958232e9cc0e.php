<?php $__env->startSection('title', __('Salary Statement Search')); ?>

<?php $__env->startSection('main_content'); ?>



<div class="content-wrapper wow fadeInDown" data-wow-duration=".5s" data-wow-delay=".2s">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e(__('Salary Statement')); ?>

    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(__('Dashboard')); ?></a></li>
      <li><a><?php echo e(__('Increment')); ?></a></li>
      <li class="active"><?php echo e(__('Salary Statement')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(__('Salary Statement')); ?></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
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
          <?php endif; ?>
        </div>
        <!-- /.Notification Box -->
        <div class="col-md-12">


          <form class="form-horizontal" action="<?php echo e(url('/hrm/salary/statement/view')); ?>" method="get">
            <?php echo e(csrf_field()); ?>




            <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
              <label for="user_id" class="col-sm-3 control-label"><?php echo e(__('Employee Name')); ?></label>
              <div class="col-sm-3">
                <select name="emp_id" id="user_id" class="form-control">
                  <option selected disabled><?php echo e(__('Select One')); ?></option>
                  <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $empname= \App\User::find($employee['user_id'])->name;?>
                  <option value="<?php echo e($employee['user_id']); ?>"><strong>[ID<?php echo e($employee->id); ?>] <?php echo e($empname); ?> [<?php echo e(date("F Y", strtotime($employee['payment_month']))); ?>]</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('user_id')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('user_id')); ?></strong>
                  </span>
                  <?php endif; ?>
                </div>
              </div>


               <!-- /.end group -->
              <div class="form-group<?php echo e($errors->has('salary_month') ? ' has-error' : ''); ?>">
                <label for="salary_month" class="col-sm-3 control-label"><?php echo e(__('Select Month')); ?></label>
                <div class="col-sm-3">

                    <input type="text" name="daterange" class="form-control" id="reservation">

                </div>
              </div>

             
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-arrow-right"></i> <?php echo e(__('View Salary Statement')); ?></button>
                </div>
              </div>
              <!-- /.end group -->
            </form>
            <!-- /. end form -->
          </div>
          <!-- /. end col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix"></div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u885534217/domains/pyzenlabs.com/public_html/subdomain/hrms/resources/views/administrator/hrm/increment/salaryStatementSearch.blade.php ENDPATH**/ ?>