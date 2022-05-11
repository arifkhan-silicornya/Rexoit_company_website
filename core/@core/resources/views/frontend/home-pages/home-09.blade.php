<div class="header-charity-area">
    <div class="info-bar-area style-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info-bar-inner">
                        <div class="left-content">
                           <div class="desktop-logo">
                               <a href="{{url('/')}}" class="site-logo">
                                   {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                               </a>
                           </div>
                        </div>
                        <div class="right-content">
                            <ul class="social-icon">
                                <li class="title">{{__('Follow:')}}</li>
                                @foreach($all_social_item as $data)
                                    <li><a href="{{$data->url}}"><i class="{{$data->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                            @if(!empty(get_static_option('hide_frontend_language_change_option')))
                                <div class="language_dropdown" id="languages_selector">
                                    <div class="selected-language">{{get_language_name_by_slug(get_user_lang())}} <i class="fas fa-caret-down"></i></div>
                                    <ul>
                                        @foreach($all_language as $lang)
                                            <li data-value="{{$lang->slug}}">{{$lang->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top-style-03">
        <nav class="navbar navbar-area navbar-expand-lg nav-style-02 home-variant-{{get_static_option('home_page_variant')}}">
            <div class="container nav-container">
                <div class="navbar-brand mobile-logo">
                    <a href="{{url('/')}}" class="logo">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                        {!! render_menu_by_id($primary_menu_id) !!}
                    </ul>
                </div>
                @if(!empty(get_static_option('navbar_button')))
                    <div class="nav-right-content">
                        @php $quote_btn_url = !empty(get_static_option('navbar_button_custom_url_status')) ? get_static_option('navbar_button_custom_url') : route('frontend.request.quote'); @endphp
                        <a href="{{$quote_btn_url}}" class="get-quote">{{get_static_option('navbar_'.$user_select_lang_slug.'_button_text')}}</a>
                    </div>
                @endif
            </div>
        </nav>
    </div>
</div>
<header class="header-area-wrapper header-carousel-two">
    @foreach($all_header_slider as $data)
        <div class="header-area style-03 header-bg"
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
@if(!empty(get_static_option('charity_home_page_key_feature_section_status')))
<div class="charity-header-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-bottom-inner-wrap">
                    <ul>
                        @php
                              $all_icon_fields =  get_static_option('home_page_09_icon_box_icon');
                               $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                               $button_url_fields =  get_static_option('home_page_09_icon_box_button_url');
                               $button_url_fields = !empty($button_url_fields) ? unserialize($button_url_fields) : [];
                               $all_title_fields = get_static_option('home_page_09_'.$user_select_lang_slug.'_icon_box_title');
                               $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['volunteers'];
                               $all_button_text_fields = get_static_option('home_page_09_'.$user_select_lang_slug.'_icon_box_button_text');
                               $all_button_text_fields = !empty($all_button_text_fields) ? unserialize($all_button_text_fields) : [];
                               $all_description_fields = get_static_option('home_page_09_'.$user_select_lang_slug.'_icon_box_description');
                               $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : [];
                        @endphp
                        @if(!empty($all_icon_fields))
                            @foreach($all_icon_fields as $index => $icon_field)
                            <li class="single-charity-icon-box-one">
                                <div class="hover">
                                    <i class="{{$icon_field}}"></i>
                                    <h4 class="title">{{$all_title_fields[$index]}}</h4>
                                    <p>{{$all_description_fields[$index]}}</p>
                                    <a href="{{$button_url_fields[$index]}}" class="icon-box-btn">{{$all_button_text_fields[$index]}}</a>
                                </div>
                                <div class="icon">
                                    <i class="{{$icon_field}}"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">{{$all_title_fields[$index]}}</h4>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_about_section_status')))
<div class="about-us-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-wrapper">
                    {!! render_image_markup_by_attachment_id(get_static_option('home_page_09_about_area_left_image')) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content-wrap">
                    <span class="subtitle">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_about_area_subtitle')}}</span>
                    <h3 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_about_area_title')}}</h3>
                    <div class="description-wrap">
                        {!! get_static_option('home_page_09_'.$user_select_lang_slug.'_about_area_description') !!}
                    </div>
                    <div class="btn-wrapper">
                        <a href="{{get_static_option('home_page_09_about_area_btn_url')}}" class="boxed-btn">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_about_area_btn_text')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_our_mission_section_status')))
<div class="service-area padding-bottom-90 alice-blue padding-top-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_service_area_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_service_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_service as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-service-item-09">
                    @if($data->icon_type == 'icon' || $data->icon_type == '')
                    <div class="icon">
                        <i class="{{$data->icon}}"></i>
                    </div>
                    @else
                        <div class="img-icon">
                            {!! render_image_markup_by_attachment_id($data->img_icon) !!}
                        </div>
                    @endif
                    <div class="content">
                        <h4 class="title"><a href="{{route('frontend.services.single',$data->slug)}}">{{$data->title}}</a></h4>
                        <p>{{$data->excerpt}}</p>
                        <a href="{{route('frontend.services.single',$data->slug)}}" class="readmore">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_service_area_read_more_text')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_recent_cause_section_status')))
