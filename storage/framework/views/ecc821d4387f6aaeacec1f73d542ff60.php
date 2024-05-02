<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            '#'=>__lang('my-submissions')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div >
        <div class="card">

            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('homework')); ?></th>
                        <th><?php echo e(__lang('course-session')); ?></th>
                        <th><?php echo e(__lang('due-date')); ?></th>
                        <th><?php echo e(__lang('submitted-on')); ?></th>
                        <th><?php echo e(__lang('submission-status')); ?></th>
                        <th><?php echo e(__lang('review-status')); ?></th>
                        <th><?php echo e(__lang('grade')); ?></th>
                        <th  ></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($paginator as $row):  ?>
                        <tr>
                            <td><?php echo e($row->title); ?></td>
                            <td><span ><?php echo e($row->course_name); ?></span></td>
                            <td><?php echo e(showDate('d/M/Y',$row->due_date)); ?></td>
                            <td><?php echo e(showDate('d/M/Y',$row->updated_at)); ?></td>
                            <td><?php echo ($row->submitted==1)? '<span style="color:green; font-weight:bold">'.__lang('submitted').'</span>':'<span style="color:red; font-weight:bold">'.__lang('draft').'</span>'; ?>  </td>
                            <td><?php echo e((is_null($row->grade))? __lang('pending'):__lang('graded')); ?></td>
                            <td>
                                <?php  if(!is_null($row->grade)): ?>
                                <?php echo e($row->grade); ?>%
                                <?php  if($row->grade >= $row->passmark): ?>
                                    <strong style="color: green">(<?php echo e(__lang('passed')); ?>)</strong>
                            <?php  else:  ?>
                                    <strong style="color: red">(<?php echo e(__lang('failed')); ?>)</strong>
                            <?php  endif;  ?>
                                <?php  else:  ?>
                                N/A
                                <?php  endif;  ?>
                            </td>
                            <td  >
                                 <div class="dropdown dropup">
                                                       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <?php echo e(__lang('actions')); ?>

                                                       </button>
                                                       <div class="dropdown-menu wide-btn">
                                                         <a class="dropdown-item" href="<?php echo e(route('student.assignment.edit',['id'=>$row->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>
                                                         <a class="dropdown-item"onclick="return confirm('<?php echo e(__lang('submission-delete-confirm')); ?>')" href="<?php echo e(route('student.assignment.delete',['id'=>$row->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>
                                                         <a class="dropdown-item" onclick="openModal('<?php echo e(__lang('assignment-submission')); ?>: <?php echo e(addslashes($row->title)); ?>','<?php echo e(route('student.assignment.view',['id'=>$row->id])); ?>')" href="#"><i class="fa fa-eye"></i> <?php echo e(__lang('view')); ?></a>
                                                       </div>
                                                     </div>

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
                    route('student.assignment.submissions')
                );
                 ?>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>

<!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/assignment/submissions.blade.php ENDPATH**/ ?>