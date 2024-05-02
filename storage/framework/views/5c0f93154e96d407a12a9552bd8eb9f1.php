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

<div class="row">

    <div class="col-md-9">
        <div class="row">
        <?php  foreach($paginator as $row):  ?>
            <?php  if($row->type=='c'): ?>
            <?php  $type='course';  ?>
            <?php  else: ?>
            <?php  $type='session';  ?>
            <?php  endif;  ?>
            <?php
                $course = \App\Course::find($row->id);
            ?>

        <div class="col-md-6">
            <article class="article article-style-c">
                <div class="article-header">
                    <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>">
                        <?php if(!empty($row->picture)): ?>
                            <div class="article-image" data-background="<?php echo e(resizeImage($row->picture,671,480,basePath())); ?>">
                            </div>
                        <?php else: ?>
                            <div class="article-image" data-background="<?php echo e(asset('img/course.png')); ?>" >
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="article-details">
                    <div class="article-category"><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e(courseType($row->type)); ?>

                        </a> <div class="bullet"></div>
                        <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->lessons()->count()); ?> <?php echo e(__lang('classes')); ?></a>
                    </div>
                    <div class="article-title">
                        <h2><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($row->name); ?></a></h2>
                    </div>
                    <div class="article-details"><?php echo e(limitLength($course->short_description,300)); ?></div>

                    <div class="row pl-2">
                        <?php $__currentLoopData = $course->admins()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="article-user col-md-6">
                                <img alt="image" src="<?php echo e(profilePictureUrl($admin->user->picture)); ?>">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="#" data-toggle="modal" data-target="#adminModal-<?php echo e($admin->id); ?>"><?php echo e(limitLength(adminName($admin->id),20)); ?></a>
                                    </div>
                                    <div class="text-job"><?php echo e($admin->user->role->name); ?></div>
                                </div>
                            </div>

                        <?php $__env->startSection('footer'); ?>
                            <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
                            <div class="modal fade" tabindex="-1" role="dialog" id="adminModal-<?php echo e($admin->id); ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo e($admin->user->name); ?> <?php echo e($admin->user->last_name); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <figure class="avatar mr-2 avatar-xl text-center">
                                                        <img src="<?php echo e(profilePictureUrl($admin->user->picture)); ?>"  >
                                                    </figure>
                                                </div>
                                                <div class="col-md-p"><p><?php echo clean($admin->about); ?></p></div>
                                            </div>

                                        </div>
                                        <div class="modal-footer bg-whitesmoke br">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $__env->stopSection(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>



                    <div class="article-footer">

                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-primary btn-block" href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a>
                            </div>
                        </div>

                    </div>
                </div>

            </article>
        </div>
        <?php  endforeach;  ?>

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
                    route('courses')
                );

        ?>

        <br/>
        <br/>


    </div>

    <div class="col-md-3">

        <?php if($subCategories || $parent): ?>
            <ul class="list-group mb-5">
                <li class="list-group-item active"><?php echo e(__lang('sub-categories')); ?></li>
                <?php if($parent): ?>
                    <li class="list-group-item">
                        <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($parent->id); ?>" ><strong><?php echo e(__lang('parent')); ?>: <?php echo e($parent->name); ?></strong></a>
                    </li>
                <?php endif; ?>

                <?php if($subCategories): ?>
                    <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>" ><?php echo e($category->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        <?php endif; ?>

        <ul class="list-group">
            <li class="list-group-item active"><?php echo e(__lang('categories')); ?></li>
            <li class="list-group-item"><a href="<?php echo e(route('courses')); ?>"><?php echo e(__lang('all-courses')); ?></a></li>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item <?php if(request()->get('group') == $category->id): ?> active <?php endif; ?>"><a href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>"><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

        <div class="card mt-3  " data-toggle="card-collapse" data-open="false">
            <div class="card-header card-collapse-trigger">
                <?php echo e(__lang('Filter')); ?>

            </div>
            <div class="card-body">
                <form id="filterform" class="form" role="form"  method="get" action="<?php echo e(route('courses')); ?>">
                    <div class="form-group input-group margin-none">
                        <div class="margin-none">
                            <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                            <div class="form-group">
                                <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                <?php echo e(formElement($text)); ?>

                            </div>
                            <div  class="form-group">
                                <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                <?php echo e(formElement($sortSelect)); ?>

                            </div>

                            <div >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-secondary"><?php echo e(__lang('clear')); ?></button>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\resources\views/site/catalog/courses.blade.php ENDPATH**/ ?>