<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form onsubmit="return confirm('You are about to enroll students. Continue?')" enctype="multipart/form-data" class="form" method="post" action="<?php echo e(adminUrl(array('controller'=>'student','action'=>'massenroll'))); ?>">
<?php echo csrf_field(); ?>
  <div class="card">
   <div class="card-header">
        <?php echo e(__lang('enroll-multiple-to-course')); ?>

  </div>
  <div class="card-body">
      <p>
<?php echo clean(__lang('enroll-multiple-help',['link'=>adminUrl(array('controller'=>'student','action'=>'csvsample'))])); ?>

</p>

<div class="form-group" style="padding-bottom: 10px">
<label for="session_id"><?php echo e(__lang('session-course')); ?></label>
<?php echo e(formElement($select)); ?>

</div>



<div class="form-group" style="padding-bottom: 10px">
<label for="file"><?php echo e(__lang('csv-file')); ?></label>
<input required="required" name="file" type="file"/>
</div>

<button class="btn btn-primary btn-block" type="submit"><?php echo e(__lang('enroll')); ?></button>
</div>
</div>


</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/student/massenroll.blade.php ENDPATH**/ ?>