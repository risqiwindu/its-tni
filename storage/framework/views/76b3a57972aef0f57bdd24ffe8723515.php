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

    <div class="card-body no-padding">
        <table class="table table-hover table-striped no-margin">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(__lang('Items')); ?></th>
                <th><?php echo e(__lang('Payment Method')); ?></th>
                <th><?php echo e(__lang('Amount')); ?></th>
                <th><?php echo e(__lang('Currency')); ?></th>
                <th><?php echo e(__lang('Created On')); ?></th>
                <th style="min-width: 150px"><?php echo e(__lang('Status')); ?></th>
                <th ><?php echo e(__lang('Actions')); ?></th>
            </tr>

            </thead>
            <tbody>



            <?php  foreach($paginator as $row):  ?>
                <tr>
                    <td>#<?php echo e($row->id); ?></td>
                    <td><a  class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo e($row->id); ?>" aria-expanded="false" aria-controls="collapseExample<?php echo e($row->id); ?>">
                            <?php
                            $cart = unserialize($row->cart);
                            try{

                                echo $cart->getTotalItems().' '.ucwords(__lang('items'));
                            }
                            catch(\Exception $ex){
                                echo '0 '.ucwords(__lang('items'));
                            }
                             ?> <span class="caret"></span></a>
                    </td>
                    <td>
                        <?php if($row->paymentMethod): ?>
                        <?php echo e($row->paymentMethod->label); ?>

                        <?php endif; ?>
                    </td>
                    <td>

                        <?php echo e(formatCurrency($row->amount,$row->currency->country->currency_code)); ?>


                    </td>
                    <td><?php echo e($row->currency->country->currency_code); ?></td>
                    <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                    <td>

                            <?php  if($row->paid == 1):  ?>
                               <span class="color bg-success text-white pl-3 pr-3"><?php echo e(__lang('paid')); ?></span>
                        <?php  else:  ?>
                        <span class="color bg-danger text-white pl-3 pr-3"><?php echo e(__lang('unpaid')); ?></div>
                            <?php  endif;  ?>

                    </td>
                    <td>
                        <?php  if($row->paid == 0):  ?>
                            <a   href="<?php echo e(route('student.student.payinvoice',array('id'=>$row->id))); ?>" class="btn  btn-primary " data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('Pay Now')); ?>"><i class="fa fa-money-bill"></i> <?php echo e(__lang('Pay Now')); ?></a>
                        <?php  endif;  ?>

                    </td>
                </tr>
                <tr>
                    <td style="height: 0px" colspan="9">
                        <div class="collapse" id="collapseExample<?php echo e($row->id); ?>">
                            <?php  if(is_object($cart)): ?>
                                <?php if($cart->isCertificate()): ?>
                                    <div class="well">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__lang('certificate')); ?></th>
                                                <th><?php echo e(__lang('price')); ?></th>
                                            </tr>
                                            </thead>
                                            <?php $__currentLoopData = $cart->getCertificates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td>
                                                        <?php echo e($certificate->name); ?>

                                                    </td>
                                                    <td><strong><?php echo e(price($certificate->price)); ?></strong></td>

                                                </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </table>
                                    </div>
                                    <?php else: ?>
                                <div class="well">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__lang('course-session')); ?></th>
                                            <th><?php echo e(__lang('Fee')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php  foreach($cart->getSessions() as $session): ?>
                                            <tr>
                                                <td><?php echo e($session->name); ?></td>
                                                <td><?php echo e(price($session->fee,$row->currency_id)); ?></td>
                                            </tr>

                                        <?php  endforeach;  ?>

                                        </tbody>
                                    </table>
                                    <?php  if($cart->hasDiscount()): ?>
                                        <p>
                                            <strong><?php echo e(__lang('Discount')); ?>:</strong> <?php echo e($cart->getDiscount()); ?>% <br/>
                                            <?php  if(\App\Coupon::find($cart->getCouponId())):  ?>
                                                <strong><?php echo e(__lang('Coupon Code')); ?>:</strong> <?php echo e(\App\Coupon::find($cart->getCouponId())->code); ?>

                                            <?php  endif;  ?>
                                        </p>
                                    <?php  endif;  ?>
                                </div>
                            <?php endif; ?>

                            <?php  endif;  ?>
                        </div>
                    </td>
                </tr>
            <?php  endforeach;  ?>





            </tbody>
        </table>
        <div><?php echo e($paginator->links()); ?></div>

    </div><!--end .box-body -->
</div><!--end .box -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/student/student/invoices.blade.php ENDPATH**/ ?>