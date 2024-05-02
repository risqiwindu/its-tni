
<table class="table table-striped">
    <tbody>


    <tr>
        <th><?php echo e(__lang('title')); ?>:</th>
        <td><?php echo e($row->title); ?></td>
    </tr>

    <tr>
        <th><?php echo e(__lang('created-by')); ?></th>
        <td> <?php echo e($row->admin->user->name); ?> <?php echo e($row->admin->user->last_name); ?> (<?php echo e($row->admin->user->email); ?>)

      </tr>

    <tr>
        <th><?php echo e(__lang('instructions')); ?>:</th>
        <td><?php echo $row->instruction; ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('passmark')); ?></th>
        <td><?php echo e($row->passmark); ?>%</td>
    </tr>
    <tr>
        <th><?php echo e(__lang('due-date')); ?></th>
        <td><?php echo e(showDate('d/m/Y',$row->due_date)); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('created-on')); ?></th>
        <td><?php echo e(showDate('d/m/Y',$row->created_at)); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('submissions')); ?></th>
        <td><?php echo e($table->getTotalForAssignment($row->id)); ?></td>
    </tr>
    <tr>
        <th>
            <?php echo e(__lang('average-score')); ?>

        </th>
        <td>
            <?php echo e($table->getAverageScore($row->id)); ?>

        </td>
    </tr>
    <tr>
        <th><?php echo e(__lang('total-passed')); ?></th>
        <td><?php echo e($table->getTotalPassed($row->id,$row->passmark)); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('total-failed')); ?></th>
        <td><?php echo e($table->getTotalFailedForAssignment($row->id,$row->passmark)); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('type')); ?></th>
        <td><?php  switch($row->type){
                case 't':
                    echo __lang('text');
                    break;
                case 'f':
                    echo __lang('file-upload');
                    break;
                case 'b':
                    echo __lang('text-file-upload');
                    break;
            }  ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('send-submission')); ?></th>
        <td><?php echo e(boolToString($row->notify)); ?></td>
    </tr>
    <tr>
        <th><?php echo e(__lang('allow-late')); ?></th>
        <td><?php echo e(boolToString($row->allow_late)); ?></td>
    </tr>
    </tbody>
</table>

<?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/assignment/view.blade.php ENDPATH**/ ?>