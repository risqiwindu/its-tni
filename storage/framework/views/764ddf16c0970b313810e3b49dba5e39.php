<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div >
    <div >
        <div class="card">
            <div class="card-header">
                <header>

                    <p class="well"><?php echo e(__lang('active-student-def')); ?></p>
                </header>

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><?php echo e(__lang('id')); ?></th>
                            <th></th>
                            <th><?php echo e(__lang('first-name')); ?></th>
                            <th><?php echo e(__lang('last-name')); ?></th>
                            <th><?php echo e(__lang('enrolled-courses')); ?></th>
                            <th><?php echo e(__lang('last-seen')); ?></th>
                            <th class="text-right1"  ><?php echo e(__lang('actions')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($paginator as $row):  ?>
                            <tr>
                                <td><span class="label label-success"><?php echo e($row->student_id); ?></span></td>
                                <td>
                                    <img  class="mr-3 rounded-circle"    width="50" src="<?php echo e(profilePictureUrl($row->picture)); ?>" />
                                </td>
                                <td><?php echo e(htmlentities($row->name)); ?></td>
                                <td><?php echo e(htmlentities($row->last_name)); ?></td>
                                <td><strong><?php echo e($studentSessionTable->getTotalForStudent($row->student_id)); ?></strong>

                                </td>
                                <td><?php echo e(showDate('d/M/Y',$row->last_seen)); ?></td>

                                <td >
                                    <a href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'edit','id'=>$row->student_id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>
                                    <a href="#" onclick="openModal('<?php echo e(__lang('enroll')); ?>','<?php echo e(adminUrl(array('controller'=>'student','action'=>'enroll','id'=>$row->student_id))); ?>')"  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('Enroll')); ?>"   title="<?php echo e(__lang('Enroll')); ?>" type="button" class="btn btn-xs btn-primary btn-equal"  ><i class="fa fa-plus"></i></a>

                                    <button   data-id="<?php echo e($row->student_id); ?>" data-toggle="modal" data-target="#simpleModal" title="View" type="button" class="btn btn-xs btn-primary btn-equal viewbutton"  ><i class="fa fa-eye"></i></button>

                                </td>
                            </tr>
                        <?php endforeach;  ?>

                        </tbody>
                    </table>
                </div>
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
                        'controller'=>'student',
                        'action'=>'active'
                    )
                );
                ?>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="simpleModalLabel"><?php echo e(__lang('student-details')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info">

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('<?php echo e(__lang('loading')); ?>...');
                var id = $(this).attr('data-id');
                $('#info').load('<?php echo e(adminUrl(array('controller'=>'student','action'=>'view'))); ?>'+'/'+id);
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/student/active.blade.php ENDPATH**/ ?>