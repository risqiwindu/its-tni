<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=> __lang('Student Forum')
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<!--container starts-->
<div >
    <!--primary starts-->

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <form id="filterform" class="form-inline" role="form"  method="get" action="<?php echo e(adminUrl(['controller'=>'forum','action'=>'index'])); ?>">


                    <div class="form-group" style="min-width: 200px">
                        <label class="sr-only" for="session_id"><?php echo e(__lang('session-course')); ?></label>
                        <?php if(false): ?>
                        <?php echo e(formElement($select)); ?>

                        <?php endif; ?>
                        <select name="course_id" id="course_id"
                                class="form-control select2">
                            <option value=""></option>
                            <?php $__currentLoopData = $form->get('course_id')->getValueOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if(old('course_id',$form->get('course_id')->getValue()) == $option['value']): ?> selected <?php endif; ?> data-type="<?php echo e($option['attributes']['data-type']); ?>" value="<?php echo e($option['value']); ?>"><?php echo e($option['label']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>



                    </div> &nbsp;

                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__lang('filter')); ?></button>

                </form>
            </div>
            <div class="col-md-6">
                <div class="btn-group float-right">

                    <a class="btn btn-primary" href="<?php echo e(adminUrl(['controller'=>'forum','action'=>'addtopic'])); ?>"><i class="fa fa-plus"></i> <?php echo e(__lang('add-topic')); ?></a>

                </div>
            </div>
        </div>

        <div class="table-responsive_ pt-2">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th><?php echo e(__lang('Topic')); ?></th>
                    <th><?php echo e(__lang('Session/Course')); ?></th>
                    <th><?php echo e(__lang('Created By')); ?></th>
                    <th><?php echo e(__lang('Added On')); ?></th>
                    <th ><?php echo e(__lang('Replies')); ?></th>
                    <th><?php echo e(__lang('Last Reply')); ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($topics as $row):  ?>
                    <?php $topic = \App\ForumTopic::find($row->id);  ?>
                    <tr>
                        <td><?php echo e($row->title); ?></td>
                        <td><?php echo e($row->course_name); ?></td>
                        <td>
                            <?php echo e($topic->user->name); ?>

                        </td>
                        <td><?php echo e(showDate('d/M/Y',$row->created_at)); ?></td>
                        <td><?php echo e(($topic->forumPosts->count()-1)); ?></td>
                        <td><?php if($topic->forumPosts->count()-1 > 0): ?>
                                <?php echo e(showDate('D, d M Y g:i a',$topic->forumPosts()->orderBy('id','desc')->first()->created_at)); ?>

                            <?php endif;  ?>
                        </td>
                        <td >
                             <div class="button-group dropup">
                                                   <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <?php echo e(__lang('actions')); ?>

                                                   </button>
                                                   <div class="dropdown-menu wide-btn">
                                                       <a   class="dropdown-item"  href="<?php echo e(adminUrl(['controller'=>'forum','action'=>'topic','id'=>$row->id])); ?>"><?php echo e(__lang('View')); ?></a>

                                                       <a class="dropdown-item"  onclick="return confirm('Are you sure you want to delete this topic and all its posts?')"  href="<?php echo e(adminUrl(['controller'=>'forum','action'=>'deletetopic','id'=>$row->id])); ?>"><?php echo e(__lang('Delete Topic')); ?></a>

                                                   </div>
                                                 </div>

                        </td>
                    </tr>

                <?php endforeach;  ?>

                </tbody>
            </table>
        </div>
        <?php
        // add at the end of the file after the table
        echo paginationControl(
        // the paginator object
            $topics,
            // the scrolling style
            'sliding',
            // the partial to use to render the control
            null,
            // the route to link to when a user clicks a control link
            array(
                'route' => 'admin/default',
                'controller'=>'forum',
                'action'=>'index'
            )
        );

        ?>
    </div>


</div>

<!--container ends-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/forum/index.blade.php ENDPATH**/ ?>