<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.sessions')=>__('default.courses'),
            '#'=>isset($pageTitle)?$pageTitle:''
        ]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
    span.required{
        color: red;
        font-weight: bold;
    }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-header">
            <h2> <small><?php echo e(__lang('setup-your-session')); ?></small> </h2>

            <div class="clearfix"></div>
        </div>
        <div class="card-body">

            <form id="sessionform" class="form-horizontal" role="form" method="post" action="<?php echo e(adminUrl(array('controller'=>'student','action'=>$action.'session','id'=>$id,'type'=>$type))); ?>">
            <?php echo csrf_field(); ?>

            <!-- Smart Wizard -->
                <p><?php echo clean(__lang('fill-each-sec-help',['req'=>'<span class="required">*</span>'])); ?> </p>
                <div id="course_wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                            <span class="step_descr">
                                              <?php echo e(__lang('info')); ?><br />
                                              <small><?php echo e(__lang('basic-session-data')); ?></small>
                                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                            <span class="step_descr">
                                              <?php echo e(__lang('options')); ?><br />
                                              <small><?php echo e(__lang('session-options')); ?></small>
                                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="step_no">3</span>
                            <span class="step_descr">
                                              <?php echo e(__lang('scheduling')); ?><br />
                                              <small><?php echo e(__lang('start-end-dates')); ?></small>
                                          </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <span class="step_no">4</span>
                            <span class="step_descr">
                                              <?php echo e(__lang('instructors')); ?><br />
                                              <small><?php echo e(__lang('session-instructors')); ?></small>
                                          </span>
                            </a>
                        </li>
                    </ul>
                    <div id="step-1">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><span class="required">*</span><?php echo e(__lang('session-name')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('session_name'))); ?>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('short-description')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('short_description'))); ?>

                                        <p class="help-block"><?php echo e(formElementErrors($form->get('short_description'))); ?></p>
                                            <div>
                                                <span class="chars-remaining"></span> <?php echo e(__lang('characters-remaining')); ?>

                                                (<span class="chars-max"></span> <?php echo e(strtolower(__lang('maximum'))); ?>)
                                            </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('session-description')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('description'))); ?>

                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('venue')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('venue'))); ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group" style="margin-bottom:10px">
                                    <div >
                                        <label for="image" class="control-label"><?php echo e(__lang('cover-image')); ?>  (<?php echo e(__lang('optional')); ?>)</label><br />

                                    </div>



                                    <div >
                                        <div class="image"><img data-name="image" src="<?php echo e($display_image); ?>" alt="" id="thumb" /><br />
                                            <?php echo e(formElement($form->get('picture'))); ?>

                                            <a class="pointer" onclick="image_upload('image', 'thumb');"><?php echo e(__lang('browse')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#thumb').attr('src', '<?php echo e($no_image); ?>'); $('#image').attr('value', '');"><?php echo e(__lang('clear')); ?></a></div>

                                    </div>





                                </div>
                            </div>


                        </div>



                    </div>
                    <div id="step-2">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('payment-required')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('payment_required'))); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('session-fee')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('amount'))); ?>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('status')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('session_status'))); ?>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="enable_discussion" class="control-label"><?php echo e(__lang('enable-forum')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('enable_forum'))); ?>

                                        <p class="help-block"><?php echo e(formElementErrors($form->get('enable_forum'))); ?></p>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="enable_discussion" class="control-label"><?php echo e(__lang('enable-discussions')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('enable_discussion'))); ?>

                                        <p class="help-block"><?php echo e(formElementErrors($form->get('enable_discussion'))); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="enable_discussion" class="control-label"><?php echo e(__lang('capacity')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('capacity'))); ?>

                                        <p class="help-block"><?php echo e(formElementErrors($form->get('capacity'))); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="enable_discussion" class="control-label"><?php echo e(__lang('enforce-capacity')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('enforce_capacity'))); ?>

                                        <p class="help-block"><?php echo e(formElementErrors($form->get('enforce_capacity'))); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div id="step-3">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><span class="required">*</span><?php echo e(__lang('session-start-date')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('session_date'))); ?>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('session-end-date')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('session_end_date'))); ?>

                                    </div>
                                </div>
                            </div>


                        </div>



                        <div class="row">



                            <div class="col-md-6">
                                <div class="form-group">
                                    <div >
                                        <label for="password1" class="control-label"><?php echo e(__lang('registration-closes')); ?></label>
                                    </div>
                                    <div >
                                        <?php echo e(formElement($form->get('enrollment_closes'))); ?>

                                    </div>
                                </div>
                            </div>





                        </div>



                    </div>
                    <div id="step-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="password1" class="control-label"><?php echo e(__lang('session-instructors')); ?> (<?php echo e(__lang('optional')); ?>)</label>

                                    <?php echo e(formElement($form->get('session_instructor_id[]'))); ?>


                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <!-- End SmartWizard Content -->


            </form>


        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(basePath() . '/client/vendor/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?php echo e(basePath().'/client/vendor/datatables/media/js/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo e(basePath().'/client/vendor/stupidtable/stupidtable.min.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo e(basePath()); ?>/client/vendor/pickadate/legacy.js"></script>
    <!-- FastClick -->
    <script src="<?php echo e(basePath()); ?>/client/themes/cpanel/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo e(basePath()); ?>/client/themes/cpanel/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo e(basePath()); ?>/client/themes/cpanel/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <script>


            CKEDITOR.replace('description', {
                filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
                filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
                filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
            });



        $('#course_wizard').smartWizard({
            enableAllSteps: true,
            enableFinishButton: true,
            labelNext:'<?php echo e(__lang('Next')); ?>', // label for Next button
            labelPrevious:'<?php echo e(__lang('Previous')); ?>', // label for Previous button
            labelFinish:'<?php echo e(__lang('Finish')); ?>'  // label for Finish button
        });
        CKEDITOR.on('instanceReady', function() {
            $('#course_wizard').smartWizard('fixHeight');
        });

    </script>
    <script type="text/javascript"><!--
        function sortTable() {
            console.log('table sorted');

            $("#selectedTable").stupidtable();
            var $th_to_sort = $("#selectedTable").find("thead th").eq(1);
            $th_to_sort.stupidsort();

            $th_to_sort.stupidsort('asc');
        }


        var table;
        function initializeTable(){

            var dtOptions = {

                "ordering": true,
                columnDefs: [{
                    orderable: false,
                    targets: "no-sort"
                },
                    {
                        "targets": [ 2 ],
                        "visible": false
                    }
                ]

            };

            if ( !$.fn.dataTable.isDataTable( '#datatable' ) ) {
                table = $('#datatable').DataTable(dtOptions);
            }
            $('.dataTables_filter input').attr("placeholder", "Class or Group name");
            showList();
            jQuery(function(){
                $('.date').pickadate({
                    format: 'yyyy-mm-dd'
                });
                table.$('.date').pickadate({
                    format: 'yyyy-mm-dd'
                });

                table.$('.time').pickatime({
                    interval: 15
                });
            });

            $("#select_all").change(function(){  //"select all" change
                var status = this.checked; // "select all" checked status
                table.$('.cbox').each(function(){ //iterate all listed checkbox items
                    this.checked = status; //change ".checkbox" checked status
                });
                initializeTable(table);
                showList();

            });



            function showList(){
                $('#selectedlist').text('');
                table.$('.cbox').each(function(){ //iterate all listed checkbox items
                    if(this.checked){
                        var id = $(this).val();
                        //$('#selectedlist').prepend('<li>'+table.$('#lesson_name_'+id).text()+' (position : '+table.$('input[name=sort_order_'+id+']').val()+')</li>');
                        $('#selectedlist').append('<tr class="sort_row" data-id="'+id+'"><td>'+table.$('#lesson_name_'+id).text()+'</td><td class="sort_cell">'+table.$('input[name=sort_order_'+id+']').val()+'</td><td>'+table.$('input[name=lesson_date_'+id+']').val()+'</td></tr>');
                    } //change ".checkbox" checked status
                });

                sortTable();
            }


            table.$('input').change(function(){ //".checkbox" change

                showList();
            });

            table.$('.cbox').change(function(){ //".checkbox" change
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if(this.checked == false){ //if this item is unchecked
                    $("#select_all")[0].checked = false; //change "select all" checked status to false
                }

                //check "select all" if all checkbox items are checked
                if (table.$('.cbox:checked').length == table.$('.cbox').length ){
                    $("#select_all")[0].checked = true; //change "select all" checked status to true
                }
                showList();
            });
        }


        initializeTable();

        //--></script>
    <script>


        function image_upload(field, thumb) {
            console.log('image upload');
            $('#dialog').remove();

            $('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="<?php echo e(basePath()); ?>/admin/filemanager?&token=true&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

            $('#dialog').dialog({
                title: '<?php echo e(addslashes(__lang('Image Manager'))); ?>',
                close: function (event, ui) {
                    if ($('#' + field).attr('value')) {
                        $.ajax({
                            url: '<?php echo e(basePath()); ?>/admin/filemanager/image?&image=' + encodeURIComponent($('#' + field).val()),
                            dataType: 'text',
                            success: function(data) {
                                $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                            }
                        });
                    }
                },
                bgiframe: false,
                width: 800,
                height: 570,
                resizable: true,
                modal: false,
                position: "center"
            });
        };

        $(function(){

            $('textarea[name=short_description]').maxLength();;

            $('#sessionform').submit(function(e){
                e.preventDefault();
                table.destroy();
                $(this).unbind('submit');
                $(this).submit();
            });

            $('#addClassForm').submit(function(e){
                $('#addClassBtn').text('Saving...');
                e.preventDefault();
                $.post( $(this).attr('action'),$(this).serialize(), function( data ) {
                    table.destroy();
                    $( "#classes" ).prepend( data );
                    $('#addClassBtn').text('Save Changes');
                    $('#addClassModal').modal('hide');
                    $('#addClassForm').find("input[type=text], textarea").val("");
                    jQuery('.date').pickadate({
                        format: 'yyyy-mm-dd'
                    });

                    jQuery('.time').pickatime({
                        interval: 15
                    });

                    //table= $('#datatable').DataTable(dtOptions);
                    initializeTable();
                });
            })

            $("#selectedTable tbody").sortable({ opacity:0.6, update: function() {

                    var counter = 1;
                    //console.log(order);

                    $('.sort_row').each(function(){
                        $(this).find('.sort_cell').text(counter);
                        //update field
                        var id = $(this).attr('data-id');
                        $('input[name=sort_order_'+id+']').val(counter);
                        counter++;
                    }) }});

        });
        $('div.actionBar a.buttonNext,div.actionBar a.buttonPrevious').on('click',function(){
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#course_wizard").offset().top
            }, 200);
        });
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/pickadate/themes/default.date.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/pickadate/themes/default.time.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/pickadate/themes/default.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/datatables/media/css/jquery.dataTables.min.css'); ?>">

    <link href="<?php echo e(asset('client/css/wizard.css')); ?>" rel="stylesheet">
    <style>
        span.required{
            color: red;
            font-weight: bold;
        }
    </style>
    <script  type="text/javascript" src="<?php echo e(asset('client/vendor/limit-characters-maxlength/jquery.maxlength.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/student/addsession.blade.php ENDPATH**/ ?>