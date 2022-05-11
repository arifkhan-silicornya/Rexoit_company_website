<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.services.single',$service_item->slug)); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="  <?php echo e($service_item->meta_title ?? $service_item->title); ?> " />
    <?php echo render_og_meta_image_by_attachment_id($service_item->image); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($service_item->meta_title ?? $service_item->title); ?>

 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('page-title'); ?>
      <?php echo e($service_item->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a href="<?php echo e(route('admin.services.edit',$service_item->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Service')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(route('frontend.services.category',['id' => $service_item->categories_id, 'any' => Str::slug(get_service_category($service_item->categories_id))])); ?>"><?php echo e(get_service_category($service_item->categories_id)); ?></a></li>
    <li><?php echo e($service_item->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($service_item->meta_description); ?>">
    <meta name="tags" content="<?php echo e($service_item->meta_tags); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="page-content service-details padding-top-120 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-item">
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($service_item->image,'','large'); ?>

                        </div>
                        <h2 class="main-title"><?php echo e($service_item->title); ?></h2>
                       <div class="service-description">
                           <?php echo $service_item->description; ?>

                       </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-widget">
                        
                        <div class="widget widget_search">
                            <form action="<?php echo e(route('frontend.services.search')); ?>" method="get" class="search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="s" placeholder="<?php echo e(get_static_option('service_single_page_'.$user_select_lang_slug.'_search_placeholder_text')); ?>">
                                </div>
                                <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        
                     <div class="widget">
                            <div class="get-quote-wrapper">
                            <h4 class="title"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_title')); ?></h4>
                            <a target="_blank" href="<?php echo e(route('frontend.request.quote')); ?>" class="boxed-btn"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_button_title')); ?></a>
                        </div>
                        </div>
                        
                        
                        <div class="widget widget_nav_menu">
                            <h3 class="widget-title"><?php echo e(get_static_option('service_single_page_'.$user_select_lang_slug.'_category_title')); ?></h3>
                            <ul>
                                <?php $__currentLoopData = $service_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li <?php if($data->id == $service_item->category->id ): ?> class="active" <?php endif; ?>><a href="<?php echo e(route('frontend.services.category',['id' => $data->id, 'any' => Str::slug($data->name)])); ?>"><?php echo e($data->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="widget widget_recent_posts">
                            <h4 class="widget-title"><?php echo e(get_static_option('service_single_page_'.$user_select_lang_slug.'_recent_services_title')); ?></h4>
                            <ul class="recent_post_item">
                                <?php $__currentLoopData = $recent_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="single-recent-post-item">
                                        <div class="thumb">
                                            <?php echo render_image_markup_by_attachment_id($data->image,'','thumb'); ?>

                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="<?php echo e(route('frontend.services.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                            <span class="time"><?php echo e(date_format($data->created_at,'d M y')); ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        
						  <div class="widget">
                            <div class="get-quote-wrapper">
                            <h4 class="title"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_title')); ?></h4>
                            <a target="_blank" href="<?php echo e(route('frontend.request.quote')); ?>" class="boxed-btn"><?php echo e(get_static_option('gig_single_'.$user_select_lang_slug.'_quote_button_title')); ?></a>
                        </div>
                        </div>

						
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/service/service-single.blade.php ENDPATH**/ ?>