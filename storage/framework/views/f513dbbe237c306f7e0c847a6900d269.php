<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.lesson.index')=>__lang('classes'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
			<div >
				<div class="card">
					<div class="card-header">
						<header></header>

                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addlecture">
                            <i class="fa fa-plus"></i> <?php echo e(__lang('add-lecture')); ?>

                        </button>

					</div>
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th><?php echo e(__lang('sort-order')); ?></th>
									<th><?php echo e(__lang('name')); ?></th>
                                    <th><?php echo e(__lang('content')); ?></th>
                                    <th><?php echo e(__lang('downloads')); ?></th>
									<th class="text-right1" ><?php echo e(__lang('actions')); ?></th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($paginator as $row):  ?>
								<tr>
									<td><span class="label label-success"><?php echo e($row->sort_order); ?></span></td>
								  	<td><?php echo e($row->title); ?></td>

                                    <td><a style="text-decoration: underline" href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'content','id'=>$row->id])); ?>"><?php echo e($lecturePageTable->getTotalLecturePages($row->id)); ?> <?php echo e(__lang('items')); ?></a></td>

                                    <td><?php echo e($lectureFileTable->getTotalForDownload($row->id)); ?> <?php echo e(__lang('files')); ?></td>

									<td class="text-right1">
                                        <a href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'content','id'=>$row->id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('manage-content')); ?>"><i class="fa fa-file-video"></i></a>
										<a href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'edit','id'=>$row->id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'files','id'=>$row->id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('manage-downloads')); ?>"><i class="fa fa-download"></i></a>
                                        <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'delete','id'=>$row->id))); ?>"  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></a>
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
		 'controller'=>'lecture',
		 'action'=>'index',
		 'id'=>$id
     )
 );
 ?>
					</div><!--end .box-body -->
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="addlecture">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'add','id'=>$lesson->id])); ?>">
<?php echo csrf_field(); ?>
                    <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__lang('add-lecture-to')); ?> <?php echo e($lesson->name); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title"><?php echo e(__lang('lecture-title')); ?></label>
                                <input name="title" class="form-control " required="required" value="" type="text">
                            </div>
                            <div class="form-group">
                                <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>                            <input name="sort_order" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                            </div>
                        </div>
                  <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                  </div>
                    </form>
                </div>
              </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/lecture/index.blade.php ENDPATH**/ ?>