<?php $__env->startSection('pageTitle',__('default.administrator').': '.$admin->name); ?>
<?php $__env->startSection('innerTitle',__('default.administrator').': '.$admin->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.admins.index')=>__lang('administrators'),
            '#'=>__lang('view')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >
                        <form method="POST" action="<?php echo e(url('admin/admins' . '/' . $admin->id)); ?>" accept-charset="UTF-8" class="int_inlinedisp">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                        <a href="<?php echo e(url('/admin/admins')); ?>" title="Back"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> <?php echo app('translator')->get('default.back'); ?></button></a>
                        <a href="<?php echo e(url('/admin/admins/' . $admin->id . '/edit')); ?>" ><button type="button"  class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo app('translator')->get('default.edit'); ?></button></a>


                            <button type="submit" class="btn btn-danger btn-sm" title="<?php echo app('translator')->get('default.delete'); ?>" onclick="return confirm(&quot;<?php echo app('translator')->get('default.confirm-delete'); ?>?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo app('translator')->get('default.delete'); ?></button>
                        </form>
                        <br/>
                        <br/>

                        <ul class="list-group">
                            <li class="list-group-item active"><?php echo app('translator')->get('default.id'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->id); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('default.name'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->name); ?> <?php echo e($admin->last_name); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('default.email'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->email); ?></li>
                            <li class="list-group-item active"><?php echo app('translator')->get('default.enabled'); ?></li>
                            <li class="list-group-item"><?php echo e(boolToString($admin->enabled)); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.role'); ?></li>
                            <li class="list-group-item">
                                <?php echo e($admin->admin->adminRole->name); ?>


                            </li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.about'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->about); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.notifications'); ?></li>
                            <li class="list-group-item"><?php echo e(boolToString($admin->admin->notify)); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.public'); ?></li>
                            <li class="list-group-item"><?php echo e(boolToString($admin->admin->public)); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.facebook'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->social_facebook); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.twitter'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->social_twitter); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.linkedin'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->social_linkedin); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.instagram'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->social_instagram); ?></li>

                            <li class="list-group-item active"><?php echo app('translator')->get('default.website'); ?></li>
                            <li class="list-group-item"><?php echo e($admin->admin->social_website); ?></li>

                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/admins/show.blade.php ENDPATH**/ ?>