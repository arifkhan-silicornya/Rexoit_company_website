<div class="header-style-04">
    <nav class="navbar navbar-area navbar-expand-lg nav-style-02">
        <div class="container nav-container">
            <div class="navbar-brand">
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
            <div class="nav-right-content">
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
    </nav>
    <!-- navbar area end -->
</div>