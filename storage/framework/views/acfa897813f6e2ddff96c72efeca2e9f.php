<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('default.name'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($role->name) ? $role->name : '')); ?>" >
    <?php echo clean( $errors->first('name', '<p class="help-block">:message</p>') ); ?>

</div>

<h3><?php echo app('translator')->get('default.permissions'); ?></h3>
<div class="" id="accordionExample">

    <?php $__currentLoopData = \App\PermissionGroup::orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="accordion">
        <div class="accordion-header" id="headingThree<?php echo e($group->id); ?>" data-toggle="collapse" data-target="#collapseThree<?php echo e($group->id); ?>" aria-expanded="false" aria-controls="collapseThree<?php echo e($group->id); ?>">
            <h4 class="mb-0">
                    <?php echo app('translator')->get('default.'.$group->name); ?>
            </h4>
        </div>
        <div id="collapseThree<?php echo e($group->id); ?>" class="collapse" aria-labelledby="headingThree<?php echo e($group->id); ?>" data-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('default.permission'); ?></th>
                            <th><?php echo app('translator')->get('default.enabled'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $group->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo app('translator')->get('perm.'.$permission->name); ?></td>
                            <td>
                                <input type="checkbox" name="<?php echo e($permission->id); ?>" value="<?php echo e($permission->id); ?>"
                                       <?php if(isset($role) && $role->permissions()->find($permission->id)): ?>
                                        checked
                                           <?php endif; ?>
                                        />
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<br/>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('default.update') : __('default.create')); ?>">
</div>
<?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/roles/form.blade.php ENDPATH**/ ?>