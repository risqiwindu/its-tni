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


<div class="container"   >

    <div class="row">

        <?php if(!empty(setting('general_discussion_instructions'))): ?>
        <div  class="col-md-4">
        <?php echo e(setting('general_discussion_instructions')); ?>

        </div>
        <?php endif; ?>
        <div <?php if(!empty(setting('general_discussion_instructions'))): ?> class="col-md-8" <?php else: ?> class="col-md-12"  <?php endif; ?> >

            <div class="card">
             <div class="card-header">
                 <h4><?php echo e(__lang('new-question')); ?></h4>
            </div>
            <div class="card-body">
                <form class="form" method="post" action="<?php echo e(route('student.student.adddiscussion')); ?>">

                    <?php echo csrf_field(); ?>


                    <div class="form-group">
                        <?php echo e(formLabel($form->get('admin_id[]'))); ?>

                        <?php echo e(formElement($form->get('admin_id[]'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('admin_id[]'))); ?></p>

                    </div>

                    <div class="form-group">
                        <?php echo e(formLabel($form->get('course_id'))); ?>

                        <?php echo e(formElement($form->get('course_id'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('course_id'))); ?></p>

                    </div>

                    <div class="form-group">
                        <?php echo e(formLabel($form->get('subject'))); ?>

                        <?php echo e(formElement($form->get('subject'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('subject'))); ?></p>

                    </div>




                    <div class="form-group">
                        <?php echo e(formLabel($form->get('question'))); ?>

                        <?php echo e(formElement($form->get('question'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('question'))); ?></p>

                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('Submit')); ?></button>
                    </div>
                </form>
            </div>
            </div>


        </div>

    </div>

    <div class="row">
        <div class="col-md-12"  >

            <div class="card">
             <div class="card-header">
                <h4><?php echo e(__lang('your-questions')); ?></h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('Subject')); ?></th>
                        <th><?php echo e(__lang('Created On')); ?></th>
                        <th><?php echo e(__lang('Recipients')); ?></th>
                        <th><?php echo e(__lang('course-session')); ?></th>
                        <th><?php echo e(__lang('Replied')); ?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($paginator as $row):  ?>
                    <tr>
                        <td><?php echo e($row->subject); ?>

                        </td>

                        <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                        <td>
                            <ul class="comma-list">
                                <?php  if($row->admin==1): ?>
                                <li><?php echo e(__lang('Administrators')); ?></li>
                                <?php  endif;  ?>

                                <?php  foreach($accountTable->getDiscussionAccounts($row->id) as $row2):  ?>
                                <li><?php echo e($row2->name.' '.$row2->last_name); ?></li>
                                <?php  endforeach;  ?>

                            </ul>










                        </td>
                        <td>
                            <?php  if(!empty($row->course_id) && $sessionTable->recordExists($row->course_id)): ?>
                            <?php echo e($sessionTable->getRecord($row->course_id)->name); ?>

                            <?php  endif;  ?>
                        </td>
                        <td><?php echo e(boolToString($row->replied)); ?></td>

                        <td>
                            <a href="<?php echo e(route('student.student.viewdiscussion',array('id'=>$row->id))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('View')); ?>"><i class="fa fa-eye"></i> <?php echo e(__lang('View')); ?></a>

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
                        route('student.student.discussion')
                    );
                ?>
            </div>
            </div>



        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/student/discussion.blade.php ENDPATH**/ ?>