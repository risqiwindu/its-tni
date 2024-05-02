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
    <section class="about-area them-2 pb-130 pt-50 recent-area">
        <div class="container">
            <div class="row">



                <div class="col-md-9">
                    <div class="row">
                        <?php if($paginator->count()==0): ?>
                            <?php echo e(__lang('no-results')); ?>

                        <?php endif; ?>
                        <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $course = \App\Course::find($course->id);
                                ?>
                                <div class="col-md-6">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>">
                                                <?php if(!empty($course->picture)): ?>
                                                    <div class="article-image" data-background="<?php echo e(resizeImage($course->picture,671,480,basePath())); ?>">
                                                    </div>
                                                <?php else: ?>
                                                    <div class="article-image" data-background="<?php echo e(asset('img/course.png')); ?>" >
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-category"><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e(courseType($course->type)); ?>

                                                </a> <div class="bullet"></div>
                                                <a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->lessons()->count()); ?> <?php echo e(__lang('classes')); ?></a>
                                            </div>
                                            <div class="article-title">
                                                <h2><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h2>
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
                                    route('sessions')
                                );

                        ?>
                    </div>
                </div>
                <div class="col-md-3">


                    <div class="card card-default" data-toggle="card-collapse" data-open="true">
                        <div class="card-header card-collapse-trigger">
                            <?php echo e(__lang('filter')); ?>

                        </div>
                        <div class="card-body">
                            <form id="filterform" class="form" role="form"  method="get" action="<?php echo e(route('sessions')); ?>">
                                <div class="form-group input-group margin-none">
                                    <div class=" margin-none">
                                        <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                                        <div class="form-group">
                                            <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                            <?php echo e(formElement($text)); ?>

                                        </div>
                                        <div  class="form-group">
                                            <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                            <?php echo e(formElement($sortSelect)); ?>

                                        </div>

                                        <div  >
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
        </div> <!-- row -->

    </section>


    <?php if(false): ?>
