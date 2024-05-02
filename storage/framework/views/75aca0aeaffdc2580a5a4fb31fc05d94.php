<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.sessions')=>__lang('courses'),
            '#'=>__lang('students')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div >
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('id')); ?></th>
                        <th><?php echo e(__lang('name')); ?></th>
                        <th><?php echo e(__lang('classes-attended')); ?></th>
                        <th><?php echo e(__lang('progress')); ?></th>
                        <th><?php echo e(__lang('enrollment-code')); ?></th>
                        <th  ><?php echo e(__lang('actions')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($paginator as $row):  ?>
                        <tr>
                            <td><span class="label label-success"><?php echo e($row->student_id); ?></span></td>
                            <td><?php echo e($row->name); ?> <?php echo e($row->last_name); ?></td>
                            <td><strong><?php $attended= $attendanceTable->getTotalDistinctForStudentInSession($row->student_id,$id); echo $attended ?></strong>

                            </td>
                            <td>

                                <div class="text-center" >
                                    <small><?php
                                            $percent = 100 * @($attended/($totalLessons));
                                            if($percent >=0 ){
                                                echo $percent;
                                            }
                                            else{
                                                echo 0;
                                                $percent = 0;
                                            }

                                            ?>%</small>

                                        <div class="progress progress_sm"  >
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e($percent); ?>" style="width: <?php echo e($percent); ?>%;" aria-valuenow="<?php echo e($percent); ?>"></div>
                                        </div>

                                </div>
                            </td>
                            <td>
                                <?php echo e($row->reg_code); ?>

                            </td>

                            <td >
                                <a href="<?php echo e(adminUrl(array('controller'=>'session','action'=>'stats','id'=>$row->id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('student-progress')); ?>"><i class="fa fa-chart-bar"></i></a>


                                <a  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('Un-enroll')); ?>"  onclick="return confirm('Are you sure you want to unenroll this student ?')" href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'unenroll','id'=>$row->student_id))); ?>?session=<?php echo e($id); ?>"  class="btn btn-xs btn-primary btn-equal" ><i class="fa fa-minus"></i></a>

                                <button   data-id="<?php echo e($row->student_id); ?>" data-toggle="modal" data-target="#simpleModal" title="Student Details" type="button" class="btn btn-xs btn-primary btn-equal viewbutton"  ><i class="fa fa-user"></i></button>
                                <a href="<?php echo e(adminUrl(array('controller'=>'student','action'=>'edit','id'=>$row->student_id))); ?>" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit-student')); ?>"><i class="fa fa-edit"></i></a>

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
                        'controller'=>'student',
                        'action'=>'sessionstudents',
                        'id'=>$id
                    )
                );
                ?>
    </div><!--end .col-lg-12 -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="simpleModalLabel"><?php echo e(__lang('student-details')); ?></h4>

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body" id="info">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('<?php echo e(adminUrl(array('controller'=>'student','action'=>'view'))); ?>'+'/'+id);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/student/sessionstudents.blade.php ENDPATH**/ ?>