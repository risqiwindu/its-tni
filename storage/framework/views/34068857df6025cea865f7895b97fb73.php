<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
    <button onclick="image_upload()" id="addFileBtn" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(__lang('add-file')); ?></button>
    <input id="file_name" type="hidden" name="file_name"/>
    <p><small><?php echo e(__lang('allowed-files')); ?>: pdf, zip, mp4, mp3, doc, docx, ppt, pptx, xls, xlsx, png, jpeg, gif, txt, csv</small></p>
</div>
<div id="filelist">
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
        <td><a title="<?php echo e(__lang('delete')); ?>" class="btn btn-primary delete" href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'removefile','id'=>$row->id])); ?>"><i class="fa fa-trash"></i></a>
            <a title="<?php echo e(__lang('download')); ?>" class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'download','id'=>$row->id])); ?>"><i class="fa fa-download"></i></a>
        </td>
    </tr>
    <?php endforeach;  ?>
    </tbody>

</table>
</div>
<script type="text/javascript">


    function image_upload() {
        var field = 'file_name';
        $('#dialog').remove();

        $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="<?php echo e(basePath()); ?>/admin/filemanager?&token=true&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

        $('#dialog').dialog({
            title: '<?php echo e(__lang('select-file')); ?>',
            close: function (event, ui) {

                if ($('#' + field).attr('value')) {
                    console.log($('#' + field).attr('value'));

                   $('#filelist').text('<?php echo e(__lang('loading')); ?>...');
                    $.ajax({
                        url: '<?php echo e(basePath()); ?>/admin/lecture/addfile/<?php echo e($id); ?>?&path=' + encodeURIComponent($('#' + field).val()),
                        dataType: 'text',
                        success: function(data) {
                            //$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                           // $('#layout_content').load('<?php echo e(basePath()); ?>/admin/lecture/files/<?php echo e($id); ?>');
                            $('#layout_content').html(data);
                        }
                    });

                }

            },
            bgiframe: false,
            width: 800,
            height: 570,
            resizable: true,
            modal: false,
            position: "center"
        });
    };




    $(function(){
        $(document).on('click','.delete',function(e){
            e.preventDefault();
            $('#layout_content').text('Loading...');
            $('#layout_content').load($(this).attr('href'));
        });

        $(document).on('click','#genmodalinfo a',function(e){
            e.preventDefault();
            $('#genmodalinfo').text('Loading...');
            $('#genmodalinfo').load($(this).attr('href'));
        });



    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(adminLayout(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/lecture/files.blade.php ENDPATH**/ ?>