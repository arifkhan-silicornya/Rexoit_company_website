<?php $__env->startSection('site-title'); ?>
    <?php echo e($page_post->meta_title ?? $page_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e($page_post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e($page_post->meta_description); ?>">
    <meta name="tags" content="<?php echo e($page_post->meta_tags); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(__('Pages')); ?></li>
    <li><?php echo e($page_post->title); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('edit_link'); ?>
    <li><a href="<?php echo e(route('admin.page.edit',$page_post->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit Page')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="dynamic-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dynamic-page-content-wrap">
                        <?php echo $page_post->content; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/dynamic-single.blade.php ENDPATH**/ ?>