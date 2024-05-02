<?php $__env->startSection('pageTitle',$pageTitle); ?>
<?php $__env->startSection('innerTitle',$pageTitle); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            '#'=>$pageTitle
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
<div class="card-body">
    <form   enctype="multipart/form-data" method="post" action="<?php echo e(route('student.student.profile')); ?>">
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('name'))); ?>


                <div class="controls">
                    <?php echo e(formElement($form->get('name'))); ?>

                    <p class="help-block">&nbsp;</p>
                </div>
            </div>

            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('last_name'))); ?>


                <div class="controls">
                    <?php echo e(formElement($form->get('last_name'))); ?>

                    <p class="help-block">&nbsp;</p>
                </div>
            </div>



            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('mobile_number'))); ?>


                <div class="controls">
                    <?php echo e(formElement($form->get('mobile_number'))); ?>

                    <p class="help-block">&nbsp;</p>
                </div>
            </div>

            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('email'))); ?>


                <div class="controls">
                    <?php echo e(formElement($form->get('email'))); ?>

                    <p class="help-block"><?php echo e(__lang('provide-email')); ?></p>
                </div>
            </div>


            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('picture'))); ?>

                <div class="controls">


                    <?php  if(!empty($row->picture) && isUrl($row->picture)): ?>
                            <img src="<?php echo e($row->picture); ?>" style="max-width: 200px" alt=""/>
                    <br> <br>
                    <?php  elseif(!empty($row->picture) && isImage($row->picture)): ?>
                      <img src="<?php echo e(resizeImage($row->picture,200,200,url('/'))); ?>" alt=""/>
                    <br> <br>
                    <?php  endif;  ?>

                    <?php  if(!empty($row->picture)):  ?>
                    <a class="btn btn-danger"  onclick="return confirm('<?php echo e(__lang('confirm-remove-picture')); ?>')" href="<?php echo e(route('student.student.removeimage')); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('Remove image')); ?></a>
                    <br> <br> <?php  endif;  ?>
                    <?php echo e(formElement($form->get('picture'))); ?> <p class="help-block"><?php echo e(formElementErrors($form->get('picture'))); ?></p>
                </div>
            </div>
            <?php  foreach($fields as $row): ?>



            <?php  if($row->type == 'checkbox'): ?>
            <div class="control-group col-md-6">


                <div class="controls">
                    <?php echo e(formLabel($form->get('custom_'.$row->id))); ?>  <?php echo e(formElement($form->get('custom_'.$row->id))); ?> <p class="help-block"><?php echo e(formElementErrors($form->get('custom_'.$row->id))); ?></p>
                </div>
            </div>

            <?php  elseif($row->type == 'radio'):  ?>

            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('custom_'.$row->id))); ?>

                <div class="controls">
                    <?php echo e(formElement($form->get('custom_'.$row->id))); ?> <p class="help-block"><?php echo e(formElementErrors($form->get('custom_'.$row->id))); ?></p>
                </div>
            </div>

            <?php  elseif($row->type == 'file'):  ?>


            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('custom_'.$row->id))); ?>

                <div class="controls">
                    <?php  $valueRow = $table->getStudentFieldRecord($id,$row->id);  ?>
                    <?php  if(!empty($valueRow) && isImage($valueRow->value)): ?>
                    <img src="<?php echo e(resizeImage($valueRow->value,200,200,url('/'))); ?>" alt=""/>

                    <?php  endif;  ?>
                    <?php echo e(formElement($form->get('custom_'.$row->id))); ?> <p class="help-block"><?php echo e(formElementErrors($form->get('custom_'.$row->id))); ?></p>
                </div>
            </div>

            <?php  else:  ?>
            <div class="control-group col-md-6">
                <?php echo e(formLabel($form->get('custom_'.$row->id))); ?>

                <div class="controls">
                    <?php echo e(formElement($form->get('custom_'.$row->id))); ?> <p class="help-block"><?php echo e(formElementErrors($form->get('custom_'.$row->id))); ?></p>
                </div>
            </div>


            <?php  endif;  ?>




            <?php  endforeach;  ?>

        </div>



        <div class="form-footer"  >
            <button type="submit" class="btn btn-primary float-right"><?php echo e(__lang('Save Changes')); ?></button>
        </div>
    </form>


</div>
</div>




<!--container ends-->
<script src="<?php echo e(url('/')); ?>/client/vendor/intl-tel-input/build/js/intlTelInput.js"></script>

<script>


    $("input[name=mobile_number]").intlTelInput({
        initialCountry: "auto",
        separateDialCode:true,
        hiddenInput:'fmobilenumber',
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        utilsScript: "<?php echo e(url('/')); ?>/client/vendor/intl-tel-input/build/js/utils.js" // just for formatting/placeholders etc
    });
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/intl-tel-input/build/css/intlTelInput.css')); ?>">
    <style>
        .iti-flag {background-image: url("<?php echo e(url('/')); ?>/client/vendor/intl-tel-input/build/img/flags.png");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("<?php echo e(url('/')); ?>/client/vendor/intl-tel-input/build/img/flags@2x.png");}
        }

    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>

    <script type="text/javascript" src="<?php echo e(asset('client/vendor/intl-tel-input/build/js/utils.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/intl-tel-input/build/js/intlTelInput.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/student/student/profile.blade.php ENDPATH**/ ?>