<div class="recent-cause padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_recent_cause_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_recent_cause_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-cause-carousel">
                    @foreach($recent_causes as $data)
                        <div class="contribute-single-item grid-item charity-home">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                            </div>
                            <div class="content">
                                <a href="{{route('frontend.donations.single',$data->slug)}}"><h4 class="title">{{$data->title}}</h4></a>
                                <p>{{strip_tags(Str::words(strip_tags($data->donation_content),20))}}</p>
                                <div class="thumb-content">
                                    <div class="progress-item">
                                        <div class="single-progressbar">
                                            <div class="donation-progress" data-percent="{{get_percentage($data->amount,$data->raised)}}"></div>
                                        </div>
                                    </div>
                                    <div class="goal">
                                        <h4 class="raised">{{get_static_option('donation_raised_'.$user_select_lang_slug.'_text')}} @if(!empty($data->raised)){{amount_with_currency_symbol($data->raised)}}@else {{amount_with_currency_symbol(0)}} @endif</h4>
                                        <h4 class="raised">{{get_static_option('donation_goal_'.$user_select_lang_slug.'_text')}} {{amount_with_currency_symbol($data->amount)}}</h4>
                                    </div>
                                </div>
                                <div class="btn-wrapper">
                                    <a href="{{route('frontend.donations.single',$data->slug)}}" class="boxed-btn">{{get_static_option('donation_button_'.$user_select_lang_slug.'_text')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_our_gallery_section_status')))
<div class="our-gallery-area padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_our_gallery_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_our_gallery_description')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-masonry-init">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="gallery-masonry-nav">
                        <li data-filter="*" class="active"> {{__('All')}}</li>
                        @foreach($all_image_category as $data)
                            <li data-filter=".{{Str::slug($data->title)}}">{{$data->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="gallery-masonry">
           @foreach($image_gallery as $data)
                <div class="col-lg-3 col-md-6 masonry-item {{Str::slug(get_gallery_category($data->category_id))}}">
                   <div class="single-image-gallery-item">
                       <div class="thumb">
                           {!! render_image_markup_by_attachment_id($data->image,'masonry-image') !!}
                           <div class="hover">
                               @php
                                   $gallery_img = get_attachment_image_by_id($data->image,null,true);
                                   $img_url = !empty($gallery_img) ? $gallery_img['img_url'] : '';
                               @endphp
                               <a href="{{$img_url}}" class="image-popup" title="{{$data->title}}"><i class="fas fa-search"></i></a>
                           </div>
                       </div>
                   </div>
                </div>
           @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_our_events_section_status')))
<div class="event-area-wrap padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_event_area_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_event_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="event-carousel">
                    @foreach($all_events as $data)
                        <div class="single-event-item">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <div class="content">
                                <div class="top-part">
                                    <div class="time-wrap">
                                        <span class="date">{{date('d',strtotime($data->date))}}</span>
                                        <span class="month">{{date('M',strtotime($data->date))}}</span>
                                    </div>
                                    <div class="title-wrap">
                                        <a href="{{route('frontend.events.single',$data->slug)}}"><h4 class="title">{{$data->title}}</h4></a>
                                        <span class="location"><i class="fas fa-map-marker-alt"></i> {{$data->location}}</span>
                                    </div>
                                </div>
                                <p>{{Str::words(strip_tags($data->content),20)}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_counterup_section_status')))
<div class="counterup-area charity-home padding-top-120 padding-bottom-110"
{!! render_background_image_markup_by_attachment_id(get_static_option('home_09_counterup_bg_image')) !!}
>
    <div class="container">
        <div class="row">
            @foreach($all_counterup as $data)
            <div class="col-lg-3 col-md-6">
                <div class="counterup-wrap-09">
                    <div class="icon">
                        <i class="{{$data->icon}}"></i>
                    </div>
                    <div class="content">
                        <div class="count-wrap"><span class="count-num">{{$data->number}}</span> {{$data->extra_text}}</div>
                        <h5 class="title">{{$data->title}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_team_member_section_status')))
<div class="team-member-area padding-top-120 padding-bottom-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_team_member_area_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_team_member_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-member-carousel-09">
                    @foreach($all_team_members as $data)
                    <div class="single-team-member-style-09">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                        </div>
                        <div class="content">
                            <h4 class="title">{{$data->name}}</h4>
                            <span class="designation">{{$data->designation}}</span>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_testimonial_section_status')))
<div class="testimonial-area charity-gray-bg padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_testimonial_area_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_testimonial_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-carousel">
                    @foreach($all_testimonial as $data)
                    <div class="single-testimonial-item-09">
                        <p>{{$data->description}}</p>
                        <div class="author-meta">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <div class="content">
                                <h4 class="title">{{$data->name}}</h4>
                                <span class="designation">{{$data->designation}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_news_blog_section_status')))
<div class="new-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_news_blog_area_title')}}</h2>
                    <p>{{get_static_option('home_page_09_'.$user_select_lang_slug.'_news_blog_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-news-carousel">
                    @foreach($all_blog as $data)
                    <div class="single-new-item-09">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                        </div>
                        <div class="content">
                            <ul class="post-meta">
                                <li><i class="fas fa-calendar-alt"></i> <a href="{{route('frontend.blog.single',$data->slug)}}">{{date_format($data->created_at,'d M y')}}</a></li>
                                <li><i class="fas fa-comment"></i> <a href="{{route('frontend.blog.single',$data->slug)}}">{{render_blog_author($data->author)}}</a></li>
                            </ul>
                            <h4 class="title"><a href="{{route('frontend.blog.single',$data->slug)}}">{{$data->title}}</a></h4>
                            <a href="{{route('frontend.blog.single',$data->slug)}}" class="readmore">{{get_static_option('home_page_09_'.$user_select_lang_slug.'_news_blog_area_readmore_text')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('charity_home_page_brand_carousel_section_status')))
<div class="brand-logo-area  padding-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-carousel">
                    @foreach($all_brand_logo as $data)
                        <div class="single-carousel charity-home">
                            @if(!empty($data->url)) <a href="{{$data->url}}"> @endif
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                                @if(!empty($data->url))</a> @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif