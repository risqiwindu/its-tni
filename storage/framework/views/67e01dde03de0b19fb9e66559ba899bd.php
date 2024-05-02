<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
			<div >
				<div class="card">
					<div class="card-header">
						<header></header>
                          <a class="btn btn-primary float-right" href="<?php echo e(adminUrl(array('controller'=>'assignment','action'=>'add'))); ?>"><i class="fa fa-plus"></i> Add Homework</a>



					</div>
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
                                    <th><?php echo e(__lang('title')); ?></th>
									<th><?php echo e(__lang('session-course')); ?></th>
                                    <th><?php echo e(__lang('type')); ?></th>
									<th><?php echo e(__lang('created-on')); ?></th>
                                    <th><?php echo e(__lang('opening-date')); ?></th>
                                    <th><?php echo e(__lang('due-date')); ?></th>
                                    <th><?php echo e(__lang('submissions')); ?></th>
                                    <?php if(GLOBAL_ACCESS): ?>
                                    <th><?php echo e(__lang('created-by')); ?></th>
                                    <?php endif;  ?>
									<th   ><?php echo e(__lang('actions')); ?></th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($paginator as $row):  ?>
								<tr>
									<td><?php echo e($row->title); ?></td>
                                    <td><span ><?php echo e($row->course_name); ?></span></td>
                                    <td><?php echo e(($row->schedule_type=='s')? __lang('scheduled'):__lang('post-class')); ?></td>
									<td><?php echo e(showDate('d/m/Y',$row->created_at)); ?></td>
                                    <td><?php echo e(showDate('d/m/Y',$row->opening_date)); ?></td>
                                    <td><?php echo e(showDate('d/m/Y',$row->due_date)); ?></td>
								    <td>
                                        <?php echo e($submissionTable->getTotalSubmittedForAssignment($row->id)); ?> <a class="btn btn-primary btn-sm" href="<?php echo e(adminUrl(['controller'=>'assignment','action'=>'submissions','id'=>$row->id])); ?>"><?php echo e(__lang('view-all')); ?></a>
                                        </td>
                                    <?php if(GLOBAL_ACCESS): ?>
                                        <td><?php echo e(adminName($row->admin_id)); ?></td>
                                    <?php endif;  ?>
									<td  >
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo e(__lang('actions')); ?>

                                            </button>
                                            <div class="dropdown-menu dropleft wide-btn">
                                                <a href="<?php echo e(adminUrl(array('controller'=>'assignment','action'=>'edit','id'=>$row->id))); ?>" class="dropdown-item" data-toggle="tooltip" data-placement="top" data-original-title=""><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>

                                                <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'assignment','action'=>'delete','id'=>$row->id))); ?>"  class="dropdown-item"  ><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>
                                                <a onclick="openModal('<?php echo e(__lang('homework-info')); ?>','<?php echo e(adminUrl(['controller'=>'assignment','action'=>'view','id'=>$row->id])); ?>')" href="#" class="dropdown-item"  ><i class="fa fa-info"></i> <?php echo e(__lang('info')); ?></a>

                                            </div>
                                        </div>



                                    </td>
								</tr>
								  <?php endforeach;  ?>

							</tbody>
						</table>

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
		 'controller'=>'assignment',
		 'action'=>'index',
     )
 );
 ?>
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>


        <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->

<script type="text/javascript">
$(function(){
	$('.viewbutton').click(function(){
		 $('#info').text('Loading...');
		 var id = $(this).attr('data-id');
        $('#info').load('<?php echo e(url('admin/assignment/view')); ?>'+'/'+id);
		});
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/assignment/index.blade.php ENDPATH**/ ?>