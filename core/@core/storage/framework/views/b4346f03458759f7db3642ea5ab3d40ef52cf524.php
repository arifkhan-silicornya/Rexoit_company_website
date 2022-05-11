<?php if(!empty(get_static_option('home_page_support_bar_section_status'))): ?>
    <div class="info-bar-area style-two">
        <div class="container-fluid px-5">
            <div class="row px-4">
                <div class="col-lg-12 ">
                    <div class="info-bar-inner">
                        <div class="left-content">
                            <ul class="info-items-two mt-1">
                                <?php $__currentLoopData = $all_support_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="single-info-item">
                                            <div class="content mr-2" style="font-size:20px!important;margin-right: 5px;line-height: 25px;color:#152c4d">
                                                <i class="<?php echo e($data->icon); ?>"></i>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><?php echo e($data->title); ?>: 
                                                <span class="details" style="font-size:16px!important;font-weight: 500;color:#152c3d;"
                                                ><?php echo e($data->details); ?></span></h5>

                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <!--<?php if(!empty(get_static_option('hide_frontend_language_change_option'))): ?>-->
                            <!--    <div class="language_dropdown" id="languages_selector">-->
                            <!--        <div class="selected-language"><?php echo e(get_language_name_by_slug(get_user_lang())); ?> <i class="fas fa-caret-down"></i></div>-->
                            <!--        <ul>-->
                            <!--            <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                            <!--                <li data-value="<?php echo e($lang->slug); ?>"><?php echo e($lang->name); ?></li>-->
                            <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--<?php endif; ?>-->
                        </div>
                        <div class="right-content">
                            <div class="request-quote">
                                <?php $quote_btn_url = !empty(get_static_option('navbar_button_custom_url_status')) ? get_static_option('navbar_button_custom_url') : route('frontend.request.quote'); ?>
                                <a style="top:0!important;border-radius:0px;" href="<?php echo e($quote_btn_url); ?>" class="py-2 rq-btn bg-blue-dark text-light mt-0"><?php echo e(get_static_option('top_bar_'.get_user_lang().'_button_text')); ?> <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<nav class="navbar navbar-area navbar-expand-lg nav-style-02">
    <div class="container-fluid nav-container px-md-5 pl-0">
        <div class="navbar-brand px-md-4 pl-0">
            <a href="<?php echo e(url('/')); ?>" class="logo">
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                <?php echo render_menu_by_id($primary_menu_id); ?>

            </ul>
        </div>
    </div>
</nav><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/partials/navbar-02.blade.php ENDPATH**/ ?>