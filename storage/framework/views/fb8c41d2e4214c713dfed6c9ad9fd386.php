<?php $__env->startSection('pageTitle',__('default.templates')); ?>
<?php $__env->startSection('innerTitle',__('default.colors').': '.$template->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.templates')=>__('default.site-theme'),
            '#'=>__('default.colors')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('admin.templates.save-colors')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <table class="table">
            <thead>
                <tr>
                    <th class="int_txcen"><?php echo app('translator')->get('default.original-color'); ?></th>
                    <th><?php echo app('translator')->get('default.new-color'); ?></th>
                </tr>
            </thead>
            <tbody>

            <?php $__currentLoopData = $colorList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="int_txcen">
                        <?php $__env->startSection('header'); ?>
                            <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
                        <style>
                            .cls<?php echo e($loop->index); ?>{
                                background-color: #<?php echo e($color); ?>

                            }
                        </style>
                        <?php $__env->stopSection(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div style="width: 50px;height: 50px;float: left;" class="int_colorstyle cls<?php echo e($loop->index); ?>"></div>
                            </div>
                            <div class="col-md-9" style="height: 50px;
  line-height: 50px; ">
                                #<?php echo e($color); ?>

                            </div>
                        </div>


                    </td>
                    <td>
                        <div class="input-group myColorPicker">
                        <input type="text" class="form-control colorpicker-full"  name="<?php echo e($color); ?>_new" <?php if($template->templateColors()->where('original_color',$color)->first()): ?> value="<?php echo e($template->templateColors()->where('original_color',$color)->first()->user_color); ?>" <?php endif; ?>>
                        </div>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>
        <button class="btn btn-primary btn-block"><?php echo app('translator')->get('default.save-changes'); ?></button>
    </form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>

    <link href="<?php echo e(asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('client/vendor/jquery-ui-1.11.4/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/colorpicker/jquery.colorpicker.js')); ?>"></script>



    <script>
"use strict";
        $(document).ready(function(){


            $('.colorpicker-full').colorpicker({
                parts:          'full',
                showOn:         'both',
                buttonColorize: true,
                showNoneButton: true,
                buttonImage : '<?php echo e(asset('client/vendor/colorpicker/images/ui-colorpicker.png')); ?>'
            });

        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/templates/colors.blade.php ENDPATH**/ ?>