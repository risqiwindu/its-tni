<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo e(__lang('add-new')); ?></a>
<br> <br>
<div class="table-responsive_ ">
    <table class="table   table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo e(__lang('user')); ?></th>
            <th><?php echo e(__lang('items')); ?></th>
            <th><?php echo e(__lang('payment-method')); ?></th>
            <th><?php echo e(__lang('amount')); ?></th>
            <th><?php echo e(__lang('currency')); ?></th>
            <th><?php echo e(__lang('created-on')); ?></th>
            <th><?php echo e(__lang('status')); ?></th>
            <th  ><?php echo e(__lang('actions')); ?></th>
        </tr>

        </thead>
        <tbody>



        <?php foreach($paginator as $row):  ?>
        <tr>
            <td><?php echo e($row->id); ?></td>
            <td>
                <?php if($row->user): ?>
                <?php echo e($row->user->name); ?> <?php echo e($row->user->last_name); ?> (<?php echo e($row->user->email); ?>)
                <?php else: ?>
                N/A
                <?php endif; ?>

            </td>
            <td><a  class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo e($row->id); ?>" aria-expanded="false" aria-controls="collapseExample<?php echo e($row->id); ?>">
                    <?php
                        $cart = unserialize($row->cart);
                        try{

                            echo $cart->getTotalItems().' '.__lang('items');
                        }
                        catch(\Exception $ex){
                            echo '0 '.__lang('items');
                        }
                    ?> <span class="caret"></span></a>
            </td>
            <td>
                <?php if($row->paymentMethod): ?>
                    <?php echo e($row->paymentMethod->name); ?>

                <?php endif; ?>
            </td>
            <td><?php echo e(formatCurrency($row->amount,$row->currency->country->currency_code)); ?></td>
            <td><?php echo e($row->currency->country->currency_code); ?></td>
            <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
            <td>
                <p>
                    <?php if($row->paid == 1):  ?>
                    <span class="text-highlight-success"><?php echo e(__lang('paid')); ?></span>
                    <?php else:  ?>
                    <span class="text-highlight-danger"><?php echo e(__lang('unpaid')); ?></span>
                    <?php endif;  ?>
                </p>
            </td>
            <td>
                <?php if($row->paid == 0):  ?>
                <div class="button-group dropleft">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e(__lang('actions')); ?>

                    </button>
                    <div class="dropdown-menu">

                        <a  class="dropdown-item" onclick="return confirm('<?php echo e(__lang('invoice-approve-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'approvetransaction','id'=>$row->id))); ?>"><i class="fa fa-check"></i> <?php echo e(__lang('approve')); ?></a>
                        <a   class="dropdown-item"  href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'deleteinvoice','id'=>$row->id))); ?>" onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')"><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>

                    </div>
                </div>

                <?php endif;  ?>

            </td>
        </tr>
        <tr>
            <td colspan="9" style="height: 0px">
                <div class="collapse" id="collapseExample<?php echo e($row->id); ?>">
                    <?php if(is_object($cart)): ?>
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
                                <th><?php echo e(__lang('fee')); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach($cart->getSessions() as $session): ?>
                            <tr>
                                <td><?php echo e($session->name); ?></td>
                                <td><?php echo e(price($session->fee,$row->currency_id)); ?></td>
                            </tr>

                            <?php endforeach;  ?>

                            </tbody>
                        </table>
                        <?php if($cart->hasDiscount()): ?>
                        <p>
                            <strong><?php echo e(__lang('discount')); ?>:</strong> <?php echo e($cart->getDiscount()); ?>% <br/>
                            <?php if(\App\Coupon::find($cart->getCouponId())):  ?>
                            <strong><?php echo e(__lang('coupon-code')); ?>:</strong> <?php echo e(\App\Coupon::find($cart->getCouponId())->code); ?>

                            <?php endif;  ?>
                        </p>
                        <?php endif;  ?>
                    </div>
                    <?php endif; ?>
                    <?php endif;  ?>
                </div>
            </td>
        </tr>
        <?php endforeach;  ?>





        </tbody>
    </table>
    <div><?php echo e($paginator->links()); ?></div>

</div><!--end .box-body -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>


    <form method="post" action="<?php echo e(route('admin.student.create-invoice')); ?>">
        <?php echo csrf_field(); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__lang('create-invoice')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user_id"><?php echo e(__lang('user')); ?></label>
                        <select required  name="user_id" id="user_id" ></select>
                    </div>
                    <div class="form-group">
                        <label for="items"><?php echo e(__lang('courses')); ?></label>
                        <select required name="courses[]" id="courses" class="form-control select2" multiple>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?> (<?php echo e(price($course->fee)); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount"><?php echo e(__lang('amount')); ?></label>
                        <input type="text" class="digit form-control" name="amount" placeholder="<?php echo e(__lang('optional')); ?>">
                       <p><small><?php echo e(__lang('invoice-amount-hint')); ?></small></p>
                    </div>
                    <div class="form-group">
                        <label for="currency_id"><?php echo e(__lang('currency')); ?></label>
                        <select name="currency_id" id="currency_id" class="select2 form-control">
                            <option></option>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->country->currency_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p><small><?php echo e(__lang('invoice-currency-hint')); ?></small></p>
                    </div>

                    <div class="form-group">
                        <label for="paid"><?php echo e(__lang('status')); ?></label>
                        <select name="paid" id="paid" class="form-control">
                            <option value="0"><?php echo e(__lang('unpaid')); ?></option>
                            <option value="1"><?php echo e(__lang('paid')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__lang('create')); ?></button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script type="text/javascript">
        $(function (){
            $('#user_id').select2({
                placeholder: "<?php echo app('translator')->get('default.search-users'); ?>...",
                minimumInputLength: 3,
                dropdownParent: $('#exampleModal'),
                ajax: {
                    url: '<?php echo e(route('admin.students.search')); ?>',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            term: $.trim(params.term)
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }

            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/student/invoices.blade.php ENDPATH**/ ?>