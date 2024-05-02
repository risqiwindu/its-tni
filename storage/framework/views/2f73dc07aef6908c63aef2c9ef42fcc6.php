<?php $__env->startSection('pageTitle',$course->name.': '.$classRow->name); ?>
<?php $__env->startSection('innerTitle',$course->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card profile-widget  mt-5">
        <div class="profile-widget-header">

            <?php if(!empty($classRow->picture)): ?>
                <img  class="rounded-circle profile-widget-picture" src="<?php echo e(resizeImage($classRow->picture,400,300,url('/'))); ?>" >
            <?php else: ?>
                <img  class="rounded-circle profile-widget-picture"  src="<?php echo e(asset('img/course.png')); ?>" >
            <?php endif; ?>
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-value  pt-2 pb-1"><?php echo e($classRow->name); ?></div>
                </div>
                <div class="profile-widget-item">
                    <?php  if($previous):  ?>
                    <a class="btn btn-primary btn-lg" href="<?php echo e($previous); ?>"><i class="fa fa-chevron-circle-left"></i> <?php echo e(__lang('previous')); ?></a>
                    <?php  endif;  ?>

                    <?php  if($next):  ?>
                    <a class="btn btn-primary btn-lg " href="<?php echo e($next); ?>"><?php echo e(__lang('start-class')); ?> <i class="fa fa-chevron-circle-right"></i></a>
                    <?php  endif;  ?>
                </div>
            </div>
        </div>
        <div class="profile-widget-description">
            <!-- Nav tabs -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item"><a  class="nav-link active"  href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> <?php echo e(__lang('introduction')); ?></a></li>
                <li class="nav-item"><a  class="nav-link"  href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-table"></i> <?php echo e(__lang('table-of-contents')); ?></a></li>
                <li class="nav-item"><a   class="nav-link"  href="#resources" aria-controls="resources" role="tab" data-toggle="tab"><i class="fa fa-download"></i> <?php echo e(__lang('resources')); ?></a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p><?php echo $classRow->introduction; ?>    </p>
                        </div>
                        <div class="panel-footer" style="min-height: 65px">
                            <?php  if($previous):  ?>
                            <a class="btn btn-primary btn-lg" href="<?php echo e($previous); ?>"><i class="fa fa-chevron-circle-left"></i> <?php echo e(__lang('previous')); ?></a>
                            <?php  endif;  ?>

                            <?php  if($next):  ?>
                            <a class="btn btn-primary btn-lg float-right" href="<?php echo e($next); ?>"><?php echo e(__lang('start-class')); ?> <i class="fa fa-chevron-circle-right"></i></a>
                            <?php  endif;  ?>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <?php  $count=1; foreach($lectures as $row):  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo e($count.'. '.$row->title); ?>

                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo e(__lang('content')); ?></th>
                                    <th><?php echo e(__lang('type')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($lecturePageTable->getPaginatedRecords(false,$row->id) as $page):  ?>
                                <tr>
                                    <td><?php echo e($page->title); ?></td>
                                    <td><?php
                                            switch($page->type){
                                                case 't':
                                                    echo __lang('text');
                                                    break;
                                                case 'v':
                                                    echo  __lang('video');
                                                    break;
                                                case 'c':
                                                    echo __lang('html-code');
                                                    break;
                                                case 'i':
                                                    echo __lang('image');
                                                    break;
                                                case 'q':
                                                    echo __lang('quiz');
                                                    break;
                                                case 'l':
                                                    echo  __lang('video');
                                                    break;
                                            }  ?></td>
                                </tr>
                                <?php  endforeach;  ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer" style="min-height: 65px">
                            <a class="btn btn-primary btn-lg float-right" href="<?php echo e(route('student.course.lecture',['course'=>$sessionId,'lecture'=>$row->id])); ?>"><?php echo e(__lang('start-lecture')); ?> <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <?php  $count++;  ?>
                    <?php  endforeach;  ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="resources">
                    <?php  if($downloads->count() > 0): ?>
                    <a href="<?php echo e(route('student.course.allclassfiles',array('id'=>$classRow->id,'course'=>$sessionId))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('download-all')); ?> <?php echo e(__lang('files')); ?>"><i class="fa fa-download"></i> <?php echo e(__lang('download-all')); ?></a>
                    <?php  endif;  ?>
                    <table class="table table-hover mt-2">
                        <thead>
                        <tr>
                            <th><?php echo e(__lang('file')); ?></th>
                            <th ></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($downloads as $download):  ?>
                        <td><?php echo e(basename($download->path)); ?></td>

                        <td class="text-right">
                            <?php  if ($fileTable->getTotalForDownload($classRow->id)> 0):  ?>
                            <a href="<?php echo e(route('student.course.classfile',array('id'=>$download->id,'course'=>$sessionId))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('download')); ?> <?php echo e(__lang('file')); ?>"><i class="fa fa-download"></i> <?php echo e(__lang('download')); ?></a>

                            <?php  else: ?>
                            <strong><?php echo e(__lang('no-files-available')); ?></strong>
                            <?php  endif;  ?>
                        </td>
                        </tr>

                        <?php  endforeach;  ?>

                        </tbody>
                    </table>

                </div>
                <div role="tabpanel" class="tab-pane" id="progress">

                </div>
                <?php  if(!empty($sessionRow->enable_discussion)): ?>
                <div role="tabpanel" class="tab-pane" id="discuss">
                    <form class="form" method="post" action="<?php echo e($this->url('application/default',['controller'=>'student','action'=>'adddiscussion'])); ?>">
                        <?php echo csrf_field(); ?>
                        <p><?php echo e(__lang('ask-a-question')); ?></p>
                        <div class="modal-body">

                            <div class="form-group">
                                <label><?php echo e(__lang('Recipients')); ?></label>
                                <select name="admin_id[]" class="form-control select2" data-options="required:true" required="required" multiple="multiple"><option value=""></option>
                                    <option value="admins"><?php echo e(__lang('administrators')); ?></option>
                                    <?php  foreach($instructors as $instructor): ?>
                                    <option value="<?php echo e($instructor->admn_id); ?>"><?php echo e($instructor->name.' '.$instructor->last_name); ?></option>
                                    <?php  endforeach;  ?>

                                </select>
                            </div>

                            <input type="hidden" name="session_id" value="<?php echo e($sessionId); ?>"/>
                            <div class="form-group">
                                <?php echo e(formLabel($form->get('subject'))); ?>

                                <?php echo e(formElement($form->get('subject'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('subject'))); ?></p>

                            </div>




                            <div class="form-group">
                                <?php echo e(formLabel($form->get('question'))); ?>

                                <?php echo e(formElement($form->get('question'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('question'))); ?></p>

                            </div>

                            <button type="submit" class="btn btn-primary"><?php echo e(__lang('submit')); ?></button>

                        </div>

                    </form>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 20px">
                            <h2><?php echo e(__lang('your-questions')); ?></h2>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo e(__lang('subject')); ?></th>
                                    <th><?php echo e(__lang('created-on')); ?></th>
                                    <th><?php echo e(__lang('recipients')); ?></th>
                                    <th><?php echo e(__lang('replied')); ?></th>
                                    <th class="text-right1" style="width:90px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($discussions as $row):  ?>
                                <tr>
                                    <td><?php echo e($row->subject); ?>

                                    </td>

                                    <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                                    <td>

                                        <?php  if($row->admin==1): ?>
                                        <?php echo e(__lang('administrators')); ?>,
                                        <?php  endif;  ?>

                                        <?php  foreach($accountTable->getDiscussionAccounts($row->id) as $row2):  ?>
                                        <?php echo e($row2->name.' '.$row2->last_name); ?>,
                                        <?php  endforeach;  ?>



                                    </td>

                                    <td><?php echo e(boolToString($row->replied)); ?></td>

                                    <td class="text-right">
                                        <a href="<?php echo e($this->url('application/viewdiscussion',array('id'=>$row->discussion_id))); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i> <?php echo e(__lang('view')); ?></a>

                                    </td>
                                </tr>
                                <?php  endforeach;  ?>

                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>
                <?php  endif;  ?>

            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/student/course/class.blade.php ENDPATH**/ ?>