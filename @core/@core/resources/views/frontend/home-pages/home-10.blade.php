<div class="header-jobs-area">
    @if(!empty(get_static_option('job_home_page_topbar_section_status')))
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
    <div class="left-circle-wrap">
        <img src="{{asset('assets/frontend/img/shape/job-home-top-left-circle.png')}}" alt="">
    </div>
    <div class="right-shape-wrap">
        <img src="{{asset('assets/frontend/img/shape/job-home-top-right-shape.png')}}" alt="">
    </div>
<nav class="navbar navbar-area navbar-expand-lg nav-style-job-home home-variant-{{get_static_option('home_page_variant')}}">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="{{url('/')}}" class="logo">
                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                {!! render_menu_by_id($primary_menu_id) !!}
            </ul>
            @if(!empty(get_static_option('navbar_button')))
            <div class="nav-right-content">
                <ul>
                    <li class="btn-wrapper" >
                        @php $quote_btn_url = !empty(get_static_option('navbar_button_custom_url_status')) ? get_static_option('navbar_button_custom_url') : route('frontend.request.quote'); @endphp
                        <a href="{{$quote_btn_url}}" class="boxed-btn">{{get_static_option('navbar_'.$user_select_lang_slug.'_button_text')}}</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</nav>

<div class="header-area">
    <div class="right-image-wrapper">
        {!! render_image_markup_by_attachment_id(get_static_option('home_page_10_header_right_image')) !!}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="title">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_header_title')}}</h1>
                <p>{{get_static_option('home_page_10_'.$user_select_lang_slug.'_header_description')}}</p>
                @if(!empty(get_static_option('home_page_10_'.$user_select_lang_slug.'_search_form_status')))
                <div class="search-wrapper">
                    <form action="{{route('frontend.jobs.search')}}" method="get">
                        <input type="text" class="form-control" name="search" placeholder="{{get_static_option('home_page_10_'.$user_select_lang_slug.'_header_search_placeholder')}}">
                        <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@if(!empty(get_static_option('job_home_page_category_section_status')))
<div class="jobs-category-area-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jobs-category-slider">
                    @foreach($jobs_category as $data)
                    <div class="single-jobs-category-items">
                        @if($data->icon_type == 'icon')
                        <div class="icon">
                            <i class="{{$data->icon}}"></i>
                        </div>
                        @else
                            <div class="img-icon">
                                {!! render_image_markup_by_attachment_id($data->img_icon) !!}
                            </div>
                        @endif
                        <div class="content">
                            <h4 class="title"><a href="{{route('frontend.jobs.category',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->title}}</a></h4>
                            <span class="total">{{get_job_category_item_count($data->id).' '.__('Job Posted')}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('job_home_page_featured_job_section_status')))
<div class="feature-job-area padding-bottom-100 padding-top-120">
    <div class="right-top-left-image-wrap">
        <img src="{{asset('assets/frontend/img/shape/job-home-featred-job-top-right.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-40">
                    <h2 class="title">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_featured_job_area_title')}}</h2>
                    <p>{{get_static_option('home_page_10_'.$user_select_lang_slug.'_featured_job_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-job-carousel">
                    @foreach($jobs_featured as $data)
                    <div class="single-featured-job-post">
                        <div class="top-part-wrapper">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->company_logo) !!}
                            </div>
                            <div class="top-part-content">
                                <h4 class="company-name">{{$data->company_name}}</h4>
                                <span class="location">{{$data->job_location}}</span>
                            </div>
                        </div>
                        <div class="middle-part-wrapper">
                            <h4 class="title"><a href="{{route('frontend.jobs.single',$data->slug)}}">{{$data->title}}</a></h4>
                            <span class="salary">{{$data->salary}}</span>
                        </div>
                        <div class="bottom-part-wrapper">
                            <span class="job-nature">{{ucfirst(str_replace('_',' ',$data->employment_status))}}</span>
                            <a href="{{route('frontend.jobs.single',$data->slug)}}" class="boxed-btn">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_featured_job_button_title')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('job_home_page_millions_section_status')))
<div class="millions-job-area">
    <div class="bottom-shape-wrapper">
        <img src="{{asset('assets/frontend/img/shape/job-home-million-job-shape.png')}}" alt="">
    </div>
    <div class="right-content-image-wrapper">
        {!! render_image_markup_by_attachment_id(get_static_option('home_page_10_million_job_area_image')) !!}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
               <div class="million-job-inner-area">
                   <h4 class="title">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_million_job_area_title')}}</h4>
                   <p>{!! get_static_option('home_page_10_'.$user_select_lang_slug.'_million_job_area_description') !!}</p>
               </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('job_home_page_latest_job_section_status')))
