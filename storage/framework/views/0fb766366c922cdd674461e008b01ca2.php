<?php $__env->startSection('pageTitle',__('default.administrators')); ?>
<?php $__env->startSection('innerTitle',__('default.administrators')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>__lang('administrators')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="<?php echo e(url('/admin/admins/create')); ?>" class="btn btn-success btn-sm" title="<?php echo app('translator')->get('default.add-new'); ?>">
                            <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('default.add-new'); ?>
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th><?php echo app('translator')->get('default.name'); ?></th>

                                        <th><?php echo app('translator')->get('default.email'); ?></th><th><?php echo app('translator')->get('default.enabled'); ?></th>
                                        <th><?php echo app('translator')->get('default.role'); ?></th>
                                        <th><?php echo app('translator')->get('default.actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <img  class="mr-3 rounded-circle"    width="50" src="<?php echo e(profilePictureUrl($item->picture)); ?>" />
                                        </td>
                                        <td><?php echo e($item->name); ?> <?php echo e($item->last_name); ?></td><td><?php echo e($item->email); ?></td><td><?php echo e(boolToString($item->enabled)); ?></td>
                                        <td>
                                            <?php if($item->admin): ?>
                                            <?php echo e($item->admin->adminRole->name); ?>

                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <form method="POST" action="<?php echo e(url('/admin/admins' . '/' . $item->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp" id="form<?php echo e($item->id); ?>">
                                

                                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                            <a href="<?php echo e(url('/admin/admins/' . $item->id)); ?>" title="<?php echo app('translator')->get('default.view'); ?>"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo app('translator')->get('default.view'); ?></button></a>

                                            <a href="<?php echo e(url('/admin/admins/' . $item->id . '/edit')); ?>" title="<?php echo app('translator')->get('default.edit'); ?>"><button  type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('default.edit'); ?></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('default.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('default.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo app('translator')->get('default.delete'); ?></button>


                                        </div>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo clean( $admins->appends(['search' => Request::get('search')])->render() ); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/admins/index.blade.php ENDPATH**/ ?>