<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.session.groups')=>__lang('course-categories'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div class="card">

            <div class="card-body">

                    <form method="post" action="<?php echo e(adminUrl(array('controller'=>'session','action'=>$action,'id'=>$id))); ?>">
                        <?php echo csrf_field(); ?>





                <div class="form-group">
                    <?php echo e(formLabel($form->get('name'))); ?>

                    <?php echo e(formElement($form->get('name'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('name'))); ?></p>

                </div>




                <div class="form-group">
                    <?php echo e(formLabel($form->get('description'))); ?>

                    <?php echo e(formElement($form->get('description'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('description'))); ?></p>

                </div>



                <div class="form-group">
                    <?php echo e(formLabel($form->get('sort_order'))); ?>

                    <?php echo e(formElement($form->get('sort_order'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('sort_order'))); ?></p>

                </div>



                <div class="form-group">
                            <?php echo e(formLabel($form->get('parent_id'))); ?>

                            <?php echo e(formElement($form->get('parent_id'))); ?>

                            <p class="help-block"><?php echo e(formElementErrors($form->get('parent_id'))); ?></p>

                </div>

                <div class="form-group">
                    <?php echo e(formLabel($form->get('enabled'))); ?>

                    <?php echo e(formElement($form->get('enabled'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('enabled'))); ?></p>

                </div>






                <div class="form-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                </div>
                    </form>
            </div>
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/session/addgroup.blade.php ENDPATH**/ ?>