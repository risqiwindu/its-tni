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

    <div >
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('title')); ?></th>
                        <th><?php echo e(__lang('course')); ?></th>
                        <th><?php echo e(__lang('created-on')); ?></th>
                        <th><?php echo e(__lang('due-date')); ?></th>
                        <th class="text-right1" ></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($paginator as $row):  ?>
                        <tr>
                            <td><?php echo e($row->title); ?></td>
                            <td><span ><?php echo e($row->course_name); ?></span></td>
                            <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                            <td><?php echo e(showDate('d/M/Y',$row->due_date)); ?></td>

                            <td class="text-right1">
                                <a class="btn btn-primary" href="<?php echo e(route('student.assignment.submit',['id'=>$row->assignment_id])); ?>"><i class="fa fa-file"></i> <?php echo e(__lang('submit-homework')); ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="readmorebox" colspan="5">

                                <article class="readmore">
                                    <?php echo clean($row->instruction); ?>

                                </article>
                            </td>
                        </tr>
                    <?php  endforeach;  ?>

                    </tbody>
                </table>

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
                    route('student.assignment.index')
                );
                 ?>
            </div><!--end .box-body -->
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/readmore/readmore.min.js')); ?>"></script>
    <script>
        $(function(){
            $('article.readmore').readmore({
                collapsedHeight : 200
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/student/assignment/index.blade.php ENDPATH**/ ?>