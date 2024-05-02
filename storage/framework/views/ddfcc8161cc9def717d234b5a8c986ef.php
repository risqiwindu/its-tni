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


<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th><?php echo e(__lang('course-session')); ?></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
             <td><?php echo e($row->course->name); ?></td>
            <td><a class="btn btn-primary" href="<?php echo e(route('student.test.reportcard',['id'=>$row->course_id])); ?>"><i class="fa fa-download"></i> <?php echo e(__lang('download-statement')); ?></a></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>


</table>
</div>
<?php echo $sessions->links(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/test/statement.blade.php ENDPATH**/ ?>