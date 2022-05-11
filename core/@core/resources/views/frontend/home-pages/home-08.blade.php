<div class="product-home-header-wrapper">
    @if(!empty(get_static_option('product_home_page_topbar_section_status')))
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
    <nav class="navbar navbar-area navbar-expand-lg nav-style-event-home home-variant-{{get_static_option('home_page_variant')}}">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="{{url('/')}}" class="logo">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                        <li class="cart">
                            <a href="{{route('frontend.products.cart')}}"><i class="fas fa-shopping-cart"></i> <span class="pcount">{{cart_total_items()}}</span></a>
                        </li>
                    </ul>
                </div>
                 @endif
            </div>
        </div>
    </nav>

    <header class="header-area-wrapper header-carousel-two">
        @php
            $all_icon_fields =  get_static_option('home_08_header_bg_image');
            $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : [];
            $button_url_fields =  get_static_option('home_page_08_header_slider_button_url');
            $button_url_fields = !empty($button_url_fields) ? unserialize($button_url_fields) : ['#'];
        @endphp
        @if(count($all_icon_fields) > 0)
            @foreach($all_icon_fields as $index => $icon_field)
                @php
                    $all_title_fields = get_static_option('home_page_08_'.$user_select_lang_slug.'_header_slider_title');
                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['volunteers'];
                    $all_button_text_fields = get_static_option('home_page_08_'.$user_select_lang_slug.'_header_slider_button_text');
                    $all_button_text_fields = !empty($all_button_text_fields) ? unserialize($all_button_text_fields) : ['Shop Now'];
                    $all_description_fields = get_static_option('home_page_08_'.$user_select_lang_slug.'_header_slider_description');
                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : ['Do so written as raising parlors spirits mr elderly. Made late in of high left hold.'];
                @endphp
                <div class="product-home-header-area style-03">
                    <div class="right-image-wrap">
                        {!! render_image_markup_by_attachment_id($icon_field) !!}
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="header-inner">
                                    <h1 class="title">{{$all_title_fields[$index]}}</h1>
                                    <p>{{$all_description_fields[$index]}}</p>
                                    <div class="btn-wrapper  desktop-left padding-top-20">
                                        <a href="{{$button_url_fields[$index]}}"
                                           class="boxed-btn btn-rounded white">{{isset($all_button_text_fields[$index]) ? $all_button_text_fields[$index] : ''}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </header>
</div>
@if(!empty(get_static_option('product_home_page_product_category_section_status')))
<div class="product-category-area padding-bottom-120 padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-category-carousel">
                    @foreach($all_products_category as $data)
                        <div class="single-category-item">
                            <div class="thumb">
                                <a href="{{route('frontend.products.category',['id' => $data->id,'any' => Str::slug($data->title)])}}">
                                    {!! render_image_markup_by_attachment_id($data->image) !!}
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a
                                            href="{{route('frontend.products.category',['id' => $data->id,'any' => Str::slug($data->title)])}}">{{$data->title}}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('product_home_page_featured_item_section_status')))
