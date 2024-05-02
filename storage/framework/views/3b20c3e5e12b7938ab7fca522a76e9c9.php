<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <div class="row" style="margin-bottom:  10px;">

        <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('first-name')); ?>:</strong></div>
        <div class="col-md-4"><?php echo e(htmlentities( $row->name)); ?></div>



        <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('last-name')); ?></strong></div>
        <div class="col-md-4"><?php echo e(htmlentities( $row->last_name)); ?></div>

    </div>

       <div class="row" style="margin-bottom:  10px;">

           <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('telephone-number')); ?></strong></div>
           <div class="col-md-4"><?php echo e(htmlentities( $row->mobile_number)); ?></div>



        <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('email')); ?></strong></div>
        <div class="col-md-4"><?php echo e(htmlentities( $row->email)); ?></div>

    </div>

      <div class="row" style="margin-bottom:  10px;">

        <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('status')); ?></strong></div>
        <div class="col-md-4"><?php echo e(htmlentities( (empty($row->enabled))? 'Inactive':'Active')); ?></div>

          <div class="col-md-2 text-highlight-support5 "><strong><?php echo e(__lang('display-picture')); ?></strong></div>
          <div class="col-md-4">


              <?php if(!empty($row->picture) && isUrl($row->picture)): ?>
                  <img src="<?php echo e($row->picture); ?>" style="max-width: 200px" alt=""/>
              <?php elseif(!empty($row->picture) && isImage($row->picture)): ?>
                  <img src="<?php echo e(resizeImage($row->picture,200,200,basePath())); ?>" alt=""/>

              <?php endif;  ?>
          </div>




    </div>





        <?php foreach($custom as $row):  ?>
           <div class="row">
        <?php if($row->type=='checkbox'): ?>
        <div  style="margin-bottom:  10px;" class="col-md-4 text-highlight-support5 "><strong><?php echo e(htmlentities( $row->name)); ?></strong></div>
        <div  style="margin-bottom:  10px;" class="col-md-8"><?php echo e(htmlentities( boolToString($row->value))); ?></div>
       <?php elseif($row->type=='file'):  ?>
                <div  style="margin-bottom:  10px;" class="col-md-4 text-highlight-support5 "><strong><?php echo e(htmlentities( $row->name)); ?></strong></div>
                <div  style="margin-bottom:  10px;" class="col-md-8">
                    <?php if(isImage($row->value)): ?>

                        <img src="<?php echo e(resizeImage($row->value, 200, 200, basePath())); ?>" alt=""/> <br/>
                    <?php endif;  ?>
                    <a target="_blank" href="<?php echo e(basePath().'/'.$row->value); ?>"><?php echo e(__lang('view-file')); ?></a>

                </div>
        <?php else:  ?>
                <div  style="margin-bottom:  10px;" class="col-md-4 text-highlight-support5 "><strong><?php echo e(htmlentities( $row->name)); ?></strong></div>
                <div  style="margin-bottom:  10px;" class="col-md-8"><?php echo e(htmlentities( $row->value)); ?></div>
        <?php endif;  ?>
           </div>
         <?php endforeach;  ?>








    </div>

        <div>
            <h4><?php echo e(__lang('enrolled-in')); ?></h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?php echo e(__lang('course-session')); ?></th>
                    <th><?php echo e(__lang('completed-classes')); ?></th>
                    <th><?php echo e(__lang('enrolled-on')); ?></th>
                </tr>
                </thead>
                <tbody>
                <tbody>
                <?php foreach(\App\Student::find($id)->studentCourses()->whereHas('course')->get() as $session): ?>
                    <tr>
                        <td><?php echo e($session->course->name); ?></td>
                        <td><?php $attended= $attendanceTable->getTotalDistinctForStudentInSession($id,$session->course_id); echo $attended ?>/<?php echo e(\App\Course::find($session->course_id)->lessons()->count()); ?></td>
                        <td><?php echo e(showDate('d/M/Y',$session->created_at)); ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>


                </tbody>
            </table>
        </div>

    <?php if(false): ?>
    <div>
        <h2><?php echo e(__lang('classes-attended')); ?></h2>
        <table class="table table-stripped">
            <thead>
            <tr>
                <th><?php echo e(__lang('class')); ?></th>
                <th><?php echo e(__lang('session-course')); ?></th>
                <th><?php echo e(__lang('date')); ?></th>
                <th><?php echo e(__lang('actions')); ?></th>
            </tr>
            </thead>
            <?php foreach($attendance as $row):  ?>
            <tr>
                <td><?php echo e(htmlentities( $row->lesson_name)); ?></td>
                <td><?php echo e(htmlentities( $row->session_name)); ?></td>
                <td><?php echo e(htmlentities( showDate('d/M/Y',$row->attendance_date))); ?></td>
                <td><button title="Delete" onclick="openPopup('<?php echo e(adminUrl(array('controller'=>'student','action'=>'deleteattendance','id'=>$row->attendance_id))); ?>')" href=""  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></button></td>
            </tr>
            <?php endforeach;  ?>
        </table>
    </div>
    <?php endif;  ?>




</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(adminLayout(), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/resources/views/admin/student/view.blade.php ENDPATH**/ ?>