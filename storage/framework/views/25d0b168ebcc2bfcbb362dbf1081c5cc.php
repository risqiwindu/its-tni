<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <label for="name" class="control-label"><?php echo app('translator')->get('default.first-name'); ?></label>
    <input class="form-control" name="name" type="text" id="name" value="<?php echo e(old('name',isset($admin->name) ? $admin->name : '')); ?>" >
    <?php echo clean($errors->first('name', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
    <label for="last_name" class="control-label"><?php echo app('translator')->get('default.last-name'); ?></label>
    <input class="form-control" name="last_name" type="text" id="name" value="<?php echo e(old('last_name',isset($admin->last_name) ? $admin->last_name : '')); ?>" >
    <?php echo clean($errors->first('last_name', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <label for="email" class="control-label"><?php echo app('translator')->get('default.email'); ?></label>
    <input class="form-control" name="email" type="text" id="email" value="<?php echo e(old('email',isset($admin->email) ? $admin->email : '')); ?>" >
    <?php echo clean($errors->first('email', '<p class="help-block">:message</p>')); ?>

</div>
<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <label for="password" class="control-label"><?php if($formMode=='edit'): ?> <?php echo app('translator')->get('default.change'); ?>  <?php endif; ?> <?php echo app('translator')->get('default.password'); ?></label>
    <input class="form-control" name="password" type="password" id="password" value="<?php echo e(old('password')); ?>" >
    <?php echo clean($errors->first('password', '<p class="help-block">:message</p>')); ?>

</div>

    <div class="form-group">
        <label for="roles"><?php echo app('translator')->get('default.role'); ?></label>
        <?php if($formMode === 'edit'): ?>
            <select required name="role" id="roles" class="form-control select2">
                <option></option>
                <?php $__currentLoopData = \App\AdminRole::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option  <?php if(old('role',$admin->admin->admin_role_id)==$role->id): ?>
                        selected
                        <?php endif; ?>
                        value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php else: ?>
            <select required name="role" id="roles" class="form-control select2">
                <option></option>
                <?php $__currentLoopData = \App\AdminRole::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(old('role')==$role->id): ?> selected <?php endif; ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php endif; ?>
    </div>

<div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
    <label for="status" class="control-label"><?php echo app('translator')->get('default.enabled'); ?></label>
    <select name="status" class="form-control" id="status" >
    <?php $__currentLoopData = json_decode('{"1":"'.__('default.yes').'","0":"'.__('default.no').'"}', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $optionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($optionKey); ?>" <?php echo e(((null !== old('status',@$admin->status)) && old('admin',@$admin->status) == $optionKey) ? 'selected' : ''); ?>><?php echo e($optionValue); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    <?php echo clean( $errors->first('status', '<p class="help-block">:message</p>') ); ?>

</div>

<div class="form-group <?php echo e($errors->has('about') ? 'has-error' : ''); ?>">
    <label for="about" class="control-label"><?php echo app('translator')->get('default.about'); ?></label>

    <textarea name="about" id="about"  class="form-control"><?php echo e(old('about',isset($admin->admin->about) ? $admin->admin->about : '')); ?></textarea>
    <?php echo clean($errors->first('about', '<p class="help-block">:message</p>')); ?>

</div>
<div  >
    <div  >
        <div class="form-group"  >
            <div class="col-lg-8 col-md-8 col-sm-6">
            <label for="image" class="control-label"><?php echo e(__lang('profile-picture')); ?></label><br />


            <div class="image"><img data-name="image" src="<?php echo e($display_image); ?>" alt="" id="thumb" /><br />

                <input type="hidden" name="picture" id="image" value="">
                <a class="pointer" onclick="image_upload('image', 'thumb');"><?php echo e(__lang('browse')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#thumb').attr('src', '<?php echo e($no_image); ?>'); $('#image').attr('value', '');"><?php echo e(__lang('clear')); ?></a></div>
            </div>
        </div>
    </div>

</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="notify" name="notify" value="1" <?php if((old('notify',isset($admin->admin->notify) ? $admin->admin->notify : 0))==1): ?> checked <?php endif; ?>>

    <label class="form-check-label" for="notify">
        <?php echo e(__lang('notifications')); ?>

    </label>
</div>

<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" id="public" name="public" value="1" <?php if((old('public',isset($admin->admin->public) ? $admin->admin->public : 0))==1): ?> checked <?php endif; ?>>

    <label class="form-check-label" for="public">
        <?php echo e(__lang('public')); ?>

    </label>
</div>

<div class="card">
 <div class="card-header">
   <h4><?php echo e(__lang('social')); ?></h4>
</div>
<div class="card-body">
    <div class="form-group <?php echo e($errors->has('social_facebook') ? 'has-error' : ''); ?>">
        <label for="social_facebook" class="control-label"><?php echo app('translator')->get('default.facebook'); ?></label>
        <input class="form-control" name="social_facebook" type="text" id="social_facebook" value="<?php echo e(old('social_facebook',isset($admin->admin->social_facebook) ? $admin->admin->social_facebook : '')); ?>" >
        <?php echo clean($errors->first('social_facebook', '<p class="help-block">:message</p>')); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('social_twitter') ? 'has-error' : ''); ?>">
        <label for="social_twitter" class="control-label"><?php echo app('translator')->get('default.twitter'); ?></label>
        <input class="form-control" name="social_twitter" type="text" id="social_twitter" value="<?php echo e(old('social_twitter',isset($admin->admin->social_twitter) ? $admin->admin->social_twitter : '')); ?>" >
        <?php echo clean($errors->first('social_twitter', '<p class="help-block">:message</p>')); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('social_linkedin') ? 'has-error' : ''); ?>">
        <label for="social_linkedin" class="control-label"><?php echo app('translator')->get('default.linkedin'); ?></label>
        <input class="form-control" name="social_linkedin" type="text" id="social_linkedin" value="<?php echo e(old('social_linkedin',isset($admin->admin->social_linkedin) ? $admin->admin->social_linkedin : '')); ?>" >
        <?php echo clean($errors->first('social_linkedin', '<p class="help-block">:message</p>')); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('social_instagram') ? 'has-error' : ''); ?>">
        <label for="social_instagram" class="control-label"><?php echo app('translator')->get('default.instagram'); ?></label>
        <input class="form-control" name="social_instagram" type="text" id="social_instagram" value="<?php echo e(old('social_instagram',isset($admin->admin->social_instagram) ? $admin->admin->social_instagram : '')); ?>" >
        <?php echo clean($errors->first('social_instagram', '<p class="help-block">:message</p>')); ?>

    </div>

    <div class="form-group <?php echo e($errors->has('social_website') ? 'has-error' : ''); ?>">
        <label for="social_website" class="control-label"><?php echo app('translator')->get('default.website'); ?></label>
        <input class="form-control" name="social_website" type="text" id="social_website" value="<?php echo e(old('social_website',isset($admin->admin->social_website) ? $admin->admin->social_website : '')); ?>" >
        <?php echo clean($errors->first('social_website', '<p class="help-block">:message</p>')); ?>

    </div>
</div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? __('default.update') : __('default.create')); ?>">
</div>


<!--container ends-->
<script type="text/javascript"><!--
    function image_upload(field, thumb) {
        $('#dialog').remove();

        $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="<?php echo e(basePath()); ?>/admin/filemanager?&token=true&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

        $('#dialog').dialog({
            title: '<?php echo e(addslashes(__lang('Image Manager'))); ?>',
            close: function (event, ui) {
                if ($('#' + field).attr('value')) {
                    $.ajax({
                        url: '<?php echo e(basePath()); ?>/admin/filemanager/image?&image=' + encodeURIComponent($('#' + field).val()),
                        dataType: 'text',
                        success: function(data) {
                            $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
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

    //--></script>
<?php /**PATH /var/www/html/itstni/resources/views/admin/admins/form.blade.php ENDPATH**/ ?>