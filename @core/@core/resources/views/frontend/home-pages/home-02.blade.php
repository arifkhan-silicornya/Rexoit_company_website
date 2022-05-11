@include('frontend.partials.navbar-02')
<header class="header-area-wrapper header-carousel-two">
    @foreach($all_header_slider as $data)
        <div class="header-area header-bg"
             {!! render_background_image_markup_by_attachment_id($data->image) !!}
        >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-inner">
                            <h1 class="title">{{$data->title}}</h1>
                            <p>{{$data->description}}</p>
                            <div class="btn-wrapper  desktop-left padding-top-20">
                                @if(!empty($data->btn_01_status))
                                    <a href="{{$data->btn_01_url}}" class="boxed-btn btn-rounded white">{{$data->btn_01_text}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</header>
@if(!empty(get_static_option('home_page_key_feature_section_status')))
<div class="header-bottom-area style-two">
    <div class="container">
        <div class="row">
            @foreach($all_key_features as $data)
                <div class="col-lg-4 col-md-6">
                    <div class="feature-box-01">
                        <div class="icon">
                            <i class="{{$data->icon}}"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">{{$data->title}}</h4>
                            <p>{{$data->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('home_page_service_section_status')))
<section class="our-cover-area padding-top-110 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_service_area_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_service_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_service as $key => $data)
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box-three margin-bottom-30">
                        @if($data->icon_type == 'icon' || $data->icon_type == '')
                            <div class="icon style-0{{$key+1}}">
                                <i class="{{$data->icon}}"></i>
                            </div>
                        @else
                            <div class="img-icon style-0{{$key+1}}">
                                {!! render_image_markup_by_attachment_id($data->img_icon) !!}
                            </div>
                        @endif
                        <div class="content">
                            <a href="{{route('frontend.services.single',$data->slug)}}"><h4 class="title">{{$data->title}}</h4></a>
                            <p> {{$data->excerpt}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_about_us_section_status')))
<div class="aboutus-two-area aboutus-bg padding-120"
     {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_02_'.$user_select_lang_slug.'_about_us_background_image')) !!}
>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="aboutus-content-block">
                    <h4 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_title')}}</h4>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_description')}}</p>
                    @if(get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_status'))
                        <div class="btn-wrapper desktop-left">
                            <a href="{{get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_url')}}" class="boxed-btn btn-rounded">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_about_us_button_title')}}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('home_page_call_to_action_section_status')))
<section class="cta-area-one cta-bg-one padding-top-95 padding-bottom-100"
   {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_background_image')) !!}
>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="left-content-area">
                    <h3 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_title')}}</h3>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_description')}}</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-content-area">
                    <div class="btn-wrapper">
                        <a href="{{get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_button_url')}}" class="boxed-btn btn-rounded white">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_cta_area_button_title')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_recent_work_section_status')))
<section class="our-work-area padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_recent_work_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_recent_work_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="our-work-carousel">
                    @foreach($all_work as $data)
                        <div class="single-work-item">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('frontend.work.single',$data->slug)}}"> {{$data->title}}</a></h4>
                                <div class="cats">
                                    @php
                                        $all_cat_of_post = get_work_category_by_id($data->id);
                                    @endphp
                                    @if(!empty($all_cat_of_post))
                                    @foreach($all_cat_of_post as $key => $work_cat)
                                        <a href="{{route('frontend.works.category',['id' => $key,'any'=> Str::slug($work_cat)])}}">{{$work_cat}}</a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_testimonial_section_status')))
<div class="testimonial-two-area testimonial-bg padding-120"
     {!! render_background_image_markup_by_attachment_id(get_static_option('home_01_testimonial_bg')) !!}
