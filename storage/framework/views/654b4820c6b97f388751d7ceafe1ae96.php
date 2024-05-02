
<table class="table table-stripped">
    <thead>
    <tr>
        <th>
            <?php echo e(__lang('file')); ?>

        </th>
        <th>
            <?php echo e(__lang('status')); ?>

        </th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rowset as $row):  ?>
    <tr>
        <td><strong><?php echo e(basename($row->path)); ?></strong></td>
        <td><?php echo e((file_exists('usermedia/'.$row->path))? __lang('valid'):__lang('file-missing')); ?></td>
        <td><a title="<?php echo e(__lang('delete')); ?>" class="btn btn-primary delete" href="<?php echo e(adminUrl(['controller'=>'download','action'=>'removefile','id'=>$row->id])); ?>"><i class="fa fa-trash"></i></a>
            <a title="<?php echo e(__lang('download')); ?>" class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'download','action'=>'download','id'=>$row->id])); ?>"><i class="fa fa-download"></i></a>
        </td>
    </tr>
    <?php endforeach;  ?>
    </tbody>

</table>

<?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/download/files.blade.php ENDPATH**/ ?>