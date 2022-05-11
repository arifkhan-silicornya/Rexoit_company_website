<div class="header-event-area">
    @if(!empty(get_static_option('event_home_page_topbar_section_status')))
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
    @include('frontend.partials.navbar-06')
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
</div>
@if(!empty(get_static_option('event_home_page_featured_event_section_status')))
<div class="home-07header-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @php
                    $event = \App\Events::find(get_static_option('home_page_07_featured_event'));
                @endphp
                @if(!empty($event))
                <div class="featured-event-area-wrapper">
                    <div class="left-content-wrap">
                        <div class="countdown-wrapper">
                            <div id="featured_event_countdown" data-time="{{$event->date}}"></div>
                        </div>
                    </div>
                    <div class="right-content-wrap">
                        <span class="location"><i class="fas fa-map-marker-alt"></i> {{$event->venue_location}}</span>
                        <span class="location"><i class="fas fa-calendar-alt"></i> {{$event->time}}</span>
                        <div class="btn-wrapper">
                            <a href="{{route('frontend.events.single',$event->slug)}}" class="boxed-btn">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_featured_area_button_title')}}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@if(!empty(get_static_option('event_home_page_why_attend_event_section_status')))
<div class="why-attend-event padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title event-home desktop-center padding-bottom-50">
                    <span class="subtitle">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_attend_event_area_subtitle')}}</span>
                    <h2 class="title">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_attend_event_area_title')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                 $all_icon_fields =  get_static_option('home_page_07_icon_box_icon');
                 $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                 $all_title_fields = get_static_option('home_page_07_'.$user_select_lang_slug.'_icon_box_title');
                 $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['volunteers'];
                 $all_description_fields = get_static_option('home_page_07_'.$user_select_lang_slug.'_icon_box_description');
                 $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : [];
            @endphp
            @if(!empty($all_icon_fields))
                @foreach($all_icon_fields as $index => $icon_field)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-event-attend-box-one">
                            <span class="bg-icon"><i class="{{$icon_field}}"></i></span>
                            <div class="icon">
                                <i class="{{$icon_field}}"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{$all_title_fields[$index]}}</h4>
                                <p>{{$all_description_fields[$index]}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endif

@if(!empty(get_static_option('event_home_page_speaker_section_status')))
<div class="even-speakers padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title event-home desktop-center padding-bottom-50">
                    <span class="subtitle">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_event_speaker_area_subtitle')}}</span>
                    <h2 class="title">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_event_speaker_area_title')}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="event-team-carousel">
                    @foreach($all_team_members as $data)
                        <div class="single-team-member-item-07">
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
                                <h4 class="title">{{$data->name}}</h4>
                                <span class="designation">{{$data->designation}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('event_home_page_counterup_section_status')))
<div class="counterup-area event-home padding-top-120 padding-bottom-110"
     {!! render_background_image_markup_by_attachment_id(get_static_option('home_07_counterup_bg_image')) !!}
>
    <div class="container">
        <div class="row">
            @foreach($all_counterup as $data)
                <div class="col-lg-3 col-md-6">
                    <div class="counterup-wrap-07">
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
@if(!empty(get_static_option('event_home_page_upcoming_event_section_status')))
<div class="upcoming-event padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title event-home desktop-center padding-bottom-50">
                    <span class="subtitle">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_upcoming_event_area_subtitle')}}</span>
                    <h2 class="title">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_upcoming_event_area_title')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="event-carousel">
                    @foreach($all_events as $data)
                        <div class="single-event-item-style-07">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                                <div class="hover">
                                    <div class="top-part">
                                        @if(!empty($data->cost))
                                        <div class="price-wrap">{{amount_with_currency_symbol($data->cost)}}</div>
                                        @endif
                                        <div class="cart-wrap"><a href="{{route('frontend.events.single',$data->slug)}}"><i class="fas fa-shopping-cart"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-part">
                                    <div class="time-warp">
                                        <span class="date">{{date('d',strtotime($data->date))}}</span>
                                        <span class="month">{{date('M',strtotime($data->date))}}</span>
                                    </div>
                                    <a href="{{route('frontend.events.single',$data->slug)}}"><h4 class="title">{{$data->title}}</h4></a>
                                </div>
                                <div class="content-wrap">
                                    <p>{{Str::words(strip_tags($data->content),20)}}</p>
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
@if(!empty(get_static_option('event_home_page_sponsors_logo_section_status')))
<div class="our-sponsors-area padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title event-home desktop-center padding-bottom-50">
                    <span class="subtitle">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_our_sponsors_area_subtitle')}}</span>
                    <h2 class="title">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_our_sponsors_area_title')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-carousel">
                    @foreach($all_brand_logo as $data)
                        <div class="single-carousel event-home">
                            @if(!empty($data->url)) <a href="{{$data->url}}"> @endif
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            @if(!empty($data->url))</a> @endif
                        </div>
                    @endforeach
                </div>
                @if(!empty(get_static_option('home_page_07_our_sponsors_button_link')))
                <div class="btn-wrapper text-center margin-top-30">
                    <a href="{{get_static_option('home_page_07_our_sponsors_button_link')}}" class="boxed-btn">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_our_sponsors_button_text')}}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('event_home_page_latest_blog_section_status')))
<div class="new-area padding-top-120 padding-bottom-120 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title event-home desktop-center padding-bottom-50">
                    <span class="subtitle">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_latest_news_area_subtitle')}}</span>
                    <h2 class="title">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_latest_news_area_title')}}</h2>
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
                                <a href="{{route('frontend.blog.single',$data->slug)}}" class="readmore">{{get_static_option('home_page_07_'.$user_select_lang_slug.'_news_blog_area_readmore_text')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif