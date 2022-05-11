<?php $__env->startSection('page-title'); ?>
     <?php echo e($category_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
     <?php echo e($category_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e($category_name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('gig_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120">
        <div class="container">
            <div class="row">
                <?php if(count($gigs) > 0): ?>
                <?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <div class="col-lg-12 text-center">
                    <nav class="pagination-wrapper " aria-label="Page navigation ">
                        <?php echo e($gigs->links()); ?>

                    </nav>
                </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="alert alert-warning">
                            <?php echo e(__('No Gig Founds..')); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/gigs/gig-category.blade.php ENDPATH**/ ?>