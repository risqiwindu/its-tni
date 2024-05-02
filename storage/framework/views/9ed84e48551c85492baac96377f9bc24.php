<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<table class="table table-hover">
    <thead>
    <tr>
        <th><?php echo e(__lang('id')); ?></th>
        <th><?php echo e(__lang('last-name')); ?></th>
        <th><?php echo e(__lang('first-name')); ?></th>

        <th><?php echo e(__lang('classes-attended')); ?></th>
        <th  ><?php echo e(__lang('actions')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rowset as $row):  ?>
        <tr>
            <td><span class="label label-success"><?php echo e($row->student_id); ?></span></td>
            <td><?php echo e($row->last_name); ?></td>
            <td><?php echo e($row->name); ?></td>

            <td><?php echo e($attendanceTable->getTotalForStudent($row->student_id)); ?></td>

            <td  >
                <a href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'edit','id'=>$row->student_id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>
                <a onclick="openPopup('<?php echo e(adminUrl(array('controller'=>'student','action'=>'view','id'=>$row->student_id))); ?>?noterminal=true')" href="javascript:;" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-eye"></i></a>

            </td>
        </tr>
    <?php endforeach;  ?>

    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(adminLayout(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/student/sessionattendees.blade.php ENDPATH**/ ?>