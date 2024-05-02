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
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?php echo e(__lang('course')); ?></th>
                    <th><?php echo e(__lang('class')); ?></th>
                    <th><?php echo e(__lang('lecture')); ?></th>
                    <th><?php echo e(__lang('page')); ?></th>
                    <th><?php echo e(__lang('added-on')); ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach($paginator as $row):  ?>
                    <tr>
                        <td><?php echo e($row->course_name); ?></td>
                        <td><?php echo e($row->lesson_name); ?></td>
                        <td><?php echo e($row->lecture_title); ?></td>
                        <td><?php echo e($row->page_title); ?></td>
                        <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                        <td><a class="btn btn-primary" href="<?php echo e(route('student.course.lecture',['lecture'=>$row->lecture_id,'course'=>$row->course_id])); ?>?page=<?php echo e($row->lecture_page_id); ?>"><?php echo e(__lang('view')); ?></a></td>
                    </tr>
                <?php  endforeach;  ?>
                </tbody>
            </table>


        </div>
        <?php
        // add at the end of the file after the table

        echo paginationControl(
// the paginator object
            $paginator,
            // the scrolling style
            'sliding',
            // the partial to use to render the control
            null,
            // the route to link to when a user clicks a control link
            array(
                'route' => 'student/default',
                'controller'=>'course',
                'action'=>'bookmarks'
            )
        );

         ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/course/bookmarks.blade.php ENDPATH**/ ?>