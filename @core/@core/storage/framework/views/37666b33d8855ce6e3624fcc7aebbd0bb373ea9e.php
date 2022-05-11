<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <section class="price-plan-page-content  padding-top-110 padding-bottom-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title desktop-center margin-bottom-55">
                            <h2 class="title"><?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_section_title')); ?></h2>
                            <p><?php echo e(get_static_option('price_plan_page_'.$user_select_lang_slug.'_section_description')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $all_price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="pricing-table-15 margin-bottom-30">
                                <div class="price-header">
                                    <div class="icon"><i class="<?php echo e($data->icon); ?>"></i></div>
                                    <h3 class="title"><?php echo e($data->title); ?></h3>
                                </div>

                                <div class="price">
                                    <span class="dollar"></span><?php echo e(amount_with_currency_symbol($data->price)); ?><span class="month"><?php echo e($data->type); ?></span>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <?php
                                            $features = explode(';',$data->features);
                                        ?>
                                        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($item); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <?php if(!empty($data->url_status)): ?>
                                        <a class="order-btn" href="<?php echo e(route('frontend.plan.order',$data->id)); ?>"><?php echo e($data->btn_text); ?></a>
                                    <?php else: ?>
                                        <a class="order-btn" href="<?php echo e($data->btn_url); ?>"><?php echo e($data->btn_text); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <div class="price-plan-pagination text-center">
                            <?php echo e($all_price_plan->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/price-plan.blade.php ENDPATH**/ ?>