<?php $__env->startSection('page-title',$forumTopic->title); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('admin.partials.crumb',[
    'crumbs'=>$customCrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <figure class="avatar mr-2 ">
                <img src="<?php echo e(profilePictureUrl($forumTopic->user->picture)); ?>" >
            </figure>
            <h4><?php echo app('translator')->get('default.by'); ?> <?php echo e($forumTopic->user->name); ?> <?php echo app('translator')->get('default.on'); ?> <?php echo e(\Carbon\Carbon::parse($forumTopic->created_at)->format('D d/M/Y')); ?></h4>
            <div class="card-header-form">
                <form>
                    <div class="input-group">
                        <a class="btn btn-primary btn-round float-right" href="#replybox"><i class="fa fa-reply"></i> <?php echo app('translator')->get('default.reply'); ?></a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card" id="thread<?php echo e($thread->id); ?>">
            <div class="card-body">
                <div class="tickets">
                    <div class="ticket-content">
                        <div class="ticket-header">
                            <div class="ticket-sender-picture img-shadow">
                                <img src="<?php echo e(profilePictureUrl($thread->user->picture)); ?>" >
                            </div>
                            <div class="ticket-detail">
                                <div class="ticket-title">
                                    <h4><?php echo e($thread->user->name); ?></h4>
                                </div>
                                <div class="ticket-info">
                                    <div class="font-weight-600"><?php echo e(\Carbon\Carbon::parse($thread->created_at)->format('D d/M/Y')); ?></div>
                                    <div class="bullet"></div>
                                    <div class="text-primary font-weight-600"><?php echo e(\Carbon\Carbon::parse($thread->created_at)->diffForHumans()); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="ticket-description thread-text">
                            <?php if($thread->postReply): ?>
                                <article>
                                    <blockquote class="readmore" style="overflow: hidden">
                                        <div class="ticket-header">
                                            <div class="ticket-sender-picture img-shadow">
                                                <img src="<?php echo e(profilePictureUrl($thread->postReply->user->picture)); ?>" >
                                            </div>
                                            <div class="ticket-detail">
                                                <div class="ticket-title">
                                                    <h4><?php echo e($thread->postReply->user->name); ?></h4>
                                                </div>
                                                <div class="ticket-info">
                                                    <div class="font-weight-600"><?php echo e(\Carbon\Carbon::parse($thread->postReply->created_at)->format('D d/M/Y')); ?></div>
                                                    <div class="bullet"></div>
                                                    <div class="text-primary font-weight-600"><?php echo e(\Carbon\Carbon::parse($thread->postReply->created_at)->diffForHumans()); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <?php echo clean($thread->postReply->message); ?>

                                    </blockquote>
                                </article>
                            <?php endif; ?>
                            <p class="thread-text"> <?php echo clean($thread->message); ?></p>
                            <a class="btn btn-sm btn-primary float-right" role="button" data-toggle="collapse" href="#collapseExample<?php echo e($thread->id); ?>" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-reply"></i>   <?php echo e(__lang('reply')); ?>

                            </a>
                            <div class="collapse" id="collapseExample<?php echo e($thread->id); ?>">
                                <div class="well">
                                    <h4><?php echo e(__lang('reply')); ?></h4>
                                    <form method="post" action="<?php echo e(adminUrl( ['controller' => 'forum', 'action' => 'reply', 'id' => $id])); ?>">
                                     <?php echo csrf_field(); ?>   <textarea id="message<?php echo e($thread->id); ?>" name="message" class="form-control" rows="5"><?php echo e(old('message')); ?></textarea>
                                        <input type="hidden" name="post_reply_id" value="<?php echo e($thread->id); ?>"/>
                                        <br>
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-reply"></i> <?php echo e(__lang('reply')); ?></button>
                                    </form>

                                    <script>
                                        $(function(){
                                            document.emojiSource = '<?php echo e(asset('client/vendor/summernote-emoji-master/tam-emoji/img')); ?>';
                                            document.emojiButton = 'fas fa-smile';
                                            $('#message<?php echo e($thread->id); ?>').summernote({
                                                height: 200,
                                                toolbar: [
                                                    ['style', ['style']],
                                                    ['font', ['bold', 'italic', 'underline', 'clear']],
                                                    ['fontname', ['fontname']],
                                                    ['color', ['color']],
                                                    ['para', ['ul', 'ol', 'paragraph']],
                                                    ['height', ['height']],
                                                    ['table', ['table']],
                                                    ['insert', ['link', 'picture','video', 'hr']],
                                                    ['view', ['fullscreen', 'codeview']],
                                                    ['misc', ['emoji']],
                                                    ['help', ['help']],
                                                ]
                                            } );
                                        });
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($posts->hasPages()): ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <strong><?php echo e(__lang('notifications')); ?></strong>
        </div>
        <div class="card-body">

            <div style="">
                <input <?php if($checked): ?> checked <?php endif; ?> type="checkbox" name="notify" id="notify" value="1" >  <label for="notify"><?php echo e(__lang('get-notifications')); ?></label>

            </div>

        </div>

    </div>

    <div class="card" id="replybox">
        <div class="card-header">
            <h4><?php echo app('translator')->get('default.reply'); ?></h4>
        </div>
        <div class="card-body">

            <form method="post" action="<?php echo e(adminUrl( ['controller' => 'forum', 'action' => 'reply', 'id' => $id])); ?>">
              <?php echo csrf_field(); ?>  <textarea id="message-reply" name="message" class="form-control snote" rows="5"><?php echo e(old('message')); ?></textarea>
                <br>
                <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-reply"></i> <?php echo e(__lang('reply')); ?></button>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/vendor/summernote-ext-emoji/src/css-new-version.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('client/themes/admin/assets/modules/izitoast/css/iziToast.min.css')); ?>">
    <link href="<?php echo e(asset('client/vendor/summernote-emoji-master/tam-emoji/css/emoji.css')); ?>" rel="stylesheet">
    <style>
        .tickets .ticket-content {
            width: 100%;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>



    <script src="<?php echo e(asset('client/vendor/summernote/summernote-bs4.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('client/vendor/readmore/readmore.min.js')); ?>"></script>

    <script src="<?php echo e(asset('client/vendor/summernote-emoji-master/tam-emoji/js/config.js')); ?>"></script>
    <script src="<?php echo e(asset('client/vendor/summernote-emoji-master/tam-emoji/js/tam-emoji.min.js?v=1.1')); ?>"></script>

    <script>
        $(function(){
            document.emojiSource = '<?php echo e(asset('client/vendor/summernote-emoji-master/tam-emoji/img')); ?>';
            document.emojiButton = 'fas fa-smile';

            $('.snote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture','video', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['misc', ['emoji']],
                    ['help', ['help']],
                ]
            } );

        });
    </script>

    <script src="<?php echo e(asset('client/themes/admin/assets/modules/izitoast/js/iziToast.min.js')); ?>" type="text/javascript"></script>

    <script>
        $(function(){
            $('.readmore').readmore({
                collapsedHeight : 300
            });
            $('#notify').change(function(){

                iziToast.info({
                    title: '<?php echo e(__lang('info')); ?>',
                    message: '<?php echo e(__lang('saving-settings')); ?>',
                    position: 'topRight'
                });

                var checked = $(this).is(":checked");
                if(checked){
                    var notify = 1;
                }
                else{
                    var notify = 0;
                }

                $.get('<?php echo e(adminUrl(['controller'=>'forum','action'=>'notifications','id'=>$id])); ?>?notify='+notify,function(){

                    iziToast.success({
                        title: '<?php echo e(__lang('info')); ?>',
                        message: '<?php echo e(__lang('settings-saved')); ?>',
                        position: 'topRight'
                    });
                })
            })
        });
    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba\app\resources\views/admin/forum/topic.blade.php ENDPATH**/ ?>