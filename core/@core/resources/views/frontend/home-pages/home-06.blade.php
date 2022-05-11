<div class="service-header"  {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_06_header_background_image')) !!}>
    @if(!empty(get_static_option('service_home_page_topbar_section_status')))
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="topbar-inner">
                            <div class="left-contnet">
                                <ul class="social-icon">
                                    @foreach($all_social_item as $data)
                                        <li><a href="{{$data->url}}"><i class="{{$data->icon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right-contnet">
                                <ul class="info-menu">
                                    {!! render_menu_by_id($top_menu_id) !!}
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
    @endif
    @include('frontend.partials.navbar-05')
    <header class="header-area-wrapper">
        <div class="right-image-wrap">
            {!! render_image_markup_by_attachment_id(get_static_option('home_page_06_header_right_image')) !!}
        </div>
            <div class="header-area header-style-06">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-inner">
                                <h1 class="title">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_header_area_title')}}</h1>
                                <p>{{get_static_option('home_page_06_'.$user_select_lang_slug.'_header_area_description')}}</p>
                                <div class="search-wrapper">
                                    <form action="{{route('frontend.gigs.search')}}" method="get">
                                        <input type="text" class="form-control" name="s" placeholder="{{__('Search here')}}">
                                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>
</div>
@if(!empty(get_static_option('service_home_page_category_section_status')))
<div class="gigs-category-area padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gigs-category-carousel">
                    @php $a = 1;@endphp
                    @foreach($all_gig_category as $key => $data)
                    <div class="single-gig-category">
                        @if($data->icon_type == 'icon' || $data->icon_type == '')
                            <div class="icon style-{{$a}}">
                                <i class="{{$data->icon}}"></i>
                            </div>
                        @else
                            <div class="img-icon style-{{$a}}">
                                {!! render_image_markup_by_attachment_id($data->img_icon) !!}
                            </div>
                        @endif
                        <div class="content">
                            <h4 class="title"><a href="{{route('frontend.gigs.category',['id' => $data->id, 'any' => Str::slug($data->name)])}}">{{$data->name}}</a></h4>
                        </div>
                    </div>
                        @php if ($a == 5){ $a = 1;}else{ $a++;} @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('service_home_page_video_section_status')))
<div class="video-area-wrapper padding-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-container-wrap">
                   <div class="thumb">
                       {!! render_image_markup_by_attachment_id(get_static_option('home_page_06_video_area_background_image')) !!}
                       <div class="hover">
                           <a href="{{get_static_option('home_page_06_video_area_video_url')}}" class="video-popup mfp-iframe"><i class="fas fa-play"></i></a>
                       </div>
                   </div>
                </div>
                @if(!empty(get_static_option('service_home_page_brand_carousel_section_status')))
                <div class="brand-carousel-wrapper padding-top-80">
                    <div class="brand-carousel">
                        @foreach($all_brand_logo as $data)
                            <div class="single-carousel service-home">
                                @if(!empty($data->url)) <a href="{{$data->url}}"> @endif
                                    {!! render_image_markup_by_attachment_id($data->image) !!}
                                    @if(!empty($data->url))</a> @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('service_home_page_all_services_section_status')))
<div class="all-services-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center padding-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_our_service_area_title')}}</h2>
                    <p>{{get_static_option('home_page_06_'.$user_select_lang_slug.'_our_service_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_gigs as $data)
            <div class="col-lg-4 col-md-6">
                <div class="single-gig-item">
                    <div class="thumb">
                        {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                        <div class="price-wrap">
                           {{__("Start From").' '.gig_start_price($data->id)}}
                        </div>
                        <a href="{{route('frontend.gigs.single',$data->slug)}}" class="order-btn"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="{{route('frontend.gigs.single',$data->slug)}}">{{$data->title}}</a></h4>
                        <p>{!! Str::words(strip_tags($data->description),20) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div class="btn-wrapper desktop-center margin-top-60">
                    <a href="{{route('frontend.gigs')}}" class="boxed-btn service-home">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_our_service_area_button_text')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('service_home_page_counterup_section_status')))
<div class="counterup-area padding-top-115 padding-bottom-115"
        {!! render_background_image_markup_by_attachment_id(get_static_option('home_06_counterup_bg_image')) !!}
>
    <div class="container">
        <div class="row">
            @foreach($all_counterup as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="single-counterup-item-06">
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
@if(!empty(get_static_option('service_home_page_work_process_section_status')))
<div class="our-work-process-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center padding-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_work_process_area_title')}}</h2>
                    <p>{{get_static_option('home_page_06_'.$user_select_lang_slug.'_work_process_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="work-process-wrap">
                    @php
                        $all_icon_fields =  get_static_option('home_page_06_work_process_number');
                        $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['1'];
                    @endphp
                    @if(count($all_icon_fields) > 0)
                    <ul class="work-process-list">
                        @php
                            $all_title_fields = get_static_option('home_page_06_'.$user_select_lang_slug.'_work_process_title');
                            $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [__('Signup/Login')];
                            $a = 1;
                        @endphp
                        @foreach($all_icon_fields as $index => $icon_field)
                        <li class="single-work-item-06">
                            <div class="number style-{{$a}}">{{$icon_field}}</div>
                            <div class="content">
                                <h4 class="title">{{$all_title_fields[$index]}}</h4>
                            </div>
                        </li>
                        @php if($a == 5){$a = 1;}else{$a++;} @endphp
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('service_home_page_testimonial_section_status')))
<div class="testimonial-area padding-bottom-100 padding-top-80">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_testimonial_area_title')}}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-wrapper-job-home">
                    <div class="testimonial-carousel-job-home">
                        @foreach($all_testimonial as $data)
                            <div class="single-testimonial-item-10">
                                <div class="top-part">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image) !!}
                                    </div>
                                    <div class="author">
                                        <h4 class="title">{{$data->name}}</h4>
                                        <span class="designation">{{$data->designation}}</span>
                                    </div>
                                </div>
                                <div class="bottom-part">
                                    <i class="fas fa-quote-left"></i>
                                    <p>{{$data->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('service_home_page_latest_news_section_status')))
<div class="news-area padding-top-120 padding-bottom-90 service-home-bg"
{!! render_background_image_markup_by_attachment_id(get_static_option('home_06_news_area_background_image')) !!}
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center padding-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_news_area_title')}}</h2>
                    <p>{{get_static_option('home_page_06_'.$user_select_lang_slug.'_news_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-news-carousel service-home">
                    @foreach($all_blog as $data)
                        <div class="news-item-style-06">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <div class="content">
                                <ul class="post-meta">
                                    <li><i class="far fa-calendar-alt"></i> <a href="{{route('frontend.blog.single',$data->slug)}}">{{date_format($data->created_at,'d M y')}}</a></li>
                                    <li><i class="far fa-user"></i> <a href="{{route('frontend.blog.single',$data->slug)}}">{{render_blog_author($data->author)}}</a></li>
                                </ul>
                                <h4 class="title"><a href="{{route('frontend.blog.single',$data->slug)}}">{{$data->title}}</a></h4>
                                <a href="{{route('frontend.blog.single',$data->slug)}}" class="readmore">{{get_static_option('home_page_06_'.$user_select_lang_slug.'_news_area_read_more_text')}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif