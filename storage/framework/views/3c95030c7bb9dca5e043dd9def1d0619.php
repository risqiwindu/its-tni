<?php $__env->startSection('page-title',$pageTitle); ?>
<?php $__env->startSection('inline-title',$pageTitle); ?>

<?php $__env->startSection('content'); ?>

    <section class="about-area them-2 pb-130 pt-50 recent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-5">

                    <?php if($subCategories || $parent): ?>
                    <ul class="list-group mb-5">
                        <li class="list-group-item active"><?php echo e(__lang('sub-categories')); ?></li>
                        <?php if($parent): ?>
                            <li class="list-group-item">
                                <a class="link" href="<?php echo e(route('courses')); ?>?group=<?php echo e($parent->id); ?>" ><strong><?php echo e(__lang('parent')); ?>: <?php echo e($parent->name); ?></strong></a>
                            </li>
                            <?php endif; ?>

                       <?php if($subCategories): ?>
                        <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item">
                                <a  class="link" href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>" ><?php echo e($category->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                    </ul>
                    <?php endif; ?>

                    <ul class="list-group">
                        <li class="list-group-item active"><?php echo e(__lang('categories')); ?></li>
                        <li class="list-group-item"><a class="link"  href="<?php echo e(route('courses')); ?>"><?php echo e(__lang('all-courses')); ?></a></li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item <?php if(request()->get('group') == $category->id): ?> active <?php endif; ?>"><a  class="link"  href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>"><?php echo e($category->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                        <div class="card mt-3  " data-toggle="card-collapse" data-open="false">
                            <div class="card-header card-collapse-trigger">
                                 <?php echo e(__lang('Filter')); ?>

                            </div>
                            <div class="card-body">
                                <form id="filterform" class="form" role="form"  method="get" action="<?php echo e(route('courses')); ?>">
                                    <div class="form-group input-group margin-none">
                                        <div class=" margin-none">
                                            <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                                            <div class="form-group">
                                                <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                                <?php echo e(formElement($text)); ?>

                                            </div>
                                            <div  class="form-group">
                                                <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                              <div><?php echo e(formElement($sortSelect)); ?></div>
                                            </div>

                                            <div   >
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                                <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-secondary"><?php echo e(__lang('clear')); ?></button>

                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>


                </div>

                <div class="col-md-9">
                    <?php if($paginator->count()==0): ?>
                        <?php echo e(__lang('no-results')); ?>

                    <?php endif; ?>

                    <div class="row">
                        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <!-- Single course -->
                            <div class="single-course mb-70">
                                <?php if(!empty($course->picture)): ?>
                                <div class="course-img mb-2">
                                    <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><img class="course-img img-fluid" src="<?php echo e(asset($course->picture)); ?>" alt="<?php echo e($course->name); ?>"></a>
                                </div>
                                <?php endif; ?>
                                <div class="course-caption">
                                    <div class="course-cap-top">
                                        <h4><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h4>
                                    </div>
                                    <div class="course-cap-mid d-flex justify-content-between">
                                        <p><?php echo e(limitLength(strip_tags($course->short_description),50)); ?></p>
                                    </div>
                                    <div class="course-cap-bottom d-flex justify-content-between">
                                        <ul>
                                            <li><?php echo e(sitePrice($course->fee)); ?></li>
                                        </ul>
                                        <span><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>" class="btn btn-primary float-right btn-sm"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <div>
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
                    </div>
                </div>

                </div>
            </div> <!-- row -->
        </div>
    </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/public/templates/education/views/site/catalog/courses.blade.php ENDPATH**/ ?>