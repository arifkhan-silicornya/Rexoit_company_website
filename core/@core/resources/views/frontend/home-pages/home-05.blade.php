
<div class="header-knowledebase-area"
{!! render_background_image_markup_by_attachment_id(get_static_option('home_page_05_header_background_image')) !!}
>
    @if(!empty(get_static_option('home_page_support_bar_section_status')))
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
    @include('frontend.partials.navbar-04')
    <div class="header-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="header-inner">
                        <h1 class="title">{{get_static_option('home_page_05_'.$user_select_lang_slug.'_header_title')}}</h1>
                        <p>{{get_static_option('home_page_05_'.$user_select_lang_slug.'_header_description')}}</p>
                        @if(!empty(get_static_option('home_page_05_'.$user_select_lang_slug.'_search_form_status')))
                            <div class="search-wrapper">
                                <form action="{{route('frontend.knowledgebase.search')}}" method="get">
                                    <input type="text" class="form-control" name="search" placeholder="{{get_static_option('home_page_05_'.$user_select_lang_slug.'_header_search_placeholder')}}">
                                    <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-image-wrap">
        {!! render_image_markup_by_attachment_id(get_static_option('home_page_05_header_bottom_image')) !!}
    </div>
</div>
@if(!empty(get_static_option('knowledgebase_home_page_highlight_box_section_status')))
<div class="highlight-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row">
            @php
                $all_icon_fields =  get_static_option('home_page_05_highlight_box_icon');
                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
                 $all_title_fields = get_static_option('home_page_05_'.$user_select_lang_slug.'_highlight_box_title');
                $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : [];
                $all_description_fields = get_static_option('home_page_05_'.$user_select_lang_slug.'_highlight_box_description');
                $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : [];
            @endphp
            @if(!empty($all_icon_fields))
            @foreach($all_icon_fields as $index => $icon_field)
            <div class="col-lg-4">
                <div class="single-highlight-item">
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
@if(!empty(get_static_option('knowledgebase_home_page_popular_article_section_status')))
<div class="popular-article-area padding-bottom-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_05_'.$user_select_lang_slug.'_popular_article_title')}}</h2>
                    <p>{{get_static_option('home_page_05_'.$user_select_lang_slug.'_popular_article_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($popular_article as $key => $data)
            <div class="col-lg-4">
                <div class="single-popular-article-wrap">
                    <h4 class="title"><a href="{{route('frontend.knowledgebase.category',['id' => $key, 'any' => Str::slug(get_knowledgebase_topic($key))])}}">{{get_knowledgebase_topic($key)}}</a></h4>
                    <ul class="article-list">
                        @foreach($data as $item)
                        <li><i class="fas fa-file-alt"></i> <a href="{{route('frontend.knowledgebase.single',$item->title)}}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('knowledgebase_home_page_testimonial_section_status')))
<div class="knowledge-testimonial-area padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="testimonial-carousel-wrapper">
                    @foreach($all_testimonial as $data)
                    <div class="single-testimonial-item-05">
                        <p>{{$data->description}}</p>
                        <div class="author-details">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image) !!}
                            </div>
                            <div class="author">
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
@if(!empty(get_static_option('knowledgebase_home_page_faq_section_status')))
<div class="faq-area-wrapper padding-top-120 padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_05_'.$user_select_lang_slug.'_faq_area_title')}}</h2>
                    <p>{{get_static_option('home_page_05_'.$user_select_lang_slug.'_faq_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion-wrapper">
                    @php $rand_number = rand(9999,99999999); @endphp
                    <div id="accordion_{{$rand_number}}">
                        @foreach($all_faq as $key => $data)
                            @php
                                $aria_expanded = 'false';
                                if($data->is_open == 'on'){ $aria_expanded = 'true'; }
                            @endphp
                            <div class="card">
                                <div class="card-header" id="headingOne_{{$key}}">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-target="#collapseOne_{{$key}}" role="button"
                                           aria-expanded="{{$aria_expanded}}" aria-controls="collapseOne_{{$key}}">
                                            {{$data->title}}
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_{{$key}}" class="collapse @if($data->is_open == 'on') show @endif "
                                     aria-labelledby="headingOne_{{$key}}" data-parent="#accordion_{{$rand_number}}">
                                    <div class="card-body">
                                        {{$data->description}}
                                    </div>
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
@if(!empty(get_static_option('knowledgebase_home_page_team_section_status')))
<div class="team-member-area padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title desktop-center margin-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_title')}}</h2>
                    <p>{{get_static_option('home_page_01_'.$user_select_lang_slug.'_team_member_section_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team-member-carousel">
                    @foreach($all_team_members as $data)
                    <div class="single-team-member">
                        <div class="thumb">
                            {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                        </div>
                        <div class="content">
                            <h4 class="title">{{$data->name}}</h4>
                            <span class="designation">{{$data->designation}}</span>
                            <ul class="social">
                                @if(!empty($data->icon_one) && !empty($data->icon_one_url))
                                    <li><a href="{{$data->icon_one_url}}"><i class="{{$data->icon_one}}"></i></a></li>
                                @endif
                                @if(!empty($data->icon_two) && !empty($data->icon_two_url))
                                    <li><a href="{{$data->icon_two_url}}"><i class="{{$data->icon_two}}"></i></a></li>
                                @endif
                                @if(!empty($data->icon_three) && !empty($data->icon_three_url))
                                    <li><a href="{{$data->icon_three_url}}"><i class="{{$data->icon_three}}"></i></a></li>
                                @endif
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
@if(!empty(get_static_option('knowledgebase_home_page_cta_section_status')))
<div class="call-to-action-wrapper padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-inner-wrapper"
                {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_05_cta_area_background_image')) !!}
                >
                    <div class="left-content-wrap">
                        <h2 class="title">{{get_static_option('home_page_05_'.$user_select_lang_slug.'_cta_area_title')}}</h2>
                        <p>{{get_static_option('home_page_05_'.$user_select_lang_slug.'_cta_area_description')}}</p>
                    </div>
                    <div class="btn-wrpper">
                        <a href="{{get_static_option('home_page_05_cta_area_btn_url')}}" class="boxed-btn">{{get_static_option('home_page_05_'.$user_select_lang_slug.'_cta_area_btn_text')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif