@extends('frontend.frontend-page-master')
@php $page_name = get_static_option('service_page_'.$user_select_lang_slug.'_name'); @endphp
@section('site-title')
    {{$page_name}}
@endsection
@section('page-title')
    {{$page_name}}
@endsection
@section('breadcrumb')
    <li>{{$page_name}}</li>
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('service_page_'.$user_select_lang_slug.'_meta_tags')}}">
    <meta name="tags" content="{{get_static_option('service_page_'.$user_select_lang_slug.'_meta_description')}}">
@endsection
<style>
.single-work-item-02 .thumb img{
    height:210px !important;
}
.single-work-item-02 .thumb {
    height:210px !important;
}
.single-work-item-02 .content {
    height:245px !important;
}
</style>
@section('content')
    <section class="service-area service-page padding-120">
        <div class="container">
            <div class="row">
                @foreach($all_services as $data)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-work-item-02 margin-bottom-30 gray-bg">
                            <div class="thumb">
                                {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                            </div>
                            <div class="content">
                                <a href="{{route('frontend.services.single',$data->slug)}}"><h4 class="title">{{$data->title}}</h4></a>
                                <div class="post-description">
                                    <p>{{$data->excerpt}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="pagination-wrapper">
                        {{$all_services->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
