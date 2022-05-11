<?php $__env->startSection('site-title'); ?>
    <?php echo e($gig->meta_title ?? $gig->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($gig->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo get_gigs_category_by_id($gig->category_id,'link'); ?></li>
    <li><?php echo e($gig->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($gig->meta_description); ?>">
    <meta name="tags" content="<?php echo e($gig->meta_tags); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.gigs.single',$gig->slug)); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="<?php echo e($gig->meta_title ?? $gig->title); ?>" />
    <?php echo render_og_meta_image_by_attachment_id($gig->image); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a href="<?php echo e(route('admin.gigs.edit',$gig->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Gig')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-gig-details">
                        <?php if(!empty($gig->gallery)): ?>
                        <div class="gallery-wrap">
                            <?php
                                $gallery_images = !empty( $gig->gallery) ? explode('|', $gig->gallery) : [];
                            ?>
                            <div class="thumbnail">
                                <div class="thumbnail-gallery-carousel">
                                    <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gal_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-thumb">
                                        <?php echo render_image_markup_by_attachment_id($gal_image,'','large'); ?>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="thumbnail-navigator">
                                <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gal_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-thumbnail-navigator">
                                    <?php echo render_image_markup_by_attachment_id($gal_image,'','large'); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="thumbnail">
                            <?php echo render_image_markup_by_attachment_id($gig->image,'','large'); ?>

                            <div class="hover">
                                <a href="<?php echo e(get_attachment_image_url_by_id($gig->image)); ?>" class="image-popup"><i class="fas fa-search"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="content-area">
                            <div class="description">
                                <?php echo $gig->description; ?>

                            </div>
                        </div>
                        <div class="faq-area-wrapper">
                            <div class="accordion-wrapper">
                                <?php
                                    $all_faqs_title = !empty($gig->faqs_title) ? unserialize($gig->faqs_title) : [];
                                    $all_faqs_description = !empty($gig->faqs_description) ? unserialize($gig->faqs_description) : [];
                                    $rand_number = rand(9999,99999999);
                                ?>
                                <div id="accordion_<?php echo e($rand_number); ?>">
                                    <?php if(!empty($all_faqs_title)): ?>
                                    <?php $__currentLoopData = $all_faqs_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($faq_title)): ?>
                                        <div class="card">
                                            <div class="card-header" id="headingOne_<?php echo e($key); ?>">
                                                <h5 class="mb-0">
                                                    <a data-toggle="collapse" data-target="#collapseOne_<?php echo e($key); ?>" role="button"
                                                       aria-expanded="false" aria-controls="collapseOne_<?php echo e($key); ?>">
                                                        <?php echo e($faq_title); ?>

                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapseOne_<?php echo e($key); ?>" class="collapse"
                                                 aria-labelledby="headingOne_<?php echo e($key); ?>" data-parent="#accordion_<?php echo e($rand_number); ?>">
                                                <div class="card-body">
                                                    <?php echo e($all_faqs_description[$key]); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="price-plan-wrapper">
                            <?php
                                $all_plan_title = !empty($gig->plan_title) ? unserialize($gig->plan_title) : [];
                                $all_plan_price = !empty($gig->plan_price) ? unserialize($gig->plan_price) : [];
                                $all_plan_features = !empty($gig->features) ? unserialize($gig->features) : [];
                                $all_plan_revisions = !empty($gig->revisions) ? unserialize($gig->revisions) : [];
                                $all_plan_delivery_time = !empty($gig->delivery_time) ? unserialize($gig->delivery_time) : [];
                                $all_plan_description = !empty($gig->plan_description) ? unserialize($gig->plan_description) : [];
                            ?>
                            <?php if(!empty($all_plan_title)): ?>

                            <ul class="nav nav-tabs"  role="tablist">
                                <?php $__currentLoopData = $all_plan_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $active =  $index == 0 ? 'active' : '';
                                    $aria_expanded =  $index == 0 ? 'true' : 'false';
                                    ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo e($active); ?>" id="<?php echo e(Str::slug($title)); ?>-tab-<?php echo e($index + 1); ?>" data-toggle="tab" href="#<?php echo e(Str::slug($title)); ?>-<?php echo e($index + 1); ?>" role="tab" aria-selected="<?php echo e($aria_expanded); ?>"><?php echo e($title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                            <div class="tab-content">
                                <?php $__currentLoopData = $all_plan_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $active =  $index == 0 ? 'show active' : '';
                                    ?>
                                    <div class="tab-pane fade <?php echo e($active); ?>" id="<?php echo e(Str::slug($title)); ?>-<?php echo e($index + 1); ?>" role="tabpanel" aria-labelledby="<?php echo e(Str::slug($title)); ?>-tab-<?php echo e($index + 1); ?>">
                                        <div class="gig-price-plan">
                                            <div class="price-wrap">
                                                <?php echo e(amount_with_currency_symbol($all_plan_price[$index])); ?>

                                            </div>
                                            <div class="description">
                                                <p>
                                                <?php echo e($all_plan_description[$index]); ?>

                                                </p>
                                            </div>
                                            <ul class="feature-list">
                                                <?php
                                                   $features =  !empty($all_plan_features[$index]) ? explode("\n",$all_plan_features[$index]) : [];
                                                ?>
                                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($item); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                           <div class="revision-wrapper">
                                               <span class="delivery-time"><i class="far fa-clock"></i> <?php echo e($all_plan_delivery_time[$index]); ?> <?php echo e(__('Days Delivery')); ?></span>
                                               <span class="revisions"><i class="fas fa-sync"></i> <?php echo e($all_plan_revisions[$index]); ?> <?php echo e(__('Time Revisions')); ?></span>
                                           </div>
                                            <a href="<?php echo e(route('frontend.gigs.order')); ?>" data-gigid="<?php echo e($gig->id); ?>" data-planindex="<?php echo e($index); ?>" class="boxed-btn gig_order_now_btn"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_order_button_title')); ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="get-quote-wrapper">
                            <h4 class="title"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_title')); ?></h4>
                            <a target="_blank" href="<?php echo e(route('frontend.request.quote')); ?>" class="boxed-btn"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_button_title')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form action="<?php echo e(route('frontend.gigs.order')); ?>" method="get" id="gig_order_form" enctype="multipart/form-data">
        <input type="hidden" name="gig_id" value="<?php echo e($gig->id); ?>">
        <input type="hidden" name="gig_select_plan_index" value="0">
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="//use.fontawesome.com/5ac93d4ca8.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/frontend/js/bootstrap4-rating-input.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";

            $(document).on('click','.gig_order_now_btn',function (e){
               e.preventDefault();
                var el = $(this);
                var gigid = el.data('gigid');
                var planindex = el.data('planindex');

                $('input[name="gig_select_plan_index"]').val(planindex);

                $('#gig_order_form').submit();
            });


            var rtlEnable = $('html').attr('dir');
            var sliderRtlValue = typeof rtlEnable === 'undefined' ||  rtlEnable === 'ltr' ? false : true ;

            $(document).ready(function () {

                $('.thumbnail-gallery-carousel').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: '.thumbnail-navigator',
                    rtl: sliderRtlValue,
                    prevArrow: '<div class="prev-arrow"><i class="fas fa-long-arrow-alt-left"></i></div>',
                    nextArrow: '<div class="next-arrow"><i class="fas fa-long-arrow-alt-right"></i></div>',
                });
                $('.thumbnail-navigator').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.thumbnail-gallery-carousel',
                    dots: false,
                    arrows: true,
                    centerMode: false,
                    focusOnSelect: true,
                    rtl: sliderRtlValue,
                    prevArrow: '<div class="prev-arrow"><i class="fas fa-long-arrow-alt-left"></i></div>',
                    nextArrow: '<div class="next-arrow"><i class="fas fa-long-arrow-alt-right"></i></div>',
                });

            });

        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/gigs/gig-single.blade.php ENDPATH**/ ?>