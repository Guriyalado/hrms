
<?php $__env->startSection('title', __('Attendance Report')); ?>
<?php $__env->startSection('main_content'); ?>
<div class="content-wrapper wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".2s">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> <?php echo e(__('Attendance Report')); ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
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
            </div>
           








            <div class="box-body">



               <form class="form-horizontal" action="<?php echo e(url('/machine/attendance/report/details')); ?>" method="post">
            <?php echo e(csrf_field()); ?>




            <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
              <label for="user_id" class="col-sm-3 control-label"><?php echo e(__('Employee Name')); ?></label>
              <div class="col-sm-3">
                <select name="empname" id="empname" class="form-control">
                  <option selected disabled><?php echo e(__('Select One')); ?></option>

                  <?php 
$myattds=\App\Myattendance::all();
$groupmyattds=DB::table('myattendances')
        ->select('name', DB::raw('count(*) as total'))
        ->groupBy('name')
        ->get();

?>

                  <?php $__currentLoopData = $groupmyattds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupmyattd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <option value="<?php echo e($groupmyattd->name); ?>"><strong><?php echo e($groupmyattd->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                
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

        <!-- Default box -->
        <div class="box box-primary">
            <!-- Notification Box -->
            <div class="col-md-12">
              <table class="table table-bordered">
               <tr class="bg-info">
                <th><?php echo e(__('sl#')); ?></th>
                <th><?php echo e(__('Employee ID')); ?></th>
                <th><?php echo e(__('Employee Name')); ?></th>
                 <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('In Time')); ?></th>
                <th><?php echo e(__('Out Time')); ?></th>
                <th><?php echo e(__('Work Time')); ?></th>
                <th><?php echo e(__('Late')); ?></th>
                <th><?php echo e(__('Early')); ?></th>
                <th><?php echo e(__('Absence')); ?></th>
              </tr>

              <?php ($sl = 1); ?>
              <?php $__currentLoopData = $myattds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myattd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($sl++); ?></td>
                <td><?php echo e($myattd->empidno); ?></td>
                <td><?php echo e($myattd->name); ?></td>
                <td><?php echo e(date("F Y", strtotime($myattd->date))); ?></td>

                <td><?php echo e($myattd->check_in); ?></td>
                <td><?php echo e($myattd->check_out); ?></td>
                <td><?php echo e($myattd->atttime); ?></td>
                <td><?php echo e($myattd->late); ?></td>
                <td><?php echo e($myattd->early); ?></td>
                <td><?php echo e($myattd->absent); ?></td>

               
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
          <!-- /. end col -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.end.col -->
            <!-- /.box-body -->


 





            
            
            
           


            
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
document.forms['file_name_add_form'].elements['publication_status'].value = "<?php echo e(old('publication_status')); ?>";
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u885534217/domains/pyzenlabs.com/public_html/subdomain/hrms/resources/views/administrator/myattendance/myAttendanceReport.blade.php ENDPATH**/ ?>