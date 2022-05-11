<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('donor_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('donor_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('donor_page_'.$user_select_lang_slug.'_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('donor_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('donor_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="donor-list padding-bottom-90 padding-top-120">
        <div class="container">
            <div class="row">
                <?php if(count($all_donation_log) > 0): ?>
                <?php $__currentLoopData = $all_donation_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-donor-info margin-bottom-40 donor-list-page">
                        <div class="icon-wrap">
                            <img src="<?php echo e(asset('assets/frontend/icons/donation.svg')); ?>" alt="">
                        </div>
                        <div class="content">
                            <h4 class="title"><?php if($data->donation_type == 'on'): ?> <?php echo e(__('Anonymous')); ?> <?php else: ?> <?php echo e($data->name); ?> <?php endif; ?></h4>
                            <div class="bottom-content">
                                <span class="amount"><?php echo e(amount_with_currency_symbol($data->amount)); ?></span>
                                <span class="dated-time"><?php echo e(date_format($data->created_at,'d M y h:m:s')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="alert alert-warning"><?php echo e(__('No Donor Found')); ?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/donor-list.blade.php ENDPATH**/ ?>