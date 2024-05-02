<?php $__env->startSection('pageTitle',$course->name); ?>
<?php $__env->startSection('innerTitle',$course->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('courses')=>__lang('courses'),
            '#'=>$pageTitle
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <section class="about-area them-2 pb-130 pt-50 recent-area">
        <div class="container">

            <div class="row">
                <div class="col-md-4 mb-2">
                    <?php if(!empty($row->picture)): ?>
                        <img class="rounded img-fluid img-thumbnail" src="<?php echo e(resizeImage($row->picture,400,300,url('/'))); ?>" >
                    <?php else: ?>
                        <img class="rounded img-fluid img-thumbnail"  src="<?php echo e(asset('img/course.png')); ?>" >
                    <?php endif; ?>
                </div>
                <div class="col-md-8">

                    <h3><?php echo e($course->name); ?></h3>
                    <p>
                        <?php echo clean($row->short_description); ?>

                    </p>

                    <a class="btn btn-primary  btn-lg" href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>"><i class="fa fa-cart-plus"></i> <?php echo e(__lang('enroll')); ?> <?php if(setting('general_show_fee')==1): ?> (<?php if(empty($row->payment_required)): ?><?php echo e(__lang('free')); ?><?php else: ?><?php echo e(price($row->fee)); ?><?php endif; ?>) <?php endif; ?></a>
                </div>

            </div>


            <div class="row mt-5">
                <div class="col-md-8">
                    <ul class="nav nav-pills mb-2" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table"></i> <?php echo e(__lang('classes')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-chalkboard-teacher"></i> <?php echo e(__lang('instructors')); ?></a>
                        </li>
                        <?php if($course->has('certificates')): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="certificate" aria-selected="false"><i class="fa fa-file-pdf"></i> <?php echo e(__lang('certificates')); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card">
                                <div class="card-body">
                                    <?php echo $row->description; ?>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

                            <?php  $sessionVenue= $row->venue;  ?>

                            <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="row" style="width: 100%;">
                                            <div class="col-md-7"><h4><?php echo e($row2->name); ?></h4></div>
                                            <div class="col-md-5">
                                                <?php if(!empty($row2->lesson_date)): ?>
                                                    <div class="card-header-action text-right">
                                                        <?php echo e(__lang('starts')); ?> <?php echo e(showDate('d/M/Y',$row2->lesson_date)); ?>

                                                    </div>

                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php  if(!empty($row2->picture)):  ?>
                                            <div class="col-md-3">
                                                <a href="#" >
                                                    <img class="img-fluid  rounded" src="<?php echo e(resizeImage($row2->picture,300,300,url('/'))); ?>" >
                                                </a>
                                            </div>
                                            <?php  endif;  ?>

                                            <div class="col-md-<?php echo e((empty($row2->picture)? '12':'9')); ?>">
                                                <article class="readmore" ><?php echo $row2->description; ?>  </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 text-center">

                                                    <img alt="image" src="<?php echo e(profilePictureUrl($instructor->user_picture)); ?>" class="rounded-circle img-fluid author-box-picture">


                                            </div>
                                            <div class="col-md-7">
                                                <div class="author-box-details_">
                                                    <div class="author-box-name">
                                                        <a href="#"><?php echo e($instructor->name.' '.$instructor->last_name); ?></a>
                                                    </div>
                                                    <div class="author-box-job"><?php echo e(\App\Admin::find($instructor->admin_id)->adminRole->name); ?></div>
                                                    <div class="author-box-description">
                                                        <p><?php echo clean($instructor->about); ?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if($course->has('certificates')): ?>
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                <table class="table">
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
                <div class="col-md-4">
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

                    <a class="btn btn-primary btn-block btn-lg" href="<?php echo e(route('cart.add',['course'=>$course->id])); ?>"><i class="fa fa-cart-plus"></i> <?php echo e(__lang('enroll')); ?></a>


                </div>

            </div>



        </div>

    </section>







<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/vendor/readmore/readmore.min.js')); ?>"></script>
    <script>
        $(function(){
            $('article.readmore').readmore({
                collapsedHeight : 90
            });
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            console.log('clicked');
            $('#timetable article.readmore').readmore({
                collapsedHeight : 90
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <style>
        #course-specs tr:first-child > td{
            border-top: none
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/site/catalog/course.blade.php ENDPATH**/ ?>