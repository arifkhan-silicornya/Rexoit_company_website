<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_name')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-content contact-page padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row">
                <?php if(get_static_option('contact_page_form_section_status') == 'on'): ?>
                <div class="col-lg-6">
                    <div class="left-content-area">
                        <div class="section-title desktop-left margin-bottom-50">
                            <h2 class="title"><?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_form_section_title')); ?></h2>
                            <p><?php echo e(get_static_option('contact_page_'.$user_select_lang_slug.'_form_section_description')); ?></p>
                        </div>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <form action="<?php echo e(route('frontend.contact.message')); ?>" method="post" enctype="multipart/form-data" id="contact_form_submit" class="contact-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="captcha_token" id="gcaptcha_token">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo render_form_field_for_frontend(get_static_option('contact_page_form_fields')); ?>

                                </div>
                                <div class="col-lg-12">
                                    <button class="submit-btn" type="submit"><?php echo e(__('Send Message')); ?></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-6">
                    <div class="right-content-area">
                        <?php if(get_static_option('contact_page_contact_info_section_status') == 'on'): ?>
                        <ul class="contact-info-list">
                            <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="single-contact-info">
                                    <div class="icon">
                                        <i class="<?php echo e($data->icon); ?>"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><?php echo e($data->title); ?></h4>
                                        <?php $desc = explode(';',$data->description) ?>
                                        <?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="details"><?php echo e($item); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                        <?php if(get_static_option('contact_page_google_map_section_status') == 'on'): ?>
                        <div id="map"  class="contact_page_map margin-top-40">
                            <?php echo render_embed_google_map(get_static_option('contact_page_map_section_address'),20); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if(!empty(get_static_option('site_google_captcha_v3_site_key'))): ?>
     <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/contact-page.blade.php ENDPATH**/ ?>