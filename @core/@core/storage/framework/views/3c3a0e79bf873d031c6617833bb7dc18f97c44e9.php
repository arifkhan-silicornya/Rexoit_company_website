<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('quote_page_'.$user_select_lang_slug.'_page_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li><?php echo e(get_static_option('quote_page_'.$user_select_lang_slug.'_page_title')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('quote_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('quote_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="order-service-page-content-area padding-100">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $all_contact_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info-02">
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
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="quote-content-area padding-top-70">
                        <h3 class="quote-title"><?php echo e(get_static_option('quote_page_'.get_user_lang().'_form_title')); ?></h3>
                        <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($message); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(env('APP_ENV') == 'development' ): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                You can build this form using admin panel <strong>Drag & Drop Form Builder</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo e(route('frontend.quote.message')); ?>" method="post" enctype="multipart/form-data" class="contact-form quote-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="captcha_token" id="gcaptcha_token">
                            <div class="row">
                                <div class="col-lg-12">
                                <?php
                                    $form_fields = json_decode(get_static_option('quote_page_form_fields'));
                                    $select_index = 0;
                                    $options = [];
                                ?>
                                <?php $__currentLoopData = $form_fields->field_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($value)): ?>
                                            <?php if($value == 'select'): ?> <?php $options = explode(';',$form_fields->select_options[$select_index]);?> <?php endif; ?>
                                            <?php $required = isset($form_fields->field_required->$key) ? $form_fields->field_required->$key : '' ?>
                                            <?php $mimes = isset($form_fields->mimes_type->$key) ? $form_fields->mimes_type->$key : '' ?>
                                            <?php echo get_field_by_type($value,$form_fields->field_name[$key],$form_fields->field_placeholder[$key],$options,$required,$mimes); ?>

                                            <?php if($value == 'select'): ?> <?php $select_index++?> <?php endif; ?>
                                        <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="col-lg-12">
                                    <div class="btn-wrapper text-center">
                                        <button class="submit-btn" type="submit"><?php echo e(__('Send Quote')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/pages/quote-page.blade.php ENDPATH**/ ?>