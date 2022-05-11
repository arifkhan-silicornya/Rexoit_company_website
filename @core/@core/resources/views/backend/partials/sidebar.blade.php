<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.home')}}">
                @php
                    $logo_type = 'site_logo';
                        if(!empty(get_static_option('site_admin_dark_mode'))){
                            $logo_type = 'site_white_logo';
                        }
                @endphp
                {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!}
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="main_dropdown {{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>{{__('dashboard')}}</span>
                        </a>
                    </li>
                    @foreach($all_menus as $main_menu => $sub_menu)
                        @php $all_sub_menus = (array) $sub_menu; @endphp
                        @if( get_static_option('job_module_status') != 'on' && $main_menu == 'job_post_manage' )
                            @continue
                        @elseif(get_static_option('events_module_status') != 'on' && $main_menu == 'events_manage')
                            @continue
                        @elseif(get_static_option('product_module_status') != 'on' && $main_menu == 'products_manage')
                            @continue
                        @elseif(get_static_option('donations_module_status') != 'on' && $main_menu == 'donations_manage')
                            @continue
                        @elseif(get_static_option('knowledgebase_module_status') != 'on' && $main_menu == 'knowledgebase_manage')
                            @continue
                        @elseif(get_static_option('service_module_status') != 'on' && $main_menu == 'services')
                            @continue
                        @elseif(get_static_option('works_module_status') != 'on' && $main_menu == 'works')
                            @continue
                        @elseif(get_static_option('blog_module_status') != 'on' && $main_menu == 'blogs_manage')
                            @continue
                        @elseif(get_static_option('gig_module_status') != 'on' && $main_menu == 'gigs_manage')
                            @continue
                        @endif
                        @if(count($all_sub_menus) > 1)
                            <li class="main_dropdown @if(in_array(request()->route()->getName(),$all_sub_menus)) active @endif">
                                <a href="javascript:void(0)"
                                   aria-expanded="true">
                                    <i class="ti-home"></i>
                                    <span>{{__(str_replace('_',' ',$main_menu))}}</span>
                                </a>
                                <ul class="collapse">
                                    @foreach($sub_menu as $item_name => $route_name)
                                    <li class="@if(request()->routeIs($route_name)) active @endif">
                                        <a href="{{route($route_name)}}">{{__(str_replace('_',' ',substr($item_name,1,-1)))}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @php
                                $firstProp = current( (Array) $sub_menu );
                            @endphp
                            <li class="main_dropdown @if(request()->routeIs($firstProp)) active @endif">
                                <a href="{{route($firstProp)}}"
                                   aria-expanded="true">
                                    <i class="ti-file"></i>
                                    <span>{{__(str_replace('_',' ',$main_menu))}}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
