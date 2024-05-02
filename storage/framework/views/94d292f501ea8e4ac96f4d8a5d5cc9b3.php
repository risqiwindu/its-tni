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

</div>
<div style="clear: both"></div>
<div>
    <div >
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(['controller'=>'discuss','action'=>'index'])); ?>?replied=1"><?php echo e(__lang('replied')); ?></a>
                <a   class="btn btn-success float-right" href="<?php echo e(adminUrl(['controller'=>'discuss','action'=>'index'])); ?>?replied=0"><?php echo e(__lang('unreplied')); ?></a>
                <a  class="btn btn-secondary float-right" href="<?php echo e(adminUrl(['controller'=>'discuss','action'=>'index'])); ?>" ><?php echo e(__lang('all')); ?></a>

            </div>

            <div class="card-body">

                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('subject')); ?></th>
                        <th><?php echo e(__lang('subject')); ?></th>
                        <th><?php echo e(__lang('created-on')); ?></th>
                        <th><?php echo e(__lang('replied')); ?></th>
                        <th><?php echo e(__lang('recipients')); ?></th>
                        <th class="text-right1" style="width:90px"><?php echo e(__lang('actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($paginator as $row):  ?>
                        <tr>
                            <td><?php echo e($row->subject); ?></td>
                            <td><?php echo e($row->name.' '.$row->last_name); ?></td>
                            <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                            <td><?php echo e(boolToString($row->replied)); ?></td>

                            <td>

                                <?php if($row->admin==1): ?>
                                    <?php echo e(__lang('administrators')); ?>,
                                <?php endif;  ?>

                                <?php foreach($accountTable->getDiscussionAccounts($row->id) as $row2):  ?>
                                    <?php echo e($row2->name.' '.$row2->last_name); ?>,
                                <?php endforeach;  ?>



                            </td>
                            <td class="text-right">
                                 <div class="button-group dropup">
                                                       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-cogs"></i>  <?php echo e(__lang('actions')); ?>

                                                       </button>
                                                       <div class="dropdown-menu wide-btn">
                                                           <a href="<?php echo e(adminUrl(array('controller'=>'discuss','action'=>'viewdiscussion','id'=>$row->id))); ?>" class="dropdown-item" ><i class="fa fa-eye"></i> <?php echo e(__lang('view')); ?></a>

                                                           <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'discuss','action'=>'delete','id'=>$row->id))); ?>"  class="dropdown-item"  ><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>

                                                       </div>
                                                     </div>

                            </td>
                        </tr>
                    <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
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
                        'controller'=>'discuss',
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/discuss/index.blade.php ENDPATH**/ ?>