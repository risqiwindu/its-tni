<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.forum.index')=> __lang('student-forum'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form class="form" action="<?php echo e(selfURL()); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <?php echo e(formLabel($form->get('topic_title'))); ?>

        <?php echo e(formElement($form->get('topic_title'))); ?>

    </div>
    <div class="form-group">
        <?php echo e(formLabel($form->get('course_id'))); ?>

        <select name="course_id" id="course_id"
                class="form-control select2">
            <option value=""></option>
            <?php $__currentLoopData = $form->get('course_id')->getValueOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(old('course_id',$form->get('course_id')->getValue()) == $option['value']): ?> selected <?php endif; ?> data-type="<?php echo e($option['attributes']['data-type']); ?>" value="<?php echo e($option['value']); ?>"><?php echo e($option['label']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group">
        <?php echo e(formLabel($form->get('message'))); ?>

        <?php echo e(formElement($form->get('message'))); ?>

    </div>
    <button type="submit" class="btn btn-primary"><?php echo e(__lang('create-topic')); ?></button>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote-ext-emoji/src/css-new-version.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/summernote/summernote-bs4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/summernote-ext-emoji/src/summernote-ext-emoji.js')); ?>"></script>
    <script>
        $(function(){
            document.emojiSource = '<?php echo e(basePath()); ?>/static/summernote-ext-emoji/pngs/';
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture','video', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['misc', ['emoji']],
                    ['help', ['help']],
                ]
            } );
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/forum/addtopic.blade.php ENDPATH**/ ?>