<div class="featured-products-area padding-bottom-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title product-home desktop-center padding-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_08_'.$user_select_lang_slug.'_popular_article_title')}}</h2>
                    <p>{{get_static_option('home_page_08_'.$user_select_lang_slug.'_popular_article_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-product-slider">
                    @foreach($all_featured_products as $data)
                        <div class="single-feature-product">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                                @if(!empty($data->badge))
                                    <span class="tag">{{$data->badge}}</span>
                                @endif
                                <div class="hover">
                                    @if($data->stock_status == 'out_stock')
                                        <div class="out_of_stock">{{__('Out Of Stock')}}</div>
                                    @else
                                        <a href="{{route('frontend.products.add.to.cart')}}"
                                           class="addtocart ajax_add_to_cart" data-product_id="{{$data->id}}"
                                           data-product_title="{{$data->title}}" data-product_quantity="1"><i
                                                    class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            {{get_static_option('product_add_to_cart_button_'.$user_select_lang_slug.'_text')}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="content">
                                <a href="{{route('frontend.products.single',$data->slug)}}">
                                    <h4 class="title">{{$data->title}}</h4>
                                </a>
                                <div class="bottom-part">
                                    <div class="price-wrap">
                                        <span class="price">{{amount_with_currency_symbol($data->sale_price)}}</span>
                                        @if(!empty($data->regular_price))
                                            <del class="del-price">{{amount_with_currency_symbol($data->regular_price)}}</del>@endif
                                    </div>
                                    @if(count($data->ratings) > 0)
                                        <div class="rating-wrap">
                                            <div class="ratings">
                                                <span class="hide-rating"></span>
                                                <span class="show-rating"
                                                      style="width: {{get_product_ratings_avg_by_id($data->id) / 5 * 100}}%"></span>
                                            </div>
                                            <p><span class="total-ratings">({{count($data->ratings)}})</span></p>
                                        </div>
                                    @endif
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
@if(!empty(get_static_option('product_home_page_decorate_section_status')))
<div class="decorate-area">
    <div class="right-image-wrap">
        {!! render_image_markup_by_attachment_id(get_static_option('home_page_08_decorate_area_right_image')) !!}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content-wrapper">
                    <h4 class="title">{{get_static_option('home_page_08_'.$user_select_lang_slug.'_decorate_area_title')}}</h4>
                    <p>{!! get_static_option('home_page_08_'.$user_select_lang_slug.'_decorate_area_description') !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(!empty(get_static_option('product_home_page_latest_products_section_status')))
<div class="latest-product-area padding-top-120 padding-bottom-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title product-home desktop-center padding-bottom-50">
                    <h2 class="title">{{get_static_option('home_page_08_'.$user_select_lang_slug.'_latest_product_area_title')}}</h2>
                    <p>{{get_static_option('home_page_08_'.$user_select_lang_slug.'_latest_product_area_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="latest-product-filter-nav">
                    <ul>
                        <li class="active" data-filter="*">{{__('All')}}</li>
                        @foreach($all_product_filter_category as $data)
                            <li data-filter=".{{Str::slug($data->title)}}">{{$data->title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="latest-product-filter-wrapper">
                    <div class="latest-product-masonry">
                        @foreach($all_latest_products as $data)
                            <div class="col-lg-3 col-md-6 masonry-item {{Str::slug(get_product_category_by_id($data->category_id))}}">
                                <div class="single-feature-product">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image,'masonry-image','grid') !!}
                                        @if(!empty($data->badge))
                                            <span class="tag">{{$data->badge}}</span>
                                        @endif
                                        <div class="hover">
                                            @if($data->stock_status == 'out_stock')
                                                <div class="out_of_stock">{{__('Out Of Stock')}}</div>
                                            @else
                                                <a href="{{route('frontend.products.add.to.cart')}}"
                                                   class="addtocart ajax_add_to_cart" data-product_id="{{$data->id}}"
                                                   data-product_title="{{$data->title}}" data-product_quantity="1"><i
                                                            class="fa fa-shopping-bag" aria-hidden="true"></i>
                                                    {{get_static_option('product_add_to_cart_button_'.$user_select_lang_slug.'_text')}}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="content">
                                        <a href="{{route('frontend.products.single',$data->slug)}}">
                                            <h4 class="title">{{$data->title}}</h4>
                                        </a>
                                        <div class="bottom-part">
                                            <div class="price-wrap">
                                                <span class="price">{{amount_with_currency_symbol($data->sale_price)}}</span>
                                                @if(!empty($data->regular_price))
                                                    <del class="del-price">{{amount_with_currency_symbol($data->regular_price)}}</del>@endif
                                            </div>
                                            @if(count($data->ratings) > 0)
                                                <div class="rating-wrap">
                                                    <div class="ratings">
                                                        <span class="hide-rating"></span>
                                                        <span class="show-rating"
                                                              style="width: {{get_product_ratings_avg_by_id($data->id) / 5 * 100}}%"></span>
                                                    </div>
                                                    <p><span class="total-ratings">({{count($data->ratings)}})</span>
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
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
@if(!empty(get_static_option('product_home_page_brand_carousel_section_status')))
<div class="our-sponsors-area padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-carousel">
                    @foreach($all_brand_logo as $data)
                        <div class="single-carousel product-home">
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
@if(!empty(get_static_option('product_home_page_testimonial_section_status')))
<div class="testimonial-area padding-bottom-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content-wrapper">
                    <div class="product-section-title">
                        <h2 class="title">{{get_static_option('home_page_08_'.$user_select_lang_slug.'_testimonial_area_title')}}</h2>
                        <p>{{get_static_option('home_page_08_'.$user_select_lang_slug.'_testimonial_area_description')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-wrapper">
                    <div class="testimonial-carousel-08">
                        @foreach($all_testimonial as $data)
                            <div class="single-carousel-item-08">
                                <div class="top-part">
                                    <div class="thumb">
                                        {!! render_image_markup_by_attachment_id($data->image) !!}
                                    </div>
                                    <div class="content">
                                        <h5 class="title">{{$data->name}}</h5>
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
@if(!empty(get_static_option('product_home_page_subscribe_status')))
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta-inner-area">
                    <div class="left-content">
                        <h2 class="title">{{get_static_option('home_page_08_'.$user_select_lang_slug.'_cta_area_title')}}</h2>
                    </div>
                    <div class="right-content">
                        <div class="newsletter-form-wrap">
                            <div class="form-message-show"></div>
                            <form action="{{route('frontend.subscribe.newsletter')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="{{get_static_option('home_page_08_'.$user_select_lang_slug.'_cta_area_placeholder_text')}}" class="form-control">
                                </div>
                                <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif