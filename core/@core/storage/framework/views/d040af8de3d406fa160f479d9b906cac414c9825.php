<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li> <?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-archive-top-content-area">
                                <div class="search-form">
                                    <input type="text" class="form-control" id="search_term" placeholder="<?php echo e(__('Search..')); ?>" value="<?php echo e($search_term); ?>">
                                    <button type="button" id="product_search_btn"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="product-sorting">
                                    <select id="gig_category">
                                        <option value=""><?php echo e(__('All Category')); ?></option>
                                        <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php if($selected_category == $category->id): ?> selected <?php endif; ?> ><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <select id="gig_sorting_select">
                                        <option value="default" <?php if($selected_order == '' || $selected_order == 'default'): ?> selected <?php endif; ?> ><?php echo e(__('Newest Gig')); ?></option>
                                        <option value="old" <?php if($selected_order == 'old'): ?> selected <?php endif; ?> ><?php echo e(__('Oldest Gig')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php if(count($all_gigs) > 0): ?>
                        <?php $__currentLoopData = $all_gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-gig-item">
                                    <div class="thumb">
                                        <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                                        <div class="price-wrap">
                                            <?php echo e(__("Start From").' '.gig_start_price($data->id)); ?>

                                        </div>
                                        <a href="<?php echo e(route('frontend.gigs.single',$data->slug)); ?>" class="order-btn"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="<?php echo e(route('frontend.gigs.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                        <p><?php echo Str::words(strip_tags($data->description),20); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <div class="alert alert-warning"><?php echo e(__('No Gig Found')); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-12 text-center">
                            <nav class="pagination-wrapper " aria-label="Page navigation ">
                                <?php echo e($all_gigs->links()); ?>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <form id="product_search_form" class="d-none"  action="<?php echo e(route('frontend.gigs')); ?>" method="get">
        <input type="hidden" id="search_query" name="q" value="<?php echo e($search_term); ?>">
        <input type="hidden" name="cat_id" id="category_id" value="<?php echo e($selected_category); ?>">
        <input type="hidden" name="orderby" id="orderby" value="<?php echo e($selected_order ? $selected_order : 'default'); ?>">
        <button id="product_hidden_form_submit_button" type="submit"></button>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        (function () {
            "use strict";
            var searchFormSubmit = $('#product_hidden_form_submit_button');
            //search form trigger
            $(document).on('click','#product_search_btn',function (e) {
                e.preventDefault();
                var searchTerms = $('#search_term').val();
                $('#search_query').val(searchTerms)
                searchFormSubmit.trigger('click');
            });
            $(document).on('change','#gig_sorting_select',function (e) {
                var sortVal = $('#gig_sorting_select').val();
                $('#orderby').val(sortVal);
                searchFormSubmit.trigger('click');
            });
            $(document).on('change','#gig_category',function (e) {
                e.preventDefault();
                $('#category_id').val($(this).val());
                searchFormSubmit.trigger('click');
            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/gigs/gigs.blade.php ENDPATH**/ ?>