<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search-form'); ?>
    <form class="form-inline mr-auto" method="get" action="<?php echo e(adminUrl(array('controller'=>'report','action'=>'index'))); ?>">
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

        <div class="card">

            <div class="card-body">


                <button class="btn btn-success"  data-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter"><i class="fa fa-filter"></i> <?php echo e(__lang('filter')); ?></button>
                <br> <br>
                <div class="collapse" id="collapseFilter">
                    <div class="card card-body">
                        <form id="filterform"   role="form"  method="get" action="<?php echo e(adminUrl(array('controller'=>'report','action'=>'index'))); ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="filter"><?php echo e(__lang('filter')); ?></label>
                                        <?php echo e(formElement($text)); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="group"><?php echo e(__lang('category')); ?></label>
                                        <?php echo e(formElement($select)); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="group"><?php echo e(__lang('sort')); ?></label>
                                        <?php echo e(formElement($sortSelect)); ?>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only" for="group"><?php echo e(__lang('type')); ?></label>
                                        <?php echo e(formElement($typeSelect)); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                    <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-success"><i class="fa fa-redo"></i> <?php echo e(__lang('clear')); ?></button>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>



<div class="table-responsive_">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('id')); ?></th>
                        <th><?php echo e(__lang('session-course')); ?></th>
                        <th><?php echo e(__lang('type')); ?></th>
                        <th><?php echo e(__lang('enrolled-students')); ?></th>
                        <th><?php echo e(__lang('reports')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($paginator as $row):  ?>
                        <tr>
                            <td><span class="label label-success"><?php echo e($row->id); ?></span></td>
                            <td><?php echo e($row->name); ?></td>
                            <td><?php
                                switch($row->type){
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
                                ?></td>

<td>
    <?php $session = \App\Course::find($row->id); echo $session->studentCourses()->count()  ?>
</td>

                            <td>

                                <div class="btn-group dropup">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-chart-bar"></i> <?php echo e(__lang('reports')); ?>

                                    </button>
                                    <ul class="dropdown-menu wide-btn float-right animation-slide" role="menu" style="text-align: left;">
                                      <li><a class="dropdown-item" href="<?php echo e(adminUrl(['controller'=>'report','action'=>'classes','id'=>$row->id])); ?>"><i class="fa fa-desktop"></i> <?php echo e(__lang('classes')); ?></a></li>
                                        <li><a  class="dropdown-item" href="<?php echo e(adminUrl(['controller'=>'report','action'=>'students','id'=>$row->id])); ?>"><i class="fa fa-users"></i>  <?php echo e(__lang('students')); ?></a></li>
                                        <li><a class="dropdown-item"  href="<?php echo e(adminUrl(['controller'=>'report','action'=>'tests','id'=>$row->id])); ?>"><i class="fa fa-check-circle"></i> <?php echo e(__lang('tests')); ?></a></li>
                                        <li><a  class="dropdown-item" href="<?php echo e(adminUrl(['controller'=>'report','action'=>'homework','id'=>$row->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(__lang('homework')); ?></a></li>

                                    </ul>
                                </div>

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
                        'controller'=>'report',
                        'action'=>'index',
                        'filter'=>$filter,
                        'group'=>$group,
                        'sort'=>$sort,
                        'type'=>$type
                    )
                );
                ?>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/report/index.blade.php ENDPATH**/ ?>