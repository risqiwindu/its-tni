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



<!--breadcrumb-section ends-->
<!--container starts-->
<div class="card" >
    <!--primary starts-->
    <div class="card-header">
        <?php echo e(__lang('forum-page-intro')); ?>

    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th><?php echo e(__lang('course-session')); ?></th>
                    <th><?php echo e(__lang('Topics')); ?></th>
                    <th ></th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach($paginator as $row):  ?>

                    <tr>
                         <td><?php echo e($row->name); ?></td>
                        <td><?php echo e(\App\Course::find($row->course_id)->forumTopics->count()); ?></td>

                        <td class="text-right">
                            <a class="btn btn-primary" href="<?php echo e(route('student.forum.topics',['id'=>$row->course_id])); ?>"><?php echo e(__lang('View Topics')); ?></a>
                        </td>
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
            route('student.forum.index')
        );
         ?>
    </div>


</div>

<!--container ends-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/forum/index.blade.php ENDPATH**/ ?>