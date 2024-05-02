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
            <div class="card-header">
                <header></header>
                <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(array('controller'=>'download','action'=>'add'))); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('create-download')); ?></a>



            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('id')); ?></th>
                        <th><?php echo e(__lang('name')); ?></th>
                        <th><?php echo e(__lang('files')); ?></th>
                        <th><?php echo e(__lang('enabled')); ?></th>
                        <?php if(GLOBAL_ACCESS): ?>
                        <th><?php echo e(__lang('created-by')); ?></th>
                        <?php endif;  ?>
                        <th class="text-right1" style="width:130px"><?php echo e(__lang('actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($paginator as $row):  ?>
                        <tr>
                            <td><span class="label label-success"><?php echo e($row->id); ?></span></td>
                            <td><?php echo e($row->name); ?></td>
                            <td><?php echo e($fileTable->getTotalForDownload($row->id)); ?></td>
                            <td><?php echo e(boolToString($row->enabled)); ?></td>
                            <?php if(GLOBAL_ACCESS): ?>
                                <td><?php echo e(adminName($row->admin_id)); ?></td>
                            <?php endif;  ?>
                            <td>
                                 <div class="button-group dropup">
                                                       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                          <i class="fa fa-cogs"></i>          <?php echo e(__lang('actions')); ?>

                                                       </button>
                                                       <div class="dropdown-menu wide-btn">
                                                           <a href="<?php echo e(adminUrl(array('controller'=>'download','action'=>'edit','id'=>$row->id))); ?>" class="dropdown-item" ><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>

                                                           <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'download','action'=>'delete','id'=>$row->id))); ?>"  class="dropdown-item"  ><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>
                                                           <a  class="dropdown-item" href="<?php echo e(adminUrl(array('controller'=>'download','action'=>'duplicate','id'=>$row->id))); ?>"  ><i class="fa fa-copy"></i> <?php echo e(__lang('duplicate')); ?></a>

                                                       </div>
                                                     </div>

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
                        'action'=>'index',
                    )
                );
                ?>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>


<!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/download/index.blade.php ENDPATH**/ ?>