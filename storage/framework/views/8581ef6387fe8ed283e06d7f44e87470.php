<?php $__env->startSection('page-title',setting('general_homepage_title')); ?>
<?php $__env->startSection('meta-description',setting('general_homepage_meta_desc')); ?>

<?php $__env->startSection('content'); ?>
    <?php if(optionActive('slideshow')): ?>
        <?php if(!empty(toption('slideshow','slider_background'))): ?>
            <?php $__env->startSection('header'); ?>
                <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>
                <style>
                    .slider-height{
                        background-color: #<?php echo e(toption('slideshow','slider_background')); ?>;
                    }
                </style>
            <?php $__env->stopSection(); ?>
        <?php endif; ?>

        <?php
        $count=0;
        ?>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <?php for($i=1;$i<=10;$i++): ?>
                <?php if(!empty(toption('slideshow','file'.$i))): ?>
                <?php $__env->startSection('header'); ?>
                    <?php echo \Illuminate\View\Factory::parentPlaceholder('header'); ?>

                    <style>

                        <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?>

                                            .slhc<?php echo e($i); ?>{
                            color: #<?php echo e(toption('slideshow','heading_font_color'.$i)); ?> !important;
                        }

                        <?php endif; ?>

                                        <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?>
                                        .sltx<?php echo e($i); ?>{
                            color: #<?php echo e(toption('slideshow','text_font_color'.$i)); ?> !important;
                        }
                        <?php endif; ?>

                    </style>



                <?php $__env->stopSection(); ?>

                <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-7 col-md-8">
                                    <div class="hero__caption">
                                        <?php if(!empty(toption('slideshow','slide_heading'.$i))): ?>
                                        <span data-animation="fadeInLeft"  <?php if(!empty(toption('slideshow','heading_font_color'.$i))): ?> class="slhc<?php echo e($i); ?>" <?php endif; ?>  data-delay=".2s"><?php echo e(toption('slideshow','slide_heading'.$i)); ?></span>
                                        <?php endif; ?>

                                        <?php if(!empty(toption('slideshow','slide_text'.$i))): ?>
                                        <h1  <?php if(!empty(toption('slideshow','text_font_color'.$i))): ?> class="sltx<?php echo e($i); ?>" <?php endif; ?>   data-animation="fadeInLeft" data-delay=".4s"><?php echo e(toption('slideshow','slide_text'.$i)); ?></h1>
                                        <?php endif; ?>
                                        <?php if(!empty(toption('slideshow','button_text'.$i))): ?>
                                        <!-- Hero-btn -->
                                        <div class="hero__btn">
                                            <a href="<?php echo e(toption('slideshow','url'.$i)); ?>" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s"><?php echo e(toption('slideshow','button_text'.$i)); ?></a>
                                        </div>
                                            <?php endif; ?>

                                    </div>
                                </div>
                                <?php if(!empty(toption('slideshow','file'.$i))): ?>
                                <div class="col-xl-6 col-lg-5">
                                    <div class="hero-man d-none d-lg-block f-right" data-animation="jello" data-delay=".4s">
                                        <img src="<?php echo e(asset(toption('slideshow','file'.$i))); ?>" alt="">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $count++;
                    ?>
                <?php endif; ?>

            <?php endfor; ?>


        </div>
    </div>
    <!-- slider Area End-->
    <?php endif; ?>


    <?php if(optionActive('homepage-services')): ?>
        <?php
            $count=0;
        ?>
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30_ pt-5" >
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span><?php echo e(toption('homepage-services','sub_heading')); ?></span>
                        <h2><?php echo e(toption('homepage-services','main_header')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">


                <?php for($i=1;$i<=6;$i++): ?>
                    <?php if(!empty(toption('homepage-services','heading'.$i))): ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-cat mb-50">
                        <div class="cat-icon">
                            <span class="<?php echo e(toption('homepage-services','icon'.$i)); ?>"></span>
                        </div>
                        <div class="cat-cap">
                            <h5><a  href="#"><?php echo e(toption('homepage-services','heading'.$i)); ?></a></h5>
                            <p><?php echo e(toption('homepage-services','text'.$i)); ?></p>
                            <a href="<?php echo e(toption('homepage-services','url'.$i)); ?>" class="read-more1"><?php echo e(toption('homepage-services','button_text'.$i)); ?> ></a>
                        </div>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endfor; ?>


            </div>
        </div>
    </div>
    <!-- Categories Area End -->
    <?php endif; ?>

    <?php if(optionActive('featured-courses')): ?>
    <!--? Popular Course Start -->
    <div class="popular-course pt-5 ">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span><?php echo e(toption('featured-courses','sub_heading')); ?></span>
                        <h2><?php echo e(toption('featured-courses','heading')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $courses = toption('featured-courses','courses');
                ?>
                <?php if(is_array($courses)): ?>
                <?php $__currentLoopData = toption('featured-courses','courses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($course) && \App\Course::find($course)): ?>
                        <?php
                            $course = \App\Course::find($course);
                        ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <!-- Single course -->
                    <div class="single-course mb-40">
                        <?php if(!empty($course->picture)): ?>
                        <div class="course-img">
                            <img src="<?php echo e(asset($course->picture)); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="course-caption">
                            <div class="course-cap-top">
                                <h4><a href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><?php echo e($course->name); ?></a></h4>
                            </div>
                            <div class="course-cap-mid d-flex justify-content-between">
                                <p><?php echo e(limitLength(strip_tags($course->short_description),100)); ?></p>
                            </div>
                            <div class="course-cap-bottom d-flex justify-content-between">
                                <ul>
                                    <li><a class="link"  href="<?php echo e(route('course',['course'=>$course->id,'slug'=>safeUrl($course->name)])); ?>"><i class="fa fa-info-circle"></i>  <?php echo e(__lang('details')); ?></a></li>
                                </ul>
                                <span><?php echo e(sitePrice($course->fee)); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-50">
                        <a href="<?php echo e(route('courses')); ?>" class="btn"><?php echo e(__lang('all-courses')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Course End -->
    <?php endif; ?>

    <?php if(optionActive('instructors')): ?>
    <!--? Team Ara Start -->
    <div class="team-area pt-160 pb-160 section-bg mt-5" data-background="<?php echo e(tasset('assets/img/gallery/section_bg02.png')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 text-center mb-70">
                        <span><?php echo e(toption('instructors','sub_heading')); ?></span>
                        <h2><?php echo e(toption('instructors','heading')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $instructors = toption('instructors','instructors');
                ?>
                <?php if(is_array($instructors)): ?>
                <?php $__currentLoopData = toption('instructors','instructors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $admin = \App\Admin::find($admin);
                    ?>
                    <?php if($admin): ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-team mb-30">
                                    <div class="team-img">
                                        <a href="<?php echo e(route('instructor',['admin'=>$admin->id])); ?>">
                                            <?php if(empty($admin->user->picture)): ?>
                                                <img src="<?php echo e(asset('img/user.png')); ?>" alt="">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset($admin->user->picture)); ?>" alt="">
                                            <?php endif; ?>
                                        </a>
                                        <!-- Blog Social -->
                                        <ul class="team-social">
                                            <?php if(!empty($admin->social_facebook)): ?>
                                                <li><a  href="<?php echo e(fullUrl($admin->social_facebook)); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php endif; ?>

                                            <?php if(!empty($admin->social_twitter)): ?>
                                                <li><a  href="<?php echo e(fullUrl($admin->social_twitter)); ?>"><i class="fab fa-twitter"></i></a></li>
                                            <?php endif; ?>

                                            <?php if(!empty($admin->social_linkedin)): ?>
                                                <li><a  href="<?php echo e(fullUrl($admin->social_linkedin)); ?>"><i class="fab fa-linkedin"></i></a></li>
                                            <?php endif; ?>

                                            <?php if(!empty($admin->social_instagram)): ?>
                                                <li><a  href="<?php echo e(fullUrl($admin->social_instagram)); ?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php endif; ?>

                                            <?php if(!empty($admin->social_website)): ?>
                                                <li><a  href="<?php echo e(fullUrl($admin->social_website)); ?>"><i class="fas fa-globe"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="team-caption">
                                        <h3><a  href="<?php echo e(route('instructor',['admin'=>$admin->id])); ?>"><?php echo e($admin->user->name.' '.$admin->user->last_name); ?></a></h3>

                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            </div>
            <!-- Section Button -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-70">
                        <a href="<?php echo e(route('instructors')); ?>" class="btn white-btn"><?php echo e(__lang('all-instructors')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Ara End -->
    <?php endif; ?>

    <?php if(optionActive('homepage-about')): ?>
    <!--? About Law Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span><?php echo e(toption('homepage-about','sub_heading')); ?></span>
                            <h2><?php echo e(toption('homepage-about','heading')); ?></h2>
                        </div>
                        <p><?php echo clean(toption('homepage-about','text')); ?></p>

                        <a href="<?php echo e(toption('homepage-about','button-url')); ?>" class="btn"><?php echo e(toption('homepage-about','button-text')); ?></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <?php if(!empty(toption('homepage-about','image_1'))): ?>
                        <div class="about-font-img d-none d-lg-block">
                            <img src="<?php echo e(asset(toption('homepage-about','image_1'))); ?>" alt="">
                        </div>
                        <?php endif; ?>
                            <?php if(!empty(toption('homepage-about','image_2'))): ?>
                        <div class="about-back-img ">
                            <img src="<?php echo e(asset(toption('homepage-about','image_2'))); ?>" alt="">
                        </div>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Law End-->
    <?php endif; ?>

    <?php if(optionActive('testimonials')): ?>
    <!--? Testimonial Start -->
    <div class="testimonial-area fix pt-180 pb-180 section-bg" data-background="<?php echo e(tasset('assets/img/gallery/section_bg03.png')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-9">
                    <div class="h1-testimonial-active">
                    <?php for($i=1;$i <= 6; $i++): ?>
                        <?php if(!empty(toption('testimonials','name'.$i))): ?>


                            <!-- Single Testimonial -->
                        <div class="single-testimonial pt-65">
                            <!-- Testimonial tittle -->
                            <div class="testimonial-icon mb-45">
                                <?php if(!empty(toption('testimonials','image'.$i))): ?>
                                    <img   class="ani-btn " src="<?php echo e(asset(toption('testimonials','image'.$i))); ?>" >
                                <?php else: ?>
                                    <img   class="ani-btn "    src="<?php echo e(asset('img/man.jpg')); ?>">
                                <?php endif; ?>
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption text-center">
                                <p><?php echo e(toption('testimonials','text'.$i)); ?></p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    <?php for($j=1;$j <= toption('testimonials','stars'.$i); $j++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <div class="rattiong-caption">
                                    <span><?php echo e(toption('testimonials','name'.$i)); ?><span> - <?php echo e(toption('testimonials','role'.$i)); ?></span> </span>
                                </div>
                            </div>
                        </div>

                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <?php endif; ?>

    <?php if(optionActive('blog')): ?>
    <!--? Blog Area Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-50">
                        <span><?php echo e(toption('blog','sub_heading')); ?></span>
                        <h2><?php echo e(toption('blog','heading')); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = \App\BlogPost::whereDate('publish_date','<=',\Illuminate\Support\Carbon::now()->toDateTimeString())->where('enabled',1)->orderBy('publish_date','desc')->limit(intval(toption('blog','limit')))->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="home-blog-single mb-30">
                        <div class="blog-img-cap">
                            <div class="blog-img">
                                <?php if(!empty($post->cover_photo)): ?>
                                    <img src="<?php echo e(asset($post->cover_photo)); ?>" alt="">
                            <?php endif; ?>
                                <!-- Blog date -->
                                <div class="blog-date text-center">
                                    <span><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('D')); ?></span>
                                    <p><?php echo e(\Carbon\Carbon::parse($post->publish_date)->format('M')); ?></p>
                                </div>
                            </div>
                            <div class="blog-cap">
                                <p><?php echo e(\Carbon\Carbon::parse($post->publish_date)->diffForHumans()); ?></p>
                                <h3><a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>"><?php echo e($post->title); ?></a></h3>
                                <a href="<?php echo e(route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)])); ?>" class="more-btn"><?php echo e(__lang('read-more')); ?> »</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
    <?php endif; ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make(TLAYOUT, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/itstni/public/templates/education/views/site/home/index.blade.php ENDPATH**/ ?>