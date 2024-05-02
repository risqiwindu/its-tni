
<?php $__env->startSection('innerTitle','Test Camera'); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row" id="test">
    <h1>Test Cam</h1>
    <video id="video" width="400" height="250" autoplay style="position: absolute;">
</div>
    <script defer src="<?php echo e(asset('client/js/face-api.min.js')); ?>"></script>
    <script defer src="<?php echo e(asset('client/js/script.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/student/camera/test.blade.php ENDPATH**/ ?>