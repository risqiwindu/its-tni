<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.assignment.index')=>__lang('homework'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div   ng-app="myApp" ng-controller="myCtrl"  >
			<div >
				<div class="card">

					<div class="card-body">

                        <form method="post" action="<?php echo e(adminUrl(array('controller'=>'assignment','action'=>$action,'id'=>$id))); ?>">
<?php echo csrf_field(); ?>
									<div class="form-group">
											<?php echo e(formLabel($form->get('title'))); ?>

										 <?php echo e(formElement($form->get('title'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('title'))); ?></p>

									</div>
														<div class="form-group">
											<?php echo e(formLabel($form->get('course_id'))); ?>



                                                            <select name="course_id" id="course_id"
                                                                    class="form-control select2">
                                                                <option value=""></option>
                                                                <?php $__currentLoopData = $form->get('course_id')->getValueOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php if(old('course_id',$form->get('course_id')->getValue()) == $option['value']): ?> selected <?php endif; ?> data-type="<?php echo e($option['attributes']['data-type']); ?>" value="<?php echo e($option['value']); ?>"><?php echo e($option['label']); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>



                                                            <p class="help-block"><?php echo e(formElementErrors($form->get('course_id'))); ?></p>

									</div>


                        <div class="form-group class-field">
                            <?php echo e(formLabel($form->get('schedule_type'))); ?>



                            <?php echo e(formElement($form->get('schedule_type'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('schedule_type'))); ?></p>

                        </div>






                        <div class="form-group scheduled">
                            <?php echo e(formLabel($form->get('opening_date'))); ?>

                            <?php echo e(formElement($form->get('opening_date'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('opening_date'))); ?></p>

                        </div>



                        <div class="form-group  scheduled">
                            <?php echo e(formLabel($form->get('due_date'))); ?>

                            <?php echo e(formElement($form->get('due_date'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('due_date'))); ?></p>

                        </div>

                        <div class="form-group post-class">

                        </div>
                        <div id="classbox" class="form-group post-class">
                            </div>







                        <div class="form-group">
											<?php echo e(formLabel($form->get('type'))); ?>

										 <?php echo e(formElement($form->get('type'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('type'))); ?></p>

									</div>



						 	<div class="form-group">
											<?php echo e(formLabel($form->get('instruction'))); ?>

										 <?php echo e(formElement($form->get('instruction'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('instruction'))); ?></p>

									</div>

                        <div class="form-group">
                            <?php echo e(formLabel($form->get('passmark'))); ?>

                            <?php echo e(formElement($form->get('passmark'))); ?>   <p class="help-block"><?php echo e(formElementErrors($form->get('passmark'))); ?></p>

                        </div>


                        <div class="form-group">
                            <?php echo e(formElement($form->get('notify'))); ?> <?php echo e(formLabel($form->get('notify'))); ?>

                        </div>

                        <div class="form-group">
                            <?php echo e(formElement($form->get('allow_late'))); ?> <?php echo e(formLabel($form->get('allow_late'))); ?>

                        </div>
                        <div class="form-group">
                            <input type="checkbox" value="1" name="notify_students" checked/>
                            <label for=""><?php echo e(__lang('notify-enrolled')); ?></label>

                        </div>




							<div class="form-footer">
								<button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
							</div>
						 </form>
					</div>
				</div><!--end .box -->
			</div><!--end .col-lg-12 -->
		</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/pickadate/themes/default.date.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/pickadate/themes/default.time.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/pickadate/themes/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/datatables/media/css/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('client/js/angular.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('client/app/attendance.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('client/vendor/ckeditor/ckeditor.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/legacy.js"></script>
    <script type="text/javascript">

        jQuery('.date').pickadate({
            format: 'yyyy-mm-dd'
        });

        CKEDITOR.replace('instruction', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });

        $(function(){
            $('#course_id').change(function(){
                checkType();

            });

            $('select[name=schedule_type]').change(function(){
                checkSchedule();
            });

        });

        function checkType(selected=null){
            var id = $('#course_id').val();
            console.log(id);
            var type = $('option:selected', $('#course_id')).attr('data-type');
            if(type=='s' || type=='b'){
                $('select[name=schedule_type]').val('s');
                $('.class-field').hide();

            }
            else{
                $('.class-field').show();
            }
            checkSchedule();
            console.log(type);
            $('#classbox').text('Loading...');
            $('#classbox').load('<?php echo e(basePath()); ?>/admin/assignment/sessionlessons/'+id+'?lesson_id='+selected);
        }

        function checkSchedule(){
            $('.scheduled,.post-class').hide();
            var type = $('select[name=schedule_type]').val();
            if(type=='s'){
                $('.scheduled').show();
            }
            else{
                $('.post-class').show();
            }
        }

        <?php if($action=='edit'):  ?>
        checkType('<?php echo e($row->lesson_id); ?>');
        <?php else:  ?>
        checkType();
        <?php endif;  ?>

        checkSchedule();
    </script>

    <script>
        var basePath = '<?php echo e(basePath()); ?>';
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/assignment/add.blade.php ENDPATH**/ ?>