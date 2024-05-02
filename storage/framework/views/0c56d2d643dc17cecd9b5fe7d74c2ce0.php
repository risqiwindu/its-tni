<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.student.discussion')=>__lang('instructor-chat'),
            '#'=>$pageTitle
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4><?php echo e($row->subject); ?></h4>
                    <br>
                     <div class="card-header-action"><small> <?php echo e(__lang('on')); ?> <?php echo e(showDate('D, d M Y',$row->created_at)); ?></small></div>
                </div>
                <div class="card-body">
                    <p><?php echo nl2br(clean($row->question)); ?>   </p>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">


            <form method="post" class="form" action="<?php echo e(route('student.student.addreply',['id'=>$row->id])); ?>">
             <?php echo csrf_field(); ?>
                <div class="form-group">
                    <textarea required="required" placeholder="<?php echo e(__lang('reply-here')); ?>" class="form-control" name="reply" id="reply"  rows="3"></textarea>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__lang('Reply')); ?></button>
                </div>
            </form>

        </div>
    </div>


    <?php  if(!empty($total)): ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <h4><?php echo e(__lang('Replies')); ?></h4>
            <?php  foreach($paginator as $row):  ?>

            <div class="card card-success">
                <div class="card-header">
                    <h4><?php echo e($row->name); ?> <?php echo e($row->last_name); ?></h4> <br>
                     <small><?php echo e(__lang('on')); ?> <?php echo e(showDate('r',$row->created_at)); ?></small>
                </div>
                <div class="card-body">
                    <p><?php echo nl2br(clean($row->reply)); ?>  </p>
                </div>

            </div>
            <?php  endforeach;  ?>


        </div>
    </div>
<?php  endif;  ?>




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
        route('student.student.viewdiscussion',['id'=>$row->id])

    );
     ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/student/viewdiscussion.blade.php ENDPATH**/ ?>