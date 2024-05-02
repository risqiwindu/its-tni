<?php $__env->startSection('page-title',$pageTitle); ?>
<?php $__env->startSection('inline-title',$pageTitle); ?>
<?php $__env->startSection('crumb'); ?>
    <?php if($group): ?>
        <li><a href="<?php echo e(route('courses')); ?>"><?php echo app('translator')->get('default.categories'); ?></a></li>
        <li><?php echo app('translator')->get('default.category'); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Start Events Area-->
    <section class="courses section grid-page">
        <div class="container">
        <div class="row">
            <aside class="col-lg-4 col-md-12 col-12">
                <div class="sidebar">

                <?php if($subCategories || $parent): ?>
                    <!-- Single Widget -->
                    <div class="widget categories-widget">
                        <h5 class="widget-title"><?php echo e(__lang('sub-categories')); ?></h5>
                        <ul class="custom">

                            <?php if($parent): ?>
                            <li>
                                <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($parent->id); ?>"><strong><?php echo e(__lang('parent')); ?>: <?php echo e($parent->name); ?></strong></a>
                            </li>
                            <?php endif; ?>

                                <?php if($subCategories): ?>
                                    <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->courses()->count()); ?></span></a>
                            </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                <?php endif; ?>

                    <!-- Single Widget -->
                    <div class="widget categories-widget">
                        <h5 class="widget-title"><?php echo e(__lang('categories')); ?></h5>
                        <ul class="custom">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($category->id); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->courses()->count()); ?></span></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->

                    <!-- Single Widget -->
                    <div class="widget">
                        <h5 class="widget-title"><?php echo e(__lang('Filter')); ?></h5>
                        <form id="filterform"  method="get" action="<?php echo e(route('courses')); ?>">

                            <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                            <div class="form-group mb-3">
                                <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                <?php echo e(formElement($text)); ?>

                            </div>
                            <div  class="form-group mb-3">
                                <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                <div><?php echo e(formElement($sortSelect)); ?></div>
                            </div>

                            <div   >
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-secondary"><?php echo e(__lang('clear')); ?></button>

                            </div>

                        </form>
                    </div>
                    <!--/ End Single Widget -->

                </div>
            </aside>
            <div class="col-md-8">

                    <div class="row">
                        <?php if($paginator->count()==0): ?>
                            <?php echo e(__lang('no-results')); ?>

                        <?php endif; ?>
                        <?php
                            $count=4;
                        ?>

                        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $course = \App\Course::find($course->id);
                                    if($count==2){
                                        $count=4;
                                    }
                                    else{
                                        $count = 2;
                                    }
                            ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <!-- Start Single Course -->
                            <div class="single-course wow fadeInUp" data-wow-delay=".<?php echo e($count); ?>s">

                                <div class="course-image">
                                    <?php if(!empty($course->picture)): ?>
                                        <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>">
                                            <?php if(!empty($course->picture)): ?>
                                                <img src="<?php echo e(resizeImage($course->picture,550,340)); ?>" alt="<?php echo e($course->name); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('img/course.png')); ?>" alt="<?php echo e($course->name); ?>">
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                    <p class="price"><?php echo e(sitePrice($course->fee)); ?></p>
                                </div>
                                <div class="content">
                                    <h3><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h3>
                                    <p><?php echo e(limitLength(strip_tags($course->short_description),100)); ?></p>
                                </div>
                                <div class="bottom-content">
                                    <ul class="review">
                                        <li><?php echo e(sitePrice($course->fee)); ?></li>
                                    </ul>
                                    <?php if($course->courseCategories()->count()>0): ?>
                                        <span class="tag">
                                    <i class="lni lni-tag"></i>
                                    <a href="<?php echo e(route('courses')); ?>?group=<?php echo e($course->courseCategories()->first()->id); ?>"><?php echo e($course->courseCategories()->first()->name); ?></a>
                                </span>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <!-- End Single Course -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="row">
                        <div class="col-12">
                        <?php
                            // add at the end of the file after the table
                                echo paginationControl(
                                // the paginator object
                                    $paginator,
                                    // the scrolling style
                                    'sliding',
                                    // the partial to use to render the control
                                    'edugrids.views.site.catalog.paginator',
                                    // the route to link to when a user clicks a control link
                                    route('courses')
                                );

                        ?>


                        </div>
                    </div>

            </div>
        </div>
        </div>
    </section>
    <!-- End Events Area-->




<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\public\templates/edugrids/views/site/catalog/courses.blade.php ENDPATH**/ ?>