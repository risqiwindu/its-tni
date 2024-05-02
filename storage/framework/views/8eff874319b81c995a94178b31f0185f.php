<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.discuss.index')=>__lang('instructor-chat'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div >
    <div class="row">
        <div class="col-md-12">
            <h3><?php echo e(__lang('question')); ?></h3>
            <div class="card">
                <div class="card-header">
                    <?php echo e(__lang('on')); ?> <?php echo e(showDate('r',$row->created_at)); ?> <?php echo e(__lang('by')); ?> <a class="viewbutton" style="text-decoration: underline" href="#"  data-id="<?php echo e($row->student_id); ?>" data-toggle="modal" data-target="#simpleModal"><?php echo e($row->name.' '.$row->last_name); ?></a>
                    . <?php echo e(__lang('recipients')); ?>:
                    <?php if($row->admin==1): ?>
                    <?php echo e(__lang('administrators')); ?>,
                    <?php endif;  ?>

                    <?php foreach($accounts as $row2):  ?>
                    <?php echo e($row2->name.' '.$row2->last_name); ?>,
                    <?php endforeach;  ?>

                </div>
                <div class="card-body">

                    <h4> <?php echo e($row->subject); ?></h4>

                    <blockquote>
                        <?php echo clean(nl2br($row->question)); ?>

                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">


            <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'discuss','action'=>'addreply','id'=>$row->id])); ?>">
             <?php echo csrf_field(); ?>   <div class="form-group">
                    <textarea required="required" placeholder="<?php echo e(__lang('reply-here')); ?>" class="form-control" name="reply" id="reply"  rows="3"><?php echo e(old('reply')); ?></textarea>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__lang('reply')); ?></button>
                </div>
            </form>

        </div>
    </div>
<?php if(!empty($total)): ?>
    <div class="row">
        <div class="col-md-12">
            <h3><?php echo e(__lang('replies')); ?></h3>
            <?php foreach($paginator as $row):  ?>

            <div class="card">
                <div class="card-header">
                    <?php echo e(__lang('by')); ?> <strong> <?php echo e($row->name); ?> <?php echo e($row->last_name); ?>  <?php if($row->role_id==1): ?>(<?php echo e(__lang('Admin')); ?>)<?php endif; ?>
                   </strong> <?php echo e(__lang('on')); ?> <?php echo e(showDate('r',$row->created_at)); ?>

                </div>
                <div class="card-body">
                    <p><?php echo clean(nl2br($row->reply)); ?></p>
                </div>

            </div>
            <?php endforeach;  ?>


        </div>
    </div>
<?php endif;  ?>






    <?php
    // add at the end of the file after the table
    echo paginationControl(
    // the paginator object
        $paginator,
        // the scrolling style
        'sliding',
        // the partial to use to render the control
        null,
        // the route to link to when a user clicks a control link
        array(
            'route' => 'admin/default',
            'controller'=>'discuss',
            'action'=>'viewdiscussion',
            'id'=>$row->id

        )
    );
    ?>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="simpleModalLabel"><?php echo e(__lang('student-details')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="info">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('<?php echo e(adminUrl(array('controller'=>'student','action'=>'view'))); ?>'+'/'+id);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/discuss/viewdiscussion.blade.php ENDPATH**/ ?>