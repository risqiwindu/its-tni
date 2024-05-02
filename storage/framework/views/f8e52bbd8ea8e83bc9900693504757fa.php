<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            '#'=>$pageTitle
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
<div class="card-body">

    <form method="post" action="<?php echo e(route('student.student.password')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="password"><?php echo e(__lang('new-password')); ?></label>
            <input class="form-control" type="password" name="password" required="required"/>

        </div>

        <div class="form-group">
            <label for="confirm_password"><?php echo e(__lang('Confirm Password')); ?></label>
            <input class="form-control" type="password" name="password_confirmation" required="required"/>

        </div>


        <div class="form-footer">
            <button type="submit" class="btn btn-primary"><?php echo e(__lang('Submit')); ?></button>
        </div>

    </form>


</div>
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/student/password.blade.php ENDPATH**/ ?>