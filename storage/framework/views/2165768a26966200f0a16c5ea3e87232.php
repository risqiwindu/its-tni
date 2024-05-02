<?php $__env->startSection('page-title',$course->name); ?>
<?php $__env->startSection('inline-title',$course->name); ?>
<?php $__env->startSection('crumb'); ?>
    <li><a href="<?php echo route('courses'); ?>"><?php echo e(__lang('courses')); ?></a></li>
    <li><?php echo e(__lang('course-details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Course Details Section Start -->
    <div class="course-details section">
        <div class="container">
            <div class="row">
                <!-- Course Details Wrapper Start -->
                <div class="col-lg-8 col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                    aria-selected="true"><?php echo e(__lang('details')); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab"
                                    data-bs-target="#curriculum" type="button" role="tab" aria-controls="curriculum"
                                    aria-selected="false"><?php echo e(__lang('classes')); ?></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="instructor-tab" data-bs-toggle="tab"
                                    data-bs-target="#instructor" type="button" role="tab" aria-controls="instructor"
                                    aria-selected="false"><?php echo e(__lang('instructors')); ?></button>
                        </li>
                        <?php if($course->has('certificates')): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="certificate-tab" data-bs-toggle="tab"
                                    data-bs-target="#certificate" type="button" role="tab" aria-controls="certificate"
                                    aria-selected="false"><?php echo e(__lang('certificates')); ?></button>
                        </li>
                        <?php endif; ?>



                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                             aria-labelledby="overview-tab">
                            <div class="course-overview">
                                <h3 class="title"><?php echo e($course->name); ?></h3>
                                <div class="text-center">
                                    <?php if(!empty($row->picture)): ?>
                                        <img class="rounded img-fluid img-thumbnail" src="<?php echo e(resizeImage($row->picture,400,300,url('/'))); ?>" >

                                    <?php endif; ?>
                                </div>
                                <p>
                                    <?php echo $row->description; ?>

                                </p>


                                <div class="bottom-content">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="button">
                                                <a href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>" class="btn"><?php echo e(__lang('enroll')); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <ul class="share">
                                                <li><span><?php if(setting('general_show_fee')==1): ?> <?php if(empty($row->payment_required)): ?><?php echo e(__lang('free')); ?><?php else: ?><?php echo e(price($row->fee)); ?><?php endif; ?> <?php endif; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                            <?php  $sessionVenue= $row->venue;  ?>
                            <div class="course-curriculum">
                                <ul class="curriculum-sections">

                                    <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="single-curriculum-section">
                                        <div class="section-header">
                                            <div class="section-left">

                                                <h5 class="title"><?php echo e($row2->name); ?>

                                                    <?php if(!empty($row2->lesson_date)): ?>
                                                         :   <?php echo e(__lang('starts')); ?> <?php echo e(showDate('d/M/Y',$row2->lesson_date)); ?>

                                                    <?php endif; ?>

                                                </h5>

                                            </div>
                                        </div>
                                        <div class="row pt-2 pb-2 pr-3 pl-3">
                                            <?php  if(!empty($row2->picture)):  ?>
                                            <div class="col-md-3">
                                                <a href="#" >
                                                    <img class="img-fluid  rounded" src="<?php echo e(resizeImage($row2->picture,300,300,url('/'))); ?>" >
                                                </a>
                                            </div>
                                            <?php  endif;  ?>

                                            <div class="<?php echo e((empty($row2->picture)? 'col-md-12 ps-5':'col-md-9')); ?> pb-5">
                                                <article class="readmore" ><?php echo $row2->description; ?>  </article>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </ul>
                                <div class="bottom-content">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="button">
                                                <a href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>" class="btn"><?php echo e(__lang('enroll')); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <ul class="share">
                                                <li><span><?php if(setting('general_show_fee')==1): ?> <?php if(empty($row->payment_required)): ?><?php echo e(__lang('free')); ?><?php else: ?><?php echo e(price($row->fee)); ?><?php endif; ?> <?php endif; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">

                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="course-instructor">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-image">
                                            <img src="<?php echo e(profilePictureUrl($instructor->user_picture)); ?>" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="profile-info">
                                            <h5><a href="<?php echo e(route('instructor',['admin'=>$instructor->admin_id])); ?>"><?php echo e($instructor->name.' '.$instructor->last_name); ?></a></h5>
                                            <p class="author-career"><?php echo e(\App\Admin::find($instructor->admin_id)->adminRole->name); ?></p>
                                            <p class="author-bio"><?php echo clean($instructor->about); ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="bottom-content">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="button">
                                            <a href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>" class="btn"><?php echo e(__lang('enroll')); ?></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul class="share">
                                            <li><span><?php if(setting('general_show_fee')==1): ?> <?php if(empty($row->payment_required)): ?><?php echo e(__lang('free')); ?><?php else: ?><?php echo e(price($row->fee)); ?><?php endif; ?> <?php endif; ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($course->has('certificates')): ?>
                            <div class="tab-pane fade" id="certificate" role="tabpanel" aria-labelledby="certificate-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__lang('certificate')); ?></th>
                                        <th><?php echo e(__lang('price')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $course->certificates()->where('enabled',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($certificate->name); ?></td>
                                            <td><?php echo e(price($certificate->price)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End Course Details Wrapper -->
                <!-- Start Course Sidebar -->
                <div class="col-lg-4 col-12">
                    <div class="course-sidebar">
                        <div class="sidebar-widget">
                            <table id="course-specs" class="table table-striped">
                                <?php  if(!empty($row->session_date)): ?>
                                <tr>
                                    <td ><?php echo e(__lang('starts')); ?></td>
                                    <td  ><?php echo e(showDate('d/M/Y',$row->session_date)); ?></td>
                                </tr>
                                <?php  endif;  ?>

                                <?php  if(!empty($row->session_end_date)): ?>
                                <tr>
                                    <td ><?php echo e(__lang('ends')); ?></td>
                                    <td><?php echo e(showDate('d/M/Y',$row->session_end_date)); ?></td>
                                </tr>
                                <?php  endif;  ?>
                                <?php  if(!empty($row->enrollment_closes)): ?>
                                <tr>
                                    <td ><?php echo e(__lang('enrollment-closes')); ?></td>
                                    <td><?php echo e(showDate('d/M/Y',$row->enrollment_closes)); ?></td>
                                </tr>
                                <?php  endif;  ?>

                                <?php  if(!empty($row->length)): ?>
                                <tr>

                                    <td><?php echo e(__lang('length')); ?></td>
                                    <td><?php echo e($row->length); ?></td>
                                </tr>
                                <?php  endif;  ?>


                                <?php  if(!empty($row->effort)): ?>
                                <tr>

                                    <td><?php echo e(__lang('effort')); ?></td>
                                    <td><?php echo e($row->effort); ?></td>
                                </tr>
                                <?php  endif;  ?>
                                <?php  if(!empty($row->enable_chat)): ?>
                                <tr>

                                    <td><?php echo e(__lang('live-chat')); ?></td>
                                    <td><?php echo e(__lang('enabled')); ?></td>
                                </tr>
                                <?php  endif;  ?>
                                <?php  if(setting('general_show_fee')==1): ?>
                                <tr>
                                    <td><?php echo e(__lang('fee')); ?></td>
                                    <td><?php  if(empty($row->payment_required)): ?>
                                        <?php echo e(__lang('free')); ?>

                                        <?php  else:  ?>
                                        <?php echo e(price($row->fee)); ?>

                                        <?php  endif;  ?></td>
                                </tr>
                                <?php  endif;  ?>





                            </table>
                            <div class="button">
                                <a href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>" class="btn btn-block"><i class="fa fa-cart-plus"></i>  <?php echo e(__lang('enroll')); ?></a>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- End Course Sidebar -->
            </div>
        </div>
    </div>
    <!-- Course Details Section End -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/public/templates/edugrids/views/site/catalog/course.blade.php ENDPATH**/ ?>