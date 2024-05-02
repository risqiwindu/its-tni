<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search-form'); ?>
    <form class="form-inline mr-auto" method="get" action="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'index'))); ?>">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="<?php echo e(request()->get('filter')); ?>"   name="filter" class="form-control" type="search" placeholder="<?php echo e(__lang('search')); ?>" aria-label="<?php echo e(__lang('search')); ?>" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
			<div >
                <a class="btn btn-primary" href="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'add'))); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('add-class')); ?></a>
                <button class="btn btn-success"  data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter"><i class="fa fa-filter"></i> <?php echo e(__lang('filter')); ?></button>

                <div class="collapse" id="collapseFilter">
                    <div class="card card-body">
                        <form id="filterform"   role="form"  method="get" action="<?php echo e(route('admin.lesson.index')); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="filter"><?php echo e(__lang('filter')); ?></label>
                                        <?php echo e(formElement($text)); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="group"><?php echo e(__lang('class-group')); ?></label>
                                        <?php echo e(formElement($select)); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="group"><?php echo e(__lang('sort')); ?></label>
                                        <?php echo e(formElement($sortSelect)); ?>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                    <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-success"><i class="fa fa-redo"></i> <?php echo e(__lang('clear')); ?></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <br><br>
                <div class="card">
					<div class="card-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th><?php echo e(__lang('id')); ?></th>
									<th><?php echo e(__lang('name')); ?></th>
                                    <th><?php echo e(__lang('class-type')); ?></th>
									<th><?php echo e(__lang('sort-order')); ?></th>
                                    <?php if(GLOBAL_ACCESS): ?>
                                    <th><?php echo e(__lang('created-by')); ?></th>
                                    <?php endif;  ?>
									<th class="text-right1" ><?php echo e(__lang('actions')); ?></th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($paginator as $row):  ?>
								<tr>
									<td><span class="label label-success"><?php echo e($row->id); ?></span></td>
								  	<td><?php echo e($row->name); ?></td>
                                    <td><?php echo e(($row->type=='s')? __lang('physical-location'):__lang('online')); ?>

                                    <?php if($row->type=='c'): ?>
                                        ( <a style="text-decoration: underline" href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'index','id'=>$row->id))); ?>"><?php echo e($lectureTable->getTotalLectures($row->id)); ?> <?php echo e(__lang('lectures')); ?></a> )
                                        <?php endif;  ?>
                                    </td>

                                    <td><?php echo e($row->sort_order); ?></td>
                                    <?php if(GLOBAL_ACCESS): ?>
                                        <td><?php echo e(adminName($row->admin_id)); ?></td>
                                    <?php endif;  ?>

									<td class="text-right1">

                                        <div class="dropdown d-inline mr-2">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cogs"></i> <?php echo e(__lang('Actions')); ?>

                                            </button>
                                            <ul class="dropdown-menu wide-btn" role="menu">

                                                <a class="dropdown-item"  href="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'edit','id'=>$row->id))); ?>"   ><i class="fa fa-edit"></i> <?php echo e(__lang('edit')); ?></a>
                                                <?php if($row->type == 'c'): ?>
                                                <a class="dropdown-item"  href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'index','id'=>$row->id))); ?>"    >  <i class="fa fa-desktop"></i> <?php echo e(__lang('manage-lectures')); ?></a>
                                                <?php endif;  ?>
                                                <a class="dropdown-item"  href="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'files','id'=>$row->id))); ?>"    ><i class="fa fa-download"></i> <?php echo e(__lang('manage-downloads')); ?></a>
                                                <a class="dropdown-item"  href="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'duplicate','id'=>$row->id))); ?>"  ><i class="fa fa-copy"></i> <?php echo e(__lang('duplicate')); ?></a>
                                                <a class="dropdown-item"  onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'lesson','action'=>'delete','id'=>$row->id))); ?>"    ><i class="fa fa-trash"></i> <?php echo e(__lang('delete')); ?></a>


                                            </ul>
                                        </div>





                                    </td>
								</tr>
								  <?php endforeach;  ?>

							</tbody>
						</table>

                        <?php echo e($paginator->appends(request()->input())->links()); ?>


					</div><!--end .box-body -->
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>


        <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
<!-- END SIMPLE MODAL MARKUP -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/lesson/index.blade.php ENDPATH**/ ?>