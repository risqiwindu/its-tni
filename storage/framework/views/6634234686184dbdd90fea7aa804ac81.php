<?php $__env->startSection('page-title',$title); ?>
<?php $__env->startSection('inline-title',$title); ?>

<?php $__env->startSection('crumb'); ?>
    <?php if(request()->has('category')): ?>
        <li><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('default.blog'); ?></a></li>
        <li><?php echo app('translator')->get('default.category'); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Blog Singel Area -->
    <section class="section latest-news-area blog-grid-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        <?php
                            $count=4;
                        ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                    if($count==2){
                                        $count=4;
                                    }
                                    else{
                                        $count = 2;
                                    }
                            ?>
                        <div class="col-lg-6 col-12">
                            <!-- Single News -->
                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=".<?php echo e($count); ?>s">
                                <?php if(!empty($post->cover_photo)): ?>
                                <div class="image">
                                    <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><img class="thumb"
                                                                            src="<?php echo e(resizeImage($post->cover_photo,1050,700)); ?>" alt="#"></a>
                                </div>
                                <?php endif; ?>
                                <div class="content-body">
                                    <div class="meta-data">
                                        <ul>
                                            <?php if($post->blogCategories()->count()>0): ?>
                                            <li>
                                                <i class="lni lni-tag"></i>
                                                <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($post->blogCategories()->first()->id); ?>"><?php echo e($post->blogCategories()->first()->name); ?></a>
                                            </li>
                                            <?php endif; ?>
                                            <li>
                                                <i class="lni lni-calendar"></i>
                                                <a href="javascript:void(0)"><?php echo e(\Illuminate\Support\Carbon::parse($post->publish_date)->format('M d,Y')); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="title"><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a></h4>
                                    <p><?php echo e(limitLength(strip_tags($post->content),300)); ?></p>
                                    <div class="button">
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>" class="btn"><?php echo e(__lang('read-more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single News -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Pagination -->
                    <div class="pagination center">

                            <nav class="blog-pagination justify-content-center d-flex">
                                <?php echo clean( $posts->appends(['q' => Request::get('q'),'category' => Request::get('category')])->links('edugrids.views.site.blog.paginator') ); ?>


                            </nav>

                    </div>
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar">
                        <!-- Single Widget -->
                        <div class="widget search-widget">
                            <h5 class="widget-title"><?php echo app('translator')->get('default.search'); ?></h5>
                            <form method="get" action="<?php echo e(route('blog')); ?>">
                                <input type="text" name="q" placeholder="<?php echo app('translator')->get('default.search'); ?>...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->

                        <!-- Single Widget -->
                        <div class="widget categories-widget">
                            <h5 class="widget-title"><?php echo app('translator')->get('default.categories'); ?></h5>
                            <ul class="custom">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($category->id); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->blogPosts()->count()); ?></span></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="widget popular-feeds">
                            <h5 class="widget-title"><?php echo e(__t('recent-posts')); ?></h5>
                            <div class="popular-feed-loop">
                                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="single-popular-feed"  <?php if(empty($post->cover_photo)): ?> style="padding-left: 0px" <?php endif; ?> >
                                    <?php if(!empty($post->cover_photo)): ?>
                                    <div class="feed-img">
                                        <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><img src="<?php echo e(resizeImage($post->cover_photo,300,300)); ?>"
                                                                        alt="#"></a>
                                    </div>
                                    <?php endif; ?>
                                    <div class="feed-desc">
                                        <h6 class="post-title"><a  href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a>
                                        </h6>
                                        <span class="time"><i class="lni lni-calendar"></i><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('d M, Y')); ?></span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!--/ End Single Widget -->


                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->

    <?php if(false): ?>
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="blog_item">
                            <?php if(!empty($post->cover_photo)): ?>
                            <div class="blog_item_img">
                                <?php if(!empty($post->cover_photo)): ?>
                                <img class="card-img rounded-0" src="<?php echo e(asset($post->cover_photo)); ?>" alt="">
                                <?php endif; ?>
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo e(\Illuminate\Support\Carbon::parse($post->publish_date)->format('d')); ?></h3>
                                    <p><?php echo e(\Illuminate\Support\Carbon::parse($post->publish_date)->format('M')); ?></p>
                                </a>
                            </div>
                            <?php endif; ?>

                            <div class="blog_details">
                                <a class="d-inline-block" href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>">
                                    <h2><?php echo e($post->title); ?></h2>
                                </a>
                                <p><?php echo e(limitLength(strip_tags($post->content),300)); ?></p>

                                <?php if($post->admin): ?>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> <?php echo e($post->admin->user->name); ?></a></li>

                                </ul>
                                    <?php endif; ?>
                            </div>
                        </article>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <?php echo clean( $posts->appends(['q' => Request::get('q'),'category' => Request::get('category')])->render() ); ?>


                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="get" action="<?php echo e(route('blog')); ?>">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input  name="q"  type="text" class="form-control" placeholder='<?php echo app('translator')->get('default.search'); ?>'
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = '<?php echo app('translator')->get('default.search'); ?>'">
                                        <div class="input-group-append">
                                            <button class="btns" type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit"><?php echo app('translator')->get('default.search'); ?></button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title"><?php echo app('translator')->get('default.category'); ?></h4>
                            <ul class="list cat-list">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($category->id); ?>" class="d-flex">
                                        <p><?php echo e($category->name); ?></p>
                                        <p>&nbsp;(<?php echo e($category->blogPosts()->count()); ?>)</p>
                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title"><?php echo e(__t('recent-posts')); ?></h3>
                            <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media post_item">
                                <?php if(!empty($post->cover_photo)): ?>
                                    <img class="recent-blog-img" src="<?php echo e(asset($post->cover_photo)); ?>" alt="">
                                    <?php endif; ?>
                                <div class="media-body">
                                    <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>">
                                        <h3><?php echo e($post->title); ?></h3>
                                    </a>
                                    <p><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('F d, Y')); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\app\public\templates/edugrids/views/site/blog/index.blade.php ENDPATH**/ ?>