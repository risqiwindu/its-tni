<?php $__env->startSection('page-title',__('default.contact-us')); ?>
<?php $__env->startSection('inline-title',__('default.contact-us')); ?>
<?php $__env->startSection('crumb'); ?>
<li><?php echo app('translator')->get('default.contact-us'); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="form-main">
                        <h3 class="title">
                            <?php echo app('translator')->get('default.get-in-touch-text'); ?>
                        </h3>
                        <form class="form" method="post" action="<?php echo e(route('contact.send-mail')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label><?php echo e(__t('enter-your-name')); ?></label>
                                        <input name="name" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label><?php echo e(__t('enter-email')); ?></label>
                                        <input name="email" type="email" placeholder="" required="required">
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><?php echo e(__t('enter-subject')); ?></label>
                                        <input name="subject" type="text" placeholder=""
                                               required="required">
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label><?php echo e(__t('enter-message')); ?></label>
                                        <textarea name="message" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('default.verification'); ?></label>
                                        <label for=""><?php echo clean( captcha_img() ); ?></label>
                                        <input class="form-control" type="text" name="captcha" placeholder="<?php echo app('translator')->get('default.verification-hint'); ?>"/>

                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn "><?php echo e(__t('send')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-map-marker"></i>
                            <h4><?php echo app('translator')->get('default.address'); ?></h4>
                            <p class="no-margin-bottom"><?php echo clean(setting('general_address')); ?></p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <h4><?php echo e(__t('lets-talk')); ?></h4>
                            <p class="no-margin-bottom"><?php echo app('translator')->get('default.telephone'); ?>: <?php echo e(setting('general_tel')); ?> </p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <h4><?php echo app('translator')->get('default.email'); ?></h4>
                            <p class="no-margin-bottom"><?php echo clean( setting('general_contact_email') ); ?></p>
                        </div>
                        <!-- End Single Info -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\public\templates/edugrids/views/site/home/contact.blade.php ENDPATH**/ ?>