<?php $img_url = '';?>

<?php $__env->startSection('og-meta'); ?>
    <meta property="og:url"  content="<?php echo e(route('frontend.work.single',$work_item->slug)); ?>" />
    <meta property="og:type"  content="article" />
    <meta property="og:title"  content="<?php echo e($work_item->meta_title ?? $work_item->title); ?>" />
    <?php echo render_og_meta_image_by_attachment_id($work_item->image); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e($work_item->meta_title ?? $work_item->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?>: <?php echo e($work_item->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e($work_item->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($work_item->meta_tags); ?>">
    <meta name="tags" content="<?php echo e($work_item->meta_description); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a target="_blank" href="<?php echo e(route('admin.work.edit',$work_item->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Works')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="work-details-content-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="portfolio-details-item">
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($work_item->image,'','large'); ?>

                        </div>
                        <div class="post-description">
                            <?php echo $work_item->description; ?>

                        </div>
                        <?php $gallery_item = $work_item->gallery ? explode('|',$work_item->gallery) : []; ?>
                        <?php if(!empty($gallery_item)): ?>
                            <div class="case-study-gallery-wrapper margin-bottom-30 margin-top-40">
                                <h2 class="main-title margin-bottom-30"><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_gallery_title')); ?></h2>
                                <div class="case-study-gallery-carousel owl-carousel">
                                    <?php $__currentLoopData = $gallery_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-gallery-item">
                                            <?php echo render_image_markup_by_attachment_id($gall); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="project-widget">
                        <div class="project-info-item">
                            <h4 class="title"><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_sidebar_title')); ?></h4>
                            <ul>
                                <li><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_start_date_text')); ?> <span class="right"><?php echo e($work_item->start_date); ?> </span></li>
                                <li><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_end_date_text')); ?> <span class="right"> <?php echo e($work_item->end_date); ?></span></li>
                                <li><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_clients_text')); ?> <span class="right"><?php echo e($work_item->clients); ?> </span></li>
                                <li><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_category_text')); ?> <span class="right">
                                         <?php
                                             $all_cat_of_post = get_work_category_by_id($work_item->id);
                                         ?>
                                        <?php if(!empty($all_cat_of_post)): ?>
                                        <?php $__currentLoopData = $all_cat_of_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('frontend.works.category',['id' => $key,'any'=> Str::slug($work_cat)])); ?>"><?php echo e($work_cat); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </span>
                                </li>
                            </ul>
                            <div class="share-area">
                                <h4 class="title"><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_share_text')); ?></h4>
                                <ul class="share-icon">
                                    <?php echo single_post_share(route('frontend.work.single',$work_item->slug),$work_item->title,get_attachment_image_url_by_id($work_item->image)); ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($related_works)): ?>
                <div class="col-lg-12">
                    <div class="related-work-area padding-top-100">
                        <div class="section-title margin-bottom-55">
                            <h2 class="title"><?php echo e(get_static_option('work_single_page_'.$user_select_lang_slug.'_related_work_title')); ?></h2>
                        </div>
                        <div class="our-work-carousel">
                            <?php $__currentLoopData = $related_works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-work-item">
                                    <div class="thumb">
                                        <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="<?php echo e(route('frontend.work.single',$data->slug)); ?>"> <?php echo e($data->title); ?></a></h4>
                                        <div class="cats">
                                            <?php
                                                $all_cat_of_post = get_work_category_by_id($data->id);
                                            ?>
                                            <?php $__currentLoopData = $all_cat_of_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('frontend.works.category',['id' => $key,'any'=> Str::slug($work_cat)])); ?>"><?php echo e($work_cat); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/works/work-single.blade.php ENDPATH**/ ?>