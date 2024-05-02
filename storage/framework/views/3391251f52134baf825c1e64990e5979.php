<?php $__env->startSection('page-title',''); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


        <div class="card">
            <div class="card-header">
                <header></header>

                <div class="dropdown d-inline mr-2">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-plus"></i>  <span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu wide-btn">
                        <li><a  class="dropdown-item show-modal" data-type="t"   data-target="#addt" href="#"><span class="title"><i class="fa fa-file-word"></i> <?php echo e(__lang('text')); ?></span></a></li>
                        <li><a class="dropdown-item" onclick="openLargeModal('<?php echo e(__lang('video-library')); ?>','<?php echo e(adminUrl(['controller'=>'lecture','action'=>'library','id'=>$id])); ?>')"  href="#"><span class="title"><i class="fa fa-file-video"></i>  <?php echo e(__lang('video-from-library')); ?> </span></a></li>
                        <li><a class="dropdown-item show-modal" data-type="v"   data-target="#addvurl" href="#"><span class="title"><i class="fa fa-file-video"></i> <?php echo e(__lang('external-video-url')); ?></span></a></li>
                        <li><a class="dropdown-item show-modal" data-type="v"   data-target="#addv" href="#"><span class="title"><i class="fa fa-file-video"></i> <?php echo e(__lang('external-video-embed')); ?></span></a></li>
                        <li><a class="dropdown-item show-modal"  data-type="i"    data-target="#addi" href="#"><span class="title"><i class="fa fa-image"></i> <?php echo e(__lang('image')); ?></span></a></li>
                        <li><a class="dropdown-item show-modal"  data-type="c"    data-target="#addc" href="#"><span class="title"><i class="fa fa-file-code"></i> <?php echo e(__lang('html-code')); ?></span></a></li>
                        <li><a class="dropdown-item show-modal"  data-type="q"    data-target="#addq" href="#"><span class="title"><i class="fa fa-question-circle"></i> <?php echo e(__lang('quiz')); ?></span></a></li>
                        <li><a class="dropdown-item show-modal-nc"  data-type="z"    data-target="#addz" href="#"><span class="title"><i class="fa fa-video"></i> <?php echo e(__lang('zoom-meeting')); ?></span></a></li>
                        <li role="separator" class="divider dropdown-divider"></li>
                        <li><a class="dropdown-item "  href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'importimages','id'=>$id])); ?>"><span class="title"><i class="fa fa-image"></i> <?php echo e(__lang('import-images')); ?></span></a></li>
                    </ul>
                </div>

            </div>
        </div><!--end .box -->

        <form onsubmit="return  confirm('<?php echo e(__lang('delete-items')); ?>')" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'deletecontents'])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <table id="content_table" class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" id="select_all"/></th>

                    <th  ><?php echo e(__lang('title')); ?></th>
                    <th ><?php echo e(__lang('sort-order')); ?></th>
                    <th><?php echo e(__lang('type')); ?></th>
                    <th     ><?php echo e(__lang('actions')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($paginator as $row):  ?>
                <tr id="row-<?php echo e($row->id); ?>">
                    <td>
                        <input class="check" type="checkbox" name="select<?php echo e($row->id); ?>" value="<?php echo e($row->id); ?>"/>  &nbsp; &nbsp;
                        <i style="cursor: grabbing" class="fa fa-arrows-alt"></i>


                    </td>
                    <td>
                        <span id="title-<?php echo e($row->id); ?>"><?php echo e($row->title); ?></span>

                    </td>

                    <td><span class="label label-success sort-order" id="sortorder-<?php echo e($row->id); ?>"><?php echo e($row->sort_order); ?></span></td>

                    <td><?php
                            switch($row->type){
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
                                    echo __lang('video');
                                    break;
                                case 'z':
                                    echo __lang('zoom-meeting');
                                    break;
                            } ?></td>

                    <td class="text-right1">
                        <button type="button" data-target="#infoModal<?php echo e($row->id); ?>"  data-toggle="modal"   class="btn btn-xs btn-primary"><i data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('view')); ?>"  class="fa fa-info-circle"></i></button>
                        <?php if($row->type=='q'): ?>
                        <a href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'editquiz','id'=>$row->id])); ?>" class="btn btn-xs btn-primary btn-equal"><i class="fa fa-edit"></i></a>
                        <?php elseif($row->type=='z'): ?>
                        <a href="#" onclick="openModal('<?php echo e(__lang('edit')); ?> <?php echo e(__lang('zoom-meeting')); ?>','<?php echo e(adminUrl(['controller'=>'lecture','action'=>'editzoom','id'=>$row->id])); ?>')"  class="btn btn-xs btn-primary btn-equal"><i class="fa fa-edit"></i></a>

                        <?php else:  ?>
                        <a  data-type="<?php echo e($row->type); ?>" data-id="<?php echo e($row->id); ?>" href="#" class="editlink btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('edit')); ?>"><i class="fa fa-edit"></i></a>

                        <?php endif;  ?>
                        <a   data-id="<?php echo e($row->id); ?>" href="#" class="audiolink btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="Add Audio Narration"><i class="fa fa-microphone "></i></a>

                        <a onclick="return confirm('<?php echo e(__lang('delete-confirm')); ?>')" href="<?php echo e(adminUrl(array('controller'=>'lecture','action'=>'deletecontent','id'=>$row->id))); ?>"  class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e(__lang('delete')); ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php $__env->startSection('footer'); ?>
                    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
                    <div class="modal fade" tabindex="-1" role="dialog" id="infoModal<?php echo e($row->id); ?>">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title"><?php echo e($row->title); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      <div>

                                          <?php if(!empty($row->audio_code)): ?>
                                          <?php echo $row->audio_code; ?>

                                          <div><a class="btn btn-danger" onclick="return confirm('<?php echo e(__lang('audio-delete-confirm')); ?>')" href="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'removeaudio','id'=>$row->id])); ?>"><i class="fa fa-trash"></i> <?php echo e(__lang('remove-audio')); ?></a></div>
                                          <?php endif;  ?>


                                          <?php if($row->type=='c'): ?>
                                          <div id="content-<?php echo e($row->id); ?>">
                                              <?php echo clean(nl2br(htmlentities($row->content))); ?>

                                          </div>
                                          <?php elseif($row->type=='l'):  ?>
                                          <div style="display: none" id="content-<?php echo e($row->id); ?>" ><?php echo clean($row->content); ?></div>
                                          <?php $video = \App\Video::find(intval($row->content));  ?>
                                          <?php if($video): ?>
                                          <a target="_blank" href="<?php echo e(adminUrl(['controller'=>'video','action'=>'play','id'=>$video->id])); ?>"><img class="img-responsive img-thumbnail" <?php if(saas()): ?>  src="<?php echo e(videoImageSaas($video)); ?>"  <?php else: ?> src="<?php echo e(basePath()); ?>/uservideo/<?php echo e($video->id); ?>/<?php echo e(videoImage($video->file_name)); ?>" <?php endif; ?> alt="<?php echo e($video->name); ?>"></a>
                                          <div class="card">
                                              <div class="card-body">
                                                 <?php echo clean($video->description); ?>

                                              </div>
                                          </div>
                                          <?php else:  ?>
                                          <strong><?php echo e(__lang('video-delete-msg')); ?></strong>
                                          <?php endif; ?>
                                          <?php elseif($row->type=='i'):  ?>

                                          <div id="content-<?php echo e($row->id); ?>" style="text-align: center"><a data-img-url="<?php echo clean($row->content); ?>" class="fullsizable" href="<?php echo e(basePath().'/'.$row->content); ?>"><img style="max-width: 100%" src="<?php echo e(resizeImage($row->content, 640, 360,basePath())); ?>" /></a> </div>
                                          <?php elseif($row->type=='q'):  ?>
                                          <div class="quizbox " id="quiz<?php echo e($row->id); ?>">
                                              <h1 class="quizName"><!-- where the quiz name goes --></h1>

                                              <div class="quizArea">
                                                  <div class="quizHeader">
                                                      <!-- where the quiz main copy goes -->

                                                      <a class="button startQuiz" href="#"><?php echo e(__lang('get-started')); ?>!</a>
                                                  </div>

                                                  <!-- where the quiz gets built -->
                                              </div>

                                              <div class="quizResults">
                                                  <h3 class="quizScore"><?php echo e(__lang('you-scored')); ?>: <span><!-- where the quiz score goes --></span></h3>

                                                  <h3 class="quizLevel"><strong><?php echo e(__lang('ranking')); ?>:</strong> <span><!-- where the quiz ranking level goes --></span></h3>

                                                  <div class="quizResultsCopy">
                                                      <!-- where the quiz result copy goes -->
                                                  </div>
                                              </div>
                                          </div>
                                          <script>
                                              $(function(){
                                                  $('#quiz<?php echo e($row->id); ?>').slickQuiz(<?php echo $row->content; ?>);
                                              })
                                          </script>

                                          <?php elseif($row->type=='z'):  ?>
                                          <div style="display: none" id="content-<?php echo e($row->id); ?>"><?php echo clean($row->content); ?></div>

                                          <?php
                                              $zoomData = @unserialize($row->content);

                                          ?>
                                          <?php if($zoomData && is_array($zoomData)):  ?>
                                          <div class="list-group">
                                              <a href="#" class="list-group-item active">
                                                  <?php echo e(__lang('meeting-id')); ?>

                                              </a>
                                              <a href="#" class="list-group-item"><?php echo e($zoomData['meeting_id']); ?></a>
                                              <a href="#" class="list-group-item active">
                                                  <?php echo e(__lang('meeting-password')); ?>

                                              </a>
                                              <a href="#" class="list-group-item"><?php echo e($zoomData['password']); ?></a>
                                              <a href="#" class="list-group-item active">
                                                  <?php echo e(__lang('instructions')); ?>

                                              </a>
                                              <a href="#" class="list-group-item"><?php echo e($zoomData['instructions']); ?></a>

                                          </div>
                                          <?php endif;  ?>
                                          <?php else:  ?>
                                          <div id="content-<?php echo e($row->id); ?>"><?php echo $row->content; ?></div>
                                          <?php endif;  ?>



                                      </div>
                                  </div>
                                  <div class="modal-footer bg-whitesmoke br">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                                  </div>
                                </div>
                              </div>
                            </div>
                <?php $__env->stopSection(); ?>

                <?php endforeach;  ?>

                </tbody>
            </table>
            <?php if($paginator->count() > 0): ?>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> <?php echo e(__lang('delete-selected')); ?></button>
            <?php endif;  ?>
        </form>

        <script>
            $(function(){

                $('#select_all').change(function(){
                    $('input.check').not(this).prop('checked', this.checked);

                })



            });
        </script>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/slickquiz/css/slickQuiz.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/slickquiz/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/jquery-fullsizable-2.1.0/css/jquery-fullsizable-theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo e(basePath().'/client/vendor/jquery-fullsizable-2.1.0/css/jquery-fullsizable.css'); ?>">

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>



    <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <div class="modal fade" id="addt" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addcontent','id'=>$id])); ?>">
                 <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="t"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('text')); ?>)</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control" id="texttitle" required="required" value="" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('text')); ?></label>
                            <textarea class="form-control" id="textcontent" name="content" ></textarea>
                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="textsortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <div class="modal fade" id="addv" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addcontent','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="v"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('video')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control" id="videotitle" required="required" value="" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('video-embed-code')); ?></label>
                            <textarea class="form-control" id="videocontent" name="content" ></textarea>
                            <p class="help-block"><?php echo e(__lang('video-code-help')); ?></p>
                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="videosortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="addc" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addcontent','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>  <input type="hidden" name="type" value="c"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('html-code')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control" id="codetitle" required="required" value="" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('html-code')); ?></label>
                            <textarea class="form-control" id="codecontent" name="content" ></textarea>
                            <p class="help-block"><?php echo e(__lang('paste-html')); ?> </p>
                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="codesortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="addvurl" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addvideo','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>    <input type="hidden" name="type" value="v"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('video')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for=""><?php echo e(__lang('video-url')); ?></label>
                            <input class="form-control" type="text" name="url" placeholder="Video Url"/>
                            <p class="help-block" >
                            <?php echo e(__lang('video-field-desc')); ?>

                            <ul>
                                <li>Youtube (<?php echo e(__lang('example')); ?>: https://www.youtube.com/watch?v=MG8KADiRbOU)</li>
                                <li>Vimeo (<?php echo e(__lang('example')); ?>: https://vimeo.com/20732587)</li>
                                <li>Instagram (<?php echo e(__lang('example')); ?>: https://www.instagram.com/p/BZQm9cSA6iK)</li>
                            </ul>
                            <div><?php echo e(__lang('vimeo-rec')); ?></div>

                            </p>


                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order"  class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="addi" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-sm" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addcontent','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>  <input type="hidden" name="type" value="i"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('image')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control" id="imagetitle" required="required" value="" type="text">
                        </div>
                        <div class="form-group">
                            <div><label for=""><?php echo e(__lang('image')); ?></label></div>

                            <div class="image"><img style="max-width: 100px; max-height: 100px" data-name="image" src="<?php echo e($display_image); ?>" alt="" id="thumb" /><br />

                                <input type="hidden" name="content" id="image" />
                                <a class="pointer" onclick="image_upload('image', 'thumb');"><?php echo e(__lang('browse')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#thumb').attr('src', '<?php echo e($no_image); ?>'); $('#image').attr('value', '');"><?php echo e(__lang('clear')); ?></a>
                            </div>

                        </div>




                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="imagesortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <div class="modal fade" id="addq" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addquiz','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>   <input type="hidden" name="type" value="t"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('quiz')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="name" class="form-control"  required="required" value="" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('quiz-description')); ?></label>
                            <textarea class="form-control" id="quizcontent" name="main" ></textarea>
                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="quizsortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- START SIMPLE MODAL MARKUP --><!-- /.modal -->

    <div class="modal fade" id="addaudio" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addaudio'])); ?>">
                    <?php echo csrf_field(); ?>  <input type="hidden" id="id" name="id" value=""/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('audio-narration')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <p><?php echo clean(__lang('sound-cloud-help')); ?></p>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('sound-cloud-url')); ?></label>
                            <input class="form-control" type="text" name="url" placeholder="e.g. https://soundcloud.com/epitaph-records/this-wild-life-history"/>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" id="addl" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addcontent','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>   <input type="hidden" name="type" value="l"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('video')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control" id="librarytitle" required="required" value="" type="text">
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for=""><?php echo e(__lang('video')); ?> <?php echo e(__lang('id')); ?></label>
                            <textarea name="content" id="librarycontent" cols="30" rows="10" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order" id="librarysortorder" class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="addz" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <form method="post" class="form" action="<?php echo e(adminUrl(['controller'=>'lecture','action'=>'addzoom','id'=>$id])); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="z"/>
                    <input type="hidden" name="id" value="0"/>
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="contentmode"><?php echo e(__lang('add')); ?></span> <?php echo e(__lang('lecture-content')); ?> (<?php echo e(__lang('zoom-meeting')); ?>)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for=""><?php echo e(__lang('title')); ?></label>
                            <input name="title" class="form-control"   required="required" value="<?php echo e(__lang('zoom-meeting')); ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label for=""><?php echo e(__lang('meeting-id')); ?></label>
                            <input required="required" class="form-control" type="text" name="meeting_id" placeholder="<?php echo e(__lang('zoom-placeholder')); ?>"/>

                        </div>


                        <div class="form-group">
                            <label for=""><?php echo e(__lang('meeting-password')); ?></label>
                            <input required="required" class="form-control" type="text" name="password" />

                        </div>

                        <div class="form-group">
                            <label for=""><?php echo e(__lang('instructions')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <textarea class="form-control" name="instructions"  ></textarea>

                        </div>


                        <div class="form-group">
                            <label for="sort_order"><?php echo e(__lang('sort-order')); ?> (<?php echo e(__lang('optional')); ?>)</label>
                            <input name="sort_order"   class="form-control number" placeholder="<?php echo e(__lang('digits-only')); ?>" value="" type="text">   <p class="help-block"></p>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__lang('close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__lang('save-changes')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <script type="text/javascript" src="<?php echo e(basePath().'/client/vendor/ckeditor/ckeditor.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo e(basePath().'/client/vendor/slickquiz/js/slickQuiz.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo e(basePath().'/client/vendor/jquery-fullsizable-2.1.0/js/jquery-fullsizable.min.js'); ?>"></script>


    <script type="text/javascript">

        CKEDITOR.replace('textcontent', {
            filebrowserBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserImageBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager',
            filebrowserFlashBrowseUrl: '<?php echo e(basePath()); ?>/admin/filemanager'
        });



    </script>
    <script type="text/javascript">

        $(document).ready(function(){

            $(".show-modal").click(function(){
                var type = $(this).attr('data-type');
                $('#add'+type+' .contentmode').text('Add');
                $('#add'+type+' input[type=text],'+'#add'+type+' input[name=id],'+'#add'+type+' textarea').val("");
                if(type=='t'){
                    CKEDITOR.instances['textcontent'].setData('');
                }
                $($(this).attr('data-target')).modal({
                    backdrop: 'static',
                    keyboard: false
                });

            });

            $(".show-modal-nc").click(function(){
                var type = $(this).attr('data-type');
                $('#add'+type+' .contentmode').text('Add');
                if(type=='t'){
                    CKEDITOR.instances['textcontent'].setData('');
                }
                $($(this).attr('data-target')).modal({
                    backdrop: 'static',
                    keyboard: false
                });

            });

        });

        $('.editlink').click(function(e){
            //get values
            var id = $(this).attr('data-id');
            console.log('id is '+id);

            var type = $(this).attr('data-type');
            console.log('type is '+type);

            //get values
            var title = $('#title-'+id).text();
            var content = $('#content-'+id).html();
            var sortOrder = $('#sortorder-'+id).text();

            //load into form
            $('#add'+type+' input[name=title]').val(title);

            if(type=='t'){
                CKEDITOR.instances['textcontent'].setData(content);
            }
            else if(type =='i'){
                var url = $('#content-'+id+' a').attr('href');
                $('#add'+type+' img').attr('src',url);
                $('#add'+type+' input[name=content]').val($('#content-'+id+' a').attr('data-img-url'));
            }
            else{
                $('#add'+type+'  [name=content]').val(content);
            }
            $('#add'+type+' input[name=sort_order]').val(sortOrder);
            $('#add'+type+' input[name=id]').val(id);

            $('#add'+type+' .contentmode').text('Edit');
            $('#add'+type).modal({
                backdrop: 'static',
                keyboard: false
            });


        });

        $('.audiolink').click(function(){
            var id = $(this).attr('data-id');
            console.log('id is '+id);
            $('#id').val(id);
            $('#addaudio').modal({
                backdrop: 'static',
                keyboard: false
            });
        });

    </script>
    <script type="text/javascript"><!--
        function image_upload(field, thumb) {
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

        $(function() {
            $('a.fullsizable').fullsizable();
        });

        $("#content_table tbody").sortable({ opacity:0.6, update: function() {
                var order = $(this).sortable("serialize") + '&action=sort&_token=<?php echo e(csrf_token()); ?>';
                //console.log(order);
                $.post("<?php echo e(adminUrl(['controller'=>'lecture','action'=>'reorder','id'=>$id])); ?>",order,function(data){
                    console.log(data);
                    var counter = 1;
                    $('.sort-order').each(function(){
                        $(this).text(counter);
                        counter++;
                    });
                });
            }
        });

        $(document).on('click','#pagerlinks a',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#genLargemodalinfo').html(' <img  src="<?php echo e(basePath()); ?>/img/ajax-loader.gif">');

            $('#genLargemodalinfo').load(url);
        })
        $(document).on("submit","#filterform", function (event) {
            var $this = $(this);
            var frmValues = $this.serialize();
            $('#genLargemodalinfo').html(' <img  src="<?php echo e(basePath()); ?>/img/ajax-loader.gif">');

            $.ajax({
                type: $this.attr('method'),
                url: $this.attr('action'),
                data: frmValues
            })
                .done(function (data) {
                    $('#genLargemodalinfo').html(data);
                })
                .fail(function () {
                    $('#genLargemodalinfo').text("<?php echo e(__lang('error-occurred')); ?>");
                });
            event.preventDefault();
        });
        //--></script>

    <script>
        $(function(){
            $.fn.modal.Constructor.prototype._enforceFocus = function() {
                var $modalElement = this.$element;
                $(document).on('focusin.modal',function(e) {
                    if ($modalElement.length > 0 && $modalElement[0] !== e.target
                        && !$modalElement.has(e.target).length
                        && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
                        $modalElement.focus();
                    }
                });
            };
        })

    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/lecture/content.blade.php ENDPATH**/ ?>