<div class="row">

    <div class="col-md-9">

        <?php  foreach($paginator as $row):  ?>

            <div class="panel panel-default paper-shadow" data-z="0.5">
                <div class="panel-body">

                    <div class="media media-clearfix-xs">
                        <div class="media-left text-center">
                            <div class="cover width-150 width-100pc-xs overlay cover-image-full hover margin-v-0-10">
                                <span class="img icon-block height-130 bg-default"></span>
                                <span class="overlay overlay-full padding-none icon-block bg-default">
                        <span class="v-center">


                            <?php  if(!empty($row->picture)):  ?>

                                <a href="<?php echo e($this->url('session-details',['id'=>$row->session_id,'slug'=>safeUrl($row->session_name)])); ?>" class="thumbnail" style="border: none; margin-bottom: 0px">
                                                <img src="<?php echo e(resizeImage($row->picture,150,130,url('/'))); ?>" >
                                            </a>
                            <?php  else:  ?>
                                <i class="fa fa-chalkboard-teacher"></i>
                            <?php  endif;  ?>
                        </span>
                    </span>
                                <a href="<?php echo e($this->url('session-details',['id'=>$row->session_id,'slug'=>safeUrl($row->session_name)])); ?>" class="overlay overlay-full overlay-hover overlay-bg-white">

                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4 class="text-headline margin-v-5-0"><a href="<?php echo e($this->url('session-details',['id'=>$row->session_id,'slug'=>safeUrl($row->session_name)])); ?>"><?php echo e($row->session_name); ?></a></h4>

                            <p><?php echo e(limitLength($row->short_description,300)); ?></p>
                            <p><table class="table">
                                <thead>
                                <tr>
                                    <th><?php echo e(__lang('start-date')); ?></th>
                                    <th><?php echo e(__lang('end-date')); ?></th>
                                    <th><?php echo e(__lang('enrollment-closes')); ?></th>
                                    <?php  if(setting('general_show_fee')==1): ?>
                                        <th><?php echo e(__lang('fee')); ?></th>
                                    <?php  endif;  ?>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo e(showDate('d/M/Y',$row->session_date)); ?></td>
                                    <td><?php echo e(showDate('d/M/Y',$row->session_end_date)); ?></td>
                                    <td><?php echo e(showDate('d/M/Y',$row->enrollment_closes)); ?></td>
                                    <?php  if(setting('general_show_fee')==1): ?>
                                        <td>    <?php  if(empty($row->payment_required)): ?>
                                                <?php echo e(__lang('free')); ?>

                                            <?php  else:  ?>
                                                <?php echo e(price($row->amount)); ?>

                                            <?php  endif;  ?></td>
                                    <?php  endif;  ?>
                                </tr>

                                </tbody>
                            </table></p>


                            <?php  $session = \Application\Entity\Session::find($row->session_id);  ?>
                            <hr class="margin-v-8" />

                            <div class="row">
                                <?php  foreach($session->sessionInstructors as $instructor): ?>
                                    <div class="col-md-4">
                                        <div class="media v-middle">
                                            <div class="media-left">
                                                <img src="<?php echo e(profilePictureUrl($instructor->account->picture,url('/'))); ?>" alt="People" class="img-circle width-40"/>
                                            </div>
                                            <div class="media-body">
                                                <h4><a href="#"  data-toggle="modal" data-target="#instructorModal<?php echo e($instructor->session_instructor_id); ?>"><?php echo e($instructor->account->name); ?> <?php echo e($instructor->account->last_name); ?></a><br/></h4>
                                                <?php echo e(__lang('instructor')); ?>

                                            </div>
                                        </div>
                                    </div>





                                <?php  endforeach;  ?>

                            </div>
                            <a href="<?php echo e($this->url('session-details',array('id'=>$row->session_id))); ?>" class="btn btn-primary float-right"><i class="fa fa-info-circle"></i> <?php echo e(__lang('details')); ?></a>



                        </div>
                    </div>

                </div>
            </div>

            <?php  foreach($session->sessionInstructors as $instructor): ?>

                <div class="modal fade" id="instructorModal<?php echo e($instructor->session_instructor_id); ?>" tabindex="-1" role="dialog" aria-labelledby="instructorModal<?php echo e($instructor->session_instructor_id); ?>Label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="instructorModal<?php echo e($instructor->session_instructor_id); ?>Label"><?php echo e($instructor->account->name); ?> <?php echo e($instructor->account->last_name); ?></h4>
                            </div>
                            <div class="modal-body">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <img src="<?php echo e(profilePictureUrl($instructor->account->picture,url('/'))); ?>" alt="People" class="img-circle width-200"/>
                                    </div>
                                    <div class="media-body">
                                        <?php echo e($instructor->account->account_description); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  endforeach;  ?>


        <?php  endforeach;  ?>


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
                'route' => 'courses',
            )
        );

         ?>

        <br/>
        <br/>


    </div>
    <div class="col-md-3">

           <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
            <div class="panel-heading panel-collapse-trigger">
                <h4 class="panel-title"><?php echo e(__lang('filter')); ?></h4>
            </div>
            <div class="panel-body">
                <form id="filterform" class="form" role="form"  method="get" action="<?php echo e($this->url('sessions')); ?>">
                    <div class="form-group input-group margin-none">
                        <div class="row margin-none">
                            <input type="hidden" name="group" value="<?php echo e($group); ?>"/>

                            <div class="form-group">
                                <label  for="filter"><?php echo e(__lang('search')); ?></label>
                                <?php echo e(formElement($text)); ?>

                            </div>
                            <div  class="form-group">
                                <label  for="group"><?php echo e(__lang('sort')); ?></label>
                                <?php echo e(formElement($sortSelect)); ?>

                            </div>

                            <div style="padding-top: 35px">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>
                                <button type="button" onclick="$('#filterform input, #filterform select').val(''); $('#filterform').submit();" class="btn btn-inverse"><?php echo e(__lang('clear')); ?></button>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>

</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/site/catalog/sessions.blade.php ENDPATH**/ ?>