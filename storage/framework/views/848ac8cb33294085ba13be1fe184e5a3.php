<?php $__env->startSection('page-title',__lang('cart')); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-primary">
     <div class="card-header">
        <h4><?php echo e(__lang('your-cart')); ?></h4>
         <div class="card-header-action">

             <div class="dropdown">
                 <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><?php echo e(__lang('select-currency')); ?></a>
                 <div class="dropdown-menu">
                     <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <a href="<?php echo e(route('cart.currency',['currency'=>$currency->id])); ?>" class="dropdown-item has-icon"><?php echo e($currency->country->symbol_left); ?> - <?php echo e($currency->country->currency_name); ?></a>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
             </div>
         </div>
    </div>
    <div class="card-body">
        <?php if(getCart()->hasItems()): ?>
            <div class="table-responsive">
        <table class="table table-hover mb-3">
            <thead>
            <tr>
                <th><?php echo e(__lang('item')); ?></th>
                <th class="text-center"><?php echo e(__lang('total')); ?></th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach(getCart()->getSessions() as $session): ?>
            <tr  >
                <td class="col-sm-8 col-md-6 pt-2" >
                    <div class="media">

                        <?php
                                $url= route('course',['course'=>$session->id,'slug'=>safeUrl($session->name)]);

                        ?>

                        <?php  if(!empty($session->picture)):  ?>


                        <a class="thumbnail float-left" href="<?php echo e($url); ?>"> <img class="media-object" src="<?php echo e(resizeImage($session->picture,72,72,url('/'))); ?>" style="width: 72px; height: 72px;"> </a>

                        <?php  endif;  ?>



                        <div class="media-body pl-3">
                            <h5 class="media-heading"><a href="<?php echo e($url); ?>"><?php echo e($session->name); ?></a></h5>

                            <span></span><span class="text-success"><strong><?php
                                        switch($session->type){
                                            case 'b':
                                                echo __lang('training-online');
                                                break;
                                            case 's':
                                                echo __lang('training-session');
                                                break;
                                            case 'c':
                                                echo __lang('online-course');
                                                break;
                                        }
                                    ?></strong></span>
                        </div>
                    </div></td>

                <td class="col-sm-1 col-md-1 text-center pt-2"  ><strong><?php echo e(price($session->fee)); ?></strong></td>
                <td class="col-sm-1 col-md-1 pt-2"  >

                    <a class="btn btn-danger" href="<?php echo e(route('cart.remove',['course'=>$session->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('remove')); ?></a>

                </td>
            </tr>
            <?php  endforeach;  ?>

            <?php $__currentLoopData = getCart()->getCertificates(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td class="col-sm-8 col-md-6 pt-2" >
                        <?php echo e($certificate->name); ?>

                    </td>
                    <td class="col-sm-1 col-md-1 text-center pt-2"  ><strong><?php echo e(price($certificate->price)); ?></strong></td>
                    <td class="col-sm-1 col-md-1 pt-2"  >

                        <a class="btn btn-danger" href="<?php echo e(route('cart.remove-certificate',['certificate'=>$certificate->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('remove')); ?></a>

                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>
    </div>
            <div class="row">

            <div class="col-md-3">
                <?php if($cart->isCourse()): ?>
                <div class="card card-primary">
                    <div class="card-header"><?php echo e(__lang('coupon')); ?></div>
                    <div class="card-body">
                        <form method="post" class="form" action="<?php echo e(route('cart')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="code"><?php echo e(__lang('coupon-code')); ?></label>
                                <input required="required" class="form-control" type="text" name="code" placeholder="<?php echo e(__lang('enter-coupon-code')); ?>"/>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(__lang('apply')); ?></button>
                        </form>
                    </div>
                </div>
                    <?php endif; ?>
            </div>


                <div class="col-md-5">
                    <form action="<?php echo e(route('cart.process')); ?>" method="post" id="cart-form">
                        <?php echo csrf_field(); ?>
                        <?php if($cart->requiresPayment()): ?>
                    <div class="card card-success">
                        <div class="card-header" ><?php echo e(__lang('payment-method')); ?></div>
                        <div class="card-body">


                            <table class="table table-striped">
                                <?php  $count = 0;  ?>
                                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input  id="method-<?php echo e($method->payment_method_id); ?>"   <?php  if($count==0): ?>  checked="checked" <?php  endif;  ?> required="required" type="radio" name="payment_method" value="<?php echo e($method->payment_method_id); ?>"/> </td>
                                    <td><label for="method-<?php echo e($method->payment_method_id); ?>"><?php echo e($method->label); ?></label></td>
                                </tr>
                                <?php  $count++;  ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>

                        </div>
                    </div>
                        <?php endif; ?>
                 </form>
                </div>

                <div class="col-md-4 ">
                    <table class="table table-hover">
                        <?php if(getCart()->hasDiscount()): ?>
                        <tr>
                            <td><?php echo e(__lang('discount')); ?></td>
                            <td><?php if(getCart()->discountType()=='P'): ?> <?php echo e(getCart()->getDiscount()); ?>% <?php else: ?>
                                <?php echo e(price(getCart()->getDiscount())); ?>

                                <?php endif; ?> <a href="<?php echo e(route('cart.remove-coupon')); ?>"><?php echo e(strtolower(__lang('remove'))); ?></a></td>
                        </tr>
                        <?php endif; ?>
                        <tr>

                            <td><h3><?php echo e(__lang('total')); ?></h3></td>
                            <td class="text-right"><h3><strong><?php echo e(price(getCart()->getCurrentTotal())); ?></strong></h3></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-6"  >
                            <a class="btn btn-link btn-block" href="<?php if(getCart()->isCertificate()): ?><?php echo e(route('student.student.certificates')); ?><?php else: ?><?php echo e(route('courses')); ?><?php endif; ?>">
                                <i class="fa fa-cart-plus"></i> <?php echo e(__lang('continue-shopping')); ?>

                            </a>

                        </div>
                        <div class="col-md-6"    >
                            <button type="button" onclick="$('#cart-form').submit()" class="btn btn-success btn-block">
                                <i class="fa fa-money-bill"></i>  <?php echo e(__lang('checkout')); ?>

                            </button>
                        </div>
                    </div>
                </div>

        </div>
        <?php else: ?>
            <div class="text-center"><h4><?php echo e(__lang('empty-cart')); ?></h4></div>
        <?php endif; ?>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/site/cart/index.blade.php ENDPATH**/ ?>