<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

 <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('page-title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <?php if(!empty(setting('image_icon'))): ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(setting('image_icon'))); ?>">
    <?php endif; ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(tasset('assets/css/style')); ?>">

     <?php echo $__env->yieldContent('header'); ?>
     <?php echo setting('general_header_scripts'); ?>

     <?php if(optionActive('top-bar')): ?>
         <style>
             <?php if(!empty(toption('top-bar','bg_color'))): ?>
                div.header-top{
                 background-color: #<?php echo e(toption('top-bar','bg_color')); ?>;
             }
             <?php endif; ?>

                     <?php if(!empty(toption('top-bar','font_color'))): ?>
                .header-area .header-top .header-info-left ul li,.header-area .header-top .header-info-right .header-social li a, .header-area .header-top a, .header-area .header-top button,.header-area .header-top .header-info-right ul li a,.header-area .header-top .header-info-right ul li a i{
                 color: #<?php echo e(toption('top-bar','font_color')); ?>;
             }
             <?php endif; ?>

            <?php if(!empty(toption('top-bar','social_bg_color'))): ?>
            .header-area .header-top .header-left-social .header-social{
                 background: #<?php echo e(toption('top-bar','social_bg_color')); ?>;
             }
             <?php endif; ?>

         </style>
     <?php endif; ?>


     <?php if(optionActive('navigation')): ?>
         <style>
             <?php if(!empty(toption('navigation','bg_color'))): ?>
                div.header-bottom{
                 background-color: #<?php echo e(toption('navigation','bg_color')); ?>;
             }
             <?php endif; ?>

                     <?php if(!empty(toption('navigation','font_color'))): ?>
                .main-header .main-menu ul li a, .header-area .header-bottom .menu-wrapper .main-menu > nav > ul li > a{
                 color: #<?php echo e(toption('navigation','font_color')); ?>;
             }
             <?php endif; ?>

                    <?php if(!empty(toption('navigation','logo_bg'))): ?>
                .header-area .header-bottom .logo{
                 background-color: #<?php echo e(toption('navigation','logo_bg')); ?>;
             }
             <?php endif; ?>

         </style>
     <?php endif; ?>
     <style>
         <?php if(optionActive('footer')): ?>

            <?php if(!empty(toption('footer','image'))): ?>

                    .footer-bg {
             background: url(<?php echo e(toption('footer','image')); ?>);
         }

         <?php endif; ?>

            <?php if(!empty(toption('footer','bg_color'))): ?>

            .footer-area  {
             background-color: #<?php echo e(toption('footer','bg_color')); ?>;
         }

         <?php endif; ?>

            <?php if(!empty(toption('footer','font_color'))): ?>
        .footer-area .footer-tittle ul li a,.footer-area .footer-tittle h4,.footer-area .footer-social a i,.footer-bottom-area .footer-copy-right p,.footer-bottom-area .footer-copy-right p a, .footer-area .footer-top .single-footer-caption .footer-tittle p,.footer-area .footer-top .single-footer-caption .footer-tittle ul li a, .footer-area .footer-bottom .footer-copy-right p {
             color: #<?php echo e(toption('footer','font_color')); ?>;
         }
         <?php endif; ?>

        <?php endif; ?>



            <?php if(optionActive('page-title')): ?>
                <?php if(!empty(toption('page-title','bg_color'))): ?>
                    .slider-area{
             background-color: #<?php echo e(toption('page-title','bg_color')); ?> ;
         }
         <?php endif; ?>

                 <?php if(!empty(toption('page-title','font_color'))): ?>
                    .slider-area .hero-cap h2,  .slider-area a,.slider-area,.slider-area .crumb{
             color: #<?php echo e(toption('page-title','font_color')); ?>;
         }
         <?php endif; ?>

         <?php endif; ?>
     </style>



 </head>
<body>

<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <?php if(!empty(setting('image_logo'))): ?>
                    <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                <?php else: ?>
                    <?php echo e(setting('general_site_name')); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <?php if(optionActive('top-bar')): ?>
            <div class="header-top d-none d-lg-block">
                <!-- Left Social -->
                <div class="header-left-social">
                    <ul class="header-social">
                        <?php if(!empty(toption('top-bar','social_facebook'))): ?>
                            <li><a href="<?php echo e(toption('top-bar','social_facebook')); ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('top-bar','social_twitter'))): ?>
                            <li><a href="<?php echo e(toption('top-bar','social_twitter')); ?>"><i class="fab fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('top-bar','social_instagram'))): ?>
                            <li><a href="<?php echo e(toption('top-bar','social_instagram')); ?>"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('top-bar','social_youtube'))): ?>
                            <li><a href="<?php echo e(toption('top-bar','social_youtube')); ?>"><i class="fab fa-youtube"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty(toption('top-bar','social_linkedin'))): ?>
                            <li><a href="<?php echo e(toption('top-bar','social_linkedin')); ?>"><i class="fab fa-linkedin"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <?php if(!empty(toption('top-bar','email'))): ?>
                                    <li><?php echo e(toption('top-bar','email')); ?></li>
                                    <?php endif; ?>
                                        <?php if(!empty(toption('top-bar','email'))): ?>
                                    <li><?php echo e(toption('top-bar','telephone')); ?></li>
                                        <?php endif; ?>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul>
                                    <?php if(toption('top-bar','cart')==1): ?>
                                    <li><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-cart-plus"></i> <?php echo e(__lang('your-cart')); ?><?php if(getCart()->getTotalItems()>0): ?> (<?php echo e(getCart()->getTotalItems()); ?>) <?php endif; ?></a></li>
                                    <?php endif; ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <li   ><a href="<?php echo e(route('login')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get('default.login'); ?></a></li>
                                            <li   ><a href="<?php echo e(route('register')); ?>"><i class="ti-lock"></i> <?php echo e(__lang('register')); ?></a></li>
                                        <?php else: ?>

                                            <li    ><a href="<?php echo e(route('home')); ?>"><i class="fa fa-user-circle"></i> <?php echo app('translator')->get('default.my-account'); ?></a></li>
                                            <li   ><a    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out-alt"></i> <?php echo e(__lang('logout')); ?></a></li>

                                        <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="header-bottom header-sticky">
                <!-- Logo -->
                <div class="logo d-none d-lg-block">
                    <a href="<?php echo e(url('/')); ?>">
                        <?php if(!empty(setting('image_logo'))): ?>
                            <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                        <?php else: ?>
                            <?php echo e(setting('general_site_name')); ?>

                        <?php endif; ?>
                    </a>
                </div>
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo logo2 d-block d-lg-none">
                            <a href="<?php echo e(url('/')); ?>">
                                <?php if(!empty(setting('image_logo'))): ?>
                                    <img src="<?php echo e(asset(setting('image_logo'))); ?>" >
                                <?php else: ?>
                                    <?php echo e(setting('general_site_name')); ?>

                                <?php endif; ?>
                            </a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <?php $__currentLoopData = headerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a <?php if($menu['new_window']): ?> target="_blank" <?php endif; ?>  href="<?php echo e($menu['url']); ?>" ><?php echo e($menu['label']); ?></a>
                                            <?php if($menu['children']): ?>
                                                <ul class="submenu">
                                                    <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a <?php if($childMenu['new_window']): ?> target="_blank" <?php endif; ?>   href="<?php echo e($childMenu['url']); ?>" ><?php echo e($childMenu['label']); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(toption('top-bar','cart')==1): ?>
                                            <li class="d-md-none d-lg-none d-xl-none"   ><a href="<?php echo e(route('cart')); ?>"><i class="fa fa-cart-plus"></i> <?php echo e(__lang('your-cart')); ?><?php if(getCart()->getTotalItems()>0): ?> (<?php echo e(getCart()->getTotalItems()); ?>) <?php endif; ?></a></li>
                                        <?php endif; ?>
                                        <?php if(auth()->guard()->guest()): ?>
                                            <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('login')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get('default.login'); ?></a></li>
                                        <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('register')); ?>"><i class="ti-lock"></i> <?php echo e(__lang('register')); ?></a></li>
                                        <?php else: ?>

                                            <li  class="d-md-none d-lg-none d-xl-none"  ><a href="<?php echo e(route('home')); ?>"><i class="fa fa-user-circle"></i> <?php echo app('translator')->get('default.my-account'); ?></a></li>
                                            <li  class="d-md-none d-lg-none d-xl-none"  ><a    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="<?php echo e(route('logout')); ?>"><i class="fa fa-sign-out-alt"></i> <?php echo e(__lang('logout')); ?></a></li>

                                        <?php endif; ?>

                                </ul>
                            </nav>
                        </div>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"  class="int_hide  hidden">
                            <?php echo csrf_field(); ?>
                        </form>
                        <?php if(toption('navigation','search_form')==1): ?>
                        <!-- Header-btn -->
                        <div class="header-search d-none d-lg-block">
                            <form action="<?php echo e(route('courses')); ?>" class="form-box f-right ">
                                <input type="text" name="filter"  placeholder="<?php echo e(__lang('search-courses')); ?>">
                                <div class="search-icon">
                                    <i class="fas fa-search special-tag"></i>
                                </div>
                            </form>
                        </div>
                            <?php endif; ?>

                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>


    <?php if (! empty(trim($__env->yieldContent('inline-title')))): ?>
        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center"
                 <?php if(!empty(toption('page-title','image'))): ?>
                 data-background="<?php echo e(asset(toption('page-title','image'))); ?>"
                 <?php elseif(empty(toption('page-title','bg_color'))): ?>
                 data-background="<?php echo e(tasset('assets/img/hero/contact_hero.jpg')); ?>"
                <?php endif; ?>
            >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?php echo $__env->yieldContent('inline-title'); ?></h2>
                                <?php if (! empty(trim($__env->yieldContent('crumb')))): ?>
                                    <p class="crumb">
                                        <span><a href="<?php echo route('homepage'); ?>"><?php echo app('translator')->get('default.home'); ?></a></span>
                                        <span>/</span>
                                        <?php echo $__env->yieldContent('crumb'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
    <?php endif; ?>

    <?php echo $__env->make('partials.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>

</main>
<footer class="mt-5">
    <!--? Footer Start-->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- footer Heading -->
                <div class="footer-heading">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-7 col-md-10">
                            <div class="footer-tittle2">
                                <h4><?php echo e(__t('stay-updated')); ?></h4>
                            </div>
                            <?php if(!empty(toption('footer','newsletter-code'))): ?>
                                    <?php echo toption('footer','newsletter-code'); ?>

                                <?php else: ?>
                            <!-- Form -->
                            <div class="footer-form mb-50">
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="#" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                        <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                <?php echo e(__t('subscribe-now')); ?>

                                            </button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="footer-tittle2">
                                <h4><?php echo e(__t('get-social')); ?></h4>
                            </div>
                            <!-- Footer Social -->
                            <div class="footer-social">

                                <?php if(!empty(toption('footer','social_facebook'))): ?>
                                   <a href="<?php echo e(toption('footer','social_facebook')); ?>"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_twitter'))): ?>
                                    <a href="<?php echo e(toption('footer','social_twitter')); ?>"><i class="fab fa-twitter"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_instagram'))): ?>
                                    <a href="<?php echo e(toption('footer','social_instagram')); ?>"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_youtube'))): ?>
                                  <a href="<?php echo e(toption('footer','social_youtube')); ?>"><i class="fab fa-youtube"></i></a>
                                <?php endif; ?>
                                <?php if(!empty(toption('footer','social_linkedin'))): ?>
                                   <a href="<?php echo e(toption('footer','social_linkedin')); ?>"><i class="fab fa-linkedin"></i></a>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4><?php echo e(__lang('about-us')); ?></h4>
                                 <p>
                                     <?php echo e(toption('footer','text')); ?>

                                 </p>
                            </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = footerMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4><?php echo e($menu['label']); ?></h4>
                                <ul>
                                    <?php if($menu['children'] && is_array($menu['children'])): ?>
                                    <?php $__currentLoopData = $menu['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a   <?php if($childMenu['new_window']): ?> target="_blank" <?php endif; ?>  href="<?php echo e($childMenu['url']); ?>"><?php echo e($childMenu['label']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p><?php echo clean( fullstop(toption('footer','credits')) ); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="<?php echo e(__t('go-to-top')); ?>" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="<?php echo e(tasset('assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?php echo e(tasset('assets/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/bootstrap.min.js')); ?>"></script>
<!-- Jquery Mobile Menu -->
<script src="<?php echo e(tasset('assets/js/jquery.slicknav.min.js')); ?>"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?php echo e(tasset('assets/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/slick.min.js')); ?>"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?php echo e(tasset('assets/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/animated.headline.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.magnific-popup.js')); ?>"></script>

<!-- Date Picker -->
<script src="<?php echo e(tasset('assets/js/gijgo.min.js')); ?>"></script>
<!-- Nice-select, sticky -->
<script src="<?php echo e(tasset('assets/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.sticky.js')); ?>"></script>

<!-- counter , waypoint -->
<script src="<?php echo e(tasset('assets/js/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/waypoints.min.js')); ?>"></script>

<!-- contact js -->
<script src="<?php echo e(tasset('assets/js/contact.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.form.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/mail-script.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/jquery.ajaxchimp.min.js')); ?>"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?php echo e(tasset('assets/js/plugins.js')); ?>"></script>
<script src="<?php echo e(tasset('assets/js/main.js')); ?>"></script>

<?php echo $__env->yieldContent('footer'); ?>
<?php echo setting('general_foot_scripts'); ?>


</body>


</html>
<?php /**PATH /var/www/html/itstni/public/templates/education/views/layouts/layout.blade.php ENDPATH**/ ?>