<div class="latest-job-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-60">
                    <h2 class="title">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_latest_job_area_title')}}</h2>
                    <p>{{get_static_option('home_page_10_'.$user_select_lang_slug.'_latest_job_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach($jobs_latest as $data)
                <div class="single-latest-job-post">
                    <div class="top-part-wrap">
                        <div class="left-top-part">
                            @if(!empty($data->company_logo))
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->company_logo) !!}
                            </div>
                            @endif
                            <div class="content @if(!empty($data->company_logo)) hast-thumbnail @endif">
                                <h4 class="title"><a href="{{route('frontend.jobs.single',$data->slug)}}">{{$data->title}}</a></h4>
                                <span class="company">{{$data->company_name}}</span>
                            </div>
                        </div>
                        <div class="right-top-part">
                            <h5 class="deadline-title">{{__("Deadline")}}</h5>
                            <span class="deadline-time">{{date('d M Y',strtotime($data->deadline))}}</span>
                        </div>
                    </div>
                    <div class="bottom-part-warp">
                        <ul>
                            <li class="bottom-part-box">
                                <h5 class="title">{{__('Location')}}</h5>
                                <span class="details">{{$data->job_location}}</span>
                            </li>
                            <li class="bottom-part-box">
                                <h5 class="title">{{__('Job Type')}}</h5>
                                <span class="details">{{__(str_replace('_',' ',$data->employment_status))}}</span>
                            </li>
                            <li class="bottom-part-box">
                                <h5 class="title">{{__('Salary')}}</h5>
                                <span class="details">{{$data->salary}}</span>
                            </li>
                            <li class="bottom-part-box">
                                <a href="{{route('frontend.jobs.single',$data->slug)}}" class="apply-btn">{{__('Apply Now')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="btn-wrapper margin-top-40 text-center">
                    <a href="{{route('frontend.jobs')}}" class="boxed-btn">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_latest_job_button_title')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('job_home_page_latest_news_section_status')))
<div class="news-area">
    <div class="right-circle-shape">
        <img src="{{asset('assets/frontend/img/shape/job-home-news-shape-circle.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-60">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_latest_news_title')}}</h2>
                    <p>{{get_static_option('home_page_10_'.$user_select_lang_slug.'_latest_job_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-news-carousel">
                    @foreach($all_blog as $data)
                        <div class="single-blog-grid-10">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                            </div>
                            <div class="content">
                                <ul class="post-meta">
                                    <li><a href="{{route('frontend.blog.single',$data->slug)}}"><i class="fas fa-calendar"></i> {{date_format($data->created_at,'d M y')}}</a></li>
                                    <li>
                                        <div class="cats"><i class="fas fa-tags"></i>
                                            {!! get_blog_category_by_id($data->id,'link') !!}
                                        </div>
                                    </li>
                                </ul>
                                <h4 class="title"><a href="{{route('frontend.blog.single',$data->slug)}}">{{$data->title}}</a></h4>
                                <a href="{{route('frontend.blog.single',$data->slug)}}" class="readmore">{{__('Read More')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('job_home_page_testimonial_section_status')))
<div class="testimonial-area padding-top-120 padding-bottom-100 job-home">
    <div class="top-right-shape-wrap">
        <img src="{{asset('assets/frontend/img/shape/job-home-testimonial-shape.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="section-title">
                    <h2 class="title">{{get_static_option('home_page_10_'.$user_select_lang_slug.'_testimonial_area_title')}}</h2>
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
@if(!empty(get_static_option('job_home_page_brand_carousel_section_status')))
    <div class="brand-logo-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-carousel">
                        @foreach($all_brand_logo as $data)
                            <div class="single-carousel">
                                @if(!empty($data->url)) <a href="{{$data->url}}"> @endif
                                    {!! render_image_markup_by_attachment_id($data->image) !!}
                                @if(!empty($data->url)) </a> @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
