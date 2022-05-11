<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('image_gallery_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('image_gallery_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('image_gallery_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('image_gallery_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('image_gallery_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="image-gallery padding-bottom-90 padding-top-120">
        <div class="container">
            <div class="row">
               <div class="col-lg-12">
                   <?php if(count($gallery_images) > 0): ?>
                       <ul class="gallery-masonry-nav">
                           <li data-filter="*" class="active"> <?php echo e(__('All')); ?></li>
                           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li data-filter=".<?php echo e(Str::slug($data->title)); ?>"><?php echo e($data->title); ?></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </ul>
                       <div class="gallery-masonry">
                           <?php $__currentLoopData = $gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="col-lg-4 masonry-item <?php echo e(Str::slug(get_gallery_category($data->category_id))); ?>">
                                   <div class="single-image-gallery-item">
                                       <div class="thumb">
                                           <?php echo render_image_markup_by_attachment_id($data->image,'masonry-image'); ?>

                                           <div class="hover">
                                               <?php
                                                   $gallery_img = get_attachment_image_by_id($data->image,null,true);
                                                   $img_url = !empty($gallery_img) ? $gallery_img['img_url'] : '';
                                               ?>
                                               <a href="<?php echo e($img_url); ?>" class="image-popup" title="<?php echo e($data->title); ?>"><i class="fas fa-search"></i></a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </div>
                   <?php else: ?>
                       <div class="alert alert-warning"><?php echo e(__('No Image Found')); ?></div>
                   <?php endif; ?>
               </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/image-gallery.blade.php ENDPATH**/ ?>