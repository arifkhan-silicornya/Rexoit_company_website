<?php $inner_page_navbar = get_static_option('site_header_type') ? get_static_option('site_header_type') : 'navbar'; ?>
<?php echo $__env->make('frontend.partials.'.$inner_page_navbar, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
.single-team-member-one .thumb2 span img {
    /*width:250px !important;*/
    /*height:250px !important;*/
    /*border:8px solid #fff;*/
    /*box-shadow:2px 2px 1px #000;*/
}
.single-team-member-one .thumb2 span {
    /*width:270px !important;*/
    /*height:270px !important;*/
    /*padding:5px;*/
}
.single-team-member-one .thumb2 {
    /*width:270px !important;*/
    /*height:270px !important;*/
    /*padding:5px;*/
}
.testimonial-area.testimonial-bg:after {
    background-color: rgba(21, 43, 60, 0.89);
}
.testimonial-two-area.testimonial-bg:after {
    background-color: rgba(21, 43, 60, 0.89);
}
.counterup-area.counterup-bg:after {
    background-color: rgba(21, 43, 60, 0.89);
}
.lates_news div a img {
    height:180px;
}
.single-work-item div img {
    height:200px;
}
.owl-item .header-bg img{
    height:86vh !important;
    width:100%;
}
.owl-item .header-bg{
    height:86vh;
}
.team-carousel:hover .owl-nav div {
    visibility: visible;
    opacity: 1;
}
.team-carousel .owl-nav div {
    position: absolute;
    left: 0;
    top: 50%;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background-color: var(--secondary-color);
    color: #fff;
    font-size: 18px;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    -o-transition: all 0.3s ease-in;
    transition: all 0.3s ease-in;
    visibility: hidden;
    opacity: 0;
}
.team-carousel .owl-nav div:hover {
    background-color: var(--main-color-one);
    color: #fff;
}
.team-carousel .owl-nav div.owl-next {
    left: auto;
    right: 0;
}
</style>
<header class="header-area-wrapper header-carousel-two bizzcox-rtl-slider">
    <?php $__currentLoopData = $all_header_slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="header-area header-bg"
             <?php echo render_background_image_markup_by_attachment_id($data->image); ?>

        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-inner">
                            <h1 class="title"><?php echo e($data->title); ?></h1>
                            <p><?php echo e($data->description); ?></p>
                            <div class="btn-wrapper  desktop-left padding-top-20">
                                <?php if(!empty($data->btn_01_status)): ?>
                                    <a href="<?php echo e($data->btn_01_url); ?>" class="boxed-btn btn-rounded white"><?php echo e($data->btn_01_text); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</header>

<style>
.header-bottom-area .left-content-area{
    height:450px;
}
.who-we-area .left-content-area{
    height:auto;
}
@media  only screen and (max-width: 300px) {
 .left-content-area{
    height:710px !important;
}
@media  only screen and (max-width: 500px) {
     .left-content-area{
        height:600px !important;
    }
}
@media  only screen and (min-width: 1200px) {
    .header-bottom-area .left-content-area{
        height:450px;
    }
}
@media  only screen and (max-width: 991px) {
    .header-bottom-area {
        margin-top: 0px !important;
    }
}
</style>

<div class="header-bottom-area section-bg-1">
    <div class="container">
        <div class="row">
            <?php if(!empty(get_static_option('home_page_key_feature_section_status'))): ?>
            <div class="col-lg-6" >
                <div class="left-content-area " style="background-color:#152b3c;">
                        <?php
                            $g = 0
                        ?>
                        
                        <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $g = $g + 1
                            ?>
                            <?php if($g <= 2): ?>
                                <div class="icon-box-one margin-bottom-30 white" >
                                    <div class="icon">
                                        <i class="text-light <?php echo e($data->icon); ?>"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><?php echo e($data->title); ?></h4>
                                        <p class=""><?php echo e($data->description); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        
                </div>
            </div>
            <?php endif; ?>
            <?php if(!empty(get_static_option('home_page_key_feature_section_status'))): ?>
            <div class="col-lg-6" >
                <div class="left-content-area" style="background-color:#152b3c;">
                    <!--<?php for($i = 1; $i < 4; $i++): ?>-->
                    <!--<?php endfor; ?>-->
                        <?php
                            $g = 0
                        ?>
                        
                        <?php $__currentLoopData = $all_key_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $g = $g + 1
                            ?>
                            <?php if($g >= 3 ): ?>
                                <div class="icon-box-one margin-bottom-30 white">
                                    <div class="icon">
                                        <i class="text-light <?php echo e($data->icon); ?>"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><?php echo e($data->title); ?></h4>
                                        <p class=""><?php echo e($data->description); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        
                </div>
            </div>
            <?php endif; ?>
            
            <!--<?php if(!empty(get_static_option('home_page_about_us_section_status'))): ?>-->
            <!--<div class="col-lg-6">-->
            <!--    <div class="right-content-area"-->
            <!--         <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_background_image')); ?>-->
            <!--    >-->
            <!--        <h4 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_title')); ?></h4>-->
            <!--        <p> <?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_description')); ?></p>-->
            <!--        <div class="sign">-->
            <!--            <?php echo render_image_markup_by_attachment_id(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_signature_image')); ?>-->
            <!--        </div>-->
            <!--        <h4 class="name"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_signature_text')); ?></h4>-->
            <!--        <?php if(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_status')): ?>-->
            <!--        <div class="btn-wrapper desktop-left">-->
            <!--            <a href="<?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_url')); ?>" class="boxed-btn btn-rounded"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_title')); ?></a>-->
            <!--        </div>-->
            <!--        <?php endif; ?>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<?php endif; ?>-->
        </div>
    </div>
</div>

<style>

@media  only screen and (max-width: 600px) {
    .icon-box-two.margin-bottom-30{
        height:230px;
    }
}
@media  only screen and (min-width: 601px){
    .icon-box-two.margin-bottom-30{
        height:190px;
    }
}
 
</style>
<?php if(!empty(get_static_option('home_page_service_section_status'))): ?>
    <section class="our-cover-area section-bg-1 padding-top-110 padding-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title desktop-center margin-bottom-55">
                        <h2 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_service_area_title')); ?></h2>
                        <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_service_area_description')); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $all_service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6" >
                        <div class="icon-box-two margin-bottom-30" >
                            <div class="icon">
                                <i class="<?php echo e($data->icon); ?>"></i>
                            </div>
                            <div class="content">
                                <a href="<?php echo e(route('frontend.services.single',$data->slug)); ?>"><h4 class="title"><?php echo e($data->title); ?></h4></a>
                                <p> <?php echo e($data->excerpt); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 ">
                        <a style="background-color:#152c4d;" href="<?php echo e(url('/service')); ?>" class="btn text-light rounded-md btn-lg w-100 ">See More</a>
                    </div>
            </div>
        </div>
    </section>

<?php endif; ?>
<?php if(!empty(get_static_option('home_page_call_to_action_section_status'))): ?>
<section class="cta-area-one cta-bg-one padding-top-95 padding-bottom-100"
   <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_background_image')); ?>

>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="left-content-area">
                    <h3 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_title')); ?></h3>
                    <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_description')); ?></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-content-area">
                    <div class="btn-wrapper">
                        <a href="<?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_button_url')); ?>" class="boxed-btn btn-rounded white"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_button_title')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if(!empty(get_static_option('about_page_about_us_section_status'))): ?>
    <div class="who-we-area padding-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title text-center mb-5">About Us</h2>        
                </div>
                <div class="col-lg-7">
                    <div class="left-content-area">
                        <div class="aboutus-content-block margin-bottom-25">
                            <p class="text-justify"><?php echo e(get_static_option('about_page_'.$user_select_lang_slug.'_about_section_description')); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 ml-0 pl-0 mb-2">
                        <a style="background-color:#152c4d;"  href="<?php echo e(url('/about')); ?>" class="w-100 btn btn-lg text-light rounded-lg">See More</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="img-wrapper">
                        <?php echo render_image_markup_by_attachment_id(get_static_option('about_page_'.$user_select_lang_slug.'_about_section_right_image')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if(!empty(get_static_option('home_page_recent_work_section_status'))): ?>
<section class="our-work-area padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_recent_work_title')); ?></h2>
                    <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_recent_work_description')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="our-work-carousel">
                    <?php $__currentLoopData = $all_work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-work-item">
                            <div class="thumb">
                                <?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?>

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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_counterup_section_status'))): ?>
<div class="counterup-area counterup-bg padding-top-115 padding-bottom-115"
     <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_01_counterup_bg_image')); ?>

>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="singler-counterup-item-01 white">
                    <div class="icon">
                        <i style="color:#eee;" class="flaticon-contract" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                        <div class="count-wrap"><span class="count-num">327</span></div>
                        <h4 class="title">Project Complete</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="singler-counterup-item-01 white">
                    <div class="icon">
                        <i style="color:#eee;" class="xg-flaticon-smile-1" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                        <div class="count-wrap"><span class="count-num">97</span>. <span class="count-num">4 </span> %</div>
                        <h4 class="title">Happy Clients</h4>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $all_counterup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6">
                <div class="singler-counterup-item-01 white">
                    <div class="icon">
                        <i style="color:#eee;" class="<?php echo e($data->icon); ?>" aria-hidden="true"></i>
                    </div>
                    <div class="content">
                        <div class="count-wrap"><span class="count-num"><?php echo e($data->number); ?></span><?php echo e($data->extra_text); ?></div>
                        <h4 class="title"><?php echo e($data->title); ?></h4>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_price_plan_section_status'))): ?>
<section class="price-plan-area  padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_price_plan_section_title')); ?></h2>
                    <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_price_plan_section_description')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="price-carousel">
                    <?php $__currentLoopData = $all_price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pricing-table-15">
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="latest-news padding-top-110 padding-bottom-120 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 offset-lg-1">
              <h2 class="text-center">Let's Talk About Business</h2>
              <p class="text-center">
                  Do you need help to scale up your business digitally? We have experts in the Software development & IT industry. We will be glad to assist you with all of your queries. Please let us know how may we help you. Describe your project details or requirements, we will get back to you within 1 business day.
              </p>
            </div>
            <div class="col-lg-12 offset-lg-0 div">
            <div class="row">
                <div class="col-lg-4 bg-custom-bluish px-4 py-5 h-100 d-flex flex-column align-items-center">
                  <div>
                    <h4 class="mt-4 text-primary">Call Us</h4>
                    <div>
                        <div>
                          <span>
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.59 1.322l2.844-1.322 4.041 7.889-2.724 1.342c-.538 1.259 2.159 6.289 3.297 6.372.09-.058 2.671-1.328 2.671-1.328l4.11 7.932s-2.764 1.354-2.854 1.396c-.598.273-1.215.399-1.842.397-5.649-.019-12.086-10.43-12.133-17.33-.016-2.407.745-4.387 2.59-5.348zm1.93 1.274l-1.023.504c-5.294 2.762 4.177 21.185 9.648 18.686l.972-.474-2.271-4.383-1.026.501c-3.163 1.547-8.262-8.219-5.055-9.938l1.007-.498-2.252-4.398zm15.48 14.404h-1v-13h1v13zm-2-2h-1v-9h1v9zm4-1h-1v-7h1v7zm-6-1h-1v-5h1v5zm-2-1h-1v-3h1v3zm10 0h-1v-3h1v3zm-12-1h-1v-1h1v1z"/></svg>
                          </span>
                          +880 1888 042371</div>
                        <div>
                          <span>
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.59 1.322l2.844-1.322 4.041 7.889-2.724 1.342c-.538 1.259 2.159 6.289 3.297 6.372.09-.058 2.671-1.328 2.671-1.328l4.11 7.932s-2.764 1.354-2.854 1.396c-.598.273-1.215.399-1.842.397-5.649-.019-12.086-10.43-12.133-17.33-.016-2.407.745-4.387 2.59-5.348zm1.93 1.274l-1.023.504c-5.294 2.762 4.177 21.185 9.648 18.686l.972-.474-2.271-4.383-1.026.501c-3.163 1.547-8.262-8.219-5.055-9.938l1.007-.498-2.252-4.398zm15.48 14.404h-1v-13h1v13zm-2-2h-1v-9h1v9zm4-1h-1v-7h1v7zm-6-1h-1v-5h1v5zm-2-1h-1v-3h1v3zm10 0h-1v-3h1v3zm-12-1h-1v-1h1v1z"/></svg>
                          </span>
                          +880 1888 042370</div>
                    </div>
                    <h4 class="mt-4 text-success">WhatsApp</h4>
                    <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>  
                        </span>
                        <span>+880 1888 042371</span>
                    </div>
                    <h4 class="mt-4 text-info">Email Us</h4>
                    <div>
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z"/></svg>
                        </span>
                        <span>info@rexoit.com</span>
                    </div>
                  </div>
                    
                </div>
                <div class="col-lg-8 px-5 py-4 bg-custom-bluish">
                    <h4 class="text-left text-center">Contact Form</h4>
                    
                        <?php if($errors->any()): ?>
                            <div class="alert alert-success">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>Thanks for your Message. we will get back to you very soon.</li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <form method="post" action="<?php echo e(route('frontend.quote.message')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                        <input type="text" name="your-name" class="form-control" placeholder="Your Full Name *" value="" required/>
                        </div>
                        <div class="form-group">
                        <input type="text" name="your-subject" class="form-control" placeholder="Your Subject *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="your-email" class="form-control" placeholder="Your Email *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="your-mobile" class="form-control" placeholder="Your Phone Number *" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="your-budget" class="form-control" placeholder="Your Budget *" value="" required/>
                        </div>
                        <div class="form-group">
                            <textarea name="your-message" class="form-control" placeholder="Type Here Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="files" class="form-control" placeholder="Your File" value="" />
                            <div class="text-danger">Accept File Type: jpg,jpeg,png,pdf,txt</div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="checkbox" id="checkbox" class="form-check-input" required />
                            <label class="form-check-label" for="checkbox">Accept Our Terms &amp; Condition <a href="#">Privacy Policy</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btn btn-danger" value="Send Message" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>




<?php if(!empty(get_static_option('home_page_team_member_section_status'))): ?>
<section class="meet-the-team-area section-bg-1 padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_title')); ?></h2>
                    <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_description')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-carousel">
                    <?php
                        $g = 0
                    ?>
                    <?php $__currentLoopData = $all_team_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $g = $g + 1
                        ?>
                        <?php if($g <= 14): ?>
                        <div class="single-team-member-one">
                            <div class="thumb thumb2">
                                <span class="rounded-full rounded-circle"><?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?></span> 
                                <div class="hover">
                                    <?php
                                        $social_fields = array(
                                            'icon_one' => 'icon_one_url',
                                            'icon_two' => 'icon_two_url',
                                            'icon_three' => 'icon_three_url',
                                        );
                                    ?>
                                    <ul class="social-icon">
                                        <?php $__currentLoopData = $social_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($data->$value)): ?>
                                                <li><a href="<?php echo e($data->$value); ?>"><i class="<?php echo e($data->$key); ?>"></i></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="content" style="height:140px;">
                                <h4 class="name"><?php echo e($data->name); ?></h4>
                                <span class="designation"><?php echo e($data->designation); ?></span>
                                
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_testimonial_section_status'))): ?>
<section class="testimonial-area testimonial-bg padding-top-110 padding-bottom-120"
    <?php echo render_background_image_markup_by_attachment_id(get_static_option('home_01_testimonial_bg')); ?>

>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-carousel owl-carousel owl-theme owl-loaded">
                    <?php $__currentLoopData = $all_testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-testimonial-item white">
                        <div class="icon">
                            <i class="flaticon-quote text-light"></i>
                        </div>
                        <p><?php echo e($data->description); ?> </p>
                        <div class="author-meta">
                            <h4 class="name"><?php echo e($data->name); ?></h4>
                            <span class="designation"><?php echo e($data->designation); ?></span>
                        </div>
                        <div class="thumb">
                            <?php echo render_image_markup_by_attachment_id($data->image,'','full'); ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_latest_news_section_status'))): ?>
<section class="latest-news padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title"><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_latest_news_title')); ?></h2>
                    <p><?php echo e(get_static_option('home_page_01_'.$user_select_lang_slug.'_latest_news_description')); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-news-carousel">
                    <?php $__currentLoopData = $all_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-blog-grid-01 lates_news" >
                            <div class="thumb rounded-circle " >
                                <a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><?php echo render_image_markup_by_attachment_id($data->image,'','grid'); ?></a>
                            </div>
                            <div class="content" style="height:350px;">
                                <h4 class="title"><a href="<?php echo e(route('frontend.blog.single',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                <ul class="post-meta">
                                    <li><i class="fa fa-calendar"></i> <?php echo e(date_format($data->created_at,'d M y')); ?></li>
                                    <li><i class="fa fa-user"></i> <?php echo e(render_blog_author($data->author)); ?></li>
                                    <li>
                                        <div class="cats"><i class="fa fa-calendar"></i>
                                            <?php echo get_blog_category_by_id($data->id,'link'); ?>

                                        </div>
                                    </li>
                                </ul>
                                <p><?php echo e($data->excerpt); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<style>
.Our_Clients div img{
    max-width:100%;
    height:auto;
    margin-left:auto;
    margin-right:auto;
}
</style>
<?php if(!empty(get_static_option('home_page_brand_logo_section_status'))): ?>
    <div class="brand-logo-area section-bg-1 padding-80">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-center">Our Honourable Clients</h2>
                </div>
                <div class="w-100 mx-auto col-lg-8 offset-lg-2 row Our_Clients ">
                        <?php $__currentLoopData = $all_brand_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-4 my-4 mx-auto w-100 text-center">
                                <?php if(!empty($data->url)): ?> <a href="<?php echo e($data->url); ?>"> <?php endif; ?>
                                <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                <?php if(!empty($data->url)): ?></a> <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!--<div class="brand-carousel">-->
                    <!--    <?php $__currentLoopData = $all_brand_logo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--        <div class="single-carousel">-->
                    <!--            <?php if(!empty($data->url)): ?> <a href="<?php echo e($data->url); ?>"> <?php endif; ?>-->
                    <!--            <?php echo render_image_markup_by_attachment_id($data->image); ?>-->
                    <!--            <?php if(!empty($data->url)): ?></a> <?php endif; ?>-->
                    <!--        </div>-->
                    <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if(!empty(get_static_option('home_page_newsletter_section_status'))): ?>
<?php echo $__env->make('frontend.partials.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/hbarmqwo/rexoit.com/@core/resources/views/frontend/home-pages/home-01.blade.php ENDPATH**/ ?>