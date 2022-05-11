<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('team_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('team_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('team_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('team_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('team_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
.team_page_all_member img {
    height:280px !important;
    width:270px !important;
}
</style>
    <div class="team-member-area gray-bg team-page padding-120">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="single-team-member-one margin-bottom-30 gray-bg">
                            <div class="thumb team_page_all_member">
                                <?php echo render_image_markup_by_attachment_id($data->image,"grid"); ?>

                                <div class="hover">
                                    <ul class="social-icon">
                                        <?php if(!empty($data->icon_one) && !empty($data->icon_one_url)): ?>
                                            <li><a href="<?php echo e($data->icon_one_url); ?>"><i class="<?php echo e($data->icon_one); ?>"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($data->icon_two) && !empty($data->icon_two_url)): ?>
                                            <li><a href="<?php echo e($data->icon_two_url); ?>"><i class="<?php echo e($data->icon_two); ?>"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($data->icon_three) && !empty($data->icon_three_url)): ?>
                                            <li><a href="<?php echo e($data->icon_three_url); ?>"><i class="<?php echo e($data->icon_three); ?>"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="name"><?php echo e($data->name); ?></h4>
                                <span class="post"><?php echo e($data->designation); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        <?php echo e($all_team_members->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/team-page.blade.php ENDPATH**/ ?>