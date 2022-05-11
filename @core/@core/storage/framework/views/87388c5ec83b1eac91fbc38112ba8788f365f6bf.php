<!DOCTYPE html>
<html lang="<?php echo e(get_user_lang()); ?>"  dir="<?php echo e(get_user_lang_direction()); ?>">
<head>
    <?php if(!empty(get_static_option('site_google_analytics'))): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(get_static_option('site_google_analytics')); ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "<?php echo e(get_static_option('site_google_analytics')); ?>");
    </script>
    <?php endif; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(request()->routeIs('homepage')): ?>
    <meta name="description" content="<?php echo e(get_static_option('site_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('site_meta_tags')); ?>">
    <?php else: ?>
        <?php echo $__env->yieldContent('page-meta-data'); ?>
    <?php endif; ?>

    <?php echo render_favicon_by_id(get_static_option('site_favicon')); ?>

    <!-- load fonts dynamically -->
    <?php echo load_google_fonts(); ?>

    <!-- all stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/fonts/xg-flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style_rfp.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/style.css')); ?>">
    <!--<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/s_cus/style.css')); ?>">-->
    <?php if(get_static_option('home_page_variant') == '10'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jobs-home.css')); ?>">
    <?php endif; ?>
    <?php if(get_static_option('home_page_variant') == '05'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/knowledgebase-home.css')); ?>">
    <?php endif; ?>
    <?php if(get_static_option('home_page_variant') == '06'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/service-home.css')); ?>">
    <?php endif; ?>
    <?php if(get_static_option('home_page_variant') == '09'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/charity-home.css')); ?>">
    <?php endif; ?>
    <?php if(get_static_option('home_page_variant') == '07'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/event-home.css')); ?>">
    <?php endif; ?>
    <?php if(get_static_option('home_page_variant') == '08'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/product-home.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dynamic-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery.ihavecookies.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/toastr.css')); ?>">

        <style>
        :root {
            --main-color-one: <?php echo e(get_static_option('site_color')); ?>;
            --secondary-color: <?php echo e(get_static_option('site_main_color_two')); ?>;
            --service-color: <?php echo e(get_static_option('service_site_color')); ?>;
            --knowledge-color: <?php echo e(get_static_option('knowledgebase_site_color')); ?>;
            --event-color: <?php echo e(get_static_option('event_site_color')); ?>;
            --charity-color: <?php echo e(get_static_option('charity_site_color')); ?>;
            --heading-color: <?php echo e(get_static_option('site_heading_color')); ?>;
            --paragraph-color: <?php echo e(get_static_option('site_paragraph_color')); ?>;
            <?php $heading_font_family = !empty(get_static_option('heading_font')) ? get_static_option('heading_font_family') :  get_static_option('body_font_family') ?>
            --heading-font: "<?php echo e($heading_font_family); ?>",sans-serif;
            --body-font:"<?php echo e(get_static_option('body_font_family')); ?>",sans-serif;
        }
        #bizcoxx_main_menu ul li a{
            color: #f8f9fa !important;
        }
        #bizcoxx_main_menu ul li{
            color: #f8f9fa !important;
        }
        #bizcoxx_main_menu ul li a:hover{
            color: #f8f9fa !important;
        }
        #bizcoxx_main_menu ul li:hover{
            color: #f8f9fa !important;
        }
        #bizcoxx_main_menu ul li .sub-menu li a{
            background-color: #fff !important;
            color: var(--paragraph-color) !important;
        }
        #bizcoxx_main_menu ul li .sub-menu li a:hover{
            background-color: #152b3c !important;
            color: #eee !important;
        }
        #bizcoxx_main_menu ul li .sub-menu li{
            background-color: #fff !important;
            color: var(--paragraph-color) !important;
        }
        #bizcoxx_main_menu ul li .sub-menu li:hover{
            background-color: #152b3c !important;
            color: #eee !important;
        }
        #bizcoxx_main_menu ul li .xg_mega_menu_wrapper div div div div ul li a{
            background-color: #fff !important;
            color: var(--paragraph-color) !important;
        }
        #bizcoxx_main_menu ul li .xg_mega_menu_wrapper div div div div ul li a:hover{
            color: #152b3c !important;
        }
        /*.navbar-area.nav-style-02 .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a {*/
        /*    background-color: #fff !important;*/
        /*    color: var(--paragraph-color) !important;*/
        /*}*/
    </style>

    <?php echo $__env->yieldContent('style'); ?>
    <?php if(!empty(get_static_option('site_rtl_enabled')) || get_user_lang_direction() === 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldContent('og-meta'); ?>
    <?php if(request()->is(get_static_option('about_page_slug')) || request()->is(get_static_option('service_page_slug')) || request()->is(get_static_option('product_page_slug').'-cart') || request()->is(get_static_option('product_page_slug')) || request()->is(get_static_option('work_page_slug')) || request()->is(get_static_option('team_page_slug')) || request()->is(get_static_option('faq_page_slug')) || request()->is(get_static_option('blog_page_slug')) || request()->is(get_static_option('contact_page_slug')) || request()->is('p/*') || request()->is(get_static_option('blog_page_slug').'/*') || request()->is(get_static_option('service_page_slug').'/*') || request()->is(get_static_option('career_with_us_page_slug').'/*') || request()->is(get_static_option('events_page_slug').'/*') || request()->is(get_static_option('knowledgebase_page_slug').'/*')  || request()->is(get_static_option('product_page_slug').'/*')  || request()->is(get_static_option('donation_page_slug').'/*') || request()->is(get_static_option('gig_page_slug').'/*') || request()->is(get_static_option('gig_page_slug')) || request()->is(get_static_option('work_page_slug').'/*')): ?>
        <title><?php echo $__env->yieldContent('site-title'); ?> - <?php echo e(get_static_option('site_'.$user_select_lang_slug.'_title')); ?> </title>
    <?php else: ?>
        <title><?php echo e(get_static_option('site_'.$user_select_lang_slug.'_title')); ?> - <?php echo e(get_static_option('site_'.$user_select_lang_slug.'_tag_line')); ?></title>
    <?php endif; ?>
    <?php echo get_static_option('site_header_script'); ?>

    
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1436285753417735');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1436285753417735&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</head>
<body class="dizzcox_version_<?php echo e(getenv('XGENIOUS_DIZCOXX_VERSION')); ?> <?php echo e(get_static_option('item_license_status')); ?> apps_key_<?php echo e(getenv('XGENIOUS_API_KEY')); ?> ">
<?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(auth()->guard('admin')->check()): ?>
    <div class="dizzcox_admin_bar">
        <div class="left-content-part">
            <ul class="admin-links">
                <li><a href="<?php echo e(route('admin.home')); ?>"><i class="fas fa-tachometer-alt"></i> <?php echo e(__('Dashboard')); ?></a></li>
                <li><a href="<?php echo e(route('admin.general.site.identity')); ?>"><i class="fas fa-sliders-h"></i> <?php echo e(__('General Settings')); ?></a></li>
                <li><a href="<?php echo e(route('admin.menu')); ?>"><i class="fas fa-bars"></i> <?php echo e(__('Menu Edit')); ?></a></li>
                <?php echo $__env->yieldContent('edit_link'); ?>
            </ul>
        </div>
        <div class="right-content-part">
            <div class="author-details-wrap">
                <h6><?php echo e(auth()->guard('admin')->user()->name); ?></h6>
                <div class="author-link">
                    <a href="<?php echo e(route('admin.profile.update')); ?>"><?php echo e(__('Edit Profile')); ?></a>
                    <a href="<?php echo e(route('admin.password.change')); ?>"><?php echo e(__('Password Change')); ?></a>
                    <a href="<?php echo e(route('admin.logout')); ?>"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>
                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>