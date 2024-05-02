<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div >
        <div class="card">
            <div class="card-header">
                <header></header>
                <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(array('controller'=>'session','action'=>'addgroup'))); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('add-category')); ?></a>



            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('name')); ?></th>
                        <th  ><?php echo e(__lang('actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($categories as $key=>$value):  ?>
                        <tr>
                            <td><?php echo e($value); ?></td>


                            <td>
                                <a href="<?php echo e(adminUrl(array('controller'=>'session','action'=>'editgroup','id'=>$key))); ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i> </a>

                                <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'session','action'=>'deletegroup','id'=>$key))); ?>"  class="btn btn-sm  btn-danger" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>

                <?php echo e(paginationControl(
                // the paginator object
                    $paginator,
                    // the scrolling style
                    'sliding',
                    // the partial to use to render the control
                    null,
                    // the route to link to when a user clicks a control link
                    array(
                        'route' => 'admin/default',
                        'controller'=>'session',
                        'action'=>'groups',
                    )
                )); ?>

            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->



<!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/session/groups.blade.php ENDPATH**/ ?>