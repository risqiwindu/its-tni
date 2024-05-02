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
<div class="container" style="background-color: white; min-height: 400px;   padding-bottom:50px; margin-bottom: 10px;   " >
    <!--primary starts-->

    <div class="card-body">


        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th><?php echo e(__lang('id')); ?></th>
                <th><?php echo e(__lang('name')); ?></th>
                <th><?php echo e(__lang('course')); ?></th>
                <th><?php echo e(__lang('files')); ?></th>
                 <th ></th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($paginator as $row):  ?>

            <tr>
                 <td><span class="label label-success"><?php echo e($row->download_id); ?></span></td>
                        <td><?php echo e($row->download_name); ?></td>
                <td><?php echo e($row->course_name); ?></td>
                        <td><?php echo e($fileTable->getTotalForDownload($row->download_id)); ?></td>

                        <td class="text-right">
                        <?php  if ($fileTable->getTotalForDownload($row->download_id)> 0):  ?>
                            <a href="<?php echo e(route('student.download.files',array('id'=>$row->download_id))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="View Files"><i class="fa fa-eye"></i> <?php echo e(__lang('view-files')); ?></a>
                            <a href="<?php echo e(route('student.download.allfiles',array('id'=>$row->download_id))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Download All Files"><i class="fa fa-download"></i> <?php echo e(__lang('Download All')); ?></a>
                        <?php  else: ?>
                            <strong><?php echo e(__lang('no-files-available')); ?></strong>
                        <?php  endif;  ?>
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
            route('student.download.index')
        );
         ?>
    </div>


</div>

<!--container ends-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/download/index.blade.php ENDPATH**/ ?>