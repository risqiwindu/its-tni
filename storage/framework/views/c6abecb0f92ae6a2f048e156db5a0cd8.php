<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
               route('admin.report.index')=>__lang('reports'),
            '#'=>__lang('homework')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li  class="nav-item"><a  class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(__lang('overview')); ?></a></li>
            <li class="nav-item"><a   class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(__lang('student-scores')); ?></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">


            <div role="tabpanel" class="tab-pane active" id="home">

                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__lang('homework')); ?></th>
                        <th><?php echo e(__lang('created-on')); ?></th>
                        <th><?php echo e(__lang('due-date')); ?></th>
                        <th><?php echo e(__lang('created-by')); ?></th>
                        <th><?php echo e(__lang('passmark')); ?></th>
                        <th><?php echo e(__lang('submissions')); ?></th>
                        <th><?php echo e(__lang('average-score')); ?></th>
                        <th><?php echo e(__lang('average-grade')); ?></th>
                        <th><?php echo e(__lang('total-passed')); ?></th>
                        <th><?php echo e(__lang('total-failed')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $session->assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($assignment->title); ?></td>
                            <td><?php echo e(showDate('d/M/Y',$assignment->created_at)); ?></td>
                            <td><?php echo e(showDate('d/M/Y',$assignment->due_date)); ?></td>
                            <td>
                                <?php if($assignment->admin->user): ?>
                                <?php echo e($assignment->admin->user->name); ?> <?php echo e($assignment->admin->user->last_name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($assignment->passmark); ?>%</td>
                            <td><?php echo e($assignment->assignmentSubmissions()->count()); ?></td>
                            <td><?php echo e(round($assignment->assignmentSubmissions()->avg('grade'),1)); ?></td>
                            <td><?php echo e($testGradeTable->getGrade($assignment->assignmentSubmissions()->avg('grade'))); ?></td>
                            <td><?php echo e($assignment->assignmentSubmissions()->where('grade','>=',$assignment->passmark)->count()); ?></td>
                            <td><?php echo e($assignment->assignmentSubmissions()->where('grade','<',$assignment->passmark)->count()); ?></td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                        <tr>
                            <th><?php echo e(__lang('student')); ?></th>
                            <th><?php echo e(__lang('average-score')); ?></th>
                            <th><?php echo e(__lang('average-grade')); ?></th>
                            <?php $__currentLoopData = $session->assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th>
                                    <?php echo e(limitLength($assignment->title,30)); ?>

                                </th>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $rowset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $student = \App\Student::find($row->id)  ?>
                            <?php if($student): ?>
                                <tr>
                                    <?php  $stats = $controller->getStudentAssignmentStats($row->id);  ?>
                                    <td>
                                        <?php if($student->user): ?>
                                        <?php echo e($student->user->name); ?> <?php echo e($student->user->last_name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(round($stats['average'],1)); ?>%</td>
                                    <td><?php echo e($testGradeTable->getGrade($stats['average'])); ?></td>
                                    <?php $__currentLoopData = $session->assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <?php  $result = $assignment->assignmentSubmissions()->where('student_id',$student->id)->orderBy('grade','desc')->first()  ?>
                                            <?php if($result): ?>
                                                <?php echo e(round($result->grade,1)); ?>% (<?php echo e($testGradeTable->getGrade($result->grade)); ?>)
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.report.report', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/report/homework.blade.php ENDPATH**/ ?>