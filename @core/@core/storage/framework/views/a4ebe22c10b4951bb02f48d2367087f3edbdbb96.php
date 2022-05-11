<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content portfolio padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-masonry-wrapper">
                        <ul class="portfolio-menu">
                            <li class="active" data-filter="*"><?php echo e(get_static_option('work_page_'.$user_select_lang_slug.'_all_cat_text')); ?></li>
                            <?php $__currentLoopData = $all_work_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-filter=".<?php echo e(Str::slug($data->name)); ?>"><?php echo e($data->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="portfolio-masonry">
                            <?php $__currentLoopData = $all_work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6 masonry-item <?php echo e(get_work_category_by_id($data->id,'slug')); ?>">
                                    <div class="single-work-item">
                                        <div class="thumb">
                                            <?php echo render_image_markup_by_attachment_id($data->image,'masonry-image','grid'); ?>

                                        </div>
                                        <div class="content">
                                            <h4 class="title"><a href="<?php echo e(route('frontend.work.single',$data->slug)); ?>"> <?php echo e($data->title); ?></a></h4>
                                            <div class="cats">
                                                <?php
                                                    $all_cat_of_post = get_work_category_by_id($data->id);
                                                ?>
                                                <?php if(!empty($all_cat_of_post)): ?>
                                                <?php $__currentLoopData = $all_cat_of_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $work_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(route('frontend.works.category',['id' => $key,'any'=> Str::slug($work_cat)])); ?>"><?php echo e($work_cat); ?></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="post-pagination-wrapper">
                        <?php echo e($all_work->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/works/work.blade.php ENDPATH**/ ?>