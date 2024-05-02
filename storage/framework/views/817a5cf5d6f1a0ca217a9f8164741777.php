 <table class="table table-stripped">
    <thead>
        <tr>
            <th><?php echo e(__lang('session-course')); ?></th>
            <th></th>
        </tr>

    </thead>
    <tbody>
    <?php foreach($rowset as $row):  ?>
    <tr>
        <td>
            <?php echo e($row->course_name); ?>

        </td>
        <td>
            <a class="btn btn-primary delete-session" href="<?php echo e(adminUrl(['controller'=>'download','action'=>'removesession','id'=>$row->id])); ?>"><i class="fa fa-trash"></i></a>
        </td>

    </tr>
    <?php endforeach;  ?>
    </tbody>
</table>

<?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/download/sessions.blade.php ENDPATH**/ ?>