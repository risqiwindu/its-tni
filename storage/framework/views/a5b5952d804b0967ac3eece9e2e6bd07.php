<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
    <div >

        <div class="card">
            <form action="<?php echo e(adminUrl(['controller'=>'download','action'=>'addsession','id'=>$id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="card-body">

                <div >

                       <input class="btn btn-primary" type="submit" value="<?php echo e(__lang('add-session-course')); ?>"/>
                    <br><br>
                    <div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th><?php echo e(__lang('id')); ?></th>
                            <th><?php echo e(__lang('session-course')); ?></th>
                            <th><?php echo e(__lang('start-date')); ?></th>
                            <th><?php echo e(__lang('end-date')); ?></th>
                            <th><?php echo e(__lang('total-attended')); ?></th>
                            <th><?php echo e(__lang('total-enrolled')); ?></th>
                            <th><?php echo e(__lang('status')); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($paginator as $row):  ?>
                            <tr>
                                <td>

                                    <input name="session_<?php echo e($row->id); ?>" value="<?php echo e($row->id); ?>" type="checkbox"/>
                                </td>
                                <td><span class="label label-success"><?php echo e($row->id); ?></span></td>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php echo e(showDate('d/m/Y',$row->start_date)); ?></td>
                                <td><?php echo e(showDate('d/m/Y',$row->end_date)); ?></td>
                                <td>
                                    <strong><?php echo e($attendanceTable->getTotalStudentsForSession($row->id)); ?></strong>
                                </td>
                                <td>
                                    <strong><?php echo e($studentSessionTable->getTotalForSession($row->id)); ?></strong>
                                </td>
                                <td>
                                    <?php echo e(($row->enabled!=1)?__lang('disabled'):__lang('enabled')); ?>

                                </td>


                            </tr>
                        <?php endforeach;  ?>

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
                        array(
                            'route' => 'admin/default',
                            'controller'=>'download',
                            'action'=>'browsesessions',
                            'id'=>$id
                        )
                    );
                    ?>
                </div>
                    <h3><?php echo e(__lang('assigned-sessions')); ?></h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th><?php echo e(__lang('id')); ?></th>
                            <th><?php echo e(__lang('session-course-name')); ?></th>
                            <th><?php echo e(__lang('start-date')); ?></th>
                            <th><?php echo e(__lang('end-date')); ?></th>
                            <th><?php echo e(__lang('total-attended')); ?></th>
                            <th><?php echo e(__lang('total-enrolled')); ?></th>
                            <th><?php echo e(__lang('status')); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($assigned as $row):  ?>
                            <tr>
                                <td>

                                    <input name="session_<?php echo e($row->id); ?>" value="<?php echo e($row->id); ?>" type="checkbox"/>
                                </td>
                                <td><span class="label label-success"><?php echo e($row->id); ?></span></td>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php echo e(showDate('d/m/Y',$row->start_date)); ?></td>
                                <td><?php echo e(showDate('d/m/Y',$row->end_date)); ?></td>
                                <td>
                                    <strong><?php echo e($attendanceTable->getTotalStudentsForSession($row->id)); ?></strong>
                                </td>
                                <td>
                                    <strong><?php echo e($studentSessionTable->getTotalForSession($row->id)); ?></strong>
                                </td>
                                <td>
                                    <?php echo e(($row->enabled!=1)?__lang('disabled'):__lang('enabled')); ?>

                                </td>


                            </tr>
                        <?php endforeach;  ?>

                        </tbody>
                    </table>
                </div>

            </div><!--end .box-body -->
            </form>

        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(adminLayout(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/download/browsesessions.blade.php ENDPATH**/ ?>