>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-carousel-two">
                    @foreach($all_testimonial as $data)
                        <div class="single-testimonial-item-02">
                            <div class="description">
                                <div class="icon">
                                    <i class="flaticon-left-quote"></i>
                                </div>
                                <div class="content">
                                    <p>{{$data->description}} </p>
                                    <h4 class="name">{{$data->name}}</h4>
                                    <span class="designation">{{$data->designation}}</span>
                                </div>
                            </div>
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','full') !!}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('home_page_price_plan_section_status')))
<section class="price-plan-area  padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_price_plan_section_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_price_plan_section_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="price-carousel">
                    @foreach($all_price_plan as $data)
                        <div class="pricing-table-15">
                            <div class="price-header">
                                <div class="icon"><i class="{{$data->icon}}"></i></div>
                                <h3 class="title">{{$data->title}}</h3>
                            </div>

                            <div class="price">
                                <span class="dollar"></span>{{amount_with_currency_symbol($data->price)}}<span class="month">{{$data->type}}</span>
                            </div>
                            <div class="price-body">
                                <ul>
                                    @php
                                        $features = explode(';',$data->features);
                                    @endphp
                                    @foreach($features as $item)
                                        <li>{{$item}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="price-footer">
                                @if(!empty($data->url_status))
                                    <a class="order-btn" href="{{route('frontend.plan.order',$data->id)}}">{{$data->btn_text}}</a>
                                @else
                                    <a class="order-btn" href="{{$data->btn_url}}">{{$data->btn_text}}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_counterup_section_status')))
<div class="counterup-area counterup-bg padding-top-115 padding-bottom-115"
     {!! render_background_image_markup_by_attachment_id(get_static_option('home_01_counterup_bg_image')) !!}
>
    <div class="container">
        <div class="row">
            @foreach($all_counterup as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="singler-counterup-item-01 white">
                        <div class="icon">
                            <i class="{{$data->icon}}" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="count-wrap"><span class="count-num">{{$data->number}}</span>{{$data->extra_text}}</div>
                            <h4 class="title">{{$data->title}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('home_page_team_member_section_status')))
<section class="meet-the-team-area section-bg-1 padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-carousel">
                    @foreach($all_team_members as $data)
                        <div class="single-team-member-one">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                                <div class="hover">
                                    @php
                                        $social_fields = array(
                                            'icon_one' => 'icon_one_url',
                                            'icon_two' => 'icon_two_url',
                                            'icon_three' => 'icon_three_url',
                                        );
                                    @endphp
                                    <ul class="social-icon">
                                        @foreach($social_fields as $key => $value)
                                            @if(!empty($data->$value))
                                                <li><a href="{{$data->$value}}"><i class="{{$data->$key}}"></i></a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4 class="name">{{$data->name}}</h4>
                                <span class="designation">{{$data->designation}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_latest_news_section_status')))
<section class="latest-news padding-top-110 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title desktop-center margin-bottom-55">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_latest_news_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_latest_news_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-news-carousel">
                    @foreach($all_blog as $data)
                        <div class="single-blog-grid-01">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="{{route('frontend.blog.single',$data->slug)}}">{{$data->title}}</a></h4>
                                <ul class="post-meta">
                                    <li><a href="{{route('frontend.blog.single',$data->slug)}}"><i class="fa fa-calendar"></i> {{date_format($data->created_at,'d M y')}}</a></li>
                                    <li><a href="{{route('frontend.blog.single',$data->slug)}}"><i class="fa fa-user"></i> {{$data->user->username}}</a></li>
                                    <li>
                                        <div class="cats"><i class="fa fa-calendar"></i>
                                            {!! get_blog_category_by_id($data->id,'link') !!}
                                        </div>
                                    </li>
                                </ul>
                                <p>{{$data->excerpt}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(!empty(get_static_option('home_page_brand_logo_section_status')))
    <div class="brand-logo-area section-bg-1 padding-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        @foreach($all_brand_logo as $data)
                            <div class="single-carousel">
                                @if(!empty($data->url)) <a href="{{$data->url}}"> @endif
                                    {!! render_image_markup_by_attachment_id($data->image,'','full') !!}
                                @if(!empty($data->url))</a> @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(!empty(get_static_option('home_page_newsletter_section_status')))
@include('frontend.partials.newsletter')
@endif